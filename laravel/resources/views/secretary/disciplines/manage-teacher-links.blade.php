@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('secretary/disciplines') }}">Disciplinas</a> > {{ $discipline->name }} > Gerenciar vínculos com professoress</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/secretary/update-teacher-link/discipline/{{$discipline->id}}">
                        
						{{ csrf_field() }}

						<input type="hidden" name="_method" value="PUT"> 
					
						<div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                            <label for="user" class="col-md-4 control-label">Professor à ser vinculado</label>

                            <div class="col-md-6">
                                <select id="user" class="form-control" name="user" value="{{ old('user') }}">
								
									<option value="">selecione uma opção...</option>
									@foreach($teachersWithoutLinks as $teacher)
										<option value="{{ $teacher->id }}">{{ $teacher->name}}</option>	
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
								<th>Professores já vinculados</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							@foreach($discipline->users->sortBy('name') as $teacher)
								<tr>
									<td>{{ $teacher->name }}</td>
									<td> 
										<a href="/secretary/unlink-teacher/{{ $teacher->id }}/discipline/{{ $discipline->id}}" title="desvincular" onclick="return confirm('Tem certeza que deseja desvincular?')"><i class="fa fa-unlink"></i></a>
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
