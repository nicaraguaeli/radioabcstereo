<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Noticia;
use App\Empleo;
use App\Podscat;
use Illuminate\Support\Facades\DB;

class AdminComposer
{
    
    

    public function compose(View $view)
    {
        $count = Noticia::count();
        $podcount = Podscat::count();

        $user = DB::table('administradores')->count();
        $emcount = Empleo::count(); 
        
        $view->with('noticount',$count)->with('userscount',$user)->with('emcount',$emcount)->with('podcount',$podcount);
    }
}