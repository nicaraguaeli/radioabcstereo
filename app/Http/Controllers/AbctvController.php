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
            Request()->validate([
                'url' => 'required|max:100',
                'descripcion'=> 'required',
                'autor'=> 'required',
                'tipo'=> 'required',
                'date'=> 'required|date',
                'imagen' => 'dimensions:width=850,height=450|mimes:jpeg,jpg,png,gif|required',
            ]);
 
        $abctv = new Abctv;
        $abctv->url = Request()->url;
        $abctv->descripcion = Request()->descripcion;
        $abctv->autor = Request()->autor;
        $abctv->titulo = Request()->titulo;
        $abctv->tipo = Request()->tipo;
        $abctv->created_at = Request()->date;

        $imageName = time().'.'.request()->imagen->getClientOriginalExtension();

        

         request()->imagen->move(public_path('img/img-abctv'), $imageName);
         
         $abctv->thumbnail = "img/img-abctv/".$imageName;
         $abctv->save();
          return redirect('abctva')->with('status','El video ha sido publicado!');
 
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
        $video = Abctv::find($id);
        $periodistas = Periodista::where('estado',1)->get();
        return view('admin.abctv.edit',compact('periodistas'))->with('video',$video);
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
          if(Request()->file('imagen'))
        {
            Request()->validate([
                'url' => 'required|max:100',
                'descripcion'=> 'required',
                'autor'=> 'required',
                'tipo'=> 'required',
                'date'=> 'required|date',
                'imagen' => 'dimensions:width=850,height=450|mimes:jpeg,jpg,png,gif|required',
            ]);
 
        $abctv = Abctv::find($id);
        $abctv->url = Request()->url;
        $abctv->descripcion = Request()->descripcion;
        $abctv->autor = Request()->autor;
        $abctv->titulo = Request()->titulo;
        $abctv->tipo = Request()->tipo;
        $abctv->created_at = Request()->date;

         if(file_exists(public_path($abctv->thumbnail))){
                    unlink(public_path($abctv->thumbnail));
                    };

        
        $imageName = time().'.'.request()->imagen->getClientOriginalExtension();

        

         request()->imagen->move(public_path('img/img-abctv'), $imageName);
         
         $abctv->thumbnail = "img/img-abctv/".$imageName;
         $abctv->save();
          return redirect('abctva')->with('status','El video ha sido actualizado!');
 
        }else
        {
            Request()->validate([
                'url' => 'required|max:100',
                'descripcion' => 'required',
                'autor' => 'required',
                'tipo' => 'required',
                'date' => 'required|date',
                
            ]);
            
        $abctv = Abctv::find($id);
        $abctv->url = Request()->url;
        $abctv->descripcion = Request()->descripcion;
        $abctv->autor = Request()->autor;
        $abctv->titulo = Request()->titulo;
        $abctv->tipo = Request()->tipo;
        $abctv->created_at = Request()->date;

        $abctv->save();
        return redirect('abctva')->with('status','El video ha sido actualizado!');

        }

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
       return redirect('abctva')->with('status', 'El video ha sido eliminado!');
    }
    public function getData()
    {
    	 $datos = Abctv::select('tipo')->distinct()->get();

    	 return $datos;
    }
}
