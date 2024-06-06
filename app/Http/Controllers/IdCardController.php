<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use Illuminate\Http\Request;

class IdCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Create a new empty instance
        $userId=new IdCard();
        return view('IdCard.create',compact('userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        return $request->all();
        $data=$request->validate([
            'full_name'=>'required|string',
            'email'=>'required|string|email|unique:card_details,email',
            'address'=>'required|string',
            'dob'=>'required|date',
            'expiry_date'=>'required|date',
            'role'=>'required|string',
            'photo'=>'required|image|mimes:jpeg,png,jpg|max:800000'
        ]);
        
        // dd($data);
        $imagePath=$request->file('photo');

        // Getting the extension of image like jpg,jpeg
        $extension=$imagePath->getClientOriginalExtension();

        // Getting image name and concat the extension
        $imageName=basename('imagePath') ."." . $extension;

        $path='images/photos/';

        // Moving the image to the required path
        $imagePath->move($path,$imageName);

        // Storing the path of the image in db
        $data['photo']=$path;

        $userId=IdCard::create($data);

        return redirect()->route('id-card.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
