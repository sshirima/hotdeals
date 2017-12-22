<ul class="nav nav-tabs main-menu-bar">
    <li class="{{Request::is('user') ? 'active' : ''}}">
        <a href="{{route('user.dashboard')}}"><span class="glyphicon glyphicon-home"></span> Home</a>
    </li>
    <li class="{{Request::is('user') ? 'active' : ''}}">
        <a href="#"><span class="glyphicon glyphicon-user"></span> Local</a>
    </li>
    <li class="{{Request::is('advert/services') ? 'active' : ''}}">
        <a href="{{route('service-advert.show-all')}}"><span class="glyphicon glyphicon-search"></span> Services</a>
    </li>
    <li class="{{Request::is('advert/products') ? 'active' : ''}}">
        <a href="{{route('product-advert.show-all')}}"><span class="glyphicon glyphicon-search"></span> Product</a>
    </li>
    <li>
        <a href="#"><span class="glyphicon glyphicon-search"></span> Specials</a>
    </li>

</ul>