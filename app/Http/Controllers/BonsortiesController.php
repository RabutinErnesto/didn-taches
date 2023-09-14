<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BonSortie;
use App\User;
use App\Materiel;
use App\Resultat;
use App\Service;
use App\Direction;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exports\RabutinExporteurBon;
use Maatwebsite\Excel\Facades\Excel;

class BonsortiesController extends Controller
{
    public $users;

    public function __construct()
    {
        $this->users=User::getAllUsers();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $this->data['bonsortie']= BonSortie::orderBy('id','desc')->paginate(10);
        $this->data['users']=$this->users;
        return view('bonsortie.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direction = direction::get();
        $service = Service::get();
        $materiel = Materiel::get();
        return view('bonsortie.create',[
            'materiel'=>$materiel,
            'direction'=>$direction,
            'service' =>$service,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bonsortie = new BonSortie;
        $bonsortie->date_sortie = $request->date;
        $bonsortie->nom_preteur = $request->nom_preteur;
        $bonsortie->nom_emprunteur = $request->nom_emprunteur;
        $bonsortie->direction_id = $request->direction_emprunteur;
        $bonsortie->service_id = $request->service_emprunteur;
        $bonsortie->fonction_emprunteur = $request->fonction_emprunteur;
        $bonsortie->contact_emprunteur = $request->contact_proprietaire;
        $bonsortie->materiel = $request->materiel;
        $bonsortie->utilisation = $request->utilisation;
        $bonsortie->observation = $request->observation;
        $bonsortie->user_created=Auth::user()->id;
        $bonsortie->save();
        // notify()->success("Le fiche <span class='badge badge-dark'>#$fiches->id</span> vient d'être créée");
        return redirect()->route('bonsorties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiel = Materiel::get();
        $bonsortie= BonSortie::find($id);
        return view('bonsortie.show',[
        'bonsortie'=>$bonsortie,
        'materiel'=>$materiel,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonsortie=BonSortie::find($id);
        $materiel = Materiel::get();
        $direction = Direction::get();
        $service = Service::get();
        return view('bonsortie.edit',[
            'bonsortie'=>$bonsortie,
            'materiel'=>$materiel,
            'direction' => $direction,
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bonsortie= BonSortie::findOrFail($id);

        $old = $bonsortie->date_arrivee;

        // $bonsortie->date_sortie = $request->date;
        $bonsortie->nom_preteur = $request->nom_preteur;
        $bonsortie->nom_emprunteur = $request->nom_emprunteur;
        $bonsortie->direction_id = $request->direction_emprunteur;
        $bonsortie->service_id = $request->service_emprunteur;
        $bonsortie->fonction_emprunteur = $request->fonction_emprunteur;
        $bonsortie->contact_emprunteur = $request->contact_proprietaire;
        $bonsortie->materiel = $request->materiel;
        $bonsortie->utilisation = $request->utilisation;
        $bonsortie->observation = $request->observation;
        $bonsortie->user_created=Auth::user()->id;
        if ($request->has('date_arrivee')){
            $bonsortie->date_arrivee = $request->date_arrivee;
        }else{
            $bonsortie->date_arrivee = $old;
        }
        $bonsortie->save();

        return redirect()->route('bonsorties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bonsortie=BonSortie::find($id);
        $bonsortie->delete();
        notify()->error("Le bonsortie <span class='badge badge-dark'>#$bonsortie->id</span> a été suprimée");
        return back();
    }

    public function pdf($id)
    {
        $fiche=BonSortie::find($id);
        $materiel = Materiel::get();
        $data = [
            'title' => 'fiche',
            'fiche'=>$fiche,
            'materiel'=>$materiel,
        ];
        // return view('bonsortie.pdf', $data);


       $pdf = PDF::loadview('bonsortie/pdf', $data)->set_option('isHtml5ParserEnabled', false);

       return $pdf->stream('bon_de_sortie.pdf', array("Attachment"=>false));

    }

    public function exportExcel()
    {
        return Excel::download(new BonSortieExport , 'fiches_intervention.xlsx');
    }

    public function exportBon(Request $request)
    {
        $periode = $request->input('periode');
        $today = Carbon::now();

        if ($periode == '5') {
            $startDate = $today->subDays(5);
        } elseif ($periode == '10') {
            $startDate = $today->subDays(10);
        } elseif ($periode == '30') {
            $startDate = $today->subDays(30);
        } else {
            $startDate = null;
        }

        $bonsortie = BonSortie::where(function ($query) use ($startDate) {
            if ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }
        })->orderBy('id', 'desc')->paginate(10);

        $userId = Auth::user()->id;

        $users = User::where('service', 'SMAR')->get();

        $resultatMapping = [];
        foreach ($bonsortie as $f) {
            $resultatMapping[$f->id] = 'Résultat ' . $f->id;
        }
        return Excel::download(new RabutinExporteurBon($bonsortie, $resultatMapping), 'bon_de_sortie.xlsx');

        return view('bonsortie.index', compact('bonsortie', 'users'));
    }

    public function filtrerBon(Request $request)
    {
        $periode = $request->input('periode');
        $today = Carbon::now();

        if ($periode == '5') {
            $startDate = $today->subDays(5);
        } elseif ($periode == '10') {
            $startDate = $today->subDays(10);
        } elseif ($periode == '30') {
            $startDate = $today->subDays(30);
        } else {
            $startDate = null;
        }

        $bonsortie = BonSortie::where(function ($query) use ($startDate) {
            if ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }
        })->orderBy('id', 'desc')->paginate(10);

        $userId = Auth::user()->id;

        $users = User::where('service', 'SMAR')->get();

        return view('bonsortie.index', compact('bonsortie', 'users'));
    }
}
