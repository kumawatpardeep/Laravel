@extends('admin/include/default')

@section('content')


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Tables</h6>
                          <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" value="{{$users->title}}" id="title" name="title">
                                <label for="floatingInput">Title</label>
                                <span class="text-danger">
                                @error('title')
                                {{$message}}
                                @enderror
                                <span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" value="{{$users->description}}" id="title" name="description">
                                <label for="floatingInput">Description</label>
                                <span class="text-danger">
                                @error('description')
                                {{$message}}
                                @enderror
                                <span>
                            </div>
                            <div class="form-floating mb-3">
                            <img src="{{ url('image/'.$users->image) }}" width="50">
                            <input type="hidden" name=text_hidden value="{{$users->image}}">
                            <input type="file" class="form-control" id="photo" name="image">
                                <label for="floatingInput">Image</label>
                                <span class="text-danger">
                                @error('image')
                                {{$message}}
                                @enderror
                                <span>
                            </div>
                            
                            
                           
                            
                            

                               <button class="btn btn-info" type="submit">Update</button>

                          </form>
                        </div>

                    </div>
                   
                    
                </div>
            </div>
            <!-- Form End -->
@endsection

          