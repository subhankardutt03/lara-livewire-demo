<div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <div class="form-outline mb-4">
                        <form action="" wire:submit.prevent="AddComment">
                            <input type="text" id="addANote" class="form-control" placeholder="Type comment..."
                                wire:model="newComment" />
                            @error('newComment')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('message')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <br>
                            {{-- wire:click="AddComment" --}}
                            <button type="submit" class="btn btn-primary form-label" for="addANote">Add
                                comment</button>
                        </form>

                    </div>

                    @foreach ($comments as $comment)
                    <div class="card mb-4">
                        <div class="card-body">
                            <p>{{$comment->body}}<span><button href="" class="btn btn-sm btn-danger float-end"
                                        wire:click="Remove({{$comment->id}})"><i
                                            class="fa-solid fa-xmark"></i></button></span></p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <h4>{{$comment->user->name}}</h4>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <p class="small text-muted mb-0">{{$comment->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    {{$comments->links()}}

                </div>
            </div>
        </div>
    </div>
</div>