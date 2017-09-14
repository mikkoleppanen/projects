<?php

namespace App\Http\Controllers;

use App\AccountType;
use App\Http\Requests;
use App\Newsletter;
use App\User;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Validator;


class HomeController extends Controller
{
    /**
     * Front page
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Alpha landing page
     */
    public function landing()
    {
        return view('pages.landing');
    }

    /**
     * Trainer page
     */
    public function trainers()
    {
        return view('pages.search')->with('users',
            User::where('account_type', 'like', AccountType::Trainer)->get());
    }

    /**
     * Blog page
     */
    public function blogs()
    {
        return view('pages.blogs');
    }

    /**
     * Forum page
     */
    public function forum()
    {
        return view('pages.forum');
    }

    /**
     * Info page
     */
    public function info()
    {
        return view('pages.info');
    }

    /**
     * Search for users
     *
     * @return Search page with list of users and cities
     */
    public function search(Request $request, $query = null)
    {
        if ($request->method() == "POST") {
            $query = $request->input('search');
            return redirect('/search/' . $query);
        }

        $trainers = User::where('account_type', 'like', AccountType::Trainer)
            ->where(function ($user) use ($query) {
                $user->where('first_name', 'like', '%' . $query . '%')
                    ->orWhere('last_name', 'like', '%' . $query . '%');
            })->get();

        $cities = City::where('name', 'like', '%' . $query . '%')->get();

        return view('pages.search')->with('users', $trainers)->with('cities', $cities);
    }

    /**
     * Subscribe to newsletter
     */
    public function subscribe(Request $request){

        $data = [];
        $data['email'] = $request->input('email');

        $validator = Validator::make($data, [
            'email' => 'required|email|max:254',
        ]);

        if ($validator->fails())
        {
            return redirect('/')->with('error', 'Virheellinen sähköposti');
        }

        $email = Newsletter::where('email', '=', $data['email'])->first();
        if (is_null($email))
        {
            $subscription = new Newsletter();
            $subscription->email = $data['email'];
            $subscription->save();

            return redirect('/')->with('message', 'Success!');
        }

        return redirect('/')->with('error', 'Sähköposti on jo lisätty!');
    }

    /**
     * Get user's profile by id
     *
     * @param $id User's id
     * @return The user's profile if found. 404 error otherwise.
     */
    public function user($id)
    {
        $user = User::find($id);

        if (is_null($user))
        {
            abort(404);
        }
        else
        {
            return view('user.profile', compact('user'));
        }
    }
}
