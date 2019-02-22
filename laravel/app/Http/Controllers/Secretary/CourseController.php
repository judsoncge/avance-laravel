<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;

use App\Course;

use Illuminate\Http\Request;

use App\Http\Requests;

class CourseController extends Controller
{
    
	public function showCoursesPage(){
		
		$courses = Course::all()->sortBy('name');
	
        return view('secretary.courses.courses', compact('courses'));
		
	}
	
	public function showCreatePage()
    {
        return view('secretary.courses.create');
    }
	
	public function showUpdatePage($id)
    {
		$course = Course::find($id);
		
        return view('secretary.courses.update', compact('course'));
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
        ]);
    }
	
	/**
     * Create a new course instance after a valid registration.
     *
     * @param  Request  $data
     * @return Course
     */
    protected function create(Request $data)
    {
        Course::create([
            'name' => $data['name'],
            'institution_id' => auth()->user()->institution_id,
        ]);
		
		return redirect()
				->action('Secretary\CourseController@showCoursesPage')
				->with('mensagem', 'Curso criado com sucesso!');
    }
	
	protected function update(Request $formData, $id)
	{
		$course = Course::find($id);
		
		$course->name = $formData['name'];
		
		$course->save();
		
		return redirect()
				->action('Secretary\CourseController@showCoursesPage')
				->with('mensagem', 'Curso editado com sucesso!');
	}
	
	protected function delete($id)
	{
		$course = Course::find($id);
		
		$course->delete();
		
		return redirect()
				->action('Secretary\CourseController@showCoursesPage')
				->with('mensagem', 'Curso removido com sucesso!');
	}
	
}
