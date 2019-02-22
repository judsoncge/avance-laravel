@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			@if(session('mensagem'))
				<div id="mensagem-sucesso-falha" class="alert alert-success">
					<p>{{session('mensagem')}}</p>
				</div>
			@endif
            <div class="panel panel-default">
                <div class="panel-heading">
					Turmas
					<div class="pull-right">
						<a href="{{ url('secretary/classrooms/create') }}" title="cadastrar">
							<i class="fa fa-plus"></i>
						</a>
					</div>	
				</div>

                <div class="panel-body">
                    <table class="table table-sm">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Curso</th>
								<th>Turno</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							@foreach($classrooms as $classroom)
								<tr>
									<td>{{ $classroom->name }}</td>
									<td>{{ $classroom->course()->get()->first()->name }}</td>
									<td>{{ $classroom->period }}</td>
									<td> 
										<a href="classrooms/{{ $classroom->id }}/manage-student-links" title="gerenciar vínculos com alunos"><i class="fa fa-link"></i></a>
										<a href="classrooms/{{ $classroom->id }}/update" title="editar"><i class="fa fa-pencil"></i></a>
										<a href="delete/classroom/{{ $classroom->id }}" title="excluir" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-trash"></i></a>
										
									</td>
								</tr>
							@endforeach
						</tbody>	
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection