<ul class="nav nav-pills nav-stacked col-md-3">
    <li style="border-bottom: 1px solid lightgray">
        <a href="{{$link}}">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <strong>{{$label}}</strong>
        </a>
    </li>

    <li style="border-bottom: 1px solid lightgray">
        <a href="{{$approved_advert_link}}">
            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><strong> Approved adverts</strong>
        </a>
    </li>
    <li style="border-bottom: 1px solid lightgray">
        <a href="{{$pending_advert_link}}">
            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span><strong> Unverified advert</strong>
        </a>
    </li>
    @include('includes.menus.vertical-navs.options.common-seller')
</ul>
