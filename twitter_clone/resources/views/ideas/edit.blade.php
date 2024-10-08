@section('title','Edit Idea')


<x-layout>
    <div class="card">
        <div class="w-100 d-flex align-items-center justify-content-center">
            <div class="col-10">
                <form class="form mt-5" action="{{route('ideas.update',$idea->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <h3 class="text-center text-dark">Edit</h3>
                    <div class="form-group">
                        <label class="text-dark">Content:</label><br>
                        <textarea type="text" name="content" id="contenr"
                            class="form-control">{{$idea->content}}</textarea>
                    </div>
                    <div class="w-100 mt-2 d-flex justify-content-end gap-2 align-items-center my-2">
                        <a href="{{route('ideas.show',$idea->id)}}" class="text-dark">Go Back</a>
                        <button class="btn btn-success btn-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>