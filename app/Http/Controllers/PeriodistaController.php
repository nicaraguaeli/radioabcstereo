<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodista;

class PeriodistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $periodistas = Periodista::latest()->paginate(15);
        return view('admin.periodista.index',compact('periodistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.periodista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if(Request()->file('imagen'))
        {
            $periodista = new Periodista;
            $periodista->nombre = $request->nombre;
            $periodista->tipo = $request->tipo;

            $imageName = time().'.'.request()->imagen->getClientOriginalExtension();

        

         request()->imagen->move(public_path('img/img-periodista'), $imageName);

         $periodista->imagen = 'img/img-periodista/'.$imageName;
         $periodista->save();

         return redirect('periodista')->with('status','Periodista almacenado!');

        }
        else
        {
            $periodista = new Periodista;
            $periodista->nombre = $request->nombre;
            $periodista->tipo = $request->tipo;

            
            $periodista->save();

         return redirect('periodista')->with('status','Periodista almacenado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $periodista = Periodista::find($id);
        
        return view('admin.periodista.edit',['periodista'=>$periodista]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         if(Request()->file('imagen'))
        {
            $periodista = Periodista::find($id);
            $periodista->nombre = $request->nombre;
            $periodista->tipo = $request->tipo;

            if(file_exists(public_path($periodista->imagen))){
                    unlink(public_path($periodista->imagen));
                    };

            $imageName = time().'.'.request()->imagen->getClientOriginalExtension();

        

         request()->imagen->move(public_path('img/img-periodista'), $imageName);

         $periodista->imagen = 'img/img-periodista/'.$imageName;
         $periodista->save();

         return redirect('periodista')->with('status','Periodista actualizado!');

        }
        else
        {
            $periodista = Periodista::find($id);
            $periodista->nombre = $request->nombre;
            $periodista->tipo = $request->tipo;
            $periodista->save();

            return redirect('periodista')->with('status','Periodista actualizado!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $periodista = Periodista::find($id);
        if(file_exists(public_path($periodista->imagen))){
                    unlink(public_path($periodista->imagen));
                    };
        $periodista->delete();
        
        return redirect('periodista')->with('status','A sido Eliminado');            
    }
      public function periodistaEstado()
    {
        // $nota = Noticia::find(Request()->id);
        //$nota->Estado = "publicado";
        try {
            //code...
        if(Request()->idUno)
        {
            $periodista = Periodista::find(Request()->idUno);
            $periodista->estado = 1;
            $periodista->save();
            

            return "El periodista esta habilitado";
        }
        if(Request()->idCero)
        {
             
            $periodista = Periodista::find(Request()->idCero);
            $periodista->estado = '0';
            $periodista->save();
            return "El periodista esta deshabilitado";
           
        }
        } catch (\Throwable $th) {
            //throw $th;
            return response()
            ->json(['name' => 'Abigail', 'state' => 'CA']);
        }
       
        
    }
}
