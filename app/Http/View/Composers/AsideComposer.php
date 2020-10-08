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

   $banner = Banner::latest()->where('expiracion','>=',now())->take(2)->get();
 
   

  

         $view->with('banner',$banner);
    }
}