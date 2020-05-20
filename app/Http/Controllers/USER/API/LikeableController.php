<?php

namespace App\Http\Controllers\USER\API;

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
            $liked = (int) $request->input('like');
            $postLike = ($liked + 1);

            $likeable = $like->show($request);

            if (empty(count($likeable))) {
                $like->store($request, 1);
                $post->update($request, $postLike);
            } 

            if ($liked >= 1) {
                $response = $request->input('admin').' and '.$liked.' others';

            } else {
                $response = $request->input('admin');
            }

            return response()->json([
                'msg'   => 'liked',
                'like'  => $response,
                'thumb' => 'liked',
                'counts' => $postLike,
            ]);
        
        }  elseif ($request->input('status') === $this->liked) {
            $likeable = $like->show($request);

            if (!empty(count($likeable))) {
                $like->destroy($request);

                if ((int) $request->input('like') <= 1) {
                    $msg = 'unliked';
                    $liked = 0;
                    $posting = $post->update($request, null);
                
                } elseif ((int) $request->input('like') > 1) {
                    $msg = 'justunliked';
                    $liked = (int) $request->input('like') - 1;
                    $posting = $post->update($request, $liked);
                } 

                if ($posting) {
                    return response()->json([
                        'msg'     => $msg,
                        'like'    => $liked,
                        'thumb' => 'likes',
                        'counts' => $liked,
                    ]);
                }
            }  
        } 
    }
}
