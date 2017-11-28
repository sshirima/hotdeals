<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Expiredate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiredate', 'Expiredate:') !!}
    {!! Form::date('expiredate', null, ['class' => 'form-control']) !!}
</div>

<!-- Seller Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seller_id', 'Seller Id:') !!}
    {!! Form::text('seller_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Brand:') !!}
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
    {!! Form::label('p_cost', 'P Cost:') !!}
    {!! Form::text('p_cost', null, ['class' => 'form-control']) !!}
</div>

<!-- C Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('c_cost', 'C Cost:') !!}
    {!! Form::text('c_cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Advert Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('advert_id', 'Advert Id:') !!}
    {!! Form::text('advert_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
