<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImage;

class SliderController extends Controller
{
    public function apiIndex()
    {
        return response()->json(SliderImage::latest()->get());
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = '/uploads/' . $filename;

            $slider = SliderImage::create([
                'image_url' => $imageUrl,
            ]);

            return response()->json([
                'id' => $slider->id,
                'image_url' => $slider->image_url,
                'message' => 'Slider image added successfully'
            ], 201);
        }

        return response()->json(['error' => 'Image file is required'], 400);
    }

    public function apiDestroy($id)
    {
        $slider = SliderImage::findOrFail($id);
        $slider->delete();

        return response()->json(['message' => 'Slider image deleted successfully']);
    }
}
