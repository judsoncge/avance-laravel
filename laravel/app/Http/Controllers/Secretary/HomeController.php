<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$studentsWithoutLink = User::where('classroom_id', '=', NULL)->where('type', '=', 'ALUNO')->get()->sortBy('name'); 
		
		$teachersWithoutLinks = User::whereDoesntHave('disciplines')->where('type', '=', 'PROFESSOR')->get()->sortBy('name');
		
        return view('secretary.home', compact('studentsWithoutLink','teachersWithoutLinks'));
    }
}
