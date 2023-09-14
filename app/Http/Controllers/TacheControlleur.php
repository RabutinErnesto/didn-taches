<?php

namespace App\Http\Controllers;

use App\Exports\RabutinExporteur;
use Illuminate\Http\Request;
use App\Notifications\TacheAffected;
use App\Tache;
use App\User;
use App\Maintenace;
use App\TacheMaintenance;
use App\Direction;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RabutinExporteurTaches;

class TacheControlleur extends Controller
{

    // store all users
    public $users;

    public function __construct()
    {
        $this->users = User::getAllUsers();
        $this->middleware('auth');
    }

    /**
     * Assign a tache to user
     * @param App\Tache @tache
     * @param App\User @user
     * @return \Illuminate\Http\Response
     */
    public function affectedto(Tache $tache, User $user)
    {
        $tache->affectedTo_id = $user->id;
        $tache->affectedBy_id = Auth::user()->id;
        $tache->update();
        $user->notify(new TacheAffected($tache));
        return back();
    }

    public function ajoutcollabo($id)
    {
        $this->data['tache'] = Tache::find($id);
        return view('taches.ajoutcollabo', $this->data);

    }

    public function collabo(Request $request, Tache $tache)
    {
        $tache->collaborateur = $request->collaborateur;
        $tache->update();
        return redirect()->route('taches.index');
    }

    public function exportTaches(Request $request)
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

        $tache = Tache::where(function ($query) use ($startDate) {
            if ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }
        })->orderBy('id', 'desc')->paginate(10);

        $userId = Auth::user()->id;

        $users = User::where('service', 'SMAR')->get();

        $resultatMapping = [];
        foreach ($tache as $f) {
            $resultatMapping[$f->id] = 'Résultat ' . $f->id;
        }
        return Excel::download(new RabutinExporteurTaches($tache, $resultatMapping), 'taches.xlsx');

        return view('taches.index', compact('tache', 'users'));
    }

    public function filtrerTaches(Request $request)
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

        $tache = Tache::where(function ($query) use ($startDate) {
            if ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }
        })->orderBy('id', 'desc')->paginate(10);

        $userId = Auth::user()->id;

        $users = User::where('service', 'SMAR')->get();

        return view('taches.index', compact('tache', 'users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $this->data['tache'] = Tache::orderBy('id', 'desc')->paginate(10);
        $this->data['users'] = User::where('service', 'SMAR')->get();
        return view('taches.index', $this->data);
    }
    /**
     * Affichage de liste de taches
     */
    public function done()
    {
        $this->data['tache'] = Tache::where('done', 1)->paginate(10);
        $this->data['users'] = $this->users;
        return view('taches.index', $this->data);
    }
    /**
     * Affichage de liste de taches
     */
    public function undone()
    {
        $this->data['tache'] = Tache::where('done', 0)->paginate(10);
        $this->data['users'] = $this->users;
        return view('taches.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direction = Direction::all();
        $service = Service::all();
        $maintenance = Maintenace::all();
        $tache_maint = TacheMaintenance::all();
        return view('taches.create', [
            'direction' => $direction,
            'service' => $service,
            'maintenance' => $maintenance,
            'tache_maint' => $tache_maint
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
        $tache = new Tache();

        $tache->creator_id = Auth::user()->id;
        $tache->affectedTo_id = Auth::user()->id;
        $tache->maintenance_id = $request->nom;


        if ($request->nom === "Autres") {
            $tache->tache = $request->tache_autre;
        } else {
            $tache->tache = $request->tache_select;
        }

        $tache->observation = $request->observation;

        $tache->tache_faire = $request->tache_faire;

        $tache->nom_proprietaire = $request->nom_proprietaire;
        $tache->direction_id = $request->direction_proprietaire;
        $tache->service_id = $request->service_proprietaire;
        $tache->fonction_proprietaire = $request->fonction_proprietaire;
        $tache->contact_proprietaire = $request->contact_proprietaire;
        $tache->porte = $request->porte;
        $tache->batiment = $request->batiment;
        $tache->save();
        notify()->success("La tache <span class='badge badge-dark'>#$tache->id</span> vient d'être créée");
        return redirect()->route('taches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['tache'] = Tache::find($id);
        $this->data['maintenance'] = Maintenace::all();
        $this->data['tache_maint'] = TacheMaintenance::all();
        $this->data['direction'] = Direction::all();
        $this->data['service'] = Service::all();
        return view('taches.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tache = Tache::findOrFail($id);
        // if (!isset ($request->done)) {
        //     $request['done'] = 0;
        // }
        $tache->maintenance_id = $request->nom;


        if ($request->nom === "Autres") {
            $tache->tache = $request->tache_autre;
        } else {
            $tache->tache = $request->tache_select;
        }

        $tache->observation = $request->observation;

        $tache->tache_faire = $request->tache_faire;

        $tache->nom_proprietaire = $request->nom_proprietaire;
        $tache->direction_id = $request->direction_proprietaire;
        $tache->service_id = $request->service_proprietaire;
        $tache->fonction_proprietaire = $request->fonction_proprietaire;
        $tache->contact_proprietaire = $request->contact_proprietaire;
        $tache->porte = $request->porte;
        $tache->batiment = $request->batiment;
        $tache->save();
        notify()->success("La tache <span class='badge badge-dark'>#$tache->id</span> a été bien mise à jour");
        return redirect()->route('taches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tache = Tache::find($id);
        $tache->delete();
        notify()->error("La tache <span class='badge badge-dark'>#$tache->id</span> a été suprimée");
        return back();
    }
    /**
     * faire terminé une tache
     */
    public function makedone(Tache $tache)
    {
        $tache->done = 1;
        $tache->update();
        notify()->success("La tache <span class='badge badge-dark'>#$tache->id</span> a bien été terminée");
        return back();
    }
    /**
     * Changer status en non terminer
     */
    public function makeundone(Tache $tache)
    {
        $tache->done = 0;
        $tache->update();
        notify()->success("La tache <span class='badge badge-dark'>#$tache->id</span> est à nouveau ouverte");
        return back();
    }
}
