@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form action="{{ route('job.list') }}">
                            <input type="text" value="{{ $search }}" name="search" class="form-control" id="search" placeholder="Search">
                        </form>
                    </div>

                    <div class="panel-body">
                        <div class="list-group">
                        @foreach ($jobs as $job)
                            <a href="{{ route('job.show', $job->id) }}" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    <img class="special-img" src="{{ $job->user->getAvatar() }}">
                                    {{ str_limit($job->title, $limit = 80, $end = '...') }}
                                    &nbsp;<span class="text-muted pull-right">deadline {{ $job->deadline() }}, {{ $job->bounty }} credits</span>
                                </h4>
                                <hr style="padding:0;margin:0;">
                                <p class="list-group-item-text">
                                    {{ str_limit($job->description, $limit = 420, $end = '...') }}
                                </p>
                            </a>
                        @endforeach
                        {{ $jobs->appends(['search' => $search])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
