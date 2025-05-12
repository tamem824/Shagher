<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Job;
use App\Models\Location;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('name','!=','All Categories')->get();
        $locations = Location::all();
        $posts = Post::with('comments')->get();

        return view('guest.home', compact('locations', 'categories', 'posts'));
    }

    public function jobIndex(Request $request)
    {
        $jobs = Job::query();

        if ($request->filled('search')) {
            $jobs->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('location')) {
            $jobs->where('location_id', $request->location);
        }

        if ($request->filled('category')) {
            $jobs->where('category_id', $request->category);
        }

        if ($request->filled('experience')) {
            $jobs->where('experience_years', $request->experience);
        }

        $jobs = $jobs->latest()->paginate(3)->withQueryString();

        $locations = Location::pluck('name', 'id');
        $categories = Category::where('name','!=','All Categories')->get();

        return view('guest.result', compact('jobs', 'locations', 'categories'));
    }
    public function jobShow($id)
    {
        $job=Job::findOrFail($id);
        $category = $job->category();
        $categories = Category::where('name','!=','All Categories')->get();
        return view('guest.jobs.show',compact('job','categories','category'));
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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image',
            'video_url' => 'nullable|string',
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
        $content=$request->validate([
            'content' => 'required|string',
        ]);


        Comment::create([

            'post_id' => $postId,
            'content' => $content['content'],
            'is_liked' => false,
        ]);

        return redirect()->back();
    }

    public function storeReply(Request $request, $commentId)
    {
        $request->validate([
            'replay' => 'required|string',
        ]);

        Comment::create([
            'post_id' => Comment::findOrFail($commentId)->post_id,
            'comment_id' => $commentId,
            'content' => '',
            'replay' => $request->replay,
            'is_liked' => false,
        ]);

        return redirect()->back();
    }
    public function categoriesIndex()
    {
        $categories = Category::where('name','!=','All Categories')->get();

        return view('guest.categories.index', compact('categories'));
    }
    public function categoriesShow($id)
    {
        $category=Category::findOrFail($id);
        $categories = Category::where('name','!=','All Categories')->get();
        $jobs=Job::with('category')->where('category_id','=',$id)->get();
        return view('guest.categories.show',compact('category','jobs','categories'));
    }
}
