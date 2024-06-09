<x-layout>
    <x-main-header/>
    <div class="container ">
        <div class="row">
            <div class="col-md-8 offset-md-2 ">
                <div class="card bg-transparent">
                    <div class="card-header text-white border-white">Proposal</div>
                    <div class="card-body">
                        <form action="{{ route('proposals.store',$id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="fId">Your Id</label>
                                <input type="text" class="form-control" id="fId" name="fId"
                                       placeholder="Enter your id">
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                          placeholder="Enter description"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input class="form-control w-25" id="price" name="price" type="number"
                                       placeholder="Enter price"/>
                            </div>
                            <div class="form-group mb-2">
                                <label for="delivery_time">Delivery Time</label>
                                <input class="form-control w-25" id="delivery_time" name="delivery_time" type="date"
                                />
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
