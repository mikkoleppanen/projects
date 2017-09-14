<?php

namespace App\Http\Controllers;

use App\AccountType;
use App\Http\Requests;
use App\Image;
use App\User;
use App\Review;
use Illuminate\Http\Request;
use Auth;
use File;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Authenticated user's profile
     */
    public function show()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
    }

    /**
     * User's profile settings page
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Update user's settings
     */
    public function update(Request $request)
    {
        if($request->hasFile('profile_image')){
            $this->UploadImage($request);
        }

        $receive_newsletter = $request->input('receive_newsletter');

        $request->merge(array('receive_newsletter'=>$receive_newsletter));

        $input = $request->all();

        $user = Auth::User();

        $user->update($input);

        return redirect('/user/profile');
    }

    /**
     * Upload a new image
     */
    public function UploadImage(Request $request){
        $manager = new ImageManager();
        $image = $request->file('profile_image');
        $filename  =  'profileImage.jpg';

        $path = public_path('img/user_images/' . Auth::User()->id);

        if(!File::exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $path = public_path('img/user_images/' . Auth::User()->id . '/' . $filename);

        $manager->make($image->getRealPath())->resize(200, 200)->save($path);
    }

    /**
     * Send contant email to someone
     */
    public function sendMail(Request $request){

        $address = $request->input('email-address');
        $title = $request->input('email-title');
        $message = $request->input('email-body');

        $header =   'From:' . Auth::User()->email . "\r\n" .
                    'Reply-To:' . Auth::User()->email . "\r\n" .
                    "Content-Type: text/plain;charset=utf-8" . "\r\n".
                    'X-Mailer: PHP/' . phpversion();

        mail($address, $title, $message, $header);

        return redirect('/user/' . $request->input('id'));
    }

    /**
     * Add a new review
     */
    public function review(Request $request)
    {
        /**
         * TODO error handling
         */

        $reviewer = Auth::user()->id;
        $reviewee = $request->input('id');
        $score = $request->input('review-rating');
        $title = $request->input('review-title');
        $body = $request->input('review-body');

        $review = Review::create([
            'user_id' => $reviewer,
            'trainer_id' => $reviewee,
            'score' => $score,
            'body' => $body,
            'title' => $title
        ]);

        return redirect('/user/' . $reviewee);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
