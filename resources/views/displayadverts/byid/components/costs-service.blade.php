<div class="row" style="padding: 10px">
    <div class="col-md-6 ">
        <del>{{'Tsh '. $advert->service->p_cost}}</del>
        <br><strong style="font-size: 20px"> {{'Tsh '. $advert->service->c_cost}}</strong></div>
    <div class="col-md-5 col-md-offset-1">
        <div class="pull-right"
             style="font-size: 30px;">{{round(($advert->service->p_cost-$advert->service->c_cost)/$advert->service->p_cost*100).'%'}}</div>
    </div>
</div>