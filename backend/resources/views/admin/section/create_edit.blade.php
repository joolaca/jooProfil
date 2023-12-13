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


        <form action="{{ isset($section) ? route('section.update',$section->id) :  route('section.store') }}"
              method="POST">

            @csrf
            <input type="hidden" name="_method" value="{{$method}}">


            <div class="row">

                @if($method == 'POST')
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="baseSectionSelect">Base Section</label>

                            <select name="parent_id" class="form-control" id="baseSectionSelect">
                                @foreach($baseSections as $baseSection)
                                    @if($slug === $baseSection->slug)
                                        <option selected value="{{$baseSection->id}}">{{$baseSection->name}}</option>
                                    @else
                                        <option value="{{$baseSection->id}}">{{$baseSection->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif

                @foreach($sectionDto->getEditableAttribute() as $attribute)

                    @if($attribute['display'] === 'hidden')
                        <input type="hidden"
                               name="{{ $attribute['column'] }}"
                               value="{{ $section->{$attribute['column']} ?? ''}}"
                        >
                    @endif

                    @if($attribute['display'] === 'text')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="{{ $attribute['column'] }}">{{ $attribute['title'] ?? '' }} :</label>

                                <input type="text"
                                       id="{{ $attribute['column'] }}"
                                       name="{{ $attribute['column'] }}"
                                       value="{{ $section->{$attribute['column']} ?? ''}}"
                                       class="form-control"
                                       placeholder="{{ $attribute['title'] }}">
                            </div>
                        </div>
                    @endif

                    @if($attribute['display'] === 'textarea')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="{{ $attribute['column'] }}">{{ $attribute['title'] ?? '' }} :</label>

                                <textarea type="text"
                                          id="{{ $attribute['column'] }}"
                                          name="{{ $attribute['column'] }}"
                                          class="form-control form-textarea"
                                          placeholder="{{ $attribute['title'] }}"
                                >{{ $section->{$attribute['column']} ?? ''}}</textarea>

                            </div>
                        </div>
                    @endif

                @endforeach

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
            .create(document.querySelector('.form-textarea'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@section('content_css')
    <link href="{{ asset('admin/css/base_section.css') }}" rel="stylesheet">
@endsection
