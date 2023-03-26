<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Story;
use App\Models\Like;
class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $stories = Story::join('users as u','u.id','=','stories.user_id')
                    ->select('stories.*', 'u.name as author_name')
                    ->orderBy('stories.id', 'desc')
                    ->paginate(2);
        $categories = Category::select('id','name')->get();
        return view('story.admin.stories', compact('stories', 'categories'));
    }
    public function home(Request $request) {
        $stories = Story::with('likes')
        ->orderBy('stories.id', 'desc')
        ->join('users as u','u.id','=','stories.user_id')
        ->when($request->category_id, function ($query, $category_id) {
            return $query->where('stories.category_id', '=', $category_id);
        })
        ->when($request->location, function ($query, $location) {
            return $query->where('stories.location', 'LIKE', "%{$location}%");
        })
        ->select('stories.*', 'u.name as author_name')->paginate(5);

        $categories = Category::select('id','name')->get();
        $locations = Story::select('location')->get();
        return view('home', compact('stories','categories','locations'));

    return view('home');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('story.admin.add-stories',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max: 50'],
            'description' => ['required', 'string','min:100'],
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
        $story = Story::with('likes')
        ->join('users as u','u.id','=','stories.user_id')
                    ->join('categories as c','c.id','=','stories.category_id')
                    ->select('stories.*', 'u.name as author_name','c.name as category_name')
                    ->where('stories.id','=',$id)
                    ->first();
                    return view('story.detail',compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $story = Story::find($id);
        $categories = Category::select('id','name')->get();

        return view('story.admin.add-stories',compact('story','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateStoryStatus(Request $request){
        $data['is_publishe'] = $request->has('is_publishe') ? 1 : 0;
        Story::where('id',$request->story_id)->update($data);
        return back()->with('success','Story has been updated successfully!');
    }
    public function deleteStory(Request $request){

        Story::where('id',$request->story_id)->delete();
        return back()->with('success','Story has been Deleted successfully!');
    }
    public function likeStory(Request $request){
        $query = Like::where('story_id', $request->story_id)->where('user_id', Auth::id());
        if($query->exists()) {
            Like::where('story_id', $request->story_id)->where('user_id', Auth::id())->delete();
        } else {
            Like::create(['story_id'=> $request->story_id, 'user_id' => Auth::id()]);

        }

        return back();
    }


}
