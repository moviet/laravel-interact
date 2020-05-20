<?php

namespace App\Http\Controllers\USER\API;

use Carbon\Carbon;
use App\Bubble\Core\Ruin;
use App\Bubble\Core\Authorizm;
use App\Observers\Repos\Profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PhotoProfileRequest;

class PhotoProfileController extends Controller
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
     * Store a image created resource
     * if validation fails return response
     *
     * @param App\Observers\Repos\Profile $profile
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Redirect
     */
    public function store(PhotoProfileRequest $request, Profile $profile)
    {
        $file = $request->file('profile');
        $name = Carbon::now()->toDateString().'-'.$this->uin().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('/img-profile/'), $name);
        $getImage = '/img-profile/' . $name;
        $load = $profile->update($request, $getImage);

        if ($load) {
            return response()->json([
                'alerts'    => 'success',
                'msg'       => 'Photo has been updated',
                'send'      => $getImage,
            ]);

        } else {
            return response()->json([
                'alerts'    => 'failed',
                'msg'       => 'Invalid image extension',
                'send'      => 'failed',
            ]);            
        } 
    }
}
