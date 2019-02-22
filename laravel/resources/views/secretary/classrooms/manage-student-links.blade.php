@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('secretary/classrooms') }}">Turmas</a> > {{ $classroom->name }} > Gerenciar vínculos com alunos</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/secretary/update-student-link/classroom/{{$classroom->id}}">
                        
						{{ csrf_field() }}

						<input type="hidden" name="_method" value="PUT"> 
					
						<div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                            <label for="user" class="col-md-4 control-label">Aluno à ser vinculado</label>

                            <div class="col-md-6">
                                <select id="user" class="form-control" name="user" value="{{ old('user') }}">
								
									<option value="">selecione uma opção...</option>
									@foreach($studentsWithoutLinks as $student)
										<option value="{{ $student->id }}">{{ $student->name}}</option>	
									@endforeach
								</select>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Vincular
                                </button>
                            </div>
                        </div>
                    </form>
					<hr>
					<table class="table table-sm">
						<thead>
							<tr>
								<th>Alunos já vinculados</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							@foreach($classroom->users()->get() as $student)
								<tr>
									<td>{{ $student->name }}</td>
									<td> 
										<a href="/secretary/unlink-student/{{ $student->id }}" title="desvincular" onclick="return confirm('Tem certeza que deseja desvincular?')"><i class="fa fa-unlink"></i></a>
									</td>
								</tr>
							@endforeach()
						</tbody>	
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
