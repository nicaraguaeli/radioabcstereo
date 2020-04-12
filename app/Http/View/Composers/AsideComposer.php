<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use App\Banner;
use App\Http\getMes;

class AsideComposer
{
    
    

    public function compose(View $view)
    {
    
    $mes = new getMes();

    $noticias = DB::table('ABCnoticias')->where('Estado','Publicado')->orderBy('ID','desc')->take(5)
     ->get();

     for ($i=0; $i < count($noticias) ; $i++) { 
       # code...\
      
      $noticias[$i]->Mes  = $mes->getmes($noticias[$i]->Mes);
        
     }

     $masvisto = DB::table('ABCnoticias')->orderBy('Leido','desc')->where([['Mes',now()->month],['Ano',now()->year],['Estado','Publicado']])->take(2)->get();

   $banner = Banner::latest()->where('expiracion','>=',now())->take(2)->get();


  $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->where([['Mes',now()->month],['Ano',now()->year],['Estado','Publicado']])->take(5)->get();

  

         $view->with('noticias',$noticias)->with('masvisto',$masvisto)->with('destacado',$destacado)->with('banner',$banner);
    }
}