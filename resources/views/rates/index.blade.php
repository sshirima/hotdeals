<div class="panel panel-default">
    <div class="panel-heading">Rate the advert</div>
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-inline" action="{{route('rate.store')}}" method="post">
                    @include('rates.fields')
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
        <div>@include('flash::message')</div>
    </div>

</div>