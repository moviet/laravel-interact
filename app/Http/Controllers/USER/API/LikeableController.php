<?php

namespace App\Http\Controllers\USER\API;

use App\Scopes\Posting;
use App\Bubble\Core\Likeable;
use App\Http\Controllers\Controller;
use App\Observers\Repos\Posting as Post;
use App\Observers\Repos\Likeable as Like;
use App\Http\Requests\User\LikeableRequest;

class LikeableController extends Controller
{
    use Likeable;

    /**
     * Limiting Access Query
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Store data likeable and update status
     * 
     * @param App\Observers\Repos\Posting $post
     * @param App\Observers\Repos\Likeable $like
     * @param App\Http\Requests\User\LikeableRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LikeableRequest $request, Like $like, Post $post)
    {
        if ($request->input('status') === $this->likes) {
            
            $likes = $like->show($request);
            $liked = $request->input('like');
  
            if (empty(count($likes))) {
                $like->store($request, 1);
                $post->update($request, 'likes+1', 'dislikes');

            } else {
                $like->update($request, 1);
                $post->update($request, 'likes+1', 'dislikes');  
            }

            return response()->json([
                'msg'     => 'liked',
                'like'    => $liked,
            ]);
        
        }  elseif ($request->input('status') === $this->liked) {

            $like->destroy($request);
            $posting = $post->update($request, 'likes-1', 'dislikes');

            if ($request->input('like') == 0) {
                $msg = 'unliked';
                $liked = $request->input('like');
            
            } elseif ($request->input('like') >= 1) {
                $msg = 'justunliked';
                $liked = $request->input('like') - 1;
            } 

            if ($posting) {
                return response()->json([
                    'msg'     => $msg,
                    'like'    => $liked,
                ]);
            }
        } 
    }
}
