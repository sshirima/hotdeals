<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{{Request::is('admin*') ? 'active' : ''}}">
                <a href="{{route('admin.dashboard')}}">
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard
                </a>
            </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="{{Request::is('region*') ? 'active' : ''}}">
                <a href="{{route('regions.index')}}">
                    <i class="fa fa-location-arrow" aria-hidden="true"></i> Regions
                </a>
            </li>
            <li class="{{Request::is('categor*') ? 'active' : ''}}">
                <a href="{{route('categories.index')}}">
                    <i class="fa fa-tags" aria-hidden="true"></i> Categories
                </a>
            </li>
            <li class="dropdown {{Request::is('accounts*') ? 'active' : ''}}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('accounts.users.index')}}">Online users</a></li>
                    <li><a href="{{route('accounts.sellers.index')}}">Sellers</a></li>
                    <li><a href="{{route('accounts.admins.index')}}">Admins</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>