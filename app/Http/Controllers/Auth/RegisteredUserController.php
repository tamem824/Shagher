<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $skills = Tag::where('type', 'freelancer')->get();
        $careerLevels = Tag::where('type', 'careerLevels')->get();
        return view('auth.register',compact('skills','careerLevels'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeF(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['nullable', 'numeric'],
            'gender' => ['nullable', 'in:0,1'],
            'address' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'skills_id' => ['required', 'exists:tags,id'],
            'career_level_id' => ['required', 'exists:tags,id'],
            'experience' => ['required', 'integer', 'min:0'],
        ]);


        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads/users', 'public');
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address,
            'photo' => $photoPath,
            'user_type' => 0,
            'password' => Hash::make($request->password),
        ]);


        $user->freelancer()->create([
            'skills_id' => $request->skills_id,
            'career_level_id' => $request->career_level_id,
            'experience' => $request->experience,
        ]);


        event(new Registered($user));
        Auth::login($user);

        return redirect(route('guest.home', absolute: false));
    }

    public function storeC(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'uri' => 'required|string|unique:companies,uri',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'address' => $validated['address'] ?? null,
                'phone_number' => $validated['phone_number'] ?? null,
                'gender' => 2,
                'user_type' => 1,
                'password' => Hash::make($validated['password']),
                'photo' => $this->uploadPhoto($request),
            ]);

            Company::create([
                'user_id' => $user->id,
                'uri' => $validated['uri'],
                'is_approved' => false,
            ]);

            DB::commit();

            event(new Registered($user));

            Auth::login($user);

            return redirect()->route('guest.home')->with('success', 'Company registered successfully.');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'An error occurred, please try again later.']);
        }
    }

    private function uploadPhoto(Request $request)
    {
        if ($request->hasFile('photo')) {
            return $request->file('photo')->store('company_photos', 'public');
        }
        return null;
    }

}
