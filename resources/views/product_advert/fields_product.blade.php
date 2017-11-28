<!-- Product name field-->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Product name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Brand') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Manufacturer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manufacturer', 'Manufacturer:') !!}
    {!! Form::text('manufacturer', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', 'Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>

<!-- P Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p_cost', 'Previous price:') !!}
    {!! Form::text('p_cost', null, ['class' => 'form-control']) !!}
</div>

<!-- C Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_cost', 'Current price:') !!}
    {!! Form::text('c_cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save advert', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>