<div class="row">
    @include('includes.brand')
    <div class="col-md-5 col-md-offset-1" style="padding: 15px">
        <form action="{{route('adverts-search')}}" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="search"
                       placeholder="Search users"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
            </div>
        </form>
    </div>
    <div class="col-md-offset-1  col-md-2">
        <div style="padding: 25px">
            <span><a href="/login">Sign In</a> </span><span style="color:white;">|</span>
            <span><a href="/register">Sign Up</a> </span><span style="color:white;">|</span>
            <span><a href="#">Help</a></span>
        </div>
    </div>
</div>
