<?php

class RegisterController extends \BaseController {

    public function getIndex()
    {
        return View::make('logins.register');
    }

    public function postIndex()
    {
        $rules = array(
            'Username' => 'required|unique:users,username|min:5',
            'Password' => 'required|min:8',
            'Nama' => 'required|min:5',
            'Bagian' => 'required');

        $validation = Validator::make(Input::all(), $rules);

        if($validation->fails()){
            return Redirect::to('/pendaftaran')->withErrors($validation);
        }

        $user = array(
            'username' => Input::get('Username'),
            'password' => Hash::make(Input::get('Password')),
            'nama' => Input::get('Nama'),
            'bagian_id' => Input::get('Bagian'));
        User::create($user);

        return Redirect::to('login');
    }

}