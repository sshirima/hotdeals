<!-- First name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('first_name', 'First name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('last_name', 'Last name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Admin password Field -->
<div class="form-group col-sm-12">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
    </div>
</div>

<!-- Confirm password Field -->
<div class="form-group col-sm-12">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
               placeholder="Confirm Password">
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accounts.admins.index') !!}" class="btn btn-default">Cancel</a>
</div>
