<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Image;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;



class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_id = Auth::id();
        $apartment = Apartment::where('user_id', $users_id)->get();
        return view('admin.index', compact('apartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $services = Service::all();

        Validator::make($data, [
            'images.*' => "image|unique:images",
            'services.*' => [
              Rule::in($services);
            ],
            'address' => "required|max:255",
            'cover_image' => "required|unique:apartments|image",
            'bathrooms_number' => "required|number",
            'beds_number' => "required|number",
            'square_meters' => "required|number",
            'description' => "required|min:50",
            'rooms_number' => "required|number",
            'title' => "required|max:255",
            'visibility' => "boolean",
        ]);

        $address = $data['address'];
        $geocode=file_get_contents('https://api.tomtom.com/search/2/geocode/'.$address.'.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->position->lat;
        $longitude = $output->results[0]->position->lon;



        $apartment = new apartment;
        $apartment->longitude = $longitude;
        $apartment->latitude = $latitude;
        $apartment->cover_image = $data['cover_image'];
        $apartment->bathrooms_number = $data['bathrooms_number'];
        $apartment->beds_number = $data['beds_number'];
        $apartment->square_meters = $data['square_meters'];
        $apartment->square_meters = $data['square_meters'];
        $apartment->address = $data['address'];
        $apartment->description = $data['description'];
        $apartment->rooms_number = $data['rooms_number'];
        $apartment->title = $data['title'];
        $apartment->visibility = $data['visibility'];

        $apartment->save();

        $apartment_id = $apartment->id;

        if ($request->hasFile('images')) {

        $images = $request->file('images');

        foreach ($images as $image) {

          $name = $image->getClientOriginalName();

          $path = $image->storeAs(
            "images/". $apartment_id,
            $name,
            "public"
          );

          $newImage = new Image();
          $newImage->apartment_id = $apartment_id;
          $newImage->image_path = $path;
          $newImage->save();
        }

        }


        return redirect()->route('admin.index', $apartment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $apartment = Apartment::find($id);

        return view("admin.show", ["apartment" => $apartment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::find($id);

        return view('admin.edit', compact('apartment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $services = Service::all();

        Validator::make($data, [
            'images.*' => "image|unique:images",
            'services.*' => [
              Rule::in($services);
            ],
            'address' => "required|max:255",
            'cover_image' => "required|unique:apartments|image",
            'bathrooms_number' => "required|number",
            'beds_number' => "required|number",
            'square_meters' => "required|number",
            'description' => "required|min:50",
            'rooms_number' => "required|number",
            'title' => "required|max:255",
            'visibility' => "boolean",
        ]);

        $address = $data['address'];
        $geocode=file_get_contents('https://api.tomtom.com/search/2/geocode/'.$address.'.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->position->lat;
        $longitude = $output->results[0]->position->lon;


        $apartment = Apartment::find($id);

        $apartment->longitude = $longitude;
        $apartment->latitude = $latitude;
        $apartment->cover_image = $data['cover_image'];
        $apartment->bathrooms_number = $data['bathrooms_number'];
        $apartment->beds_number = $data['beds_number'];
        $apartment->square_meters = $data['square_meters'];
        $apartment->square_meters = $data['square_meters'];
        $apartment->address = $data['address'];
        $apartment->description = $data['description'];
        $apartment->rooms_number = $data['rooms_number'];
        $apartment->title = $data['title'];
        $apartment->visibility = $data['visibility'];

        $apartment->update();

        $apartment_id = $apartment->id;

        if ($request->hasFile('images')) {

        $images = $request->file('images');

        foreach ($images as $image) {

          $name = $image->getClientOriginalName();

          $path = $image->storeAs(
            "images/". $apartment_id,
            $name,
            "public"
          );

          $newImage = new Image();
          $newImage->apartment_id = $apartment_id;
          $newImage->image_path = $path;
          $newImage->save();
        }

        }


        return redirect()->route('admin.show', $apartment);
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
