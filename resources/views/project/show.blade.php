<x-layout>
    <x-main-header/>
    <div class="container mt-3">

        <h3>{{$project->title}}</h3>
        <h6 class="ms-3">STATUS - {{$project->last_status->name}}</h6>


        <h5 class="mt-4">Description</h5>
        <p class="w-50">
            {{$project->body}}
        </p>
        <div class="border-start ps-2 border-warning">
            <h6 class="mb-0">BUDGET</h6>
            <h3 class="text-info">
                @currency($project->budget )
            </h3>
        </div>
        <h5 class="mt-4">
            Proposals - <sub class="d-inline align-baseline"><a
                    href="{{route('projects.showAllProposals',$project->id)}}">Show all proposals</a></sub>
        </h5>
        @foreach($proposals as $proposal)
            <div class="card m-2 w-50">
                <a href="{{route('proposals.show',$proposal->id)}}" class="card-body">
                    <div class="card-title">
                        {{$proposal->freelancer->name}}
                    </div>
                    <div class="card-subtitle">
                        Price: @currency($proposal->price)
                    </div>
                    <div>{{$proposal->created_at->diffForHumans()}}</div>
                </a>
            </div>
        @endforeach

        {{--        @auth--}}
        <a href="{{route('proposals.create',$project->id)}}" class="btn btn-success mt-4">Send Proposal</a>
        <a href="{{route('projects.edit',$project->id)}}" class="btn btn-outline-warning mt-4">Edit project</a>

        <a href="{{route('projects.close',$project->id)}}" class="btn btn-outline-info mt-4">Close project</a>
        <a href="{{route('projects.abandon',$project->id)}}" class="btn btn-outline-danger mt-4">Abandon project</a>

        {{--        @endauth--}}
    </div>
</x-layout>
