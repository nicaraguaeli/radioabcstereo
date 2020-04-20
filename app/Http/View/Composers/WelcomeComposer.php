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

      $transmision = Transmision::latest()->get()->take(6);


      $noticias = DB::table('ABCnoticias')->orderBy('ID','desc')->where('Estado','Publicado')->take(5)
     ->get();

      $local = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Local'],['Estado','Publicado']])->take(3)
     ->get();


     for ($i=0; $i < count($local) ; $i++) { 
       # code...\
      
      $local[$i]->Mes  = $mes->getmes($local[$i]->Mes);
        
     }

     
     
     
   
     $departamental = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Departamental'],['Estado','Publicado']])->take(3)
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

     
      

        $view->with('local',$local)->with('departamental',$departamental)->with('nacional',$nacional)->with('internacional',$internacional)->with('abctvdes',$abctvdes)->with('transmision',$transmision)->with('i');
    }
}