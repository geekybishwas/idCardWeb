<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IdCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        // Using null operator
        $search=$request->input('search') ?? "";

        // dd($search);
        
        // If search is found it will get the search idCards
        if($search!=""){
            $idCards=IdCard::where('full_name','LIKE',"$search%")->get();
            // dd($search);
        }
        else
        {
            // Accessing the id card details in desc order by created_at
            $idCards=IdCard::orderBy('created_at','desc')->get();
        }
        return view('admin.dashboard',compact('idCards','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("s");
        // Checking the admin logged in or not
        if(Auth::user())
        {
            //Create a new empty instance
            $idCard=new IdCard();
            return view('IdCard.create',compact('idCard'));
        }
        else{
            return redirect()->route('admin.register.form');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return view('IdCard.show');
        // dd($request->all());
        // return $request->all();
        $data=$request->validate([
            'full_name'=>'required|string',
            'college_name'=>'required|string',
            'email'=>'required|string|email|unique:card_details,email',
            'address'=>'required|string',
            'dob'=>'required|date',
            'expiry_date'=>'required|date',
            'position'=>'required|string',
            'photo'=>'required|image|mimes:jpeg,png,jpg|max:800000'
        ]);
        
        // // dd($data);
        // $imagePath=$request->file('photo');

        // // Getting the extension of image like jpg,jpeg
        // $extension=$imagePath->getClientOriginalExtension();

        // // Getting image name and concat the extension
        // $imageName=basename('imagePath') ."." . $extension;

        // $path='images/photos/';

        // // Moving the image to the required path
        // $imagePath->move($path,$imageName);

        // // Storing the path of the image in db
        // $data['photo']=$path;

        
        // return redirect()->route('idCard.index');
        
        // Store in the storage/app/public/images/photos
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images/photos', 'public');
            $data['photo'] = $path;
        }
        IdCard::create($data);
        // dd($data);

        return redirect()->route('admin.index')->with('success','IdCard Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(IdCard $idCard)
    {
        return view('IdCard.show',compact('idCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IdCard $idCard)
    {
        return view('IdCard.create',compact('idCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data=$request->validate([
            'full_name'=>'required|string',
            'college_name'=>'required|string',
            'email'=>'required|string|email',
            'address'=>'required|string',
            'dob'=>'required|date',
            'expiry_date'=>'required|date',
            'position'=>'required|string',
            'photo'=>'required|image|mimes:jpeg,png,jpg|max:800000'
        ]);

        try{

            $idCard=IdCard::findOrFail($id);
            
            //If request has a file 
            if ($request->hasFile('photo')) {
                // Delete the old photo from the folder
                if ($idCard->photo) {
                    Storage::disk('public')->delete($idCard->photo);
                }
                // Getting the path for new uploaded image
                $path = $request->file('photo')->store('images/photos', 'public');
                
                $data['photo'] = $path;
                
                $idCard->update($data);
                
                return redirect()->route('admin.index')->with('success','IdCard updated succesfully');
            }
            else{
                return redirect()->route('admin.index')->with('error','No File uploaded');
            }
        }
        catch(ModelNotFoundException $e){
            return redirect()->route('admin.index')->with('error','IdCard not found.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdCard $idCard)
    {
        $idCard->delete();
        return redirect()->route('admin.index');
    }
}
