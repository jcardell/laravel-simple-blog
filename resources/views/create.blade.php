@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('blog.create_post') }}
        </div>
        <div class="card-body">
            <form action="{{ route('blog.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
                    @error ('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="js-summernote form-control @error('excerpt') is-invalid @enderror" id="excerpt" placeholder="Excerpt" name="excerpt" data-toolbar="reduced">{{ old('excerpt') }}</textarea>
                    @error ('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="js-summernote form-control @error('content_html') is-invalid @enderror" id="content" placeholder="Content" name="content_html">{{ old('content_html') }}</textarea>
                    @error ('content_html')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="post_image">Image</label>
                    <input type="file" class="form-control-file" id="post_image" name="post_image">
                </div>
                <div class="form-group d-flex align-items-center">
                    <div class="flex-grow-1">
                        <input class="card-link btn btn-primary" type="submit" value="Create">
                    </div>
                    <a class="card-link" href="{{ route('blog.index') }}">Return</a>
                </div>
            </form>
        </div>
    </div>
@endsection
