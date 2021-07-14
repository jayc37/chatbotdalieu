<?php

namespace App\Http\Controllers;

use App\Models\inbox;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $data = $request->toArray();

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show($usersid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(inbox $inbox)
    {
        //
    }
}