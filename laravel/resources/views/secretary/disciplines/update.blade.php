@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('secretary/disciplines') }}">Disciplinas</a> > {{ $discipline->name }} > Editar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/secretary/update/discipline/{{$discipline->id}}">
                        
						{{ csrf_field() }}
						
                        <input type="hidden" name="_method" value="PUT"> 
						
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input  id="name" type="text" class="form-control" name="name" value="{{ $discipline->name }}">

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
												@if($discipline->course_id==$course->id)
													selected = "selected"
												@endif()
											>{{$course->name}}
										</option>	
									@endforeach
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
