<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\RuleEnums;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
//        if ($user->user_type !==RuleEnums::Freelance) {
//            abort(403, 'Unauthorized action.');
//        }
        $categories = Category::where('name','!=','All Categories')->get();
        $freelancer=$user->freelancer;

        return view('users.dashboard', compact('user','categories','freelancer'));
    }

}
