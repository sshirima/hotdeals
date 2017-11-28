<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $advert->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $advert->title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $advert->description !!}</p>
</div>

<!-- Expiredate Field -->
<div class="form-group">
    {!! Form::label('expiredate', 'Expiredate:') !!}
    <p>{!! $advert->expiredate !!}</p>
</div>

<!-- Approved Field -->
<div class="form-group">
    {!! Form::label('approved', 'Approved:') !!}
    <p>{!! $advert->approved !!}</p>
</div>

<!-- Approveddate Field -->
<div class="form-group">
    {!! Form::label('approveddate', 'Approveddate:') !!}
    <p>{!! $advert->approveddate !!}</p>
</div>

<!-- Seller Id Field -->
<div class="form-group">
    {!! Form::label('seller_id', 'Seller Id:') !!}
    <p>{!! $advert->seller_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $advert->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $advert->updated_at !!}</p>
</div>

