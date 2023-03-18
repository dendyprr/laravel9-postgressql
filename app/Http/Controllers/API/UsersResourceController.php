<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UsersResourceController extends Controller
{

    // LIST RESOURCE
    public function index()
    {
        $response = Http::get('https://reqres.in/api/unknown');

        return $response->json();
        // return $response->json_();
    }


    // single resource
    public function show($id)
    {
        $response = Http::get('https://reqres.in/api/unknown/2');

        return $response->json();
    }

}
