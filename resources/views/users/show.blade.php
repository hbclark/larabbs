@extends('layouts.app')
@section('title',$user->name.'profile center')

@section('content')
    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="{{Auth::user()->gravatar('200')}}" alt="user img">
                        </div>

                        <div class="media-body">
                            <hr>
                            <h4><strong>User profile</strong></h4>
                            <p>{{$user->introduction}}</p>
                            <hr>
                            <h4><strong>Registered on</strong></h4>
                            <p>{{$user->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px">{{$user->name}}</h1>
                    </span>
                </div>
            </div>

            {{--user's post --}}
            <div class="panel panel-default">
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>

@stop
