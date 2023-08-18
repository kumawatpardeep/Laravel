
@extends('admin/include/default')
@section('content')

            <!-- Table Start -->
            <script>
                function deletedata(){
                    var confirems=confirm("are you sure for delete");

                    alert(confirems);
                }
            </script>
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
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>

                            @endif
            <a href="{{url('admin/users/add')}}" class="btn btn-info addbtn">Add</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SrNo</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->password}}</td>
                                        <td>{{$value->mobile}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>
                                            <a href="{{url('admin/users/edit/'.$value->id)}}" class="btn btn-success">Edit</a>
                                            |
                                            <a href="{{url('admin/users/delete/'.$value->id)}}" onclick="deletedata()" class="btn btn-danger">Delete</a>

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