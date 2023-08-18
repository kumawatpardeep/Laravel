
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
            
                           <!-- <a href="{{route('cotegory')}}" class="btn btn-success trash">Add Category</a> -->

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SubCategory</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $value)

                                    <tr>
                                @foreach($value->getSubCategory as $datata)

                                        <td>{{@$datata->name}}</td>
                                        @endforeach
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