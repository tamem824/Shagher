<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function profile()
    {
        $categories = Category::where('name','!=','All Categories')->get();
        $company = auth()->user()->company;
        $company->load('jobs'); //

        return view('companies.profile', compact('company','categories'));
    }
    public function edit()
    {    $categories = Category::where('name','!=','All Categories')->get();
        $company = auth()->user()->company;
        return view('companies.profile-edit', compact('company','categories'));
    }

    public function update(Request $request)
    {
        $company = auth()->user()->company;

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'uri' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('companies', 'public');
        }


        $company->update($data);

        return redirect()->route('company.profile')->with('success', 'Profile updated.');
    }
    public function createJob()
    {

        $categories = Category::where('name','!=','All Categories')->get();
        $tag_careers = Tag::whereJsonContains('types', ['1'])->get();
        $tag_employment_types = Tag::whereJsonContains('types', ['2'])->get();
        $tags = Tag::whereJsonContains('types', ['0'])->get();

        return view('companies.jobsCreate', compact('categories','tag_careers','tag_employment_types','tags'));
    }

    public function editJob($id)
    {
        $job = Job::findOrFail($id);


        if (auth()->user()->user_type === 'company') {
            if ($job->company_id !== auth()->user()->company->id) {
                abort(403, 'Unauthorized action.');
            }
        }
        $categories = Category::where('name','!=','All Categories')->get();
        $tag_careers = Tag::whereJsonContains('types', ['1'])->get();
        $tag_employment_types = Tag::whereJsonContains('types', ['2'])->get();
        $tags = Tag::whereJsonContains('types', ['0'])->get();

        return view('companies.jobsEdit', compact('job','categories','tag_careers','tag_employment_types','tags'));
    }
    public function updateJob(Request $request, $id)
    {

        $job = Job::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'required|exists:tags,id',
            'posted_by' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|string|max:255',
            'start_date' => 'required|date',
            'experience_years' => 'required|integer|min:0',
            'expiration_date' => 'required|date|after_or_equal:start_date',
            'gender' => 'nullable|integer',
            'qualification' => 'required|integer',
            'career_level_id' => 'required|exists:tags,id',
            'employment_type_id' => 'nullable|exists:tags,id',
            'job_type' => 'required|string|max:255',
            'is_featured' => 'required|boolean',
            'status' => 'required|integer',
            'responsibility' => 'required|array',
            'skill_experience' => 'required|array',
            'experience' => 'required|array',
        ]);


        $job->update([
            'category_id' => $validated['category_id'],
            'tag_id' => $validated['tag_id'],
            'posted_by' => $validated['posted_by'],
            'location_id' => $validated['location_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'salary' => $validated['salary'],
            'start_date' => $validated['start_date'],
            'experience_years' => $validated['experience_years'],
            'expiration_date' => $validated['expiration_date'],
            'gender' => $validated['gender'],
            'qualification' => $validated['qualification'],
            'career_level_id' => $validated['career_level_id'],
            'employment_type_id' => $validated['employment_type_id'],
            'job_type' => $validated['job_type'],
            'is_featured' => $validated['is_featured'],
            'status' => $validated['status'],
            'responsibility' => json_encode($validated['responsibility']),
            'skill_experience' => json_encode($validated['skill_experience']),
            'experience' => json_encode($validated['experience']),
        ]);

        return redirect()->route('jobs.show', $job->id)->with('success', 'Job updated successfully.');
    }
}
