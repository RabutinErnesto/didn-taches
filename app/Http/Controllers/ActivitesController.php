<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Activites;
use App\User;
use App\ServiceDIDN;
use App\Direction;
use PDF;
use Illuminate\Support\Facades\Auth;


class activitesController extends Controller
{
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
        $this->data['activite']=Activites::orderBy('id','desc')->paginate(10);
        $this->data['users']=$this->users;
        return view('activites.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service =ServiceDIDN::get();
        $direction = Direction::get();
        return view('activites.create',[
            'service'=>$service,
            'direction' =>$direction
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
       /*
        dd($request->all());
        foreach ($request->moreFields as $key => $activite) {
            dd($request->all());
           // Activites::create($activite);
        }*/

       $activite = new Activites();
        $activite->user_created=Auth::user()->id;
        $activite->semaine=$request->semaine;
        $activite->service=$request->service;
        $activite->intitule_activite = $request->intitule_activite;
        $activite->details=$request->details;
        $activite->description = $request->description;
        $activite->observation = $request->observation;
        $activite->save();
        notify()->success("L'activité <span class='badge badge-dark'>#$activite->id</span> vient d'être créée");
        return redirect()->route('activites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['activite']=Activites::find($id);
        return view('activites.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service =ServiceDIDN::get();
        $activite = Activites::find($id);
        return view('activites.edit',[
            'service'=>$service,
            'activite' =>$activite
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
        $activite= Activites::findOrFail($id);
        $activite->user_created=Auth::user()->id;
        $activite->service=$request->service;
        $activite->intitule_activite = $request->intitule_activite;
        $activite->details=$request->details;
        $activite->description = $request->description;
        $activite->observation = $request->observation;
        $activite->save();
        notify()->success("L'activité <span class='badge badge-dark'>#$activite->id</span> a été bien mise à jour");
        return redirect()->route('activites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activite=Activites::find($id);
        $activite->delete();
        notify()->error("L'activite <span class='badge badge-dark'>#$activite->id</span> a été suprimée");
        return back();
    }
    public function pdf($id)
        {
            $activite=Activites::find($id);
            $data = [
                'title' => 'activite',
                'activite'=>$activite
            ];
        // return view('activites.pdf', $data);
            $pdf = PDF::loadview('activites/pdf', $data)->setpaper('21 x 29,7', 'portrait');
        return $pdf->stream('myfile.pdf',array("Attachment"=>0));

        }
}
