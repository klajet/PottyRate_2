<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Place;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UploadController extends Controller
{
    public function insert(Request $request)
    {
        // $request->validate([
            // 'title' => 'required',
            // 'latitude' => 'required',
            // 'longitude' => 'required',
            // 'placeName' => 'required',
            // 'score' => 'required',
            // 'description' => 'required',
            // 'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        // ]);
        // $imageName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('images'), $imageName);

        // Log::info(public_path('images'));

        // $img = new Image;
        // $img->title = $imageName;
        // $img->path = (public_path('images'). $imageName);
        // $img->save();

        $address = new Address;
        $address->Country = $request->Country;
        $address->Voivodeship = $request->Voivodeship;
        $address->City = $request->City;
        $address->Street = $request->Street;
        $address->Number = $request->Number;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;

        $address->save();

        $place = new Place;
        $place->name = $request->placeName;
        $place->address_id = $address->id;

        $place->save();

        // Log::info($request->score);

        $rating = new Rating;
        $rating->score = $request->score;
        $rating->description = $request->description;

        $rating->save();

        $post = new Post;
        $post->user_id = Auth::User()->getId();
        $post->place_id = $place->id;
        $post->rating_id = $rating->id;

        $post->save();

        return redirect('dashboard')->with('status', 'Added');
    }
}
