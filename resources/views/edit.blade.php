@extends('layouts.app')

@section('meta_title')
    {{ __('blog.edit_post') . ' - ' . config('app.name') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('blog.edit_post') }}
        </div>
        <div class="card-body">
            <form action="{{ route('blog.put', ['blogPost' => $blogPost->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('blog.title') }}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="{{ __('blog.title') }}" name="title" value="{{ $blogPost->title }}">
                    @error ('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="excerpt">{{ __('blog.excerpt') }}</label>
                    <textarea class="js-summernote form-control @error('excerpt') is-invalid @enderror" id="excerpt" placeholder="{{ __('blog.excerpt') }}" name="excerpt" data-toolbar="reduced">{{ $blogPost->excerpt }}</textarea>
                    @error ('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">{{ __('blog.content') }}</label>
                    <textarea class="js-summernote form-control @error('content_html') is-invalid @enderror" id="content" placeholder="{{ __('blog.content') }}" name="content_html">{{ $blogPost->content_html }}</textarea>
                    @error ('content_html')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="post_image">{{ __('blog.image') }}</label>
                    <input type="file" class="form-control-file" id="post_image" name="post_image">
                </div>
                <div class="form-group d-flex align-items-center">
                    <div class="flex-grow-1">
                        <input class="card-link btn btn-primary" type="submit" value="{{ __('blog.save') }}">
                    </div>
                    <a class="card-link" href="{{ route('blog.index') }}">{{ __('blog.return') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
