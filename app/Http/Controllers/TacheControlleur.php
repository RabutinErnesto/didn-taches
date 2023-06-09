<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Notifications\TacheAffected;
Use App\Tache;
Use App\User;
use Illuminate\Support\Facades\Auth;

class TacheControlleur extends Controller
{

    // store all users
    public $users;

    public function __construct()
    {
        $this->users=User::getAllUsers();
        $this->middleware('auth');
    }

    /**
     * Assign a tache to user
     * @param App\Tache @tache
     * @param App\User @user
     * @return \Illuminate\Http\Response
     */
    public function affectedto(Tache $tache,User $user){
        $tache->affectedTo_id = $user->id;
        $tache->affectedBy_id = Auth::user()->id;
        $tache->update();
        $user->notify(new TacheAffected($tache));
        return back();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //$datas = Tache::All();
        //$this->data['tache']=Tache::All();
        $userId = Auth::user()->id;

        $this->data['tache']=Tache::where(['affectedTo_id' => $userId])->orderBy('id','desc')->paginate(10);
        //$this->data['tache']=Tache::paginate(10);
        $this->data['users']=$this->users;

        /*
        $this->data['tache']=Tache::All()->reject( function ($tache){
            return $tache->done == 0;
        });*/
        return view('taches.index', $this->data);

    }
    /**
     * Affichage de liste de taches
     */
    public function done(){
        $this->data['tache']=Tache::where('done',1)->paginate(10);
        $this->data['users']=$this->users;
        return view('taches.index', $this->data);
    }
    /**
     * Affichage de liste de taches
     */
    public function undone(){
        $this->data['tache']=Tache::where('done',0)->paginate(10);
        $this->data['users']=$this->users;
        return view('taches.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taches.create');
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

        $tache->creator_id=Auth::user()->id;
        $tache->affectedTo_id =Auth::user()->id;
        $tache->nom=$request->nom;
        $tache->description = $request->description;
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
        $this->data['tache']=Tache::find($id);
        return view('taches.edit',$this->data);
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
        if (!isset ($request->done)) {
            $request['done'] = 0;
        }
        $tache->update($request->all());
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
        $tache=Tache::find($id);
        $tache->delete();
        notify()->error("La tache <span class='badge badge-dark'>#$tache->id</span> a été suprimée");
        return back();
    }
    /**
     * faire terminé une tache
     */
    public function makedone(Tache $tache){
        $tache->done = 1;
        $tache->update();
        notify()->success("La tache <span class='badge badge-dark'>#$tache->id</span> a bien été terminée");
        return back();
    }
    /**
     * Changer status en non terminer
     */
    public function makeundone(Tache $tache){
        $tache->done = 0;
        $tache->update();
        notify()->success("La tache <span class='badge badge-dark'>#$tache->id</span> est à nouveau ouverte");
        return back();
    }
}
