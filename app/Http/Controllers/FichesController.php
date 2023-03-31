<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fiches;
use App\User;
use App\Materiel;
use App\Solution;
use App\Probleme;
use App\Resultat;
use App\Service;
use App\Direction;
use PDF;
use Illuminate\Support\Facades\Auth;

class fichesController extends Controller
{

        // store all users
    public $users;

    public function __construct()
    {
        $this->users=User::getAllUsers();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $this->data['fiche']=Fiches::orderBy('id','desc')->paginate(10);
        $this->data['users']=$this->users;
        return view('fiches.index',$this->data);
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
        $solution = Solution::get();
        $probleme = Probleme::get();
        $resultat = Resultat::get();
        return view('fiches.create',[
            'materiel'=>$materiel,
            'solution' => $solution,
            'probleme' => $probleme,
            'resultat' => $resultat,
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
        $fiches = new Fiches;
        $fiches->date_arrivee = $request->date;
        $fiches->nom_intervenant = $request->nom_intervenant;
        $fiches->nom_proprietaire = $request->nom_proprietaire;
        $fiches->direction_id = $request->direction_proprietaire;
        $fiches->service_id = $request->service_proprietaire;
        $fiches->fonction_proprietaire = $request->fonction_proprietaire;
        $fiches->contact_proprietaire = $request->contact_proprietaire;
        $fiches->materiel = $request->materiel;
        $fiches->marque = $request->marque;
        $fiches->ram = $request->ram;
        $fiches->couleur = $request->couleur;
        $fiches->disque_dur = $request->disque_dur;
        $fiches->carte_mere = $request->carte_mere;
        $fiches->proc = $request->processeur;
        $fiches->encre = $request->encre;
        $fiches->type = $request->type;
        $fiches->autres_materiel = $request->autres_materiel;
        $fiches->probleme_constate = $request->probleme_constate;
        $fiches->problemes = $request->probleme;
        $fiches->solutions = $request->solutions;
        $fiches->interventions = $request->interventions;
        $fiches->resultat = $request->resultat;
        $fiches->motifs_et_remarques = $request->motif;
        $fiches->recommandation = $request->recommandation;
        $fiches->user_created=Auth::user()->id;
        $fiches->save();
        notify()->success("Le fiche <span class='badge badge-dark'>#$fiches->id</span> vient d'être créée");
        return redirect()->route('fiches.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solution = Solution::get();
        $materiel = Materiel::get();
        $probleme = Probleme::get();
        $resultat = Resultat::get();
        $fiche=Fiches::find($id);
        return view('fiches.show',['fiche'=>$fiche,
        'materiel'=>$materiel,
        'solution' => $solution,
        'probleme' => $probleme,
        'resultat' => $resultat,
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
        $fiche=Fiches::find($id);
        $solution = Solution::get();
        $materiel = Materiel::get();
        $probleme = Probleme::get();
        $resultat = Resultat::get();
        $direction = Direction::get();
        $service = Service::get();
        return view('fiches.edit',[
            'fiche'=>$fiche,
            'materiel'=>$materiel,
            'solution' => $solution,
            'probleme' => $probleme,
            'resultat' => $resultat,
            'direction' => $direction,
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fiches= Fiches::findOrFail($id);
        $old = $fiches->date_sortie;


        $fiches->nom_intervenant = $request->nom_intervenant;
        $fiches->nom_proprietaire = $request->nom_proprietaire;
        $fiches->direction_id = $request->direction_proprietaire;
        $fiches->service_id = $request->service_proprietaire;
        $fiches->fonction_proprietaire = $request->fonction_proprietaire;
        $fiches->contact_proprietaire = $request->contact_proprietaire;
        $fiches->materiel = $request->materiel;
        $fiches->marque = $request->marque;
        $fiches->ram = $request->ram;
        $fiches->couleur = $request->couleur;
        $fiches->disque_dur = $request->disque_dur;
        $fiches->carte_mere = $request->carte_mere;
        $fiches->proc = $request->processeur;
        $fiches->encre = $request->encre;
        $fiches->type = $request->type;
        $fiches->autres_materiel = $request->autres_materiel;
        $fiches->probleme_constate = $request->probleme_constate;
        $fiches->problemes = $request->probleme;
        $fiches->solutions = $request->solutions;
        $fiches->interventions = $request->interventions;
        $fiches->resultat = $request->resultat;
        $fiches->motifs_et_remarques = $request->motif;
        $fiches->recommandation = $request->recommandation;

        if ($request->has('date_sortie')){
            $fiches->date_sortie = $request->date_sortie;
        }else{
            $fiches->date_sortie = $old;
        }
        $fiches->save();
        notify()->success("Le fiche <span class='badge badge-dark'>#$fiches->id</span> a été bien mise à jour");
        return redirect()->route('fiches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fiche=Fiches::find($id);
        $fiche->delete();
        notify()->error("Le fiche <span class='badge badge-dark'>#$fiche->id</span> a été suprimée");
        return back();
    }

    public function pdf($id)
    {
        $fiche=Fiches::find($id);
        $solution = Solution::get();
        $materiel = Materiel::get();
        $probleme = Probleme::get();
        $resultat = Resultat::get();
        $data = [
            'title' => 'fiche',
            'fiche'=>$fiche,
            'materiel'=>$materiel,
            'solution' => $solution,
            'probleme' => $probleme,
            'resultat' => $resultat,
        ];
        //return view('fiches.pdf', $data);


       $pdf = PDF::loadview('fiches/pdf', $data)->set_option('isHtml5ParserEnabled', false);

       return $pdf->stream('fiche_d_Intervention.pdf', array("Attachment"=>false));

    }

    public function fiche_vide()
    {

        $solution = Solution::get();
        $materiel = Materiel::get();
        $probleme = Probleme::get();
        $resultat = Resultat::get();
        $data = [
            'materiel'=>$materiel,
            'solution' => $solution,
            'probleme' => $probleme,
            'resultat' => $resultat,
        ];
       // return view('fiches.fiche', $data);
        $pdf = PDF::loadview('fiches/fiche', $data)->set_option('isHtml5ParserEnabled', false);

        return $pdf->stream('fiche_d_Intervention_vide.pdf', array("Attachment"=>false));

    }
}
