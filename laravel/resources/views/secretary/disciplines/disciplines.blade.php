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
					Disciplinas
					<div class="pull-right">
						<a href="{{ url('secretary/disciplines/create') }}" title="cadastrar">
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
								<th>Professores</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							@foreach($disciplines as $discipline)
								<tr>
									<td>{{ $discipline->name }}</td>
									<td>{{ $discipline->course()->get()->first()->name }}</td>
									<td>
										@foreach($discipline->users->sortBy('name') as $teacher)
											{{ $teacher->name }}<br>
										@endforeach
									</td>
									<td> 
										<a href="disciplines/{{ $discipline->id }}/manage-teacher-links" title="gerenciar vínculos com professores"><i class="fa fa-link"></i></a>
										<a href="disciplines/{{ $discipline->id }}/update" title="editar"><i class="fa fa-pencil"></i></a>
										<a href="delete/discipline/{{ $discipline->id }}" title="excluir" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-trash"></i></a>
										
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