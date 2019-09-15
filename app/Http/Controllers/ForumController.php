<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Post;
use App\reply;
use App\User;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateReplyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundExcpetion;

class ForumController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPost(){
    	$categories= Category::all();

    	return view('includes.question',compact('categories'));
    }
    public function postQuestion(CreatePostRequest $request){

    	$post = new Post();
        $post->user_id = Auth::user()->id;
    	$post->category_id = $request->get('category');
    	$post->title = $request->get('title');
    	$post->body = $request->get('body');
    	$post->keywords = $request->get('keywords');

    	$post->save();

        notify()->flash('<h3>Post saved successfully</h3>','success', ['timer'=> 2000]);


    	return redirect('/');

    }
    public function viewMyPost(){
        $id = Auth::user()->id;
        $posts = Post::where('user_id','=',$id)->get();

        return view('includes.viewmypost',compact('posts'));

    }
    public function viewPost($slug){

        try {
            $post= Post::Where('slug', '=',$slug)->first();

            return view('includes.reply',compact('post'));
        } catch (ModelNotFoundExcpetion $ex) {
            
            return redirect('/');
        }

    }
    public function saveReply(CreateReplyRequest $request){

        $post = Post::where('slug','=', $request['slug'])->first();

        if($post){
            $reply = new reply;
            $reply->post_id = $post->id;
            $reply->user_id = Auth::user()->id;
            $reply->body = $request->get('body');

            $reply->save();
            notify()->flash('<h3>Reply has been saved</h3>','success', ['timer'=> 2000]);

            return redirect()->back();
        }
        return redirect('/');
    }
     public function deleteQuestion(Request $request){

        try {
            $post= Post::findOrFail($request['post_id']);
            if(Auth::user()->id == $post->user_id || Auth::user()->level == 'admin')
            {
                $post->delete(); 
            }
             notify()->flash('<h3>Post has been deleted</h3>','success', ['timer'=> 2000]);


            return redirect()->back();
            
        } catch (ModelNotFoundExcpetion $ex) {
            
            return redirect('/');
        }

    }
    public function deleteReply(Request $request){

         try {
            $reply= reply::findOrFail($request['reply_id']);
            if(Auth::user()->id == $reply->user_id || Auth::user()->level == 'admin')
            
            {
                $reply->delete(); 
            }
             notify()->flash('<h3>Reply has been deleted</h3>','success', ['timer'=> 2000]);

            return redirect()->back();
            
        } catch (ModelNotFoundExcpetion $ex) {
            
            return redirect('/');
        }
    }
    public function getEditPost($id){

        try {
            $post= Post::findOrFail($id);

            if(Auth::user()->id == $post->user_id)
            {
                $categories = Category::all();

                return view('includes.edit_post',compact('post','categories')); 
            }

            return redirect()->back();
            
        } catch (ModelNotFoundExcpetion $ex) {
            
            return redirect('/');
        }
    }
    public function saveEditPost(CreatePostRequest $request){

         try {
            $post= Post::findOrFail($request['post_id']);

            if(Auth::user()->id == $post->user_id)
            {
                $post->user_id = Auth::user()->id;
                $post->category_id = $request['category'];
                $post->title = $request['title'];
                $post->body = $request['body'];
                $post->keywords = $request['keywords'];

                $post->save();
                notify()->flash('<h3>Post has been edited</h3>','success', ['timer'=> 2000]);

                return redirect('/');
            }
            
        } catch(ModelNotFoundExcpetion $ex) {
            
            return redirect('/');
        }
    }
    public function viewUser(){

        try {
            $user= User::all();

            if(Auth::user()->level == 'admin' || Auth::user()->level=='user'){

            return view('includes.view_user',compact('user'));

            }
            } catch (ModelNotFoundExcpetion $ex) {
            
            return redirect('/');
        }

    }
     public function deleteUser(Request $request){

         try {
            $user= User::findOrFail($request['user_id']);
            if( Auth::user()->level == 'admin')
            
            {
                $user->delete(); 
            }
             notify()->flash('<h3>User has been deleted</h3>','success', ['timer'=> 2000]);

            return redirect()->back();
            
        } catch (ModelNotFoundExcpetion $ex) {
            
            return redirect('/');
        }
    }
}
