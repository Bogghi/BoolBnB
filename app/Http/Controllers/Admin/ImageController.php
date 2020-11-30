<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ImageController extends Controller
{
    public function destroy($id)
    {

        $image = Image::find($id);

        Storage::disk('public')->delete($image->image_path);

        $image->delete();

        return redirect()->route("admin.apartment.edit", $image->apartment_id);
    }
}
