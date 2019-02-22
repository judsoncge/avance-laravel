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
					Usuários
					<div class="pull-right">
						<a href="{{ url('secretary/users/create') }}" title="cadastrar">
							<i class="fa fa-user-plus"></i>
						</a>
					</div>	
				</div>

                <div class="panel-body">
                    <table class="table table-sm">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Usuário</th>
								<th>Tipo</th>
								<th>E-mail</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{ $user->name }}</td>
									<td>{{ $user->username }}</td>
									<td>{{ $user->type }}</td>
									<td>{{ $user->email }}</td>
									<td> 
										<a href="users/{{ $user->id }}/update" title="editar"><i class="fa fa-pencil"></i></a>
										<a href="delete/user/{{ $user->id }}" title="excluir" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-trash"></i></a>
										
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
