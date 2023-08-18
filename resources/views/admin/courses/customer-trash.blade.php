@extends('admin/include/default')
@section('content')


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Basic Table</h6>
                            <a href="{{route('admin/coursess/list')}}" class="btn btn-success">Go Back List</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($lists as $key=>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->description}}</td>

                                        <td><img src="{{ url('image/'.$value->image) }}" width="50"></td>
                                        <td>
                                            <a href="{{url('admin/courdess/customerTarsh/restore/'.$value->id)}}" class="btn btn-success">Restore</a>
                                            |
                                            <a href="{{url('admin/courdess/forceDelete/'.$value->id)}}" onclick="deletebtn()" class="btn btn-danger">Delete</a>

                                        </td>


                                    </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                   
                   
                    
                    
                    
                </div>
            </div>
            <!-- Table End -->

@endsection
         