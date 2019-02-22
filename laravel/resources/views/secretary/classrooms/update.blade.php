@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('secretary/classrooms') }}">Disciplinas</a> > {{ $classroom->name }} > Editar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/secretary/update/classroom/{{$classroom->id}}">
                        
						{{ csrf_field() }}

						<input type="hidden" name="_method" value="PUT"> 

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input  id="name" type="text" class="form-control" name="name" value="{{ $classroom->name }}">

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
										<option value="{{ $course->id }}"
												@if($classroom->course_id==$course->id)
													selected = "selected"
												@endif()
											>{{$course->name}}
										</option>	
									@endforeach
								</select>
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('period') ? ' has-error' : '' }}">
                            <label for="period" class="col-md-4 control-label">Turno</label>

                            <div class="col-md-6">
                                <select id="period" class="form-control" name="period" value="{{ old('period') }}">
									<option value="MATUTINO"
									@if($classroom->period=="MATUTINO")
										selected = "selected"
									@endif()
									
									>MATUTINO</option>
									<option value="VESPERTINO"
									@if($classroom->period=="VESPERTINO")
										selected = "selected"
									@endif()
									
									>VESPERTINO</option>
									<option value="NOTURNO"
									@if($classroom->period=="NOTURNO")
										selected = "selected"
									@endif()
									
									>NOTURNO</option>
									<option value="DISTÂNCIA"
									@if($classroom->period=="DISTÂNCIA")
										selected = "selected"
									@endif()
									
									>DISTÂNCIA</option>
								</select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Editar
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
