<x-layout>
    <x-main-header/>
    <div class="container">
        <div class="row d-flex justify-content-center">
            @foreach($proposals as $proposal)

                <div class="card m-2">
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
            <div>
                {{$proposals->links()}}
            </div>
        </div>
    </div>

</x-layout>
