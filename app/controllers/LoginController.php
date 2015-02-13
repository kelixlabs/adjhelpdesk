<?php

/**
 * Created by PhpStorm.
 * User: kecambah
 * Date: 2/11/15
 */
class LoginController extends BaseController {

    public function getIndex()
    {
        return View::make('logins.login');
    }

    public function postIndex()
    {
        $usercheck = User::where('nip', Input::get('nip'));

        if($usercheck){
            if(Input::has('counter')){
                $id = $usercheck->first()->id;
                $user = User::find($id);
                $user->counter = Input::get('counter', 0);
                $user->save();
                Session::put(array('nip' => Input::get('nip'), 'counter' => Input::get('counter')));

                return Redirect::to('/');
            }

            return Redirect::to('login')->with('message', 'warning');
        } else {
            return Redirect::to('login')->with('message', 'error');
        }
    }

    public function logout()
    {
        Session::flush();

        return Redirect::to('/');
    }

}