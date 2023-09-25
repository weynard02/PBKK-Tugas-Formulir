<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index() {
        return view('form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'pass' => 'required|min:6',
            'points' => 'required|numeric|between:2.50,99.99',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'name.required' => 'Name is required!',
            'name.max' => 'Maximum 255 characters',
            'email.required' => 'Email is required!',
            'email.email' => 'Email format is not correct',
            'pass.required' => 'Password is required!',
            'pass.min' => 'Minimum 6 characters',
            'points.required' => 'Please fill your points!',
            'points.numeric' => 'Not numeric input',
            'points.between' => 'Number must be between 2,50 to 9,99',
            'image.required' => 'Please submit your image!',
            'image.image' => 'It\'s not image file',
            'image.mimes' => 'format is not correct (jpg, png, jpeg)',
            'image.max' => 'Maximum is 2 MB!'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $name = $request->name;
        $email = $request->email;
        $password = $request->pass;
        $points = $request->points;


        return redirect('/report')->with([
            'success' => 'Form Success!',
            'imagePath' => $imagePath,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'points' => $points
        ]);
    }

    public function show() {
        $name = session('name');
        $email = session('email');
        $password = session('password');
        $points = session('points');
        $imagePath = session('imagePath');

        return view('hasil', compact('name', 'email', 'password', 'points', 'imagePath'));
    }
}
