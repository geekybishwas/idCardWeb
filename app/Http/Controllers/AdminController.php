<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $id_card_details=
        // Assgning this two fields empty at first,coz at first there is no idCards and search input
        $search="";
        $idCards=IdCard::orderBy('created_at','desc')->get();
        // $idCards=[];
        // dd('as:' . $idCards);
        return view('admin.dashboard',compact('search','idCards'));
    }  

}
