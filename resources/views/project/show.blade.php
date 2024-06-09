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
            Proposals
        </h5>
        @foreach($proposals as $proposal)

            <div class="card">
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
        {{--        @endauth--}}
    </div>
</x-layout>
