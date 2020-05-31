<?php

namespace App\Http\Controllers\USER\API;

use Carbon\Carbon;
use App\Bubble\Core\Ruin;
use App\Bubble\Core\Authorizm;
use App\Scopes\Likeable as Like;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\User\StatusRequest;
use App\Observers\Repos\Posting as Post;

class StatusController extends Controller
{
    use Authorizm, Ruin;

    /**
     * Limiting Access Query
     *
     * @return \Illuminate\Http\Redirect
     */
    public function index()
    {
        return redirect()->back();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Redirect
     */
    public function store(Auth $auth, StatusRequest $request, Post $post)
    {
        if ($request->input('capture') !== session($this->token)) {
            return back()->withErrors(
                ['capture' => 'Oops! please try again..']
            );

        } else {
            if ($request->hasFile('photos')) {
                $file = $request->file('photos');
                $name = 'interact-'.Carbon::now()->toDateString().'-'.$this->uin().'.'.$file->getClientOriginalExtension();

                $file->move(public_path('/img-status/'), strtolower($name));
                $getImage = '/img-status/' . $name;

                $post->store($auth, $request, $getImage, $this->uin());

                if (!$post) {
                    return back()->withErrors([
                        'photos' => 'Invalid image extension'
                    ]);
                }

            } elseif (!$request->hasFile('photos') && $request->input('status')) {
                $post->store($auth, $request, null, $this->uin());
  
            } else {
                return back()->withErrors([
                    'status' => 'Oops! your status is empty',
                ]);
            }
        }

        return redirect()->back();        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(int $id, $data, $token, Post $post, Like $like)
    {
        if ($id !== Auth::user()->uid) {
            return redirect()->back();
        }

        if ($token !== csrf_token()) {
            return redirect()->back();
        }

        // Just cleaning public storage for demo
        $checkImage = $post->show($data); 
        $imagePath = $checkImage->image;

        if (!is_null($imagePath)) {
            File::delete(public_path($imagePath));
        }

        $post->destroy($id, $data);
        $like->destroy($data);        

        return redirect()->back();
    }
}
