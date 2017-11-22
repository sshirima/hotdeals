@if(count($errors))
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4"></div>
    </div>
@endif

{{--@if(count($errors))
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6"> <p style="color:red;">Please fill all important fields</p></div>
        <div class="col-md-4"></div>
    </div>
@endif--}}
