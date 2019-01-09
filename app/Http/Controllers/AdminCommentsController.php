<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CollegeComment;
use App\News;
use App\NewsComment;
use App\NewsCommentReply;

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
            case "NewsComments":
                $comments = $this->getNewsComments();
                return view('admin.comments.news.index',compact('comments'));
                break;
            case "SingleNewsComments":
                $comments = $this->getSingleNewsComments($id);
                return view('admin.comments.news.index', compact('comments'));
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
            case "NewsCommentReplies":
                $replies = $this->getNewsCommentsReply($id);
                return view('admin.comments.replies.news.index',compact('replies'));
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
        return 'world';
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

    // Get All News Comments for Admin
    private function getNewsComments(){
        $comments = NewsComment::paginate(7);
        return $comments;
    }

    // Get Single News Comments for Admin
    private function getSingleNewsComments($id){
        $news = News::findOrFail($id);
        $comments = $news->comments()->paginate(7);
        // echo "<pre>";
        // print_r($comments);
        // exit;
        return $comments;
    }

    // Get News Comment Replies for Admin
    public function getNewsCommentsReply($id){
        $comment = NewsComment::findOrFail($id);
        $replies = $comment->replies;
        return $replies;
    }

    // Approve or Reject News Comment Replies request
    public function updateNewsCommentReplies(Request $request, $id){
        $comment = NewsCommentReply::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    // Delete News Comment Replies
    public function deleteNewsCommentReplies($id){
        $comment = NewsCommentReply::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Approve or Reject News Comment  request
    public function updateNewsComment(Request $request, $id){
        $comment = NewsComment::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    // Delete News Comment 
    public function deleteNewsComment($id){
        $comment = NewsComment::findOrFail($id)->delete();
        return redirect()->back();
    }

}
