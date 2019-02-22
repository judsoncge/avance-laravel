@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pendências</div>

                <div class="panel-body">
                    <table class="table table-sm">
						<thead>
							<tr>
								<th>Alunos sem turma</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
						@if($studentsWithoutLink->count() > 0)
							@foreach($studentsWithoutLink as $student)
								<tr>
									<td>{{ $student->name }}</td>
									<td>Vincular</td>
								</tr>
							@endforeach
						@else
							<td><i>sem pendências de alunos.</i></td>
						@endif
						</tbody>
					</table>
					<hr>
					<table class="table table-sm">
						<thead>
							<tr>
								<th>Professores sem disciplina</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
						@if($teachersWithoutLinks->count() > 0)
							@foreach($teachersWithoutLinks as $teacher)
								<tr>
									<td>{{ $teacher->name }}</td>
									<td>Vincular</td>
								</tr>
							@endforeach
						@else
							<td><i>sem pendências de professores.</i></td>
						@endif
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
