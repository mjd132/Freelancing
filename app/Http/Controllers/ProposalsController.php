<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Enums\ProposalStatus;
use App\Models\Project;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalsController extends Controller
{


    public function create($projectId)
    {
        $project = Project::findOrFail($projectId);

//        if ($project->last_status === ProjectStatus::ACCEPTED || $project->last_status === ProjectStatus::DONE) {
//            return to_route('projects.show', $project->id);
//        }

        return view('proposals.create')->with('id', $projectId);
    }

    public function store(Request $request, $projectId)
    {

        $project = Project::findOrFail($projectId);

        // TODO : check user has not registered a proposal before
//        if ($project->status == ProjectStatus::ACCEPTED || $project->state == ProjectStatus::DONE) {
//            return to_route('projects.show', $project->id);
//        }

        $this->validate($request, [
            'fId' => 'required|exists:users,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'delivery_time' => 'required|date|after_or_equal:today',
        ]);

        Proposal::create([
            'freelancer_id' => $request->get('fId'),
            'project_id' => $projectId,
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'delivery_time' => $request->get('delivery_time'),
        ]);
        return to_route('projects.show', $projectId);
    }

    public function show($id)
    {
        $proposals = Proposal::findOrFail($id);
        return view('proposals.show')->with('proposal', $proposals);
    }

    public function showAll($projectId)
    {
        $proposals = Proposal::where('project_id', $projectId)->latest()->paginate(10);
        return view('proposals.showAll')->with('proposals', $proposals);
    }

    public function edit($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposals.edit')->with('proposal', $proposal);
    }

    public function update(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

        $this->validate($request, [
            'fId' => 'required|exists:users,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'delivery_time' => 'required|date|after_or_equal:today',
        ]);

        $proposal->update([
            'freelancer_id' => $request->get('fId'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'delivery_time' => $request->get('delivery_time'),
        ]);

        return to_route('proposals.show', $proposal->id)->with('success', 'Proposal updated successfully.');
    }

    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->delete();
        return to_route('projects.show', $proposal->project_id)->with('success', 'Proposal deleted successfully.');
    }

    /**
     *
     *  Change proposal status to accepted
     */
    public function accept($id)
    {
        $proposal = Proposal::findOrFail($id);
        /**policies
         * if (!$proposal->project->freelancer_id === null) {
         * return to_route('projects.show', $proposal->project_id);
         * //check own proposal is not accepted
         * if ($proposal->isAccepted()) {
         * return to_route('proposals.show', $proposal->id)->withErrors(['acceptError' => 'Proposal is already accepted']);
         * }
         * //check other proposals is not accepted
         * foreach ($proposal->project->proposals as $prop) {
         * if ($prop->isAccepted()) {
         * return to_route('proposals.show', $proposal->id)->withErrors(['acceptError' => 'Other proposal is already accepted']);
         * }
         * }
         * }
         **/
        $proposal->update(['status' => ProposalStatus::ACCEPTED->value, 'accepted_at' => now()]);

        $proposal->project->update(['last_status' => ProjectStatus::ACCEPTED->value, 'freelancer_id' => $proposal->freelancer_id]);

        return to_route('projects.show', $proposal->project_id);
    }


}
