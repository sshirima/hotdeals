<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{{Request::is('seller') ? 'active' : ''}}">
                <a href="{{route('seller.dashboard')}}">
                    <span class="glyphicon glyphicon-dashboard"></span> Seller dashboard
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('seller/advert/product*') ? 'active' : ''}}">
                <a href="{{route('seller.product-advert.show-all')}}">
                    <span class="glyphicon glyphicon-menu-hamburger"></span> Product adverts
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('seller/advert/service*') ? 'active' : ''}}">
                <a href="{{route('seller.service-advert.show-all')}}">
                    <span class="glyphicon glyphicon-menu-hamburger"></span> Service adverts
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown {{Request::is('seller/*/create') ? 'active' : ''}}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Create new advert <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('product-advert.create')}}">
                            <i class="fa fa-plus-square-o" aria-hidden="true"></i> Product advert
                        </a>
                    </li>
                    <li>
                        <a href="{{route('service-advert.create')}}">
                            <i class="fa fa-plus-square-o" aria-hidden="true"></i> Service advert
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>