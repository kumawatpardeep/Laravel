
@extends('admin/include/default')
@section('content')
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Table</h6>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>

                            @endif
            
                           <a href="{{route('cotegory')}}" class="btn btn-success trash">Add Category</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SrNo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>
                                            @if($value->status=='1')
                                            <a href="{{route('update-status',$value->id)}}" class="btn btn-success">Active</a>
                                            |@else
                                            <a href="{{route('update-status',$value->id)}}"  class="btn btn-danger">InActive</a>
                                             @endif
                                        </td>
                                        <td>
                                            <a href="{{route('catorgay/edit',$value->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('catorgay/delete',$value->id)}}" onclick="return confirm('Are You Sure For Delete Categorys')" class="btn btn-danger">Delete</a>
                                            <a href="{{route('relation/view',$value->id)}}" class="btn btn-success">View</a>

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