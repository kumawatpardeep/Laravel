@extends('admin/include/default')

@section('content')


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Cotegary Tables</h6>
                          <form method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name">
                                <label for="floatingInput">Name</label>
                                <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                                <span>
                            </div>

                               <button class="btn btn-info" type="submit">Add</button>

                          </form>
                        </div>

                    </div>
                   
                    
                </div>
            </div>
            <!-- Form End -->
@endsection

          