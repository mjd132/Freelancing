<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Models\Project;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('last_status', ProjectStatus::PUBLISHED)->latest()->paginate(5);
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
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'body' => 'required|string',
            'budget' => 'required|number',
        ]);

        Project::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'budget' => $request->get('budget'),
            'last_status' => ProjectStatus::PUBLISHED,
        ]);

        return to_route('project.index', ['success' => 'Project created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $project = Project::query()->findOrFail($id);
        $proposals = $project->proposals()->orderByDesc('created_at')->take(5)->get();

        return view('project.show')->with([
            'project' => $project,
            'proposals' => $proposals,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $project = Project::query()->findOrFail($id);
        if ($project->isDone()) {
            return to_route('projects.show', $id)->with('error', 'Project is done. Cant update');
        }
        return view('project.edit')->with([
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::query()->findOrFail($id);
        if ($project->isDone()) {
            return to_route('projects.show', $id)->with('error', 'Project is done. Can\'t update');
        }
        $validatedReq = $request->validate([
            'title' => 'required|string|max:100',
            'body' => 'required|string|max:10000',
            'budget' => 'required|numeric',
        ]);

        $project->update($validatedReq);

        return to_route('home')->with(['success' => 'Project updated successfully!']);
    }


    public function close($id)
    {
        $project = Project::findOrFail($id);
        $project->update(['last_status' => ProjectStatus::DONE]);
        return to_route('projects.show', $id)->with(['success' => 'Project updated successfully!']);
    }

    public function abandon($id)
    {
        $project = Project::findOrFail($id);
        if ($project->last_status === ProjectStatus::DOING || $project->last_status === ProjectStatus::ACCEPTED) {
            $project->update(['last_status' => ProjectStatus::ABANDONED->value, 'freelancer_id' => null]);
            return to_route('projects.show', $id)->with(['success' => 'Project updated successfully!']);
        }
        return to_route('projects.show', $id)->with(['error' => 'Project update failed!']);

    }


}
