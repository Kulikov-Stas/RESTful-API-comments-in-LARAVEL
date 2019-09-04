<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UsersResource
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
     * @param  \App\User  $author
     * @return UsersResource
     */
    public function show(User $author)
    {
        UsersResource::withoutWrapping();
        return new UsersResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(User $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $author)
    {
        //
    }
}
