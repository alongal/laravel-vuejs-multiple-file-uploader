<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'image|mimes:jpg,jpeg,png,gif,bmp',
            'title' => 'nullable|string'
        ]);

        $image = new Image();
        $image->title = $request->title;
        $image->file_name = $this->uploadFile($request);
        $image->save();

        return redirect('/')->with('message', 'Your receipt successfully uploaded!<br/>Thank you so much 🤗');
    }

    protected function uploadFile($request)
    {
        if ($request->hasFile('file_name')) {
            $image = $request->file('file_name');
            $fileName = $image->getClientOriginalName();
            $destimation = storage_path('app/public');

            if ($image->move($destimation, $fileName)) {
                return $fileName;
            }
        }

        return null;
    }
}
