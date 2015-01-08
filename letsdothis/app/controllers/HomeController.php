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

	public function getIndex()
	{
        $items = Auth::user()->items;
        $username = Auth::user()->name;

		return View::make('home', array(
            'items' => $items,
            'username' => $username
        ));
	}

    public function postIndex()
    {
        $id = Input::get('id');
        $user_id = Auth::user()->id;
        $item = Item::findOrFail($id);

        if($item->owner_id == $user_id)
            $item->mark();

        return Redirect::route('home');
    }

    public function getNew() {
        return View::make('new');
    }

    public function postNew(){
        $rules = array('name' => 'required|min:3|max:255');
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()){
            return Redirect::route('new')->withErrors($validator);
        }

        $item = new Item;
        $item->name = Input::get('name');
        $item->owner_id = Auth::user()->id;
        $item->save();

        return Redirect::route('home');
    }

    public function getDelete(Item $task) {
        if($task->owner_id == Auth::user()->id){
            $task->delete();
        }

        return Redirect::route('home');
    }
}
