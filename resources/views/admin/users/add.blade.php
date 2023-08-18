@extends('admin/include/default')

@section('content')


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Tables</h6>
                          <form method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name">
                                <label for="floatingInput">Full Name</label>
                                <span class="text-danger">
                                @error('name')
                                {{$message}}
                                @enderror
                                <span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email">
                                <label for="floatingInput">Email address</label>
                                <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                                <span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="Password" name="password">
                                <label for="floatingPassword">Password</label>
                                <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                                <span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="mobile" name="mobile">
                                <label for="floatingPassword">Mobile</label>
                                <span class="text-danger">
                                @error('mobile')
                                {{$message}}
                                @enderror
                                <span>
                            </div>
                           
                            
                            <div class="form-floating">
                                <textarea class="form-control" name="address" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Address</label>
                                <span class="text-danger">
                                @error('address')
                                {{$message}}
                                @enderror
                                <span>
                            </div><br>

                               <button class="btn btn-info" type="submit">Add</button>

                          </form>
                        </div>

                    </div>
                   
                    
                </div>
            </div>
            <!-- Form End -->
@endsection

          