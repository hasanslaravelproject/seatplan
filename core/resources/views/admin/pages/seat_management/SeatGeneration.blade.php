@extends('admin.master')

@section('title', 'Seat Gen')

@section('body')

    <div class="container-fluid">
        <h2 class="mb-4"> Seat Generation
            <a href="" class="btn btn-primary btn-md float-right customs_btn">
                <i class="fa fa-list"></i> Seat List
            </a>
        </h2>
    </div>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                Seat Gen
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.SeatGenPrc')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1"><strong>Bus</strong></label>
                            <select class="form-control"
                                    name="bus_id" required>
                                <option value="">Select Bus</option>
                                @foreach($buses as $bus)
                                    <option value="{{$bus->id}}">{{$bus->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1"><strong>Seat Quantity</strong></label>
                            <input type="number" name="seat_quantity" class="form-control" min="2" max="40" required>
                        </div>

{{--                        <div class="form-group col-md-4">--}}
{{--                            <label for="exampleFormControlSelect1"><strong>Seat Class</strong></label>--}}
{{--                            <select class="form-control js-example-basic-multiple"--}}
{{--                                    name="seat_classes[]" multiple="multiple" required>--}}
{{--                                @foreach($seat_classes as $seat_class)--}}
{{--                                    <option value="{{$seat_class->id}}">{{$seat_class->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-secondary btn-lg btn-block customs-btn-bd">GENERATE
                            </button>
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

        {{--dropdown active--}}
        $('#SeatMActive li:nth-child(2)').addClass('active');
        $('#SeatMActive').addClass('show');
    </script>
@endsection
