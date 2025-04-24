<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $jobs = Job::with('tags', 'category')
            ->whereIn('status', [0, 1])
            ->get();

        dd($jobs);
        $categories=Category::with('jobs')->withCount('jobs')->get();
        return view('frontend.homepage',compact('jobs','categories'));
    }

}
