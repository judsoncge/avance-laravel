<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;

use App\Discipline;
use App\Course;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class DisciplineController extends Controller
{
    public function showDisciplinesPage(){
		
		$disciplines = Discipline::all()->sortBy('name');
	
        return view('secretary.disciplines.disciplines', compact('disciplines'));
		
	}
	
	public function showCreatePage()
    {
		$courses = Course::all()->sortBy('name');
		
        return view('secretary.disciplines.create', compact('courses'));
    }
	
	public function showUpdatePage($id)
    {
		$discipline = Discipline::find($id);
		
		$courses = Course::all()->sortBy('name');
		
        return view('secretary.disciplines.update', compact('discipline', 'courses'));
    }
	
	public function showManageTeacherLinks($id)
    {
		$discipline = Discipline::find($id);

		$teachersWithoutLinks = User::whereDoesntHave('disciplines', function($query) use ($id){
			$query->where('discipline_id', '=', $id);
			
		})->where(function($query){
			$query->where('type', '=', 'PROFESSOR');
		
		})->get()->sortBy('name');
		
        return view('secretary.disciplines.manage-teacher-links', compact('discipline', 'teachersWithoutLinks'));
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
            'course_id' => 'required',
        ]);
    }
	
	/**
     * Create a new discipline instance after a valid registration.
     *
     * @param  Request  $data
     * @return Discipline
     */
    protected function create(Request $data)
    {
        Discipline::create([
            'name' => $data['name'],
            'course_id' => $data['course'],
        ]);
		
		return redirect()
				->action('Secretary\DisciplineController@showDisciplinesPage')
				->with('mensagem', 'Disciplina criada com sucesso!');
    }
	
	protected function update(Request $formData, $id)
	{
		$discipline = Discipline::find($id);
		
		$discipline->name = $formData['name'];
		$discipline->course_id = $formData['course'];
		
		$discipline->save();
		
		return redirect()
				->action('Secretary\DisciplineController@showDisciplinesPage')
				->with('mensagem', 'Disciplina editada com sucesso!');
	}
	
	protected function updateTeacherLink(Request $formData, $id)
	{
		$discipline = Discipline::find($id);
		$teacher = User::find($formData['user']);
		
		$discipline->users()->attach($teacher);

		return redirect()
				->action('Secretary\DisciplineController@showDisciplinesPage')
				->with('mensagem', 'Professor vinculado a disciplina com sucesso!');
	}
	
	protected function unlinkTeacher($teacherId, $disciplineId){
		
		$discipline = Discipline::find($disciplineId);
		$teacher = User::find($teacherId);
		
		$discipline->users()->detach($teacher);
		
		return redirect()
				->action('Secretary\DisciplineController@showDisciplinesPage')
				->with('mensagem', 'Professor desvinculado da disciplina com sucesso!');
	}
	
	
	protected function delete($id)
	{
		$discipline = Discipline::find($id);
		
		$discipline->delete();
		
		return redirect()
				->action('Secretary\DisciplineController@showDisciplinesPage')
				->with('mensagem', 'Disciplina removida com sucesso!');
	}
}
