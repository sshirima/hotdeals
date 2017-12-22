<div class="row">
    <div class="col-md-6">{{$advert->reg_name}}</div>
    <div class="col-md-6">
        <div class="pull-right">
            <del style="font-size: 14px">Tsh{{$advert->p_cost/1000 .'k'}}</del>
            <strong style="font-size: 16px">Tsh{{' '.$advert->c_cost/1000 .'k'}}</strong>
        </div>
    </div>
</div>