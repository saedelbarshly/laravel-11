<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        // $region = Region::find(3);
        return Region::find(3)->districts;

    //    return District::whereHas('city' , function ($query) use ($region) {
    //         $query->where('region_id', $region->id);
    //     })->get();
    }

    public function one(){
        $user = User::find(1);
        return $user->userCountry;
    }

    public function show(Region $region){
        return $region->districts;
    }
}
