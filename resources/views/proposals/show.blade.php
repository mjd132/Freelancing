<x-layout>
    <x-main-header/>
    <div class="container mt-3">
        <h3>{{$proposal->freelancer->name}}</h3>


        <h5 class="mt-4">Description</h5>
        <p class="w-50">
            {{$proposal->description}}
        </p>
        <div class="border-start ps-2 border-warning">
            <h6 class="mb-0">OFFERED PRICE</h6>
            <h3 class="text-info">
                @currency($proposal->price )
            </h3>
        </div>
        <h5 class="mt-4">
            Delivery Time
        </h5>
        <p>
            At {{$proposal->delivery_time->format('Y-m-d')}}
        </p>
        @if($proposal->isAccepted())

            <p class="text-success">
                Accepted At {{$proposal->accepted_at}}
            </p>
        @elseif($proposal->isPending())
            <a href="{{route('proposals.accept',$proposal->id)}}" class="btn btn-info ">Accept Proposal</a>

        @endif
        <a href="{{route('proposals.edit',$proposal->id)}}" class="btn btn-outline-warning">Edit Proposal</a>
        <form action="{{route('proposals.delete',$proposal->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete Proposal</button>
        </form>
    </div>
</x-layout>
