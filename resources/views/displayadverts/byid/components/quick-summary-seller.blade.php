<div class="row" style="border-bottom: 1px solid;padding: 10px">
    <div class="col-md-4">
        <div>
            <div style="font-size: 16px" class="glyphicon glyphicon-time" aria-hidden="true"></div>
        </div>

        <p style="color: red">Sales end:<br>{{date_format(date_create($advert->expiredate),'M j')}}</p>
    </div>
    <div class="col-md-4">
        <div>
            <div style="font-size: 16px" class="glyphicon glyphicon-eye-open" aria-hidden="true"></div>
        </div>
        0 Viewers
    </div>
    <div class="col-md-4">
        <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
        <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
        <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
        <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
        <div style="font-size: 14px" class="glyphicon glyphicon-star-empty" aria-hidden="true"></div>
    </div>
    {{round($advert['rate'], 2).' Rate'}}
</div>