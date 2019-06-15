@extends('layouts.app')

@section('content')
    @component('components.blog-post', ['blogPost' => $blogPost])
        @if($blogPost->post_image)
            @slot('image')
                {{ $blogPost->post_image }}
            @endslot
        @endif

        @slot('title')
            {{ $blogPost->title }}
        @endslot

        @slot('userName')
            {{ $blogPost->user->name }}
        @endslot

        @slot('content')
            {!! $blogPost->content_html !!}
        @endslot
    @endcomponent
@endsection