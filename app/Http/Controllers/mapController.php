<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Place;
use Illuminate\Support\Facades\DB;

class mapController extends Controller
{
    public function getPins()
    {
        $pins = DB::table('places')
            ->join('addresses', 'places.address_id', '=', 'addresses.id')
            ->join('posts', 'places.id', '=', 'posts.place_id')
            ->join('ratings', 'posts.rating_id','ratings.id')
            ->select('addresses.latitude', 'addresses.longitude', 'places.name','ratings.score')
            ->get();

        return view('map', compact('pins'));
    }
    
}
