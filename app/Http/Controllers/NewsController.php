<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;
use App\NewsCategory;
use App\News;
use App\User;
use App\Role;
use DB;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::all();
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();

        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $news->create($input);
        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = NewsCategory::pluck('name', 'id')->all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $news->update($input);

        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get News Categories
     *
     */
    public function getCategories()
    {
        $categories = NewsCategory::all();
        return view('admin.news.categories.index',compact('categories'));
    }

    /**
     * Store News Categories
     *
     */
    public function storeCategories(Request $request)
    {
        $input = $request->all();
        NewsCategory::create($input);
        return redirect()->back();
    }

    /**
     * Delete News Category
     *
     */
    public function destroyCategory($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    /**
     * Get News List to show on website public page
     *
     */
    public function getNewsList()
    {
        $news = News::paginate(10);
        // echo "<pre>";
        // print_r($news);
        return view('news.index',compact('news'));
    }

    /**
     * Get Single News
     *
     */
    public function getSingleNews($id)
    {
        $news = News::findOrFail($id);
        $comments = $news->comments()->where('is_active',1)->get();
        return view('news.single', compact('news','comments'));
    }

}
