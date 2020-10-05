<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transmision;

class TransmisionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

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
       
    	Request()->validate(['url'=>'required|max:100','titulo'=>'required|max:100','video'=>'required']);

      
    	Transmision::create(Request()->all());

    	return redirect('transmision')->with('status','El facebook live ha sido publicado');
    }
   
    public function destroy($id)
    {

        Transmision::find($id)->delete();
    	return redirect('transmision')->with('status','El facebook live ha sido eliminado');
    }
}
