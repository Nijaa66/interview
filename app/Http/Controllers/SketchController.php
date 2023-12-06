<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;

class SketchController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('uploads/');
        $image->move($imagePath, $imageName);

        $sketchPath = $this->convertToSketch($imagePath . $imageName);

        return view('result', compact('imageName', 'sketchPath'));
    }
    // private function convertToSketch($imagePath)
    // {
    //     $img = Image::make($imagePath);
    //     $img->greyscale();

    //     $sketchPath = public_path('sketches/') . 'sketch_' . basename($imagePath);
    //     $img->save($sketchPath);

    //     return $sketchPath;
    // }
//     private function convertToSketch($imagePath)
// {
//     $img = Image::make($imagePath);

//     // Convert to grayscale
//     $img->greyscale();

//     // Invert colors to get a white sketch on a black background
//     $img->invert();

//     // Save the sketch
//     $sketchPath = public_path('sketches') . DIRECTORY_SEPARATOR . 'sketch_' . basename($imagePath);
//     $img->save($sketchPath);

//     return $sketchPath;
// }
// private function convertToSketch($imagePath)
// {
//     $img = Image::make($imagePath);

//     // Convert to grayscale
//     $img->greyscale();

//     // Apply a blur to simulate pencil strokes
//     $img->blur(5);

//     // Increase contrast for a more defined sketch
//     $img->contrast(20);

//     // Save the sketch
//     $sketchPath = public_path('sketches') . DIRECTORY_SEPARATOR . 'sketch_' . basename($imagePath);
//     $img->save($sketchPath);

//     return $sketchPath;
// }
private function convertToSketch($imagePath)
{
    $img = Image::make($imagePath);

    // Convert to grayscale
    $img->greyscale();

    // Apply a blur to simulate pencil strokes
    $img->blur(10);

    // Increase contrast for a more defined sketch
    $img->contrast(30);

    // Adjust brightness to fine-tune the sketch appearance
    $img->brightness(10);

    // Save the sketch
    $sketchPath = public_path('sketches') . DIRECTORY_SEPARATOR . 'sketch_' . basename($imagePath);
    $img->save($sketchPath);

    return $sketchPath;
}
}