<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

        
        //$nota = DB::table('abcnoticias')->where('ID','17248')->first();
        return view('welcome');
});



Route::get('escuchar',function(){

	return view('escuchar');

});




        
        //$nota = DB::table('abcnoticias')->where('ID','17248')->first();
 
Route::get('/locales','HomeController@local');
Route::get('/nacionales','HomeController@nacional');
Route::get('/departamentales','HomeController@departamental');
Route::get('/internacionales','HomeController@internacional');
Route::get('/nota/{id}','HomeController@noticia');
Route::get('/abctv','HomeController@abctv');
Route::get('/abctvsearch/{id}','HomeController@abctvsearch');
Route::get('/abctvlist/{id}','HomeController@abctvlist');
Route::get('/empleos','HomeController@empleos');
Route::get('/buscar','HomeController@buscar');
Route::get('/countview','HomeController@countview');
Route::get('/calificacion','HomeController@calificacion');
Route::get('/contactanos','HomeController@contactanos');
Route::get('/noticias/{id}','HomeController@periodista');
Route::post('/contactanos/enviar','HomeController@enviar')->name('enviar');



Route::get('/nosotros',function(){

return view('abcviews.nosotros')->with('nosotros',DB::table('nosotros')->first())->with('titulo','Nosotros');

});


Route::get('/abc/podcast',function(){


$cat = DB::table('podcasts')->select('categoria')->distinct()->get();
return view('abcviews.podcast')->with('podcast',DB::table('podcasts')->latest()->paginate(10))->with('cat',$cat)->with('titulo','Podcast');

});

Route::get('/abc/podcast/{id}',function($id){

$cat = DB::table('podcasts')->select('categoria')->distinct()->get();
return view('abcviews.podcast')->with('podcast',DB::table('podcasts')->where('categoria',$id)->latest()->paginate(10))->with('cat',$cat)->with('tipo',$id)->with('titulo','Podcast ');

});


Route::get('getPodcast',function(){

$pod = DB::table('podcasts')->where('id',Request()->id)->first();

return response()->json($pod);

});

Route::get('abc/podcast/audio/{id}',function($id){

$pod = DB::table('podcasts')->where('id',$id)->first();

return view('abcviews.audio',['pod'=>$pod])->with('titulo','Podcast');

});

Route::get('transmisiones', function()
{
   return view('abcviews.podcastall',['transmisiones'=>DB::table('transmisions')->orderBy('id','desc')->paginate(30)]);
});




Auth::routes();

Route::get('admin', function () 
	{  
		if(Auth::user()->estado == 0)
		{
         abort(403,"¡Acceso Denegado! Tu cuenta ha sido suspendida temporalmente");
		}
		else
		{
			return view('layouts.master');
		}
		

})->middleware('auth');




Route::get('/datos','HomeController@datos');
Route::get('busqueda','NoticiaController@busqueda');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('abctva','AbctvController')->except(['show']);
Route::resource('noticia','NoticiaController');
Route::resource('podcast','PodcastController');
Route::resource('transmision','TransmisionController');
Route::resource('empleo','EmpleoController')->except('show');
Route::get('getCities','LocationController@getCities');
Route::get('noticiaEstado','NoticiaController@noticiaEstado');
Route::get('puntaje','NoticiaController@puntaje');
Route::post('imagen','NoticiaController@imagen')->name('imagen');
Route::get('getData','AbctvController@getData');
Route::get('getCategoria','PodcastController@getCategoria');





Route::middleware(['admin'])->group(function () {
  
Route::resource('periodista','PeriodistaController');
Route::get('userEstado','UserController@userEstado');
Route::get('periodistaEstado','PeriodistaController@periodistaEstado');
Route::get('users','UserController@index');
Route::resource('nosotro','NosotrosController');
Route::resource('banner','BannerController')->except(['edit','update','show']);
   
});

