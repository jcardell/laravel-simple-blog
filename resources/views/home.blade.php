@extends('layouts.app')

@section('content')
    <div class="blog-posts">
        @foreach ($blogPosts as $blogPost)
            <div class="blog-posts__item">
                @component('components.blog-post', ['blogPost' => $blogPost, 'showReturn' => false])
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
                        {!! $blogPost->excerpt !!}
                    @endslot
                @endcomponent
            </div>
        @endforeach

        <div class="blog-posts__pagination d-flex justify-content-center">
            {{ $blogPosts->links() }}
        </div>
    </div>
@endsection
