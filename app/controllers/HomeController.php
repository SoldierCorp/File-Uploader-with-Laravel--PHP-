<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	private $folder = 'media/profiles';

	public function index()
	{
		$files = File::files($this->folder);
		return View::make('index')->with('images',$files);
	}

	public function store()
	{
		$file = Input::file('filename');
		$name = $file->getClientOriginalName();

		$upload = $file->move($this->folder.'/',$name);

		if ($upload) {
			Session::flash('message','Guardado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Error al guardar');
			Session::flash('class','danger');
		}

		return Redirect::to('/');
	}

	public function destroy($id = null)
	{
		chmod($this->folder.'/'.$id, 0777);

		if (unlink($this->folder.'/'.$id)) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Error al eliminar');
			Session::flash('class','danger');
		}

		return Redirect::to('/');
	}
}
