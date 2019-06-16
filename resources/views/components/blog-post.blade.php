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

        <div class="d-flex align-items-center">
            <div class="flex-grow-1">
                @can('update', $blogPost)
                    <a class="card-link" href="{{ route('blog.edit', ['blogPost' => $blogPost->id]) }}">Edit</a>
                @endcan

                @can('delete', $blogPost)
                    <a class="card-link text-danger" href="{{ route('blog.index') }}" onclick="event.preventDefault();document.getElementById('delete-blog-post-{{ $blogPost->id }}').submit()">Delete</a>
                    <form id="delete-blog-post-{{ $blogPost->id }}" class="card-link d-inline-block hide" action="{{ route('blog.delete', ['blogPost' => $blogPost->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                    </form>
                @endcan
            </div>

            @if($showReturn)
                <a class="card-link" href="{{ route('blog.index') }}">Return</a>
            @endif
        </div>
    </div>
</div>