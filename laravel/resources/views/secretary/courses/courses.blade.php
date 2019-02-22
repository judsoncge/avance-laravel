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
					Cursos
					<div class="pull-right">
						<a href="{{ url('secretary/courses/create') }}" title="cadastrar">
							<i class="fa fa-plus"></i>
						</a>
					</div>	
				</div>

                <div class="panel-body">
                    <table class="table table-sm">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Disciplinas</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							@foreach($courses as $course)
								<tr>
									<td>{{ $course->name }}</td>
									<td>@foreach($course->disciplines()->get() as $discipline)
											{{ $discipline->name }}<br>
										@endforeach
									</td>
									<td> 
										<a href="courses/{{ $course->id }}/update" title="editar"><i class="fa fa-pencil"></i></a>
										<a href="delete/course/{{ $course->id }}" title="excluir" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-trash"></i></a>
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