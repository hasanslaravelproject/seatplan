<nav class="navbar navbar-expand navbar-dark customs_bd">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="{{route('admin.dashboard')}}">Bus Ticket</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> john</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">

                        <a href="" class="dropdown-item"><i class="fa fa-user"></i>
                            Profile</a>


                    <a href="#" class="dropdown-item" >
                        <i class="fa fa-angle-left"></i> Logout
                    </a>

                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
