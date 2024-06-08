

<x-layout>
    <x-main-header />
    <div class="container mt-3">
        <h3>{{$project->title}}</h3>


        <h5 class="mt-4">Description</h5>
        <p class="w-50">
            {{$project->body}}
        </p>
        <div class="border-start ps-2 border-warning">
            <h6 class="mb-0">BUDGET</h6>
            <h3 class="text-info">
                {{$project->budget}} $
            </h3>
        </div>
        @foreach($project->proposals as $proposal)
            {{$proposal->price}}
            <div class="card">
                <div class="card-title">
                    {{$proposal->freelancer->name}}
                </div>
                <div class="card-subtitle"></div>
                <div class="card-body"></div>
            </div>
        @endforeach

        @auth
        <a href="#" class="btn btn-success mt-4">Send Proposal</a>
        @endauth
    </div>
</x-layout>
