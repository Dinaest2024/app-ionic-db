<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Gift;
use Validator;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'name' => 'required',
        'cover' => 'required|image|max:2048',
        'price'=> 'required',
        'status' => 'required',
        'description'=> 'required',
        ]);

        if ($validator->fails()){
            return Response(['error' => $validator->errors()], 422);
        }

        $input = $request->all();
        if ($request->hasFile('cover')){
        $filenameWithExt = $request->file('cover')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = $request->file('cover')->storeAs('public/gifts', $fileNameToStore);
        $input['cover'] = '/gifts/'.$fileNameToStore;

        }

        $gift = Gift::create($input);

        return Response([
        'success' => 1,
        'data'=> $gift

        ])
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
