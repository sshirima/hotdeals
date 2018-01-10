<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{{Request::is('admin') ? 'active' : ''}}">
                <a href="{{route('admin.dashboard')}}">
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Admin dashboard
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="{{Request::is('admin/advert/product*') ? 'active' : ''}}">
                <a href="{{route('admin.product-advert.show-all')}}">
                    <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Product adverts
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav">
            <li class="{{Request::is('admin/advert/service*') ? 'active' : ''}}">
                <a href="{{route('admin.service-advert.show-all')}}">
                    <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Service adverts
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('region*') ? 'active' : ''}}">
                <a href="{{route('regions.index')}}">
                    <i class="fa fa-location-arrow" aria-hidden="true"></i> Regions
                </a>
            </li>
            <li class="{{Request::is('categor*') ? 'active' : '' || Request::is('subcategor*') ? 'active' : ''}}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-tags" aria-hidden="true"></i> Categories <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('categories.index')}}">
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{route('subcategories.index')}}">
                            Subcategories
                        </a>
                    </li>

                </ul>

            </li>
            <li class="dropdown {{Request::is('accounts*') ? 'active' : ''}}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('accounts.admins.index')}}">
                            <i class="fa fa-user" aria-hidden="true"></i> Admins</a></li>
                    <li><a href="{{route('accounts.sellers.index')}}">
                            <i class="fa fa-user-o" aria-hidden="true"></i> Sellers</a></li>
                    <li><a href="{{route('accounts.users.index')}}">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> Online users</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>