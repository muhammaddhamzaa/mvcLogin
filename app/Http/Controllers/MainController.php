<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * redirects to login view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index() //view login page at start
    {
        return view('login');
    }

    /**
     * CheckLogin: Authenticates the user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    function checklogin(Request $request)
    {
        $this->validate($request, [ //validate if the requirements are fulfilled
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'

        ]);

        $user_data = array( //get data from form
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if (Auth::attempt($user_data)) { // if authentication successful
            return redirect('main/successlogin');

        } else {
            return back()->with('error', 'Wrong Login Details!');
        }
    }

    /**
     * SuccessLogin: redirects to success page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function successlogin()
    { //go to successlogin view
        return view('successlogin');
    }

    /**
     * Logout: redirects to main page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function logout()
    { //go back to main view
        Auth::logout();
        return redirect('main');
    }
}
