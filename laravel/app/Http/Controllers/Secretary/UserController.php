<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function showUsersPage()
    {	
		$users = User::all()->sortBy('name');
	
        return view('secretary.users.users', compact('users'));
    }
	
	public function showCreatePage()
    {
        return view('secretary.users.create');
    }
	
	public function showUpdatePage($id)
    {
		$user = User::find($id);
		
        return view('secretary.users.update', compact('user'));
    }
	
	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'type' => 'required',
            'email' => 'required|email|max:255',
            'user' => 'required|max:20|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
	
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $data
     * @return User
     */
    protected function create(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'institution_id' => auth()->user()->institution_id,
			'type' => $data['type'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
		
		return redirect()
				->action('Secretary\UserController@showUsersPage')
				->with('mensagem', 'Usuário criado com sucesso!');
    }
	
	protected function update(Request $formData, $id)
	{
		$user = User::find($id);
		
		$user->name = $formData['name'];
		$user->type = $formData['type'];
		$user->email = $formData['email'];
		
		$user->save();
		
		return redirect()
				->action('Secretary\UserController@showUsersPage')
				->with('mensagem', 'Usuário editado com sucesso!');
	}
	
	protected function delete($id)
	{
		$user = User::find($id);
		
		$user->delete();
		
		return redirect()
				->action('Secretary\UserController@showUsersPage')
				->with('mensagem', 'Usuário removido com sucesso!');
	}
}
