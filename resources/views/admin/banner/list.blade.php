
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
                a.btn.btn-danger.trash {
                     margin-left: 950px;
                     margin-top: -145px;
                }
                svg.w-5.h-5 {
                        width: 2%;
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
            
                           <!-- <a href="{{url('customer/trash')}}" class="btn btn-danger trash">Trash Page</a> -->
                         <a href="{{route('admin/banner/add')}}" class="btn btn-info">add</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SrNo</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                        


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists as $key=>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->title}}</td>
                                        <td><img src="{{ url('image/'.$value->image) }}" width="50"></td>
                                        <td>
                                            <a href="{{route('admin/banner/edit',$value->id)}}" class="btn btn-success">Edit</a>
                                            |
                                            <a href="{{route('admin/banner/delete',$value->id)}}"  onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-danger">Delete</a>

                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {!! $lists->links() !!}
                            

                        </div>
                     </div>
                </div>
            </div>
            <!-- Table End -->


        @endsection