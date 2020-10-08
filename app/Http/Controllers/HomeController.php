<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\getMes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Noticia;
use App\Abctv;
use App\Empleo;
use App\Podscat;
use App\Periodista;
use App\Calificacion;
use App\Country;
use App\City;
use App\Banner;
use App\Http\Destacadas;
use App\Mail\sendMail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function noticia($id)
    {

        $mes = new getMes();

        //Obtener noticias 5 dias antes tomar 20 y mostrar 4 aleatorias
        $old = now()->subDays(7);
        $noticiasR = DB::table('ABCnoticias')->where(
            [
                ['Estado', 'Publicado'],
                ['Mes', $mes->getmes(now()->month)],
                ['Dia','>',$old],
                ['Ano', now()->year],
                ['ID', '!=', $id]
            ]
        )->orWhere([
            ['Estado', 'Publicado'],
            ['Dia','>',$old],
            ['Mes', now()->month],
            ['Ano', now()->year],
            ['ID', '!=', $id]

        ])->inRandomOrder()->take(15)->get();
        
        

        
        $noticiasRam = [];


        if (count($noticiasR) > 4) {
            # code...
            for ($i = 0; $i < 4; $i++) {
                # code...

                $noticiasRam[$i] = $noticiasR[$i];
            }
        } else {

            $noticiasRam = $noticiasR;
        }




        try {


            $nota = Noticia::where('Estado', 'Publicado')->findOrFail($id);

            $date_old = now()->subDays(5);

            //consulta para obtener resultados de los ultimos 7 dias segun el tipo
            $destacado = DB::table('ABCnoticias')
                ->orderBy('Leido', 'desc')->where(
                    [
                        ['Mes', $date_old->month],
                        ['Ano', $date_old->year],
                        ['Dia', '>', $date_old->day],
                        ['Area', $nota->Area],
                        ['Estado', 'Publicado']
                    ]
                )
                ->orWhere(
                    [
                        ['Mes', $mes->getmes($date_old->month)],
                        ['Ano', $date_old->year],
                        ['Dia', '>', $date_old->day],
                        ['Area', $nota->Area],
                        ['Estado', 'Publicado'],
                    ]
                )->take(5)->get();


            if (count($destacado) == 0) {
                $destacado = DB::table('ABCnoticias')
                    ->orderBy('Leido', 'desc')->where(
                        [
                            ['Mes', $mes->getmes(now()->month)],
                            ['Ano', now()->year],
                            ['Area', $nota->Area],
                            ['ID', '!=', $id],
                            ['Estado', 'Publicado']
                        ]
                    )->take(5)->get();
            }



            $nota->Mes = $mes->getmes($nota->Mes);



            $fecha = $nota->Dia . '-' . $nota->Mes . '-' . $nota->Ano;
            $nota->Leido += 1;
            $nota->save();
            $periodistas = Periodista::all();

            $ubicacion = explode('-', $nota->Ciudad);
            if (sizeof($ubicacion) == 2) {

                return view('abcviews.noticia', ['nota' => $nota, 'periodistas' => $periodistas, 'fecha' => $fecha])->with('titulo', $nota->Titular)->with('descripcion', $nota->entrada)->with('noticiasRam', $noticiasRam)->with("destacado", $destacado);
            } elseif (sizeof($ubicacion) == 1  && $ubicacion[0] != null) {

                $ciudad = City::where('name', $nota->Ciudad)->first();
                if ($ciudad) {
                    $pais = Country::find($ciudad->country_id);
                    $nota->Ciudad = $ciudad->name . '-' . $pais->name;


                    return view('abcviews.noticia', ['nota' => $nota, 'periodistas' => $periodistas, 'fecha' => $fecha])->with('titulo', $nota->Titular)->with('descripcion', $nota->entrada)->with('noticiasRam', $noticiasRam)->with("destacado", $destacado);
                } else {
                    return view('abcviews.noticia', ['nota' => $nota, 'periodistas' => $periodistas, 'fecha' => $fecha])->with('titulo', $nota->Titular)->with('descripcion', $nota->entrada)->with('noticiasRam', $noticiasRam)->with("destacado", $destacado);
                }
            } else {
                return view('abcviews.noticia', ['nota' => $nota, 'periodistas' => $periodistas, 'fecha' => $fecha])->with('titulo', $nota->Titular)->with('descripcion', $nota->entrada)->with('noticiasRam', $noticiasRam)->with("destacado", $destacado);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {


            return view('abcviews.error');
        }
    }
    public function abctv()
    {


        $mes = new getMes();

        $tipos = Abctv::select('tipo')->distinct('tipo')->get();


        $videos = array();

        $flag = 0;

        for ($i = 0; $i < count($tipos); $i++) {
            # code...

            $datos = Abctv::where('tipo', $tipos[$i]->tipo)->take(8)->latest()->get();

            foreach ($datos as $key) {
                # code...
                $videos[$flag] = $key;
                $videos[$flag]->fecha = $videos[$flag]->created_at->format('d') . '-' . $mes->getmes($videos[$flag]->created_at->format('m')) . '-' . $videos[$flag]->created_at->format('Y');



                $flag++;
            }
        }









        return view('abcviews.abctv', compact('tipos', 'videos'))->with('i')->with('titulo', 'Abctv');
    }
    public function abctvsearch($id)
    {
        $mes = new getMes();

        $video = Abctv::find($id);
        $ultimos = Abctv::latest()->take(2)->get();
        $video->fecha = $video->created_at->format('d') . '-' . $mes->getmes($video->created_at->format('m')) . '-' . $video->created_at->format('Y');
        $tipos = Abctv::select('tipo')->distinct('tipo')->get();



        return view('abcviews.abctvideo', ['video' => $video], compact('ultimos', 'tipos'));
    }
    public function abctvlist($id)
    {

        $videos = Abctv::where('tipo', $id)->orderBy('id', 'desc')->paginate(25);

        return view('abcviews.resultadosabctv', compact('videos'))->with('buscar', $id);
    }

    public function buscar()
    {

        $count = Noticia::where([
            ['Titular', 'like', '%' . Request()->buscar . '%'],
            ['Estado', 'Publicado']
        ])->orWhere([
            ['Contenido', 'like', '%' . Request()->buscar . '%'],
            ['Estado', 'Publicado']
        ])->orWhere([
            ['entrada', Request()->buscar],
            ['Estado', 'Publicado']
        ])->orderBy('ID', 'desc')->count();





        $notas = Noticia::where([
            ['Titular', 'like', '%' . Request()->buscar . '%'],
            ['Estado', 'Publicado']
        ])->orWhere([
            ['Contenido', 'like', '%' . Request()->buscar . '%'],
            ['Estado', 'Publicado']
        ])->orWhere([
            ['entrada', Request()->buscar],
            ['Estado', 'Publicado']
        ])->orderBy('ID', 'desc')->paginate(20);



        return view('abcviews.resultados', compact('notas'))->with('i')->with('buscar', Request()->buscar)->with('count', $count);

        // return redirect('dashboard')->with('status', 'Profile updated!');

    }
    public function countview()
    {

        $abctv = Abctv::find(Request()->id);
        $abctv->visto += 1;
        $abctv->save();
    }
    public function empleos()
    {
        $mes = new getMes();

        $empleos = Empleo::join('cities as c', 'empleos.city_id', '=', 'c.id')->orderBy('empleos.id', 'desc')->where('empleos.expiracion', '>', now())->get();

        for ($i = 0; $i < count($empleos); $i++) {
            # code...
            $fecha = explode('-', $empleos[$i]->expiracion);
            $empleos[$i]->expiracion = $fecha[2] . '-' . $mes->getmes($fecha[1]) . '-' . $fecha[0];
        }



        return view('abcviews.empleos', compact('empleos'))->with('titulo', 'Oportunidad de Empleo');
    }
    public function calificacion()
    {

        $c = explode('-', Request()->id);

        $cal = Calificacion::firstOrNew(array('calificacion' => $c[1], 'noticia_id' => $c[0]));
        $cal->cant += 1;
        $cal->save();


        return "hecho";
    }
    public function local()
    {
        $banner = Banner::latest()->where('expiracion', '>=', now())->take(2)->get();

        $destacadas = new Destacadas();
        $destacado = $destacadas->destacadas("Local");



        $global = Noticia::where([['Area', 'Local'], ['Estado', 'Publicado']])->orderBy('Ano', 'desc')->orderBy('ID', 'desc')->paginate(6);

        return view('abcviews.notatemplate', compact('global', 'destacado', 'banner'))->with('tipo', 'local')->with('titulo', 'Locales');
    }
    public function nacional()
    {
        $banner = Banner::latest()->where('expiracion', '>=', now())->take(2)->get();
        $destacadas = new Destacadas();
        $destacado = $destacadas->destacadas("Nacional");



        $global = Noticia::where([['Area', 'Nacional'], ['Estado', 'Publicado']])->orderBy('Ano', 'desc')->orderBy('ID', 'desc')->paginate(6);

        return view('abcviews.notatemplate', compact('global', 'destacado', 'banner'))->with('tipo', 'nacional')->with('titulo', 'Nacionales');
    }
    public function departamental()
    {
        $banner = Banner::latest()->where('expiracion', '>=', now())->take(2)->get();
        $destacadas = new Destacadas();
        $destacado = $destacadas->destacadas("Departamental");

        $global = Noticia::where([['Area', 'Departamental'], ['Estado', 'Publicado']])->orderBy('Ano', 'desc')->orderBy('ID', 'desc')->paginate(6);

        return view('abcviews.notatemplate', compact('global', 'destacado', 'banner'))->with('tipo', 'departamental')->with('titulo', 'Departamentales');
    }
    public function internacional()
    {
        $banner = Banner::latest()->where('expiracion', '>=', now())->take(2)->get();
        $destacadas = new Destacadas();
        $destacado = $destacadas->destacadas("Internacional");

        $global = Noticia::where([['Area', 'Internacional'], ['Estado', 'Publicado']])->orderBy('Ano', 'desc')->orderBy('ID', 'desc')->paginate(6);

        return view('abcviews.notatemplate', compact('global', 'destacado', 'banner'))->with('tipo', 'internacional')->with('titulo', 'Internacionales');
    }

    public function contactanos()
    {
        return view('abcviews.contactanos')->with('titulo', 'Contactanos');
    }
    public function enviar()
    {
        Request()->validate([
            'nombre' => 'required|max:30',
            'asunto' => 'required|max:80',
            'email' => 'required|email',
            'mensaje' => 'required|max:250',
        ]);
        $data = array(
            'name'      =>  Request()->nombre,
            'message'   =>  Request()->mensaje,
            'email'   => Request()->email,
            'subject'   => Request()->asunto,
        );


        Mail::to('inforadioabc@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Gracias por contactarnos! Tu mensaje ha sido enviado.');
    }

    public function periodista($id)
    {
        $mes = new getMes();

        $count = Noticia::where([['Autor', $id], ['Estado', 'Publicado']])->count();
        $notas = Noticia::where([['Autor', $id], ['Estado', 'Publicado']])->orderBy('id', 'desc')->paginate(30);

        for ($i = 0; $i < count($notas); $i++) {
            # code...

            $notas[$i]->Mes = $mes->getmes($notas[$i]->Mes);
        }

        return view('abcviews.noticias', compact('notas'))->with('count', $count)->with('buscar', $id);
    }
}
