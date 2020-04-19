<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transmision;

class TransmisionController extends Controller
{
    //

    public function index()
    {

        $transmision = Transmision::orderBy('id','desc')->paginate(25);
    	return view('admin.transmisiones.index',compact('transmision'));
    }
    public function create()
    {

      
    	return view('admin.transmisiones.create');
    }

    public function store()
    {

    	Request()->validate(['url'=>'required|max:100','titulo'=>'required|max:100']);

      
    	Transmision::create(Request()->all());

    	return redirect('transmision')->with('status','La transmisión ha sido publicada');
    }
   
    public function destroy($id)
    {

        Transmision::find($id)->delete();
    	return redirect('transmision')->with('status','La transmisión ha sido eliminada');
    }
}
