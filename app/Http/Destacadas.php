<?php

namespace App\Http;
use Illuminate\Support\Facades\DB;
use App\Http\getMes;

class Destacadas
{
    
    public function destacadas($area)
    {   
        //funcion para obtener noticias 5 dias antes

        $mes = new getMes(); 
        $date_old = now()->subDays(5);
       
        $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->where(
                [
                  ['Mes',$date_old->month],
                  ['Ano',$date_old->year],
                  ['Dia','<=',$date_old->day],
                  ['Dia','>=',$date_old->subDays(3)->day],
                  ['Area',$area],
                  ['Estado','Publicado']
                  ])
                  ->orWhere(
                    [
                      ['Mes',$mes->getmes($date_old->month)],
                      ['Ano',$date_old->year],
                      ['Dia','<=',$date_old->day],
                      ['Dia','>=',$date_old->subDays(3)->day],
                      ['Area',$area],
                      ['Estado','Publicado'],
                      ])->take(5)->get();
        if(sizeof($destacado) == 0)
        {
           
            $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->where(
                [
                  
                  ['Area',$area],
                  ['Estado','Publicado']
                  ])
                  ->orWhere(
                    [
                      
                      ['Area',$area],
                      ['Estado','Publicado'],
                      ])->take(5)->get();                      
                      
                      return $destacado;
        }else
        {
            return $destacado;
        }             
           
                      
    	  
    }

}