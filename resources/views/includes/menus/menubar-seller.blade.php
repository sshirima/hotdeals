<ul class="nav nav-tabs seller-menu-bar">
    <li class="{{Request::is('seller/advert/product*') ? 'active' : ''}}">
        <a href="{{route('seller.product-advert.show-all')}}">
            <span class="glyphicon glyphicon-menu-hamburger"></span> Product adverts
        </a>
    </li>
    <li class="{{Request::is('seller/advert/service*') ? 'active' : ''}}">
        <a href="{{route('seller.service-advert.show-all')}}">
            <span class="glyphicon glyphicon-menu-hamburger"></span> Service adverts
        </a>
    </li>

</ul>