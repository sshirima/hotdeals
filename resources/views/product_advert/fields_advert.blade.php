<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Advert title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<!-- Expiredate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiredate', 'Expiredate:') !!}
    {!! Form::date('expiredate', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_name', 'Add images') !!}
    {!! Form::file('img_name') !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 ">
    {!! Form::label('description', 'Details of the advert') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <input type="hidden" name="seller_id" value="{{ $seller->id }}">
</div>