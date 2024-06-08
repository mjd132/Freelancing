<x-layout>
    <x-main-header />
    <div class="container ">
        <div class="row">
            <div class="col-md-8 offset-md-2 ">
                <div class="card bg-transparent">
                    <div class="card-header text-white border-white">Create Post</div>
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter title">
                            </div>
                            <div class="form-group mb-2">
                                <label for="content">Description</label>
                                <textarea class="form-control" id="content" name="body" rows="5"
                                    placeholder="Enter content"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="content">Budget</label>
                                <input class="form-control w-25" id="content" name="budget" type="number"
                                    placeholder="Enter budget" />
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
