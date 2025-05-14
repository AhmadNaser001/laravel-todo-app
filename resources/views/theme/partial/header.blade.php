<!-- Start Header -->
<div class="header" id="header">
    <div class="container">
        <a href="#" class="logo">Taskify </a>
        @if(Auth::check())
            <ul class="main-nav">
                <li><a href="{{route('theme.home')}}">Home</a></li>
                <li><a href="{{route('theme.trashed')}}">Trashed</a></li>
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                @csrf
                                <a class="nav-link" href="javascript:void(0);"
                                    onclick="document.getElementById('logout-form').submit();">Log Out</a>
                            </form>

                        </li>
                    </ul>
                </li>
            </ul>
        @endif

    </div>
</div>
<!-- End Header -->