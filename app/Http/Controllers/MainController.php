<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Exception\ValidationException;
use App\Http\Controllers\SugarController;
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
            'username' => 'required|alphaNum',
            'password' => 'required|alphaNum|min:3'

        ]);

        $instance_url = "http://127.0.0.1/SugarPro-Full-8.0.0/rest/v10";
        $username = $request->get('username');
        $password = $request->get('password');

        //Login - POST /oauth2/token
        $auth_url = $instance_url . "/oauth2/token";



        $oauth2_token_arguments = array(
            "grant_type" => "password",
            //client id - default is sugar.
            //It is recommended to create your own in Admin > OAuth Keys
            "client_id" => "sugar",
            "client_secret" => "",
            "username" => $username,
            "password" => $password,
            //platform type - default is base.
            //It is recommend to change the platform to a custom name such as "custom_api" to avoid authentication conflicts.
            "platform" => "base"
        );

        $auth_request = curl_init($auth_url);
        curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($auth_request, CURLOPT_HEADER, false);
        curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($auth_request, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        //convert arguments to json
        $json_arguments = json_encode($oauth2_token_arguments);
        curl_setopt($auth_request, CURLOPT_POSTFIELDS, $json_arguments);

        //execute request
        $oauth2_token_response = curl_exec($auth_request);


        if (array_key_exists("access_token", json_decode($oauth2_token_response))) { // if authentication successful
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
