<?php

namespace App\Http\Controllers;

use App\Models\AlumniRegisteration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Support\Str;

class AluminiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = CountryListFacade::getList('en');
        return view('visitors.alumni-registration', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'martial' => 'required',
            'phn_no' => 'required',
            'profession' => 'required',
            'email' => 'required',
            'batch' => 'required',
            'last_class' => 'required',
            'leaving_year' => 'required',
            'home_town' => 'required',
            'country' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $alumni = new AlumniRegisteration;
        $alumni->first_name = $request->first_name;
        $alumni->last_name = $request->last_name;
        $alumni->dob = $request->dob;
        $alumni->gender = $request->gender;
        $alumni->martial = $request->martial;
        $alumni->phn_no = $request->phn_no;
        $alumni->profession = $request->profession;
        $alumni->email = $request->email;
        $alumni->batch = $request->batch;
        $alumni->last_class = $request->last_class;
        $alumni->leaving_year = $request->leaving_year;
        $alumni->home_town = $request->home_town;
        $alumni->country = $request->country;

        // image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filName = Str::random() . '.' . $file->getClientOriginalExtension();
            $subFolder = date('FY');
            $destinationPath = Storage::path('public/alumni-images/' . $subFolder);
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            if ($file->move($destinationPath, $filName)) {
                //file moved and save to db
                $dbPath = 'alumni-images/' . $subFolder . '/' . $filName;
                $alumni->image = $dbPath;
                $alumni->save();
            }
        }

        // docs
        if ($request->hasFile('docs')) {
            $file = $request->file('docs');
            $filName = Str::random() . '.' . $file->getClientOriginalExtension();
            $subFolder = date('FY');
            $destinationPath = Storage::path('public/alumni-docs/' . $subFolder);
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            if ($file->move($destinationPath, $filName)) {
                //file moved and save to db
                $dbPath = 'alumni-docs/' . $subFolder . '/' . $filName;
                $alumni->docs = $dbPath;
                $alumni->save();
            }
        }

        return redirect()->back()->with('success', trans('data_store_successfully'));
        $alumni->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
