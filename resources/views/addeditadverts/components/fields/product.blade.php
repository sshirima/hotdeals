<!-- Product name field-->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Product name') !!}
    @if (!empty($advert))
        {!! Form::text('name', $advert->product->name, ['class' => 'form-control']) !!}
    @else {!! Form::text('name', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Brand') !!}
    @if (!empty($advert))
        {!! Form::text('brand', $advert->product->brand, ['class' => 'form-control']) !!}
    @else {!! Form::text('brand', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- Manufacturer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manufacturer', 'Manufacturer:') !!}
    @if (!empty($advert))
        {!! Form::text('manufacturer', $advert->product->manufacturer, ['class' => 'form-control']) !!}
    @else {!! Form::text('manufacturer', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', 'Model:') !!}
    @if (!empty($advert))
        {!! Form::text('model', $advert->product->model, ['class' => 'form-control']) !!}
    @else {!! Form::text('model', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- P Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p_cost', 'Previous price:') !!}
    @if (!empty($advert))
        {!! Form::text('p_cost', $advert->product->p_cost, ['class' => 'form-control']) !!}
    @else {!! Form::text('p_cost', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- C Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_cost', 'Current price:') !!}
    @if (!empty($advert))
        {!! Form::text('c_cost', $advert->product->c_cost, ['class' => 'form-control']) !!}
    @else {!! Form::text('c_cost', null, ['class' => 'form-control']) !!} @endif

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" value="Submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save
    </button>
    <a href="{!! route('seller.product-advert.show-all') !!}" class="btn btn-warning">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel
    </a>
    <div class="form-group col-sm-12">
        <input type="hidden" name="adv_type" value="Product">
    </div>
</div>