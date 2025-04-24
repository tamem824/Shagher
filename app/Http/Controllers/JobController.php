<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }


    public function show($id)
    {
        $job = Job::with(['tags', 'career_level', 'employment_type'])->findOrFail($id);

        return view('admin.jobs.show', compact('job'));
    }


    public function create()
    {
        $categories = Category::all();
        $tag_careers = Tag::whereJsonContains('types', ['1'])->get();
        $tag_employment_types = Tag::whereJsonContains('types', ['2'])->get();
        $tags = Tag::whereJsonContains('types', ['0'])->get();

        return view('admin.jobs.create', compact('tags', 'categories', 'tag_careers', 'tag_employment_types'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|string',
            'start_date' => 'required|date',
            'expiration_date' => 'required|date',
            'gender' => 'required|in:1,2,3',
            'qualification' => 'required|integer',
            'career_level_id' => 'required|exists:tags,id',
            'employment_type_id' => 'nullable|exists:tags,id',
            'job_type' => 'required|string',
            'is_featured' => 'required|boolean',
            'status' => 'nullable|in:0,1,2',
            'responsibility' => 'required|array',
            'skill_experience' => 'required|array',
            'experience' => 'required|array',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'required|array',
            'tag_id.*' => 'exists:tags,id',
        ]);

        $validated['career_level_id'] = $validated['career_level'];
        unset($validated['career_level']);


        $validated['responsibility'] = json_encode($validated['responsibility']);
        $validated['skill_experience'] = json_encode($validated['skill_experience']);
        $validated['experience'] = json_encode($validated['experience']);


        $validated['posted_by'] = auth()->id();

        $job = Job::create(Arr::except($validated, ['tag_id']));

        $job->tags()->attach($validated['tag_id']);

        return redirect()->route('job.index')->with('success', 'Job created successfully!');
    }



    public function edit(Job $job)
    {
        $categories = Category::all();
        $tag_careers = Tag::whereJsonContains('types', ['1'])->get();
        $tag_employment_types = Tag::whereJsonContains('types', ['2'])->get();
        $tags = Tag::whereJsonContains('types', ['0'])->get();
        return view('admin.jobs.edit', compact('job','tag_careers','tag_employment_types','tags'));
    }

    public function update(Request $request, Job $job)
    {

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|string',
            'start_date' => 'required|date',
            'expiration_date' => 'required|date',
            'gender' => 'required|in:1,2,3',
            'qualification' => 'required|integer',
            'career_level_id' => 'required|exists:tags,id',
            'employment_type_id' => 'nullable|exists:tags,id',
            'job_type' => 'required|string',
            'is_featured' => 'required|boolean',
            'status' => 'nullable|in:0,1,2',
            'responsibility' => 'required|array',
            'skill_experience' => 'required|array',
            'experience' => 'required|array',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'required|array',
            'tag_id.*' => 'exists:tags,id',
        ]);




        $data['responsibility'] = json_encode($data['responsibility']);
        $data['skill_experience'] = json_encode($data['skill_experience']);
        $data['experience'] = json_encode($data['experience']);


        unset($data['tag_id']);


        $job->update($data);

        $job->tags()->sync($request->input('tag_id', []));

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully!');
    }


    public function destroy(Job $job):RedirectResponse
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully!');
    }
}
