<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{{Request::is('user') ? 'active' : ''}}">
                <a href="{{route('user.dashboard')}}"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('user') ? 'active' : ''}}">
                <a href="#"><span class="glyphicon glyphicon-map-marker"></span> Local</a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('user/advert/product*') ? 'active' : ''}}">
                <a href="{{route('user.product-advert.show-all')}}"><span class="glyphicon glyphicon-menu-hamburger"></span> Product</a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('user/advert/service*') ? 'active' : ''}}">
                <a href="{{route('user.service-advert.show-all')}}"><span class="glyphicon glyphicon-menu-hamburger"></span>
                    Services</a>
            </li>
        </ul>
    </div>
</nav>