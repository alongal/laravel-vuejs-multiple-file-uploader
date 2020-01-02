<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('welcome', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_name.*' => 'image|mimes:jpg,jpeg,png,gif,bmp',
        ]);

        $images = $this->uploadFiles($request);

        foreach ($images as $imageFile) {
            list($fileName, $title) = $imageFile;

            $image = new Image();
            $image->title = $title;
            $image->file_name = $fileName;
            $image->save();
        }

        return redirect('/')->with('message', 'Your receipt successfully uploaded!<br/>Thank you so much 🤗');
    }

    protected function uploadFiles($request)
    {
        $uploadedImages = [];

        if ($request->hasFile('file_name')) {
            $images = $request->file('file_name');

            foreach ($images as $image) {
                $uploadedImages[] = $this->uploadFile($image);
            }
        }

        return $uploadedImages;
    }

    protected function uploadFile($image)
    {
        $originalFileName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $fileNameOnly = pathinfo($originalFileName, PATHINFO_FILENAME);
        $fileName = Str::slug($fileNameOnly) . '-' . time() . '.' . $extension;

        $uploadedFileName = $image->storeAs('public', $fileName);

        return [$uploadedFileName, $fileNameOnly];
    }
}
