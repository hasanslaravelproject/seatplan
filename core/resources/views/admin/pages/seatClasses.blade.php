@extends('admin.master')

@section('title', 'Seat Class')

@section('body')

    <div class="container-fluid">
        <h2 class="mb-4">Seat Class List</h2>
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        Seat Class list
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
                                <th scope="col">Name</th>
                                <th scope="col">Seat Color</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($seat_classes as $seat_class)

                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$seat_class->name}}</td>
                                    <td>
                                        <span class="label" style="background-color: {{$seat_class->seat_color}}">
                                            {{$seat_class->seat_color}}
                                        </span>
                                    </td>

                                    <td class=" actions">
                                        <a href="" class="btn btn-info btn-sm btn-square"
                                           data-name="{{$seat_class->name}}"
                                           data-seat_color="{{$seat_class->seat_color}}"
                                           data-id="{{$seat_class->id}}"
                                           data-toggle="modal" data-target="#categoryUpdate"
                                        >Edit</a>

                                        <a href="" class="btn btn-danger btn-sm btn-square"
                                           data-id="{{$seat_class->id}}"
                                           data-toggle="modal" data-target="#CategoryDelete">Delete</a>
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



    <!-- delete Alert Modal -->
    <div class="modal modal-danger fade" id="CategoryDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirmation Message</h4>
                </div>
                <form action="{{!empty($seat_class->id) ? route('admin.seat-classes.destroy','delete') : '#'}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">
                        <h4 class="text-center">Are you sure ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Create class Modal -->
    <div class="modal modal-danger fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Create Seat Class</h4>
                </div>
                <form action="{{route('admin.seat-classes.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Class Name</strong></label>
                                <input class="form-control mb-3" type="text" name="name" id="name"
                                       value="" required>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Class Color</strong></label>
                                <input class="form-control mb-3" type="color" name="seat_color" id="seat_color"
                                       value="" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit class Modal -->
    <div class="modal modal-danger fade" id="categoryUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Edit Seat Class</h4>
                </div>
                <form action="{{route('admin.seat-classes.update','update')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="header_subtitle"><strong>Class name</strong></label>
                                <input class="form-control mb-3" type="text" name="name"
                                       id="name" required>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="header_subtitle"><strong>Class Color</strong></label>
                                    <input class="form-control mb-3" type="color" name="seat_color" id="seat_color"
                                           value="" required>
                                </div>
                            </div>
                        </div>
                        <input class="form-control form-control-lg mb-3" type="hidden" name="id" id="id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
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

        $('#categoryUpdate').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);

            var name = button.data('name');
            var seat_color = button.data('seat_color');
            var id = button.data('id');


            var modal = $(this);

            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #seat_color').val(seat_color);
            modal.find('.modal-body #id').val(id);

        });


        {{--script for modal Category Delete--}}

        $('#CategoryDelete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        });


        {{--dropdown active--}}

        $('#busActive li:nth-child(2)').addClass('active');
        $('#busActive').addClass('show');
    </script>
@endsection

