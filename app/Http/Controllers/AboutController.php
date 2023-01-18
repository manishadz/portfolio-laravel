<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();

        return view('about.index', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check request
        // dd($request->all());
        // validate data
        $validated = $request->validate([
            'description' => 'required',
            'image' => 'sometimes|required|image',
        ]);

        // to upload image
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $extenstion;
            $file->move('uploads/about/', $imageName);
            $validated['image'] = $imageName;
        }
        // to check first item present or not?
        $about = About::first();
        if ($about) {
            // if yes then update that record
            About::updateOrCreate(['id' => About::first()->id], $validated);
        } else {
            //otherwire create new one
            About::create($validated);
        }

        // to display session message
        session()->flash('success', 'About successfully');
        // to reidrect
        return redirect()->route('about.index');
    }



   
}
