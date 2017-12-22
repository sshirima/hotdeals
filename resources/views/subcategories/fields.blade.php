<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('subcat_name', 'Name:') !!}
    {!! Form::text('subcat_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subcategories.index') !!}" class="btn btn-default">Cancel</a>
</div>
