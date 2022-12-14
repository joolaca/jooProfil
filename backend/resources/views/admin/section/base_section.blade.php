@extends('layouts.admin_layout')

@section('content')
    <!-- content   \backend\resources\views\admin\section\baseSection.blade.php -->
    <div class="container">
        @if($baseSection != null)
            <h1>{{$baseSection->name}}</h1>
            <a href="/section/create" class="btn btn-success">Create SubSection</a>

            <ul id="sortable" class="list-group" data-base-section-slug="{{$baseSection->slug}}">
            @foreach($baseSection->subSections as $section)
                <li id="{{$section->id}}" class="list-group-item">
                    <i class="align-middle" data-feather="move"></i>
                    {{$section->name}}
                    <span class="action-container">
                        <a href="{{ route('section.edit', $section->id) }}"  class="btn btn-primary">
                            Edit
                            <i class="align-middle" data-feather="edit"></i>
                        </a>

                        <button type="button" class="btn btn-danger"
                                onclick="event.preventDefault(); confirm('Delete!') == true ? document.getElementById('destroy_section_{{$section->id}}').submit() : ''"
                        >
                            Delete
                            <i class="align-middle" data-feather="trash-2"></i>
                        </button>

                        <form id="destroy_section_{{$section->id}}" action="{{ route('section.destroy', ['section' => $section->id]) }}" method="POST">
                            @method('delete')
                            @csrf
                        </form>
                    </span> {{--end action-container--}}
                </li> {{-- end list-group-item--}}
            @endforeach
            </ul> {{-- end sortable --}}
        @else
            <h1>There is no section with that name: <b> {{request()->segment(count(request()->segments()))}}  </b> </h1>
        @endif
    </div>
@endsection

@section('content_js')
    <!-- content_js   \backend\resources\views\admin\section\baseSection.blade.php -->
    <script src="{{ asset('admin/js/base_section.js') }}"></script>

@endsection


@section('content_css')
    <!-- content_css   \backend\resources\views\admin\section\baseSection.blade.php -->
    <link href="{{ asset('admin/css/base_section.css') }}" rel="stylesheet">
@endsection