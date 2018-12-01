<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CollegeComment;

class AdminCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $id=null)
    {
        
        switch($type){
            case "CollegeComments":
                $comments = $this->getCollegeComments();
                return view('admin.comments.college.index',compact('comments'));
                break;
            default:
                echo "Nothing to show. Something went wrong";
        }
    }

    public function replies($type, $id){
        switch($type){
            case "CollegeCommentReplies":
                $replies = $this->getCollegeCommentsReply($id);
                return view('admin.comments.replies.college.index',compact('replies'));
                break;
            default:
                echo "Nothing to show. Something went wrong";
        }
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

    private function getCollegeComments(){
        $comments = CollegeComment::paginate(7);
        return $comments;
    }

    public function getCollegeCommentsReply($id){
        $comment = CollegeComment::findOrFail($id);
        $replies = $comment->replies;
        return $replies;
    }

}
