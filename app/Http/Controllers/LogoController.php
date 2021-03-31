<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::all();
        return view('logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logo = Logo::findOrFail($id);
        return view('logos.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logo = Logo::findOrFail($id);
        $this->validate($request,[
            'alt' => ['required', 'max:25'],
            'image' => ['required'],
        ]);
            $logo->alt = $request->alt;
            if ($request->hasFile('image')) {
               $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename =time().'.'.$extension;
                $file->move('public/img/logo/', $filename);
                $logo->image = $filename;
            }
            $logo->save();
        if (!empty($logos->id)) {
            $notification = array(
                'message' => 'Logo upload successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
         return redirect()->route('admin.logo.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
