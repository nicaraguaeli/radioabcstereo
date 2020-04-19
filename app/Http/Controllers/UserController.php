<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
    $users = User::where('id','!=',Auth::user()->id)->get();
    return view('admin.users.index',compact('users'));
    }
    public function userEstado()
    {
        // $nota = Noticia::find(Request()->id);
        //$nota->Estado = "publicado";
        try {
            //code...
        if(Request()->idUno)
        {
            $user = User::find(Request()->idUno);
            $user->estado = 1;
            $user->save();
            

            return "La cuenta a sido habilitada";
        }
        if(Request()->idCero)
        {
             
            $user = User::find(Request()->idCero);
            $user->estado = '0';
            $user->save();
            return "La cuenta a sido deshabilitada";
           
        }
        } catch (\Throwable $th) {
            //throw $th;
            return response()
            ->json(['name' => 'Abigail', 'state' => 'CA']);
        }
       
        
    }
}
