<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('last_status', ProjectStatus::CREATED)->latest()->paginate(5);
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'body' => 'required|string',
            'budget' => 'required|number',
        ]);

        if ($validator->failed())
            return back()->withErrors($validator->errors());

        Project::create($validator->getData());
        return to_route('project.index', ['success' => 'Project created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'body' => 'required|string',
            'budget' => 'required|number',
        ]);

        if ($validator->failed())
            return back()->withErrors($validator->errors());

        $project->update($validator->getData());
        return to_route('project.index', ['success' => 'Project updated successfully!']);
    }

    /**
     * Close a project
     */
    public function close(string $id)
    {
        //
    }

    /** 
     * show form for send a proposal
     */
    // public function SendProposal()
    // {
    //     return view('project.SendProposal');
    // }
    /** 
     * register a proposal to database
     */
    // public function RegisterProposal()
    // {

    // }

}
