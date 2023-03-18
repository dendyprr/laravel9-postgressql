<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'   => 'required',
        ]);

        if($validator->fails()) {

            return response()->json([
                'message' => 'Missing Password'
            ],401);

        } else {

            $response = Http::post('https://reqres.in/api/register', [
                'email' => 'eve.holt@reqres.in',
                'password' => 'pistol',
            ]);

            return $response->json();

        }

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'   => 'required',
        ]);

        if($validator->fails()) {

            return response()->json([
                'message' => 'Missing Password'
            ],401);

        } else {
            $response = Http::post('https://reqres.in/api/login', [
                'email' => 'eve.holt@reqres.in',
                'password' => 'cityslicka',
            ]);

            return $response->json();
        }
    }

    public function index()
    {
        // menampilkan data
        $response = Http::get('https://reqres.in/api/users?page=2');

        return $response->json();
    }


    // STORE DATA
    public function store(Request $request)
    {
        $response = Http::post('https://reqres.in/api/users', [
            'name' => 'morpheus',
            'job' => 'leader',
        ]);

        return $response->json();
    }


    public function show($id)
    {
        $response = Http::get('https://reqres.in/api/users/2');

        return $response->json();
    }


    public function updatePUT()
    {
        $put = Http::put('https://reqres.in/api/users/2', [
            'name' => 'morpheus',
            'job' => 'zion resident',
        ]);
        return $put->json();

    }

    public function updatePATCH()
    {

        $patch = Http::patch('https://reqres.in/api/users/2', [
            'name' => 'morpheus',
            'job' => 'zion resident',
        ]);


        return $patch->json();
    }


    public function destroy($id)
    {
        $response = Http::delete('https://reqres.in/api/users?page=2');

        return $response->json();
    }

    // delayed data
    public function delayed()
    {
        $response = Http::get('https://reqres.in/api/users?delay=3');
        return $response->json();

    }
}
