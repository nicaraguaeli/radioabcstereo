<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abctv;
use App\Periodista;
class AbctvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $videos = Abctv::latest()->paginate(25);
      
        return view('admin.abctv.index',compact('videos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $periodistas = Periodista::where('estado',1)->get();
        return view('admin.abctv.create',compact('periodistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Request()->file('imagen'))
        {
 
        $abctv = new Abctv;
        $abctv->url = Request()->url;
        $abctv->descripcion = Request()->descripcion;
        $abctv->autor = Request()->autor;
        $abctv->titulo = Request()->titulo;
        $abctv->tipo = Request()->tipo;

        $imageName = time().'.'.request()->imagen->getClientOriginalExtension();

        

         request()->imagen->move(public_path('img/img-abctv'), $imageName);
         
         $abctv->thumbnail = "img/img-abctv/".$imageName;
         $abctv->save();
          return redirect('abctva')->with('status','El video a sido publicado!');
 
        }
         

        
        



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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

       $abctv = Abctv::find($id);
       $abctv->delete();
       return redirect('abctva')->with('status', 'El video a sido eliminado!');
    }
    public function getData()
    {
    	 $datos = Abctv::select('tipo')->get();

    	 return $datos;
    }
}
