<x-layout>
    <x-main-header />
    <div class="container">
        <div class="row d-flex justify-content-center">
            @if ($projects->isEmpty())
                <div>No project has been registered yet!</div>
            @else
                <div class="col-8">
                    @foreach ($projects as $project)
                        <div class="card mb-3">
                            <a href="{{route('project.show', $project)}}" class="card-body">
                                <h5 class="card-title">{{$project->title}}</h5>
                                <p>
                                    {{Str::limit($project->body, 200)}}
                                </p>
                            </a>
                            <a href="#" class="btn btn-outline-success">Send proposal...</a>
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