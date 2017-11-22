<div class="row">
    <div class="col-md-3">
        @include('includes.brand')
    </div>
    <div class="col-md-6">
        <div id="account_fullname" class="col-sm-8"></div>
    </div>
    <div class="col-md-3">
        <div id="header_signout">
            <span><a href="{{route('user.logout')}}">Sign Out</a> </span><span>|</span>
            <span><a href="/help">Help</a></span>
        </div>
    </div>
</div>
