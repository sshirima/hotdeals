<div class="row">
    <div class="col-md-6">
        <span style="font-size: 10px" class="glyphicon glyphicon-star"></span>
        <span style="font-size: 10px" class="glyphicon glyphicon-star"></span>
        <span style="font-size: 10px" class="glyphicon glyphicon-star"></span>
        <span style="font-size: 10px" class="glyphicon glyphicon-star"></span>
        <span style="font-size: 10px" class="glyphicon glyphicon-star"></span>
        <span style="font-size: 10px">(0)</span>
    </div>
    <div class="col-md-6">
        @if($advert->approved == false)
            <span class="label label-danger pull-right">Approval pending</span>
        @elseif($advert->approved == true)
            <span class="label label-success pull-right">Approved</span>
        @else
            <span class="label label-danger pull-right">Not approved</span>
        @endif
    </div>
</div>