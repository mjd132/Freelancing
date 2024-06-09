<x-layout>
    <x-main-header/>
    <div class="container">
        <div class="row d-flex justify-content-center">
            @if ($projects->isEmpty())
                <div>No project has been registered yet!</div>
            @else
                <div class="col-8">
                    @foreach ($projects as $project)
                        <div class="card mb-3">
                            <a href="{{route('projects.show', $project)}}" class="card-body">
                                <h5 class="card-title">{{$project->title}}</h5>
                                <p>
                                    {{Str::limit($project->body, 200)}}
                                </p>
                                <h5 class="card-subtitle">
                                    Budget {{$project->budget}}
                                </h5>
                            </a>
                            {{--                            @auth--}}
                            <a href="{{route('proposals.create',$project->id)}}" class="btn btn-outline-success">Send
                                proposal...</a>
                            {{--                            @endauth--}}
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    {{$projects->links()}}
                </div>
            @endif
        </div>
    </div>


</x-layout>
