<?php

namespace App\Http\Controllers\USER\Pages;

use App\Scopes\Groups;
use App\Bubble\Core\Ruin;
use App\Bubble\Core\UrlMap;
use App\Bubble\Core\Authorizm;
use App\Scopes\Posting as Post;
use App\Scopes\Profile as Hub;
use App\Scopes\Likeable as Like;
use App\Observers\Repos\Posting;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    use Authorizm, UrlMap, Ruin;

    /**
     * Prevent the wrong route request
     *
     * @return \Illuminate\Http\Redirect
     */
    public function index()
    {
        return redirect($this->pathLogin);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  App\Scopes\Hub $hub
     * @param  App\Scopes\Post $post 
     * @param  App\Scopes\Groups $group 
     * @param  App\Observers\Repos\Posting $group
     * @return Illuminate\Http\Redirect
     * @return Illuminate\Http\View
     */
    public function show(int $id, Hub $hub, Post $post, Groups $group, Posting $posting)
    {
        if ($id !== Auth::user()->uid) {
            return $this->backToHome();
        }

        if ($this->isUser() !== 'active') {
            $this->backToLogin();
            return $this->index();
        }

        $this->getToken();
        $token = session($this->token);
        $finder = $hub->findByAll();
        $finderLimit = $hub->findByLimitFriend();
        $profile = $hub->findById($this->identify, $id);

        $groupId = $group->findFriendByGroupId($id);   
        $groupBridge = $group->findFriendByGroupBridge($id); 

        $posts = $post->findById($this->identify, $id);
        $postAll = $post->findByAll();

        return view('user.home',[
            'id'                => $id,
            'admin'             => $this->admin(),
            'token'             => $token,
            'finder'            => $finder,
            'finderLimit'       => $finderLimit,
            'profile'           => $profile,
            'groupId'           => $groupId,
            'groupBridge'       => $groupBridge,
            'posts'             => $posts,
            'postAll'           => $postAll,     
        ]);
    }
}
