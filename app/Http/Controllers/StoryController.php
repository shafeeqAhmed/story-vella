<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Story;
class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $stories = Story::join('users as u','u.id','=','stories.user_id')
                    ->select('stories.*', 'u.name as author_name')->paginate(2);
        return view('story.admin.stories', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('story.admin.add-stories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'integer'],
            'location' =>  ['required'],
            'image' =>  ['required'],
        ]);

        if (!empty($request->image)) {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $data['image']= url('uploads/'.$filename);
        }
        $data['user_id'] = Auth::user()->id;
        Story::create($data);

    return back()->with('success','Story has been updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
