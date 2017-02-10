@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('job.create') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bounty') ? ' has-error' : '' }}">
                                <label for="bounty" class="col-md-4 control-label">Bounty</label>

                                <div class="col-md-6">
                                    <input id="bounty" type="number" min="1" max="{{ Auth::user()->credits }}" class="form-control" name="bounty" value="{{ old('bounty') ?: 1 }}" required autofocus>

                                    @if ($errors->has('bounty'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bounty') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('closes_at') ? ' has-error' : '' }}">
                                <label for="closes_at" class="col-md-4 control-label">Deadline</label>

                                <div class="col-md-6">
                                    <div class="input-group date">
                                        <input id="closes_at" type="text" class="form-control" name="closes_at" value="{{ old('closes_at') }}" required autofocus><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                    @if ($errors->has('closes_at'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('closes_at') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" placeholder="Lorum ipsum..." name="description" required autofocus class="form-control" rows="5">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
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
