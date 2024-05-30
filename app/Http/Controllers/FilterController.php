<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FilterController extends Controller
{
    /**
     * Display projects list filtered by type or technology
     */
    public function filter($filter)
    {

        $previous =  url()->previous();

        if (Str::contains($previous, 'types')) {

            $filtered = Type::find($filter);
            $projects = Project::orderByDesc('id')->where('type_id', $filtered->id)->paginate(8);
            //dd($projects);
        } else if (Str::contains($previous, 'technologies')) {

            $filtered = Technology::find($filter);
            $projects = $filtered->projects->sortByDesc('id');
            //dd($projects);
        }

        return view('admin.projects.projects-filtered', compact('projects', 'filtered'));
    }
}
