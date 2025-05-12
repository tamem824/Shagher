<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function profile()
    {
        $categories = Category::where('name','!=','All Categories')->get();
        $company = auth()->user()->company;
        $company->load('jobs'); //

        return view('guest.companies.profile', compact('company','categories'));
    }
    public function edit()
    {
        $company = auth()->user()->company;
        return view('company.profile.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $company = auth()->user()->company;

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('companies', 'public');
        }

        $company->update($data);

        return redirect()->route('company.profile')->with('success', 'Profile updated.');
    }


}
