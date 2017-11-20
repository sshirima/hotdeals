<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-1"></div>
            <div id="brand_name" class="col-md-1">@include('includes.brand')</div>
            <div class="col-md-8">

            <span id="search_bar" class="input-group">
            <span>
                <input type="text" class="form-control" placeholder="Search for...">
            </span>

            <span class="input-group-btn">
                <a href="/search"><button href="#" class="btn btn-default" type="button"><span
                                class="glyphicon glyphicon-search"
                                aria-hidden="true"></span></button></a>
              </span>
            </span>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="col-md-2">
        <div id="header_signin">
            <span><a href="/sign-in">Sign In</a> </span><span>|</span>
            <span><a href="/sign-up">Sign Up</a> </span><span>|</span>
            <span><a href="/help">Help</a></span>
        </div>
    </div>
</div>
