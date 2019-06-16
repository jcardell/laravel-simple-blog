<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateBlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Show the blog posts.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogPosts = BlogPost::with('user')->orderByRecent()->paginate(6);

        return view('home', compact('blogPosts'));
    }

    /**
     * Displays a form to create a blog post.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Displays a blog post.
     *
     * @param BlogPost $blogPost
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(BlogPost $blogPost)
    {
        return view('view', compact('blogPost'));
    }

    /**
     * Displays a form to edit a blog post.
     *
     * @param BlogPost $blogPost
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BlogPost $blogPost)
    {
        return view('edit', compact('blogPost'));
    }

    /**
     * Creates a blog post.
     *
     * @param StoreBlogPost $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreBlogPost $request)
    {
        $data = $request->validated();

        if ($request->hasFile('post_image')) {
            $data['post_image'] = $request->post_image->store('public');
        }
        $data['user_id'] = Auth::id();

        $blogPost = BlogPost::create($data);
        if (!$blogPost) {
            abort(500);
        }

        return redirect(route('blog.index'))->with('status', 'Blog post created.');
    }

    /**
     * Updates a blog post.
     *
     * @param UpdateBlogPost $request
     * @param BlogPost $blogPost
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateBlogPost $request, BlogPost $blogPost)
    {
        $data = $request->validated();

        if ($request->file('post_image')) {
            Storage::delete($blogPost->post_image);
            $data['post_image'] = $request->post_image->store('public');
        }

        $isUpdated = $blogPost->update($data);
        if (!$isUpdated) {
            abort(500);
        }

        return redirect(route('blog.index'))->with('status', 'Blog post updated.');
    }

    /**
     * Removes a blog post.
     *
     * @param BlogPost $blogPost
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(BlogPost $blogPost)
    {
        $deleted = $blogPost->delete();
        if (!$deleted) {
            abort(500);
        }

        return redirect(route('blog.index'))->with('status', 'Blog post deleted.');
    }
}
