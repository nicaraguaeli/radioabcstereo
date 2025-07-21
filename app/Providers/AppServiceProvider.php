<?php

namespace App\Providers;

use App\Http\getMes;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Noticia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
         
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
        Paginator::useBootstrap();
        //
        Schema::defaultStringLength(191);
       
        $mes = new getMes();

        $noticias = DB::table('ABCnoticias')->where('Estado','Publicado')->orderBy('ID','desc')->take(5)
        ->get();

        for ($i=0; $i < count($noticias) ; $i++) { 
            # code...\
           
           $noticias[$i]->Mes  = $mes->getmes($noticias[$i]->Mes);
             
          }
     
        
        View::share(['titulo'=>'Radio ABC Stereo | Inicio','noticias'=>$noticias]);
        
       
        
    }
}
