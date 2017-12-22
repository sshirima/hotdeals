<!-- Product name field-->
<div class="form-group col-sm-6">
    {!! Form::label('srv_name', 'Product name') !!}
    @if (!empty($advert))
        {!! Form::text('srv_name', $advert->service->srv_name, ['class' => 'form-control']) !!}
    @else {!! Form::text('srv_name', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('srv_brand', 'Brand') !!}
    @if (!empty($advert))
        {!! Form::text('srv_brand', $advert->service->srv_brand, ['class' => 'form-control']) !!}
    @else {!! Form::text('srv_brand', null, ['class' => 'form-control']) !!} @endif

</div>


<!-- P Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p_cost', 'Previous price:') !!}
    @if (!empty($advert))
        {!! Form::text('p_cost', $advert->service->p_cost, ['class' => 'form-control']) !!}
    @else {!! Form::text('p_cost', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- C Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_cost', 'Current price:') !!}
    @if (!empty($advert))
        {!! Form::text('c_cost', $advert->service->c_cost, ['class' => 'form-control']) !!}
    @else {!! Form::text('c_cost', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" value="Submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save
    </button>
    <a href="{!! route('seller.dashboard') !!}" class="btn btn-warning">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel
    </a>
</div>