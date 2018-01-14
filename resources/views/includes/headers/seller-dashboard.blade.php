<div class="row">
    @include('includes.brand')
    <div class="col-md-6">
        <div>
            <h2 id="" class="col-sm-8" style="color:white"> {{$seller->first_name . ' '.$seller->last_name}}</h2>
        </div>
    </div>
    <div class="col-md-offset-1 col-md-2">
        <button class="dropdown btn btn-default " style="margin-top: 20px;">
            <div href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">
                <i class="fa fa-cog" aria-hidden="true"></i> Settings <span class="caret"></span>
            </div>
            <ul class="dropdown-menu">
                <li><a href="{{route('seller.profile.show')}}">
                        <i class="fa fa-eye" aria-hidden="true"></i> View profile</a></li>
                <li><a href="{{route('seller.profile.edit')}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit profile</a></li>
                <li><a href="{{route('seller.logout')}}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </li>
                <li><a href="#">
                        Help</a>
                </li>
            </ul>
        </button>
    </div>
</div>
