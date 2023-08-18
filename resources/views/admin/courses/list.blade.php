@extends('admin/include/default')
@section('content')


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Basic Table</h6>
                            <a href="{{route('admin/courdess/customerTarsh')}}" class="btn btn-danger">Trash Page</a>
                            <a href="{{route('admin/coursess/add')}}" class="btn btn-info">Add</a>

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
                                            <a href="{{route('admin/courdess/edit',$value->id)}}" class="btn btn-success">Edit</a>
                                            |
                                            <a href="{{route('admin/courdess/delete',$value->id)}}" onclick="deletebtn()" class="btn btn-danger">Trash</a>

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
         