<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFromRequest;
use App\Comment;

class CommentsController extends Controller
{
    public function newComment(CommentFromRequest $request){
    	$comment = new Comment(array(
    		'post_id' => $request->get('post_id'),
    		'content' => $request->get('content'),
    	));
    	
    	$comment->save();
    	return redirect()->back()->with('status', 'Your comment has been created !');

    }
}
