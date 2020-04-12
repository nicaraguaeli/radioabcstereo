<?php

namespace App\Http;


class getMes
{
    
    

    public function getmes($mes)
    {
         
    	 $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
        
       
        
        $data = false;
    	for ($i=0; $i <12 ; $i++) { 
        # code...
        
        if($mes == $i+1)
        {
            $mes = $meses[$i];
           
           
            
        }
       

        
    }
      
       return $mes ;
    }
}