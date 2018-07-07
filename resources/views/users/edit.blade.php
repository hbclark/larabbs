@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i>Edit user profile
                </h4>
            </div>

            <div class="panel-body">

                <form action="{{route('users.update',$user->id)}}" method="post" accept-charset="utf-8">
                    <input type="hidden" name="method" value="put">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label for="name-field">UserName</label>
                        <input class="form-control" type="text" name="name" id="name-field" value="{{old('name',$user->name)}}" />
                    </div>

                    <div class="form-group">
                        <label for="email-field">Email</label>
                        <input class="form-control" type="text" name="email" id="email-field" value="{{old('email',$user->email)}}" />
                    </div>

                    <div class="form-control">
                        <label for="introduction-field">Introduction</label>
                        <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{old('introduction',$user->introduction)}}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop