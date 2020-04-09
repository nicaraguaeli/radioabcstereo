<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Split;
use App\Periodista;
use App\City;
use App\Calificacion;

class NoticiaController extends Controller
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
         
         $noticia = Noticia::orderBy('id','Desc')->paginate(20);
         $cal = Calificacion::all();

        
        
        return view('admin.noticia.index',compact('noticia'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::all();

        $periodistas = Periodista::where('estado','1')->get();
        return view('admin.noticia.create',compact(['periodistas','countries']));
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
        $fecha = now()->format('d-m-Y');
        

       if (Request()->file('imagen'))
       {

            if($request->pais && $request->ciudad)
            {
               //inicio Insert
               
            $pais = Country::find($request->pais);
            $ciudad= City::find($request->ciudad);

           
            $imageName = time().'.'.request()->imagen->getClientOriginalExtension();      

            $request->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

       
        DB::table('abcnoticias')->insert(['Titular' => Request()->titular ,'Descripcion' => Request()->descripcion,'Contenido' => Request()->texto,'Area' => Request()->area,'FechaP' => now(),'Autor' => Request()->autor,'Mes'=>now()->month,'Dia'=>now()->day,'Ano'=>now()->year,'Imagen'=>'img/img-noticias/'.$fecha.'/'.$imageName,'Ciudad'=>$ciudad->name.'-'.$pais->name]);
            } 

           //Fin Insert
         
                elseif($request->pais)
                {
                     //inicio Insert
                   
                $pais = Country::find($request->pais);        
                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
                $request->imagen->move(public_path('img/img-noticias'), $imageName);

       
        DB::table('abcnoticias')->insert(
        ['Titular' => Request()->titular ,'Descripcion' => Request()->descripcion,'Contenido' => Request()->texto,'Area' => Request()->area,'FechaP' => now(),'Autor' => Request()->autor,'Mes'=>now()->month,'Dia'=>now()->day,'Ano'=>now()->year,'Imagen'=>'img/img-noticias/'.$imageName,'Ciudad'=>$pais->name]);

           //Fin Insert
               }
                else
                {
                        
                 $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
                 $request->imagen->move(public_path('img/img-noticias'), $imageName);

       
        DB::table('abcnoticias')->insert(
        ['Titular' => Request()->titular ,'Descripcion' => Request()->descripcion,'Contenido' => Request()->texto,'Area' => Request()->area,'FechaP' => now(),'Autor' => Request()->autor,'Mes'=>now()->month,'Dia'=>now()->day,'Ano'=>now()->year,'Imagen'=>'img/img-noticias/'.$imageName]);
                }
                
          
        



       } 
              
        return redirect('noticia')->with('status', 'La noticia a sido almacenada!');

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
        try {
    
    
    $nota = Noticia::findOrFail($id);  
    $fecha = $nota->Ano.'-'.$nota->Mes.'-'.$nota->Dia;    
    $periodistas = Periodista::all();

    $ubicacion = explode('-', $nota->Ciudad);
    if(sizeof($ubicacion) == 2)
    {

       return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular);
    }
    elseif(sizeof($ubicacion) == 1 && $ubicacion[0] != null)
    {     
         
          $ciudad = City::where('name',$nota->Ciudad)->first();
          if($ciudad)
            {
                 $pais = Country::find($ciudad->country_id);
                 $nota->Ciudad = $ciudad->name.'-'.$pais->name;
                 return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular);

            }else
            {
                return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular);
            }

         


          



    }
    else
    {
         return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular);

    }
    
    
    



}catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
  

   return view('abcviews.error');
    
}
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
        $nota = Noticia::findOrFail($id);
        $ubicacion = explode('-', $nota->Ciudad);
        if(is_null($nota->Ciudad))
        {
        
        $countries = Country::all();
        $periodista = Periodista::where('estado','1')->get();
        
        return view('admin.noticia.edit',compact('nota','countries','periodista'))->with('ciudad')->with('pais');
        }
        elseif(sizeof($ubicacion)==2)
        {
        
            
            $ciudad = City::where('name',$ubicacion[0])->first();
            $pais = Country::where('name',$ubicacion[1])->first();
            $countries = Country::all();
            $periodista = Periodista::where('estado','1')->get();
            return view('admin.noticia.edit',compact('nota','countries','periodista'))->with('ciudad',$ciudad)->with('pais',$pais);
        }
        else
           {
                $ciudad = City::where('name',$nota->Ciudad)->first();
                if($ciudad)
                {
                
                $pais = Country::find($ciudad->country_id);
              
                $countries = Country::all();
                $periodista = Periodista::where('estado','1')->get();
                return view('admin.noticia.edit',compact('nota','countries','periodista'))->with('ciudad',$ciudad)->with('pais',$pais);
                }
                else
                {
                $pais = Country::where('name',$nota->Ciudad)->first();
                

                $countries = Country::all();
                $periodista = Periodista::where('estado','1')->get();
                return view('admin.noticia.edit',compact('nota','countries','periodista'))->with('ciudad',$ciudad)->with('pais',$pais);
                }
               
                
           }
       

 

        
        
        
        
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
                $fecha = now()->format('d-m-Y');
                if($request->pais && $request->ciudad)
                {
                  //inicio
                $pais = Country::find($request->pais);
                $ciudad= City::find($request->ciudad);

                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->Descripcion = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $ciudad->name.'-'.$pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;

                if(file_exists(public_path($noticia->Imagen))){
                    unlink(public_path($noticia->Imagen));
                    };

                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();       

                request()->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

                $noticia->Imagen = 'img/img-noticias/'.$fecha.'/'.$imageName;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia a sido Actualizada!');
                    //fin
                }elseif ($request->pais) {
                    # code...
                $pais = Country::find($request->pais);               
                
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->Descripcion = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;

                if(file_exists(public_path($noticia->Imagen))){
                    unlink(public_path($noticia->Imagen));
                    };

                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();       

                request()->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

                $noticia->Imagen = 'img/img-noticias/'.$fecha.'/'.$imageName;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia a sido Actualizada!');
                }
                else
                {
                        //inicio
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->Descripcion = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;

                if(file_exists(public_path($noticia->Imagen))){
                    unlink(public_path($noticia->Imagen));
                    };

                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();       

                request()->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

                $noticia->Imagen = 'img/img-noticias/'.$fecha.'/'.$imageName;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia a sido Actualizada!');
                       //FIN
                }

                


            }
            else
            {
                if ($request->pais && $request->ciudad) {
                    # code...
                $pais = Country::find($request->pais);
                $ciudad= City::find($request->ciudad);
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->Descripcion = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $ciudad->name.'-'.$pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia a sido Actualizada!');

                }
                elseif ($request->pais) {
                    # code...
                $pais = Country::find($request->pais);
                
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->Descripcion = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia a sido Actualizada!');
                }
                else
                {
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->Descripcion = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia a sido Actualizada!');
                }

                
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
        DB::table('abcnoticias')->where('ID',$id)->delete();
         return redirect('noticia')->with('status', 'La noticia a sido Eliminada!');
     
    }
    public function noticiaEstado()
    {
        // $nota = Noticia::find(Request()->id);
        //$nota->Estado = "publicado";
        try {
            //code...
            if(Request()->idUno)
        {
            DB::table('abcnoticias')->where('ID',Request()->idUno)->update(['Estado'=>'Publicado']);

            return "La noticia a sido publicada";
        }
        if(Request()->idCero)
        {
            DB::table('abcnoticias')->where('ID',Request()->idCero)->update(['Estado'=>'']);
            return "La noticia a sido suspendida";
        }
        } catch (\Throwable $th) {
            //throw $th;
            return response()
            ->json(['name' => 'Abigail', 'state' => 'CA']);
        }
       
        
    }
    public function imagen()
    {
       
       $fecha = now()->format('d-m-Y');

       if (Request()->file('imageurl'))
       {
          


       $imageName = time().'.'.request()->imageurl->getClientOriginalExtension();

        

       request()->imageurl->move(public_path('img/img-noticias/'.$fecha), $imageName);

       return "http://192.168.15.55/radioabcstereo/radioabcstereo/img/img-noticias/".$fecha.'/'.$imageName; 


       } 
       else
       {
           "no";
       }
    }
    public function puntaje()
    {
        try {
        
        $puntaje = Calificacion::where('noticia_id',Request()->id)->get();
        return response()->json($puntaje);
        } catch (Exception $e) {
             
             return "error";
        }
       
    }
}
