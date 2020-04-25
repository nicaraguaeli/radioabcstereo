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
use App\Http\getMes;

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
         $mes = new getMes();
         $noticia = Noticia::orderBy('id','Desc')->paginate(20);
         
         for ($i=0; $i < count($noticia) ; $i++) { 
             # code...
            $noticia[$i]->Mes = $mes->getmes($noticia[$i]->Mes);
         }

        

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
        
        Request()->validate([
             'imagen' => 'dimensions:width=850,height=450|mimes:jpeg,jpg,png,gif|required',
        ]);


        $fecha = now()->format('m-Y');
        
        
       if (Request()->file('imagen'))
       {

            if($request->pais && $request->ciudad)
            {
               //inicio Insert
               
            $pais = Country::find($request->pais);
            $ciudad= City::find($request->ciudad);

           
            $imageName = time().'.'.request()->imagen->getClientOriginalExtension();      

            $request->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

       
        DB::table('ABCnoticias')->insert(['Titular' => Request()->titular ,'Contenido' => Request()->texto,'Area' => Request()->area,'FechaP' => now(),'Autor' => Request()->autor,'Mes'=>now()->month,'Dia'=>now()->day,'Ano'=>now()->year,'Imagen'=>'img/img-noticias/'.$fecha.'/'.$imageName,'Ciudad'=>$ciudad->name.'-'.$pais->name, 'entrada'=>Request()->descripcion, 'referencia'=>Request()->referencia]);
            } 

           //Fin Insert
         
                elseif($request->pais)
                {
                     //inicio Insert
                   
                $pais = Country::find($request->pais);        
                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
                $request->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

       
        DB::table('ABCnoticias')->insert(
        ['Titular' => Request()->titular ,'Contenido' => Request()->texto,'Area' => Request()->area,'FechaP' => now(),'Autor' => Request()->autor,'Mes'=>now()->month,'Dia'=>now()->day,'Ano'=>now()->year,'Imagen'=>'img/img-noticias/'.$fecha.'/'.$imageName,'Ciudad'=>$pais->name, 'entrada'=>Request()->descripcion, 'referencia'=>Request()->referencia]);

           //Fin Insert
               }
                else
                {
                        
                 $imageName = time().'.'.request()->imagen->getClientOriginalExtension();
                 $request->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

       
        DB::table('ABCnoticias')->insert(
        ['Titular' => Request()->titular ,'Contenido' => Request()->texto,'Area' => Request()->area,'FechaP' => now(),'Autor' => Request()->autor,'Mes'=>now()->month,'Dia'=>now()->day,'Ano'=>now()->year,'Imagen'=>'img/img-noticias/'.$fecha.'/'.$imageName, 'entrada'=>Request()->descripcion, 'referencia'=>Request()->referencia]);
                }
                
          
        



       } 
              
        return redirect('noticia')->with('status', 'La noticia ha sido almacenada!');

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
        $mes = new getMes();
    $m = $mes->getmes(now()->month);


    $noticiasR = DB::table('ABCnoticias')->where(
        [
            ['Estado','Publicado'],
            ['Mes','<=',now()->month],
            ['Mes','>=',now()->month],
            ['Ano',now()->year]

        ])->orWhere([
            ['Estado','Publicado'],
            ['Dia','>',1],
            ['Mes',$m],
            ['Ano',now()->year]

        ])->inRandomOrder()->take(30)->get();
   
    $noticiasRam;
    
    
    if (count($noticiasR) > 4) {
        # code...
       for ($i=0; $i < 4 ; $i++) { 
           # code...
         
         $noticiasRam[$i] = $noticiasR[$i];
         

        

       }
    }
    else
    {
       $noticiasRam = $noticiasR;

      
    }
   

        try {
    
    
    $nota = Noticia::findOrFail($id);  
    $fecha = $nota->Ano.'-'.$nota->Mes.'-'.$nota->Dia;    
    $periodistas = Periodista::all();

    $ubicacion = explode('-', $nota->Ciudad);
    if(sizeof($ubicacion) == 2)
    {

       return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('noticiasRam',$noticiasRam);
    }
    elseif(sizeof($ubicacion) == 1 && $ubicacion[0] != null)
    {     
         
          $ciudad = City::where('name',$nota->Ciudad)->first();
          if($ciudad)
            {
                 $pais = Country::find($ciudad->country_id);
                 $nota->Ciudad = $ciudad->name.'-'.$pais->name;
                 return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('noticiasRam',$noticiasRam);

            }else
            {
                return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('noticiasRam',$noticiasRam);
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
                 Request()->validate([
             'imagen' => 'dimensions:max_width=850,max_height=450|mimes:jpeg,jpg,png,gif|required',
        ]);
                $fecha = now()->format('m-Y');
                if($request->pais && $request->ciudad)
                {
                  //inicio
                $pais = Country::find($request->pais);
                $ciudad= City::find($request->ciudad);

                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->entrada = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $ciudad->name.'-'.$pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->referencia = Request()->referencia;

                if(file_exists(public_path($noticia->Imagen))){
                    unlink(public_path($noticia->Imagen));
                    };

                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();       

                request()->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

                $noticia->Imagen = 'img/img-noticias/'.$fecha.'/'.$imageName;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia ha sido Actualizada!');
                    //fin
                }elseif ($request->pais) {
                    # code...
                $pais = Country::find($request->pais);               
                
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->entrada = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->referencia = Request()->referencia;

                if(file_exists(public_path($noticia->Imagen))){
                    unlink(public_path($noticia->Imagen));
                    };

                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();       

                request()->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

                $noticia->Imagen = 'img/img-noticias/'.$fecha.'/'.$imageName;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia ha sido Actualizada!');
                }
                else
                {
                        //inicio
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->entrada = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->referencia = Request()->referencia;

                if(file_exists(public_path($noticia->Imagen))){
                    unlink(public_path($noticia->Imagen));
                    };

                $imageName = time().'.'.request()->imagen->getClientOriginalExtension();       

                request()->imagen->move(public_path('img/img-noticias/'.$fecha), $imageName);

                $noticia->Imagen = 'img/img-noticias/'.$fecha.'/'.$imageName;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia ha sido Actualizada!');
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
                $noticia->entrada = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $ciudad->name.'-'.$pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->referencia = Request()->referencia;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia ha sido Actualizada!');

                }
                elseif ($request->pais) {
                    # code...
                $pais = Country::find($request->pais);
                
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->entrada = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Ciudad = $pais->name;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->referencia = Request()->referencia;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia ha sido Actualizada!');
                }
                else
                {
                $noticia = Noticia::find($id);
                $noticia->Titular = Request()->titular;
                $noticia->entrada = Request()->descripcion;
                $noticia->Contenido = Request()->texto;
                $noticia->Area = Request()->area;
                $noticia->Autor = Request()->autor;
                $noticia->referencia = Request()->referencia;
                $noticia->save();

                 return redirect('noticia')->with('status', 'La noticia ha sido Actualizada!');
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
         
         DB::table('ABCnoticias')->where('ID',$id)->delete();
         return redirect('noticia')->with('status', 'La noticia ha sido Eliminada!');
     
    }
    public function noticiaEstado()
    {
        // $nota = Noticia::find(Request()->id);
        //$nota->Estado = "publicado";
        try {
            //code...
            if(Request()->idUno)
        {
            DB::table('ABCnoticias')->where('ID',Request()->idUno)->update(['Estado'=>'Publicado']);

            return "La noticia ha sido publicada";
        }
        if(Request()->idCero)
        {
            DB::table('ABCnoticias')->where('ID',Request()->idCero)->update(['Estado'=>'']);
            return "La noticia ha sido suspendida";
        }
        } catch (\Throwable $th) {
            //throw $th;
            return response()
            ->json(['name' => 'Abigail', 'state' => 'CA']);
        }
       
        
    }
    public function imagen()
    {
       
       $fecha = now()->format('m-Y');

       if (Request()->file('imageurl'))
       {
          


       $imageName = time().'.'.request()->imageurl->getClientOriginalExtension();

        

       request()->imageurl->move(public_path('img/img-noticias/'.$fecha), $imageName);

       return "http://radioabcstereo.com/img/img-noticias/".$fecha.'/'.$imageName; 


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
    public function busqueda()
    {
        $fechas = explode('-', Request()->busqueda);

        $fechaInicial = explode('/', $fechas[0]);
        $fechaFinal = explode('/', $fechas[1]);
        $cantidad = Noticia::where([["Ano",'>=',$fechaInicial[2]],['Mes','>=',$fechaInicial[1]],['Ano','<=',$fechaFinal[2]],['Mes','<=',$fechaFinal[1]]])->count();
        
        $noticia = Noticia::where([["Ano",'>=',$fechaInicial[2]],['Mes','>=',$fechaInicial[1]],['Ano','<=',$fechaFinal[2]],['Mes','<=',$fechaFinal[1]]])->paginate(50);

        return view('admin.noticia.index',compact('noticia'))->with('i')->with('cantidad',$cantidad);


    }
}
