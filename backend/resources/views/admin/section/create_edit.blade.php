@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{$title}} Section</h2>
                </div>
                @if(isset($section))
                    <div class="pull-right">
                        <a class="btn btn-primary" href="/section/showBaseSection/{{$section->parent->slug}}"> Back</a>
                    </div>
                @endif
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ isset($section) ? route('section.update',$section->id) :  route('section.store') }}" method="POST">

            @csrf
            <input type="hidden" name="_method" value="{{$method}}">


            <div class="row">
                @if($method == 'POST')
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Base Section</strong>
                            <select name="parent_id" class="form-control">
                                @foreach($baseSections as $baseSection)
                                    @if($selectedSectionSlug === $baseSection->slug)
                                        <option selected value="{{$baseSection->id}}">{{$baseSection->name}}</option>
                                    @else
                                        <option value="{{$baseSection->id}}">{{$baseSection->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $section->name ?? ''}}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="text" name="image" value="{{ $section->image ?? ''}}" class="form-control" placeholder="Image">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $section->title ?? ''}}" class="form-control" placeholder="Title">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>description:</strong>
                        <textarea class="form-control form-textarea" name="description" placeholder="description">{{ $section->description ?? ''}}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

    </div>
@endsection

@section('content_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '.form-textarea' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

@section('content_css')
    <link href="{{ asset('admin/css/base_section.css') }}" rel="stylesheet">
@endsection