<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\getMes;
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
use App\Banner;

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
    
    $mes = new getMes();
    $nota = Noticia::where('Estado','Publicado')->findOrFail($id);
    
    $nota->Mes = $mes->getmes($nota->Mes);
    
    

    $fecha = $nota->Dia.'-'.$nota->Mes.'-'.$nota->Ano;    
    $nota->Leido += 1;  
    $nota->save();
    $periodistas = Periodista::all();

    $ubicacion = explode('-', $nota->Ciudad);
    if(sizeof($ubicacion) == 2)
    {

       return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('descripcion',$nota->entrada);
    }
    elseif(sizeof($ubicacion) == 1  && $ubicacion[0] != null)
    {     
         
          $ciudad = City::where('name',$nota->Ciudad)->first();
          if($ciudad)
          {
                $pais = Country::find($ciudad->country_id);
                $nota->Ciudad = $ciudad->name.'-'.$pais->name;


          return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('descripcion',$nota->entrada);
          }else
          {
               return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('descripcion',$nota->entrada);
          }
          



    }
    else
    {
        return view('abcviews.noticia',['nota'=>$nota,'periodistas'=>$periodistas,'fecha'=>$fecha])->with('titulo',$nota->Titular)->with('descripcion',$nota->entrada);
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
              $banner = Banner::latest()->where('expiracion','>=',now())->take(2)->get();
             $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->where([['Ano',now()->year],['Estado','Publicado'],['Area','Local']])->take(8)->get();

             $global = Noticia::where([['Area','Local'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('ID','desc')->paginate(6);

             return view('abcviews.notatemplate',compact('global','destacado','banner'))->with('tipo','local');
    }
    public function nacional()
    { 
               $banner = Banner::latest()->where('expiracion','>=',now())->take(2)->get(); 

            
             $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->where([['Ano',now()->year],['Estado','Publicado'],['Area','Nacional']])->take(8)->get();

             $global = Noticia::where([['Area','Nacional'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('ID','desc')->paginate(6);

             return view('abcviews.notatemplate',compact('global','destacado','banner'))->with('tipo','nacional');
    }
    public function departamental()
    {     
        $banner = Banner::latest()->where('expiracion','>=',now())->take(2)->get();
        $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->where([['Ano',now()->year],['Estado','Publicado'],['Area','Departamental']])->take(8)->get();

             $global = Noticia::where([['Area','Departamental'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('ID','desc')->paginate(6);

             return view('abcviews.notatemplate',compact('global','destacado','banner'))->with('tipo','departamental');
    }
    public function internacional()
    {   
$banner = Banner::latest()->where('expiracion','>=',now())->take(2)->get();
     $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->where([['Ano',now()->year],['Estado','Publicado'],['Area','Internacional']])->take(6)->get();

             $global = Noticia::where([['Area','Internacional'],['Estado','Publicado']])->orderBy('Ano','desc')->orderBy('ID','desc')->paginate(6);

             return view('abcviews.notatemplate',compact('global','destacado','banner'))->with('tipo','internacional');
    }
   
    
}
