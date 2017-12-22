
<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cat_name', 'Name:') !!}
    {!! Form::text('cat_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Type field Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cat_type', 'Advert type: ') !!}
    {{ Form::select('cat_type', [
   'Product' => 'Product',
   'Service' => 'Service'],['class'=>'form-control']) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>

