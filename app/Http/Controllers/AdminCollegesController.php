<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Collegecategory;
use App\Collegeregion;
use App\Photo;
use App\College;
use App\CollegeDetail;
use App\CollegeComment;

class AdminCollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = CollegeDetail::paginate(15);;
        return view('admin.colleges.index',compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Collegecategory::all();
        $regions =  Collegeregion::all();
        return view('admin.colleges.create', compact('categories','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $collegeDetail = new CollegeDetail();
        $input = $request->all();
        $collegeDetail->create($input);
        
        // return $request->all();
        // $college = new College();
        // $input['name'] = $request->name;
        // $input['region_id'] = $request->region_id;
        // $input['body'] = $request->body;
        // $input['is_govt'] = $request->is_govt=='yes'?'1':'0';
        // $input['is_central'] = $request->is_central=='yes'?'1':'0';


        // if($file = $request->file('photo_id')){
        //     $name = time() . $file->getClientOriginalName();
        //     $file->move('images', $name);
        //     $photo = Photo::create(['file' => $name]);
        //     $input['photo_id'] = $photo->id;
        // }

        // $collegeId = $college->create($input);
        // $college = College::findOrFail($collegeId['id']);
        // $college->categories()->sync($request->category_id);
        return redirect('admin/colleges');
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
        
        $categories = Collegecategory::all();
        $regions =  Collegeregion::all();
        $college = College::findOrFail($id);
        return view('admin.colleges.edit', compact('categories','regions','college'));
    }


    public function editCollegeDetails($id) {
        $college = CollegeDetail::findOrFail($id);
        return view('admin.colleges.edit', compact('college'));
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
        $collegeDetail = CollegeDetail::findOrFail($id);
        $input = $request->all();
        $collegeDetail->update($input);

        // print_r($request->is_govt);
        // exit;

        // $college = College::findOrFail($id);
        // $input['name'] = $request->name;
        // $input['region_id'] = $request->region_id;
        // $input['body'] = $request->body;
        // $input['is_govt'] = $request->is_govt=='yes'?'1':'0';
        // $input['is_central'] = $request->is_central=='yes'?'1':'0';


        // if($file = $request->file('photo_id')){
        //     $name = time() . $file->getClientOriginalName();
        //     $file->move('images', $name);
        //     $photo = Photo::create(['file' => $name]);
        //     $input['photo_id'] = $photo->id;
        // }

        // $collegeId = $college->update($input);
        // $college = College::findOrFail($id);
        // $college->categories()->sync($request->category_id);
        return redirect('/admin/colleges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = CollegeDetail::findOrFail($id);
        // $college = College::findOrFail($id);
        // if($college->photo){
        //     $photo = Photo::findOrFail($college->photo->id);
        //     unlink($_SERVER['DOCUMENT_ROOT']. $college->photo->file);
        //     $photo->delete();
        // }
        
        $college->delete();
        return redirect('/admin/colleges');
    }

   
}
