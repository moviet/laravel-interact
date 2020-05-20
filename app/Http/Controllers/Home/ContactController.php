<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\Contact;
use App\Bubble\Core\Ruin;
use Illuminate\Support\Str;
use App\Bubble\Core\Identicated;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    use Identicated, Ruin;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function index()
    {
        return view('pages.contact');
    }

     /**
     * Display a listing of the resource.
     *
     * @var int $id 
     * @return App\Models\Contact
     */
    public function show($id)
    {
        return Contact::where($this->identify, $id)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * you can test with response()->json($post, 200);
     * @param  array $valid
     * @return \Illuminate\Http\Redirect
     * 
     * You can test development using JsonResources
     * @param array \Class Contact->toArray ($request);
     * @return \App\Http\Resources\Contact class for JSON
     */
    protected function store(ContactRequest $request)
    {
        $post = Contact::create([
            'id'        => $this->randInt(8),
            'name'      => $request->input('name'),
            'email'     => Str::lower($request->input('email')),
            'division'  => $request->input('division'),
            'message'   => $request->input('message'),
            'token'     => Str::uuid(),
            'posted_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
            'ip'        => $request->ip(),

        ], $request->validated());

        if ($post) {
            $request->session()->flash($this->senderFlash, 'success');

            // SEND EMAIL (Credensial on .env)
            // $post->sendEmail($request['email'], $this->show($post['id']));
        }

        return redirect()->back();
    }
}
