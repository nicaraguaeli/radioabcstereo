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

        $destacado = [];



       if(now()->month == now()->subDays(3)->subDays(5)->month)
       {
        
        
       

        $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')
        ->Where(
          [
            ['Mes',$mes->getmes(now()->month)],
            ['Ano',now()->year],
            ['Dia','<=',now()->subDays(3)->day],
            ['Dia','>=',now()->subDays(3)->subDays(5)->day],
            ['Area',$area],
            ['Estado','Publicado'],
            ])->get();
           
            
       }
       else
       {
        
        $current_data = DB::table('ABCnoticias')->orderBy('Leido','desc')
        ->Where(
          [
            ['Mes',$mes->getmes(now()->month)],
            ['Ano',now()->year],
            ['Dia','<=',now()->subDays(3)->day],
            ['Area',$area],
            ['Estado','Publicado'],
            ])->get();

           
        

        $old_data = DB::table('ABCnoticias')->orderBy('Leido','desc')
        ->Where(
          [
            ['Mes',$mes->getmes(now()->subDays(3)->subDays(5)->month)],
            ['Ano',now()->year],
            ['Dia','>=',now()->subDays(3)->subDays(5)->day],
            ['Area',$area],
            ['Estado','Publicado'],
            ])->get();

            foreach ($old_data as $key => $value) {
              # code...
              $current_data->push($value);
            }
           
         
          $destacado = $current_data;
       }

       
        

       // dd($destacado);     
        
        
        if(sizeof($destacado) == 0)
        {
             
           
            $destacado = DB::table('ABCnoticias')->orderBy('Leido','desc')->Where(
                    [
                      ['Mes',$mes->getmes(now()->subMonth(1)->month)],
                      ['Ano',now()->year],
                      ['Area',$area],
                      ['Estado','Publicado'],
                      ])->take(6)->get();                      
                      
                      return $destacado;
        }else
        {
            return $destacado->take(6);
        }             
           
                      
    	  
    }

}