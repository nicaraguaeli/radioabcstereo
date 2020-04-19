<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Podscat;
use App\Periodista;


class PodcastController extends Controller
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

        $podcast = Podscat::latest()->paginate(25);
        return view('admin.podcast.index',compact('podcast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $periodistas = Periodista::all();
        return view('admin.podcast.create',compact('periodistas'));
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
         

         Request()->validate([
        'titulo' => 'required|max:100',
        'texto' => 'required',
        'categoria' => 'required',
        'autor' => 'required|',   
        'imagen' => 'dimensions:max_width=128,max_height=128|mimes:jpeg,jpg,png,gif|required',
        'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',     
        'descripcion'=>'required',
    ]);

            



        if(Request()->hasFile('audio') && Request()->hasFile('imagen'))
        {
          
          $podcast = new Podscat;
         
          $audioName = time().'.'.request()->audio->getClientOriginalExtension();

        

         request()->audio->move(public_path('audio/'), $audioName);

         $imageName = time().'.'.request()->imagen->getClientOriginalExtension();

        

         request()->imagen->move(public_path('img'), $imageName);

         

         


        $podcast->titulo = $request->titulo;
        $podcast->url = 'audio/'.$audioName;
        $podcast->imagen = 'img/'.$imageName;
        $podcast->contenido = $request->texto;
        $podcast->categoria = $request->categoria;
        $podcast->autor = $request->autor;
        $podcast->entrada = $request->descripcion;
        $podcast->save();
         
        return redirect('podcast')->with('status','El podcast ha sido almacenado!');


           //Podscat::create($request->all()); 
        }
       

        return redirect('podcast')->with('status','El podcast ha sido almacenado!');
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
         $periodistas = Periodista::all();
         $pod = Podscat::find($id);
         return view('admin.podcast.edit',compact('periodistas'),['podcast'=>$pod]);

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

        if(Request()->hasFile('imagen') && Request()->hasFile('audio'))
            {

         Request()->validate([
        'titulo' => 'required|max:100',
        'texto' => 'required',
        'categoria' => 'required',
        'autor' => 'required|',   
        'imagen' => 'dimensions:max_width=128,max_height=128|mimes:jpeg,jpg,png,gif|required',
        'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',     
        'descripcion'=>'required',
    ]);

         
         $podcast = Podscat::find($id);  

         $audioName = time().'.'.request()->audio->getClientOriginalExtension();
         request()->audio->move(public_path('audio/'), $audioName);

         $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
         request()->imagen->move(public_path('img'), $imageName); 


         if(file_exists(public_path($podcast->url))){
                    unlink(public_path($podcast->url));
                    };    
                    if(file_exists(public_path($podcast->imagen))){
                    unlink(public_path($podcast->imagen));
                    };    

        $podcast->titulo = $request->titulo;
        $podcast->url = 'audio/'.$audioName;
        $podcast->imagen = 'img/'.$imageName;
        $podcast->contenido = $request->texto;
        $podcast->categoria = $request->categoria;
        $podcast->autor = $request->autor;
        $podcast->entrada = $request->descripcion;
        $podcast->save();
          return redirect('podcast')->with('status','el podcast ha sido actualizado!');

        }
        if(Request()->hasFile('imagen') )
            {

         Request()->validate([
        'titulo' => 'required|max:100',
        'texto' => 'required',
        'categoria' => 'required',
        'autor' => 'required|',   
        'imagen' => 'dimensions:max_width=128,max_height=128|mimes:jpeg,jpg,png,gif|required',   
        'descripcion'=>'required',
    ]);

         
         $podcast = Podscat::find($id); 

         if(file_exists(public_path($podcast->imagen))){
                    unlink(public_path($podcast->imagen));
                    };           

         $imageName = time().'.'.request()->imagen->getClientOriginalExtension();

        request()->imagen->move(public_path('img'), $imageName); 
        
        $podcast->titulo = $request->titulo;
        $podcast->imagen = 'img/'.$imageName;
        $podcast->contenido = $request->texto;
        $podcast->categoria = $request->categoria;
        $podcast->autor = $request->autor;
        $podcast->entrada = $request->descripcion;
        $podcast->save();
       return redirect('podcast')->with('status','el podcast ha sido actualizado!');

        }

        if(Request()->hasFile('audio') )
            {

         Request()->validate([
        'titulo' => 'required|max:100',
        'texto' => 'required',
        'categoria' => 'required',
        'autor' => 'required|',   
        'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav', 
        'descripcion'=>'required',
    ]);
         
         $audioName = time().'.'.request()->audio->getClientOriginalExtension();

        

         request()->audio->move(public_path('audio/'), $audioName);
         
         $podcast = Podscat::find($id); 


                      if(file_exists(public_path($podcast->url))){
                    unlink(public_path($podcast->url));
                    };       

         
        
        $podcast->titulo = $request->titulo;
        $podcast->url = 'audio/'.$audioName;
        $podcast->contenido = $request->texto;
        $podcast->categoria = $request->categoria;
        $podcast->autor = $request->autor;
        $podcast->entrada = $request->descripcion;
        $podcast->save();
        return redirect('podcast')->with('status','el podcast ha sido actualizado!');

        }

         Request()->validate([
        'titulo' => 'required|max:100',
        'texto' => 'required',
        'categoria' => 'required',
        'autor' => 'required|',   
        'descripcion'=>'required',
    ]);
         
         

         
        $podcast = Podscat::find($id); 
        $podcast->titulo = $request->titulo;
        $podcast->contenido = $request->texto;
        $podcast->categoria = $request->categoria;
        $podcast->autor = $request->autor;
        $podcast->entrada = $request->descripcion;
        $podcast->save();

         return redirect('podcast')->with('status','el podcast ha sido actualizado!');


        
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
        $pod = Podscat::find($id);
         if(file_exists(public_path($pod->imagen))){
                    unlink(public_path($pod->imagen));
                    };

                      if(file_exists(public_path($pod->url))){
                    unlink(public_path($pod->url));
                    };



        $pod->delete();

        return redirect('podcast')->with('status','el podcast ha sido actualizado!');
    }

    public function getCategoria()
    {
         $datos = Podscat::select('categoria')->distinct()->get();

         return $datos;
    }
}
