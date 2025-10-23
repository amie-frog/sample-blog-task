<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $articles=Article::all();
        // return view('dashboard',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::get();
        return view('articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'title'=>'required',
            'full_text'=>'required',
            'categories_id'=>'required'
        ]);
        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('images', 'public');
            $data['image']=$path;
        }

        $data['user_id']=Auth::id();
        Article::create($data);

        return redirect()->route('dashboard')->with('success','New Article created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $article=Article::with('category')
                        ->where('id',$id)->first();
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $article=Article::with('category')
                        ->where('id',$id)
                        ->first();
        $categories=Category::all();
        return view('articles.edit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Article $article,Request $request)
    {
        //
        $data=$request->validate([
            'title'=>'required',
            'full_text'=>'required',
            'categories_id'=>'required'
        ]);

        if($request->hasFile('image'))
        {
           $path=$request->file('image')->store('images','public');
           $data['image']=$path;
        }

        $data['user_id']=Auth::user()->id;
        // $article=Article::where('id',$id)->first();
        $article->update($data);
        return redirect()->route('dashboard')->with('success','Article updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dd($id);
    }
}
