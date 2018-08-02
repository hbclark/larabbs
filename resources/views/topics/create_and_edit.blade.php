@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-body">
                <h2 class="text-center">
                    <i class="glyphicon glyphicon-edit"></i>
                    @if($topic->id)
                        Edit Topic
                    @else
                        Create New Topic
                    @endif
                </h2>

                <hr>

            @include('common.error')


                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" placeholder="title required" required/>
                </div>

                <div class="form-group">
                    <select class="form-control" name="category_id" required>
                        <option value="" hidden disabled selected>Please select category</option>
                        @foreach($categories as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <textarea name="body" id="editor" class="form-control" rows="3" placeholder="at least 3 chars" required>{{ old('body', $topic->body ) }}</textarea>
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true">Save</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/simditor.css')}}">
@stop

@section('scripts')
    <script type="text/javascript" src="{{asset('js/module.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/hotkeys.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/uploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/simditor.js')}}"></script>

    <script>
        $(document).ready(function(){
            var editor = new Simditor({
                textarea:$('#editor'),
                upload:{
                    url:'{{route('topics.upload_image')}}',
                    params:{_token:'{{csrf_token()}}'},
                    fileKey:'upload_file',
                    connectionCount:3,
                    leaveConfirm:'file uploading,closing this page will abort uploading'
                },
                pasteImage:true,
            });
        });
    </script>
@stop