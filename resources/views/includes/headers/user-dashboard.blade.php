<div class="row">
    @include('includes.brand')
    <div class="col-md-6">
        <div>
            <h2 id="" class="col-sm-8" style="color:white"> {{$user->first_name . ' '.$user->last_name}}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div style="padding: 25px">
            <span><a href="{{route('user.logout')}}">Logout</a> </span><span style="color: white">|</span>
            <span><a href="#">Help</a></span>
        </div>
    </div>
</div>
