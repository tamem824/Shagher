<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\RuleEnums;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $companies = Company::whereHas('user', function ($query) {
            $query->where('user_type',RuleEnums::Company->value);
        })->with('user')->get();

        return view('admin.companies.index', compact('companies'));
    }
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    public function approve(Company $company)
    {
        $company->update(['is_approved' => true]);

        return redirect()->route('admin.companies.index')->with('success', 'Company approved.');
    }



    public function reject(Request $request, Company $company)
    {

        $request->validate([
            'reject_reason' => 'required|string|max:1000',
        ]);


        $company->update([
            'is_approved' => false,
            'reject_reason' => $request->input('reject_reason'),
        ]);

        return redirect()->route('admin.companies.index')->with('success', 'Company rejected.');
    }

}
