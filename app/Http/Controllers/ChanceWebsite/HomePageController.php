<?php

namespace App\Http\Controllers\ChanceWebsite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\Material;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve all categories from the database
        $categories = Category::all();

        // Get the 'query' input parameter from the request
        $query = $request->input('query');

        // Render the 'structure.Home' view and pass data to it
        return view('ChanceWebsite.Home', compact('categories', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Code for showing the form for creating a new resource goes here
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Code for storing a newly created resource in storage goes here
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Code for displaying a specified resource goes here
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Code for showing the form for editing a specified resource goes here
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Code for updating a specified resource in storage goes here
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Code for removing a specified resource from storage goes here
    }
}
