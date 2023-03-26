<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function dashboard()
    {
        if(Auth::user()->hasRole('admin')){
            $totalStories = Story::count();
            $published = Story::where('is_publishe', 1)->count();
            $unPublished = Story::where('is_publishe', 0)->count();
            $users = User::count();
            $writers = User::role('writer')->count();
            $readers = User::role('reader')->count();
            return view('admin.dashboard', compact('totalStories', 'published', 'unPublished', 'users', 'writers', 'readers'));

        } elseif(Auth::user()->hasRole('writer')) {

            return redirect()->route('stories.list');
        }elseif(Auth::user()->hasRole('reader')) {


            $stories = Story::whereHas('likes',function($query){
               return $query->where('user_id','=',Auth::id());
            })
            ->orderBy('stories.id', 'desc')
            ->join('users as u', 'u.id', '=', 'stories.user_id')


            ->select('stories.*', 'u.name as author_name')->paginate(5);

        return view('reader.dashboard', compact('stories'));
        }


    }
    public function users(Request $request)
    {

        $users = User::when($request->type, function ($query) {

            return $query->whereHas('roles', function ($q) {
                $q->where('name', request('type'));
            });
        })->paginate(1);
        return view('admin.users', compact('users'));
    }
}
