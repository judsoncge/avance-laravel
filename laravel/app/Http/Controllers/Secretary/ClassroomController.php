<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;

use App\Classroom;
use App\Course;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClassroomController extends Controller
{
    public function showClassroomsPage(){
		
		$classrooms = Classroom::all()->sortBy('name');
	
        return view('secretary.classrooms.classrooms', compact('classrooms'));
		
	}
	
	public function showCreatePage()
    {
		$courses = Course::all()->sortBy('name');
		
        return view('secretary.classrooms.create', compact('courses'));
    }
	
	public function showUpdatePage($id)
    {
		$classroom = Classroom::find($id);
		
		$courses = Course::all()->sortBy('name');
		
        return view('secretary.classrooms.update', compact('classroom', 'courses'));
    }
	
	public function showManageStudentLinks($id)
    {
		$classroom = Classroom::find($id);
		
		$studentsWithoutLinks = User::where('classroom_id', '=', NULL)->where('type', '=', 'ALUNO')->get()->sortBy('name'); 
		
        return view('secretary.classrooms.manage-student-links', compact('classroom', 'studentsWithoutLinks'));
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
            'name' => 'required',
            'course_id' => 'required',
        ]);
    }
	
	/**
     * Create a new classroom instance after a valid registration.
     *
     * @param  Request  $data
     * @return Classroom
     */
    protected function create(Request $data)
    {
        Classroom::create([
            'name' => $data['name'],
            'period' => $data['period'],
            'course_id' => $data['course'],
        ]);
		
		return redirect()
				->action('Secretary\ClassroomController@showClassroomsPage')
				->with('mensagem', 'Turma criada com sucesso!');
    }
	
	protected function update(Request $formData, $id)
	{
		$classroom = Classroom::find($id);
		
		$classroom->name = $formData['name'];
		$classroom->period = $formData['period'];
		$classroom->course_id = $formData['course'];
		
		$classroom->save();
		
		return redirect()
				->action('Secretary\ClassroomController@showClassroomsPage')
				->with('mensagem', 'Turma editada com sucesso!');
	}
	
	protected function updateStudentLink(Request $formData, $id)
	{
		$user = User::find($formData['user']);
		
		$user->classroom_id = $id;
		
		$user->save();
		
		return redirect()
				->action('Secretary\ClassroomController@showClassroomsPage')
				->with('mensagem', 'Aluno vinculado a turma com sucesso!');
	}
	
	protected function unlinkStudent($id){
		
		$user = User::find($id);
		
		$user->classroom_id = NULL;
		
		$user->save();
		
		return redirect()
				->action('Secretary\ClassroomController@showClassroomsPage')
				->with('mensagem', 'Aluno desvinculado da turma com sucesso!');
	}
	
	protected function delete($id)
	{
		$classroom = Classroom::find($id);
		
		$classroom->delete();
		
		return redirect()
				->action('Secretary\ClassroomController@showClassroomsPage')
				->with('mensagem', 'Turma removida com sucesso!');
	}
}
