<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\College;
use Auth;
use App\CollegeComment;
use App\CollegeCommentReply;

class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::paginate(10);
        $recentColleges = College::latest()->limit(3)->get();
        $topComments = CollegeComment::latest()->limit(3)->get();
        // return $colleges;
        // return $recentColleges;
        return view('college.index',compact('colleges','recentColleges','topComments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function getCollege($id){
        $college = College::findOrFail($id);
        $comments = $college->comments()->where('is_active',1)->get();
        return view('college.single', compact('college','comments'));
    }

    public function storeCollegeComment(Request $request){
        $user = Auth::user();

        $data = [
            'college_id' => $request->college_id,
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->body,
            'user_id' => $user->id
        ];

        CollegeComment::create($data);
        $request->session()->flash('comment_message','Your message has been submitted and waiting moderation');
        return redirect()->back();
    }

    public function storeCollegeCommentReply(Request $request){
        $user = Auth::user();

        $data = [
            'college_comment_id' => $request->college_comment_id,
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->body,
            'user_id' => $user->id
        ];

        CollegeCommentReply::create($data);
        $request->session()->flash('comment_message','Your reply has been submitted and waiting moderation');
        return redirect()->back();

    }

    // Get Comments List for a college on admin page
    public function getSingleCollegeComments($id){
        $college = College::findOrFail($id);
        $comments = $college->comments;
        // echo "<pre>";
        // print_r($comments);
        // exit;
        return view('admin.comments.college.show', compact('comments'));
    }

    // Get College Comment Replies for Admin
    public function getCollegeCommentsReply($id){
        $comment = CollegeComment::findOrFail($id);
        $replies = $comment->replies;
        return view('admin.comments.replies.college.index', compact('replies'));
    }

    // Approve or Reject College Comment Replies request
    public function updateCollegeCommentReply(Request $request, $id){
        $comment = CollegeCommentReply::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    // Delete College Comment Reply
    public function deleteCollegeCommentReply($id){
        $comment = CollegeCommentReply::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Approve or Reject College Comment  request
    public function updateCollegeComment(Request $request, $id){
        $comment = CollegeComment::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    // Delete College Comment 
    public function deleteCollegeComment($id){
        $comment = CollegeComment::findOrFail($id)->delete();
        return redirect()->back();
    }
    
}
