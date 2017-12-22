<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Advert title:') !!}
    @if( !empty($advert))
        {!! Form::text('title',$advert->title, ['class' => 'form-control','required']) !!}
    @else
        {!! Form::text('title',null, ['class' => 'form-control','required']) !!}
    @endif
</div>

<!-- Img Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_name', 'Add images') !!}
    {!! Form::file('img_name[]',['multiple'=>true]) !!}
</div>

<!-- Expiredate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiredate', 'Expiredate:') !!}
    @if (!empty($advert))
        {!! Form::date('expiredate', $advert->expiredate, ['class' => 'form-control']) !!}
    @else
        {!! Form::date('expiredate', null, ['class' => 'form-control']) !!}
    @endif

</div>

<div class="form-group col-md-6">
    {!! Form::label('reg_name', 'Select region') !!}
    <select class="form-control" name="region_id">
        @if (!empty($advert))
            @foreach($regions as $region)

                @if ($region->id == $advert['region']->id)
                    <option selected value="{{$region->id}}">{{$region->reg_name}}</option>
                @else
                    <option value="{{$region->id}}">{{$region->reg_name}}</option>
                @endif

            @endforeach
        @else
            @foreach($regions as $region)

                <option value="{{$region->id}}">{{$region->reg_name}}</option>

            @endforeach
        @endif

    </select>
</div>

<div class="form-group col-md-6">
    {!! Form::label('img_name', 'Choose category') !!}
    <select class="form-control" name="category_id">
        @if (!empty($advert))
            @foreach($categories as $category)
                @if ($category->id == 2)
                    <option selected value="{{$category->id}}">{{$category->cat_name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                @endif
            @endforeach
        @else
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->cat_name}}</option>
            @endforeach
        @endif

    </select>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 ">
    {{--{!! Form::label('description', 'Details of the advert') !!}--}}
    {{--{!! Form::textarea('description', null, ['class' => 'form-control','id'=>'description"']) !!}--}}

    {!! Form::label('description', 'Details of the advert') !!}
    @if (!empty($advert))
        <textarea name="description" id="description">{{$advert->description}}</textarea>
    @else
        <textarea name="description" id="description"></textarea>
    @endif
    <script>
        $(document).ready(function () {
            $('#description').summernote();
        });
    </script>
</div>

<div class="form-group col-sm-12">
    <input type="hidden" name="seller_id" value="{{ $seller->id }}">
</div>

<div class="form-group col-sm-12">
    <input type="hidden" name="srv_type" value="Product">
</div>