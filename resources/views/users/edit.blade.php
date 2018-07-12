@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i>Edit user profile
                </h4>
            </div>

            @include('common.error')

            <div class="panel-body">

                <form action="{{route('users.update',$user)}}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label for="name-field">UserName</label>
                        <input class="form-control" type="text" name="name" id="name-field" value="{{old('name',$user->name)}}" />
                    </div>

                    <div class="form-group">
                        <label for="email-field">Email</label>
                        <input class="form-control" type="text" name="email" id="email-field" value="{{old('email',$user->email)}}" />
                    </div>

                    <div class="form-group">
                        <label for="introduction-field">Introduction</label>
                        <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{old('introduction',$user->introduction)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="" class="avatar-label">User Avatar</label>
                        <input type="file" name="avatar">
                        @if($user->avatar)
                            <br>
                            <img class="thumbnail img-responsive" src="{{$user->avatar}}" width="200">
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection