<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Noticia;
use App\Abctv;
use App\Empleo;
use App\Podscat;
use App\Periodista;
use App\Calificacion;
use App\Country;
Use App\City;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
   
    public function noticia($id)
    {
        

               try {
    
    
    $nota = Noticia::where('Estado','Publicado')->findOrFail($id);  
    $fecha = $nota->Ano.'-'.$nota->Mes.'-'.$nota->Dia;    
    $nota->Leido += 1;  
    $nota->save();
    $periodistas = Periodista::all();

    $ubicacion = explode('-', $nota->Ciudad);
    if(sizeof($ubicacion) == 2)
    {

       return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('descripcion',$nota->Descripcion);
    }
    elseif(sizeof($ubicacion) == 1  && $ubicacion[0] != null)
    {     
         
          $ciudad = City::where('name',$nota->Ciudad)->first();
          if($ciudad)
          {
                $pais = Country::find($ciudad->country_id);
                $nota->Ciudad = $ciudad->name.'-'.$pais->name;


          return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('descripcion',$nota->Descripcion);
          }else
          {
               return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('descripcion',$nota->Descripcion);
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
    public function abctv()
    {   
         $destacado = Abctv::latest()->first();
         $ultimos = Abctv::latest()->take(2)->get();
         $tipos = Abctv::select('tipo')->distinct('tipo')->get();

         

         $abctv = Abctv::latest()->paginate(8);

         return view('abcviews.abctv',compact('abctv','ultimos','tipos'))->with('destacado',$destacado)->with('i');
        
    }
    public function buscar()
    {
       
       $count = Noticia::where([['Titular','like','%'.Request()->buscar.'%'],['Contenido','like','%'.Request()->buscar.'%']])->count();
      
       $notas = Noticia::where([['Titular','like','%'.Request()->buscar.'%'],['Contenido','like','%'.Request()->buscar.'%'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('Mes','desc')->paginate(16);
       return view('abcviews.resultados',compact('notas'))->with('i')->with('buscar',Request()->buscar)->with('count',$count);

        return redirect('dashboard')->with('status', 'Profile updated!');
   
    }
    public function countview()
    {
       
        $abctv = Abctv::find(Request()->id);
        $abctv->visto += 1;
        $abctv->save();
    }
    public function empleos()
    {

        
        $empleos = Empleo::join('cities as c','empleos.city_id','=','c.id')->orderBy('empleos.id','desc')->where('empleos.expiracion','>', now())->get();
    
        

        return view('abcviews.empleos',compact('empleos'))->with('titulo','Oportunidad de Empleo');
    }
    public function calificacion()
    {
        
        $c = explode('-', Request()->id); 
        
        $cal = Calificacion::firstOrNew(array('calificacion' => $c[1],'noticia_id'=>$c[0]));
        $cal->cant += 1;
        $cal->save();

        
       return "hecho";
    }
    public function local()
    {

             $global = Noticia::where([['Area','Local'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('Mes','desc')->paginate(16);

             return view('abcviews.notatemplate',compact('global'))->with('tipo','local');
    }
    public function nacional()
    {

             $global = Noticia::where([['Area','Nacional'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('Mes','desc')->paginate(16);

             return view('abcviews.notatemplate',compact('global'))->with('tipo','nacional');
    }
    public function departamental()
    {

             $global = Noticia::where([['Area','Departamental'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('Mes','desc')->paginate(16);

             return view('abcviews.notatemplate',compact('global'))->with('tipo','departamental');
    }
    public function internacional()
    {

             $global = Noticia::where([['Area','Internacional'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('Mes','desc')->paginate(16);

             return view('abcviews.notatemplate',compact('global'))->with('tipo','internacional');
    }
    
}
