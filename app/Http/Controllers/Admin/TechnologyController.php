<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techs = Technology::orderByDesc('id')->paginate(8);

        return view('admin.technologies.index', compact('techs'));
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
    public function store(StoreTechnologyRequest $request)
    {
        //dd($request->all());

        $val_data = $request->validated();




        $slug = Str::slug($request->name, '-');

        $val_data['slug'] = $slug;
        //dd($val_data);

        $tech = Technology::create($val_data);

        return to_route('admin.technologies.index')->with('message', "Technology '$tech->name' created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->name, '-');

        $val_data['slug'] = $slug;
        //dd($val_data);

        $technology->update($val_data);

        return to_route('admin.technologies.index')->with('message', "Technology '$technology->name' updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return to_route('admin.technologies.index')->with('message', "Technology '$technology->name' deleted successfully!");
    }
}
