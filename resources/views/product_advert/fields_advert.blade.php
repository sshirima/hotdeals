<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Advert title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_name', 'Add images') !!}
    {!! Form::file('img_name[]',['multiple'=>true]) !!}
</div>

<!-- Expiredate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiredate', 'Expiredate:') !!}
    {!! Form::date('expiredate', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-6">
    {!! Form::label('reg_name', 'Select region') !!}
    <select class="form-control" name="region_id">
        @foreach($regions as $region)
            <option value="{{$region->id}}">{{$region->reg_name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-6">
    {!! Form::label('img_name', 'Choose category') !!}
    <select class="form-control" name="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->cat_name}}</option>
        @endforeach
    </select>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 ">
    {{--{!! Form::label('description', 'Details of the advert') !!}--}}
    {{--{!! Form::textarea('description', null, ['class' => 'form-control','id'=>'description"']) !!}--}}
    <textarea name="description" id="description"></textarea>
    <script>
        $(document).ready(function () {
            $('#description').summernote();
        });
    </script>
</div>

<div class="form-group col-sm-12">
    <input type="hidden" name="seller_id" value="{{ $seller->id }}">
</div>