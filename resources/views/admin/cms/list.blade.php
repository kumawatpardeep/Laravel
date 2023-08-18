
@extends('admin/include/default')
@section('content')

            <!-- Table Start -->
           
            <style>
                .addbtn{
                    margin-left:1100px;
                    margin-top:-100px;

                }
            </style>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Table</h6>
                            <!-- @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>

                            @endif -->
                            <a href="{{route('admin/cms/add')}}" class="btn btn-info">Add</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SrNo</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>

                                        <th scope="col">Status</th>
                                      
                                        <th scope="col">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->description}}</td>
                                        <td>
                                            @if($value->status=='1')
                                            <a href="{{route('status-update' ,$value->id)}}" class="btn btn-success">Active</a>
                                                @else
                                                <a href="{{route('status-update' ,$value->id)}}" class="btn btn-danger">Inactive</a>
                                                @endif
                                        </td>
                                        
                                        <td>
                                            <a href="{{url('cms/editss',$value->id)}}" class="btn btn-success">Edit</a>
                                            |
                                            <a href="{{route('cms/delete',$value->id)}}" onclick="return confirm('Are You Sure for delete data')" class="btn btn-danger">Delete</a>

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