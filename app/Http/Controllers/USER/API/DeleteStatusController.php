<?php

namespace App\Http\Controllers\USER\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Observers\Repos\Posting As Post;

class DeleteStatusController extends Controller
{
    /**
     * Redirect user to login.
     *
     * @var string
     */
    protected $redirectPath = '/login';

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function remove(int $id, $data, $token, Post $post)
    {
        if ($id !== Auth::user()->uid) {
            return redirect($this->redirectPath);
        }
        
        if ($token !== csrf_token()) {
            return redirect()->back();
        }

        $delete = $post->destroy($id, $data);

        if (!$delete) {
            return redirect()->back();
        }

        return redirect()->back();
    }
}
