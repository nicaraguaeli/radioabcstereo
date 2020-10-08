<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Noticia;
use Illuminate\Support\Facades\DB;
use App\Abctv;
use App\Podscat;
use App\Transmision;
use App\Http\getMes;



class WelcomeComposer
{
    
    

    public function compose(View $view)
    {
      
       $mes = new getMes();

       //fecha 7 dias atras
       $date_old = now()->subDays(7);
       
      //consulta para obtener resultados de los ultimos 7 dias
       $destacado = DB::table('ABCnoticias')
       ->orderBy('Leido','desc')->where(
         [
           ['Mes',$date_old->month],
           ['Ano',$date_old->year],
           ['Dia','>=',$date_old->day],
           ['Estado','Publicado']
           ])
           ->orWhere(
             [
               ['Mes',$mes->getmes($date_old->month)],
               ['Ano',$date_old->year],
               ['Dia','>=',$date_old->day],
               ['Estado','Publicado'],
               ])->take(4)->get();



      $transmision = Transmision::latest()->get()->take(2);


      

      $local = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Local'],['Estado','Publicado']])->take(4)
     ->get();


     for ($i=0; $i < count($local) ; $i++) { 
       # code...\
      
      $local[$i]->Mes  = $mes->getmes($local[$i]->Mes);
        
     }

     
     
     
   
     $departamental = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Departamental'],['Estado','Publicado']])->take(5)
     ->get();

     for ($i=0; $i < count($departamental) ; $i++) { 
       # code...\
      
      $departamental[$i]->Mes  = $mes->getmes($departamental[$i]->Mes);
        
     }

     $nacional = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Nacional'],['Estado','Publicado']])->take(2)
     ->get();

     for ($i=0; $i < count($nacional) ; $i++) { 
       # code...\
      
      $nacional[$i]->Mes  = $mes->getmes($nacional[$i]->Mes);
        
     }

     $internacional = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Internacional'],['Estado','Publicado']])->take(2)
     ->get();

     for ($i=0; $i < count($internacional) ; $i++) { 
       # code...\
      
      $internacional[$i]->Mes  = $mes->getmes($internacional[$i]->Mes);
        
     }

      $abctvdes = Abctv::latest()->first();
      
      $podcast = DB::table('podcasts')->select('id','titulo','url','imagen')->latest()->get();

     
      

        $view->with('podcast', $podcast->toJson())->with('destacado',$destacado)->with('local',$local)->with('departamental',$departamental)->with('nacional',$nacional)->with('internacional',$internacional)->with('abctvdes',$abctvdes)->with('transmision',$transmision)->with('i');
    }
}