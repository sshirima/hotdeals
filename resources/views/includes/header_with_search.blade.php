<div class="row">
    <div class="col-md-3">
        @include('includes.brand')
    </div>
    <div class="col-md-6">
        <span id="search_bar" class="input-group">
            <span>
                <input type="text" class="form-control" placeholder="Search for...">
            </span>
            <span class="input-group-btn">
                <a href="/search">
                    <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"
                                                                                 aria-hidden="true"></span>
                    </button>
                </a>
              </span>
            </span>
    </div>
    <div class="col-md-3">
        <div id="header_signin">
            <span><a href="/login">Sign In</a> </span><span>|</span>
            <span><a href="/register">Sign Up</a> </span><span>|</span>
            <span><a href="#">Help</a></span>
        </div>
    </div>
</div>
