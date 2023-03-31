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
    public function test(){
        $activite = Activites::orderBy('semaine')->get()->groupBy('service');

        return view('activites.test', ['activite'=>$activite]);
    }
    public function index()
    {
        $userId = Auth::user()->id;
        $this->data['activite']=Activites::orderBy('id','desc')->get();
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
        $service2 = ServiceDIDN::get();
        return view('activites.create',[
            'service'=>$service,
            'service2' =>$service2
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
        $data = $request->all();
            $activite = new Activites();
            $activite->user_created=Auth::user()->id;
            $activite->semaine=$request->semaine;
            $activite->service=$request->service;
            $activite->intitule_activite =implode(',',$request->intitule_activite) ;
            $activite->status=implode(',',$request->status ) ;
            $activite->description =implode(',',$request->description ) ;
            $activite->observation = implode(',',$request->observation ) ;
            $activite->semaine2=$request->semaine2;
            $activite->service2=$request->service;
            $activite->intitule_activite2 =implode(',',$request->intitule_activite2) ;
            $activite->deadline=implode(',',$request->deadline ) ;
            $activite->description2 = implode(',',$request->description2 ) ;
            $activite->observation2 = implode(',',$request->observation2 ) ;
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
        $this->data['expl'] = $this->data['activite'];
        $this->data['array']= [explode(',', $this->data['expl']->intitule_activite),
        explode(',', $this->data['expl']->description),
        explode(',', $this->data['expl']->status),
        explode(',', $this->data['expl']->observation),
        ];
        $this->data['array2']= [explode(',', $this->data['expl']->intitule_activite2),
        explode(',', $this->data['expl']->description2),
        explode(',', $this->data['expl']->deadline),
        explode(',', $this->data['expl']->observation2),
        ];


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
        $this->data['activite']=Activites::find($id);
        $this->data['expl'] = $this->data['activite'];
        $this->data['array']= [explode(',', $this->data['expl']->intitule_activite),
        explode(',', $this->data['expl']->description),
        explode(',', $this->data['expl']->status),
        explode(',', $this->data['expl']->observation),
        ];
        $this->data['array2']= [explode(',', $this->data['expl']->intitule_activite2),
        explode(',', $this->data['expl']->description2),
        explode(',', $this->data['expl']->deadline),
        explode(',', $this->data['expl']->observation2),
        ];


        $this->data['service']=ServiceDIDN::get();
        $this->data['service2']=ServiceDIDN::get();
        return view('activites.edit',$this->data);
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

        $activite->service=$request->service;
        $activite->intitule_activite =$request->intitule_activite ;
        $activite->status=$request->status  ;
        $activite->description =$request->description  ;
        $activite->observation = $request->observation  ;
        $activite->service2=$request->service;
        $activite->intitule_activite2 =$request->intitule_activite2 ;
        $activite->deadline=$request->deadline  ;
        $activite->description2 = $request->description2  ;
        $activite->observation2 = $request->observation2  ;
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
            $this->data['expl'] = $activite;
            $array= [explode(',', $this->data['expl']->intitule_activite),
            explode(',', $this->data['expl']->description),
            explode(',', $this->data['expl']->status),
            explode(',', $this->data['expl']->observation),
            ];
            $array2= [explode(',', $this->data['expl']->intitule_activite2),
            explode(',', $this->data['expl']->description2),
            explode(',', $this->data['expl']->deadline),
            explode(',', $this->data['expl']->observation2),
            ];
            $data = [
                'title' => 'activite',
                'activite'=>$activite,
                'array' => $array,
                'array2' => $array2,
            ];
        // return view('activites.pdf', $data);
            $pdf = PDF::loadview('activites/pdf', $data)->setpaper('21 x 29,7', 'portrait');
        return $pdf->stream('myfile.pdf',array("Attachment"=>0));

        }
}
