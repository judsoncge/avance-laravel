@extends('layouts.app-secretary')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('secretary/users') }}">Usuários</a> > {{ $user->name }} > Editar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/secretary/update/user/{{$user->id}}">
                    
                        {{ csrf_field() }}
						
						<input type="hidden" name="_method" value="PUT"> 

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input  id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						 <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Tipo</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type" value="{{ old('type') }}">
									<option value="">selecione uma opção...</option>
									<option value="ALUNO"
									@if($user->type=="ALUNO")
										selected = "selected"
									@endif()
									>ALUNO</option>
									<option value="PROFESSOR"
									@if($user->type=="PROFESSOR")
										selected = "selected"
									@endif()
									>PROFESSOR</option>
									<option value="SECRETARIA"
									@if($user->type=="SECRETARIA")
										selected = "selected"
									@endif()
									>SECRETARIA</option>
								</select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input  id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Editar
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
