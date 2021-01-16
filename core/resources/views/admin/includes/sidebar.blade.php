<div class="sidebar sidebar-dark bg-dark">
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>
                Dashboard</a></li>
        <li>
            <a href="#busActive" data-toggle="collapse">
                <i class="fas fa-cog"></i> Setup
            </a>
            <ul id="busActive" class="list-unstyled collapse">
                <li><a href="{{route('admin.buses.index')}}"><i class="far fa-circle"></i> Bus Setup</a></li>
                <li><a href="{{route('admin.seat-classes.index')}}"><i class="far fa-circle"></i> Seat Class Setup</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#SeatMActive" data-toggle="collapse">
                <i class="fas fa-cog"></i> Seat Management
            </a>
            <ul id="SeatMActive" class="list-unstyled collapse">
                <li><a href="{{route('admin.SeatPlan')}}"><i class="far fa-circle"></i> Seat Plan List</a></li>
                <li><a href="{{route('admin.SeatGenPage')}}"><i class="far fa-circle"></i> Generate Seat Plan</a></li>
                </li>
            </ul>
        </li>


        {{--        <li>--}}
        {{--            <a href="#stock" data-toggle="collapse">--}}
        {{--                <i class="fas fa-cart-plus"></i> Stock--}}
        {{--            </a>--}}
        {{--            <ul id="stock" class="list-unstyled collapse">--}}
        {{--                <li><a href=""><i class="fas fa-list"></i> Stock List</a></li>--}}
        {{--            </ul>--}}
        {{--        </li>--}}

    </ul>

</div>
