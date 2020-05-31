<?php

namespace App\Http\Controllers\USER\API;

use Carbon\Carbon;
use App\Bubble\Core\Ruin;
use App\Bubble\Core\Authorizm;
use App\Observers\Repos\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $checkImage = $profile->show();
        $imagePath = $checkImage->avatar;

        if (!is_null($imagePath)) {
            File::delete(public_path($imagePath));
        }

        $file = $request->file('profile');
        $name = 'interact-'.Carbon::now()->toDateString().'-'.$this->uin().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('/img-profile/'), strtolower($name));
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

    public function remove(PhotoProfileRequest $request, Profile $profile)
    {
        $checkImage = $profile->show();
        $imagePath = $checkImage->avatar;

        if (!is_null($imagePath)) {
            File::delete(public_path($imagePath));
        }

        $profile->update($request, null);

        return redirect()->back();
    }
}
