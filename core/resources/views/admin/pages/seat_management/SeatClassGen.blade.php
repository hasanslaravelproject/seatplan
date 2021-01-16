@extends('admin.master')

@section('title', 'Seat Class')

@section('body')
    <div class="container-fluid">
        <h2 class="mb-4"> Class Generation for <span class="text-info">{{$seat_plan_By_id->bus->name}}</span> Bus
            <a href="" class="btn btn-primary btn-md float-right customs_btn">
                <i class="fa fa-list"></i> Seat Class
            </a>
        </h2>
    </div>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                Class Gen
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.SeatClassGenProcess')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlSelect1"><strong>Class</strong></label>
                                <select class="form-control"
                                        name="seatClass_id" required>
                                    <option value="">Select Class</option>
                                    @foreach($seat_classes as $seat_class)
                                        <option value="{{$seat_class->id}}">{{$seat_class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="seat_plan_id" value="{{$seat_plan_By_id->id}}">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlSelect1"><strong>Select Seat</strong></label>
                                <select class="form-control js-example-basic-multiple"
                                        name="seats[]" multiple="multiple" required>
                                    @for ($i = 1; $i <= $seat_plan_By_id->seat_quantity; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>


                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">Assign
                                </button>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="container mb-4">
                                <h3>Seat color according to Class</h3>
                                @foreach($seat_classes as $seat_class)
                                    <span class="label"
                                          style="background-color: {{$seat_class->seat_color}}">{{$seat_class->name}}</span>
                                @endforeach
                                <span class="label" style="background-color: #4CAF50">General</span>
                            </div>

                            <div class="row">
                                @for ($i = 1; $i <= $seat_plan_By_id->seat_quantity; $i++)
                                    <div class="col-md-3 mb-2">
                                        <button class="button seatbutton button1 btn-block"
                                                style="background-color: {{get_seat_color($seat_plan_By_id->id,$i)}}">
                                            {{$i}}
                                        </button>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection


@section('scripts')

    <script>

        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });

        //data table
        $(document).ready(function () {
            $('#dataTableId').DataTable();
        });

        {{--dropdown active--}}
        $('#SeatMActive li:nth-child(2)').addClass('active');
        $('#SeatMActive').addClass('show');
    </script>
@endsection
