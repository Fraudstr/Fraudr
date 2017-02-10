@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $job->title }}
                    </div>

                    <div class="panel-body">
                        <h4>Description</h4>
                        <p>
                            {{ $job->description }}
                            <br><br>
                            <b>Bounty:</b> {{ $job->bounty }} credits<br>
                            <b>Deadline:</b> {{ $job->deadline() }}

                            @if(Auth::user()->id == $job->user_id)

                            @else
                                <form
                            @endif

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
