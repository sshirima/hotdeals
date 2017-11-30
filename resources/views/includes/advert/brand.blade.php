<div class="row">
    <div class="col-md-6"><p>{{$advert->brand}}</p></div>
    <div class="col-md-6"><p
                class="pull-right">{{'Sales ends: '.date_format(date_create($advert->expiredate),'M j')}} </p></div>
</div>