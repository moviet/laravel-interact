<?php

namespace App\Http\Controllers\USER\Pages;

use App\Scopes\Groups;
use App\Scopes\Posting;
use App\Bubble\Core\Ruin;
use App\Bubble\Core\UrlMap;
use App\Scopes\Profile as Hub;
use App\Bubble\Core\Authorizm;
use App\Scopes\Approved as Acc;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
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
     * @param  int $id
     * @param  App\Scopes\Hub $hub
     * @param  App\Scopes\Acc $hub
     * @param  App\Scopes\Groups $group 
     * @param  App\Scopes\Posting $post 
     * @return \Illuminate\Http\View
     */
    public function show(int $id, Hub $hub, Acc $acc, Groups $groups, Posting $posting)
    {
        if ($this->isUser() !== 'active') {
            $this->backToLogin();
            return $this->index();
        }

        $this->getToken();
        $token = session($this->token);

        // Profile
        $profile = $hub->findByFirstId($this->identify, $id);
        $finder = $hub->findNotById($this->identify, $id);
        
        // Approvals
        $gates = $acc->findFriendByWait($this->admin(),  $id); 
        $links = $acc->findFriendByApprove($this->admin(), $id); 
  
        // Approvals
        $push = $acc->getWait($this->admin()); 
        $pull = $acc->getApproved($this->admin()); 
        
        // Friend Group
        $group = $groups->findFriendById($this->admin(), $id); 
        $friend = $groups->findFriendByGates($this->admin(), $id); 
        $circles = $groups->findFriendByGroup($id, $id);  

        // Friend Posting
        $postAll = $posting->findIdByAll($id);
        $posts = $posting->findPostById($id);

        return view('user.profile',[
            'id'        => $id,
            'admin'     => $this->admin(),
            'token'     => $token,
            'profile'   => $profile,
            'finder'    => $finder,
            'circles'   => $circles,
            'gates'     => $gates,
            'links'     => $links,
            'push'      => $push,
            'pull'      => $pull,
            'group'     => $group,
            'friend'    => $friend,
            'postAll'   => $postAll, 
            'posts'     => $posts,          
        ]);   
    }
}
