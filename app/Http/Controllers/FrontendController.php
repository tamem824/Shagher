<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Job;
use App\Models\Location;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = $this->getFilteredCategories();
        $locations = Location::all();
        $posts = Post::with('comments')->get();

        return view('guest.home', compact('locations', 'categories', 'posts'));
    }

    public function jobIndex(Request $request)
    {
        $jobs = Job::query()
            ->when($request->filled('search'), fn($q) => $q->where('title', 'like', '%' . $request->search . '%'))
            ->when($request->filled('location'), fn($q) => $q->where('location_id', $request->location))
            ->when($request->filled('category'), fn($q) => $q->where('category_id', $request->category))
            ->when($request->filled('experience'), fn($q) => $q->where('experience_years', $request->experience))
            ->latest()->paginate(3)
            ->withQueryString();

        $locations = Location::pluck('name', 'id');
        $categories = $this->getFilteredCategories();

        return view('guest.result', compact('jobs', 'locations', 'categories'));
    }

    public function jobShow($id)
    {
        $job = Job::with('category')->findOrFail($id);
        $category = $job->category;
        $categories = $this->getFilteredCategories();

        return view('guest.jobs.show', compact('job', 'categories', 'category'));
    }

    public function postShow($id)
    {
        $post = Post::with('comments.replies')->findOrFail($id);

        return view('guest.post.show', compact('post'));
    }

    public function postsIndex()
    {
        $posts = Post::with('comments.user')->latest()->paginate(10);

        return view('guest.post.index', compact('posts'));
    }

    public function createPost()
    {
        return view('post.create');
    }

    public function storePost(Request $request)
    {
        $this->authorize('create', Post::class);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image',
            'video_url' => 'nullable|string|url',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('posts', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['is_liked'] = false;

        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function storeComment(Request $request, $postId)
    {
        abort_unless(auth()->check(), 403);

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'content' => $validated['content'],
            'is_liked' => false,
        ]);

        return back();
    }

    public function storeReply(Request $request, $commentId)
    {
        abort_unless(auth()->check(), 403);

        $validated = $request->validate([
            'replay' => 'required|string',
        ]);

        $parent = Comment::findOrFail($commentId);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $parent->post_id,
            'comment_id' => $commentId,
            'content' => '',
            'replay' => $validated['replay'],
            'is_liked' => false,
        ]);

        return back();
    }

    public function categoriesIndex()
    {
        $categories = $this->getFilteredCategories();

        return view('guest.categories.index', compact('categories'));
    }

    public function categoriesShow($id)
    {
        $category = Category::findOrFail($id);
        $jobs = Job::with('category')->where('category_id', $id)->get();
        $categories = $this->getFilteredCategories();

        return view('guest.categories.show', compact('category', 'jobs', 'categories'));
    }


    private function getFilteredCategories()
    {
        return Category::where('name', '!=', 'All Categories')->get();
    }
}
