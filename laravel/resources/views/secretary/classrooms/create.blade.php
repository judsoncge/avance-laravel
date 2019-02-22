@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('secretary/classrooms') }}">Turmas</a> > Cadastrar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('secretary/create/classroom') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input  id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						 <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                            <label for="course" class="col-md-4 control-label">Curso</label>

                            <div class="col-md-6">
                                <select id="course" class="form-control" name="course" value="{{ old('course') }}">
									<option value="">selecione uma opção...</option>
									@foreach($courses as $course)
										<option value="{{ $course->id }}">{{$course->name}}</option>
								
									
									@endforeach
								</select>
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('period') ? ' has-error' : '' }}">
                            <label for="period" class="col-md-4 control-label">Turno</label>

                            <div class="col-md-6">
                                <select id="period" class="form-control" name="period" value="{{ old('period') }}">
									<option value="">selecione uma opção...</option>
									<option value="MATUTINO">MATUTINO</option>
									<option value="VESPERTINO">VESPERTINO</option>
									<option value="NOTURNO">NOTURNO</option>
									<option value="DISTÂNCIA">DISTÂNCIA</option>
								</select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
