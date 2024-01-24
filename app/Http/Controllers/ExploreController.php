<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExploreController extends Controller
{
    public function index()
    {
        // score | nazwa | opis | miejscowosc | adres... | user
        $posts = DB::table('places')
            ->join('addresses', 'places.address_id', '=', 'addresses.id')
            ->join('posts', 'places.id', '=', 'posts.place_id')
            ->join('ratings', 'posts.rating_id','ratings.id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'places.name as placeName','ratings.score', 'ratings.description', 
            'addresses.country', 'addresses.voivodeship', 'addresses.city', 'addresses.street',
            'addresses.number', 'places.id as placeId')
            ->paginate(10);

        return view('explore', compact('posts'));
    }

    public function viewPost(Request $request)
    {
        $id = $request->id;

        $post = DB::table('places')
            ->join('addresses', 'places.address_id', '=', 'addresses.id')
            ->join('posts', 'places.id', '=', 'posts.place_id')
            ->join('ratings', 'posts.rating_id','ratings.id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'places.name as placeName','ratings.score', 'ratings.description', 
            'addresses.country', 'addresses.voivodeship', 'addresses.city', 'addresses.street',
            'addresses.number', 'places.id as placeId', 'addresses.latitude', 'addresses.longitude')
            ->get()
            ->where('placeId', '=', $id);

        return view('viewPost', compact('post'));
    }
}
