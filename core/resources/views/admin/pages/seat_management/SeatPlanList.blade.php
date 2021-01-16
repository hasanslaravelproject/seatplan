@extends('admin.master')

@section('title', 'Seat Plan')

@section('body')

    <div class="container-fluid">
        <h2 class="mb-4">Seat Plan List</h2>
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Seat Plan list
                        <a href="{{route('admin.seat-classes.create')}}"
                           class="btn btn-primary btn-md float-right customs_btn" data-toggle="modal"
                           data-target="#create">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                    <div class="card-body ">
                        <table id="dataTableId" class="table table-hover " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Bus Name</th>
                                <th scope="col">Total Seat</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($seat_plans as $seat_plan)

                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$seat_plan->bus->name}}</td>
                                    <td>{{$seat_plan->seat_quantity}}</td>

                                    <td class=" actions">

                                        <a href="{{route('admin.SeatClassGenPage',$seat_plan->id)}}"
                                           class="btn btn-primary btn-sm btn-square">Add Class</a>

                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    {{--script for modal Category edit--}}
    <script>
        //data table
        $(document).ready(function () {
            $('#dataTableId').DataTable();
        });

        {{--dropdown active--}}
        $('#SeatMActive li:nth-child(1)').addClass('active');
        $('#SeatMActive').addClass('show');
    </script>
@endsection

