<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Landmarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LandmarkController extends Controller
{
    private $globalsearch;

    public function login(Request $request)
    {
        $userdata = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($userdata)) {
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'failed' => 'Email/Password do not match.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $landmarklist = DB::table('resordlmark')->paginate(12);

        return view('welcome', ['landmarklist' => $landmarklist]);
    }

    /**
     * Allows users to search for specific entries from the resource.
     */
    public function index_filtering(Request $request)
    {
        $searchquery = $request->searchquery;

        $search = DB::table('resordlmark')->where('ResOrdNum', 'like', "%$searchquery%")
                                          ->orwhere('Title', 'like', "%$searchquery%")
                                          ->paginate(12);

        if (!empty($searchquery))
        {
            return view('search-results', ['landmarklist' => $search]);

        } else {
            return view('search-results', ['landmarklist' => $search]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_landmark');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $landmarkdata = $request->validate([
            'ResOrdNum' => ['required', 'unique:resordlmark', 'max:10', 'regex:/^[(0-9)-]*$/'],
            'Title'     => ['required','max:8000'],
            'pdf'       => ['required','mimes:pdf','max:10240']
        ]);

        if ($request->hasFile('pdf')){
            $filename = $request->file('pdf')->getClientOriginalName();
            Storage::disk('public')->putFileAs($request->ResOrdNum, $request->file('pdf'), $filename);
        }

        DB::table('resordlmark')->insert([
            'ResOrdNum' => $request->ResOrdNum,
            'Title'     => $request->Title,
            'ImgName'   => $request->file('pdf')->getClientOriginalName(),
            'landmark'  => 1
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $currLandmark = DB::table('resordlmark')->where('ResOrdID', $id)->first();

        return view('view_landmark',[
            'landmark' => $currLandmark
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $currLandmark = DB::table('resordlmark')->where('ResOrdID', $id)->first();

        // dd($currLandmark);

        return view('update_landmark',[
            'landmark' => $currLandmark
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!empty($request->Landmark)){
            $isLandmarked = 1;
        } else{
            $isLandmarked = 0;
        }

        /*
         * Grabs Existing Filename and assigns it to currFile with the .pdf file extension
         */
         $landmarkfile = DB::table('resordlmark')->where('ResOrdID', $id)->first('ImgName');
         $currFile     = $landmarkfile->ImgName;

        $landmarkdata = $request->validate([
            'ResOrdNum' => ['required', 'unique:resordlmark,ResOrdNum,'. $id.',ResOrdID', 'max:10', 'regex:/^[(0-9)-]*$/'],
            'Title'     => ['required','max:8000'],
            'pdf'       => ['nullable', 'mimes:pdf','max:10240']
        ]);

        if ($request->hasFile('pdf')){
            $filename = $request->file('pdf')->getClientOriginalName();
            $currFile = $filename;
            Storage::disk('public')->putFileAs($request->ResOrdNum, $request->file('pdf'), $filename);
        }

        $UpdateLandmark = DB::table('resordlmark')
        ->where('ResOrdID', $id)->update([
            'ResOrdNum' => $request->ResOrdNum,
            'Title'     => $request->Title,
            'ImgName'   => $currFile,
            'landmark'  => $isLandmarked
        ]);

        return redirect()->route('home')->with('message', 'Landmark Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $RemoveLandmark = DB::table('resordlmark')
        ->where('ResOrdID', $id)->update([
            'landmark' => 0
        ]);

        return redirect()->route('home')->with('message', 'Landmark Withdrawn.');
    }
}
