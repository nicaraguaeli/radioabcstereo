<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Noticia;
use Illuminate\Support\Facades\DB;
use App\Abctv;
use App\Podscat;
use App\Transmision;


class WelcomeComposer
{
    
    

    public function compose(View $view)
    {
      
      
      $transmision = Transmision::latest()->get()->take(6);


      $noticias = DB::table('ABCnoticias')->orderBy('ID','desc')->where('Estado','Publicado')->take(5)
     ->get();

      $local = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Local'],['Estado','Publicado']])->take(3)
     ->get();

     
     
     
   
     $departamental = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Departamental'],['Estado','Publicado']])->take(3)
     ->get();

     $nacional = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Nacional'],['Estado','Publicado']])->take(2)
     ->get();

     $internacional = DB::table('ABCnoticias')->orderBy('ID','desc')->where([['Area','Internacional'],['Estado','Publicado']])->take(2)
     ->get();

      $abctvdes = Abctv::latest()->first();

     
      

        $view->with('local',$local)->with('departamental',$departamental)->with('nacional',$nacional)->with('internacional',$internacional)->with('abctvdes',$abctvdes)->with('transmision',$transmision)->with('i');
    }
}