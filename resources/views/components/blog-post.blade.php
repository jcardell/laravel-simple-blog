<div class="blog-post card">
    @isset($image)
        <img src="{{ Storage::url($image) }}" class="card-img-top" alt="{{ $title }}">
    @endisset
    <div class="card-body">
        <a class="d-inline-block" href="{{ route('blog.view', ['blogPost' => $blogPost->id]) }}">
            <h5 class="card-title">{{ $title }}</h5>
        </a>
        <h6 class="card-subtitle mb-2 text-muted">Posted by {{ $userName }}</h6>
        <p class="card-text">{{ $content }}</p>

        <a class="card-link" href="{{ route('blog.index') }}">Return</a>

        @can('update', $blogPost)
            <a class="card-link btn btn-primary" href="{{ route('blog.edit', ['blogPost' => $blogPost->id]) }}">Edit</a>
        @endcan

        @can('delete', $blogPost)
            <form class="card-link d-inline-block" action="{{ route('blog.delete', ['blogPost' => $blogPost->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <input class="btn btn-danger" type="submit" value="Delete" onclick="confirm('Are you sure you want to delete this blog post?')">
            </form>
        @endcan
    </div>
</div>