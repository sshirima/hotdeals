<div class="col-md-4">
    <a href="{{route('service-advert.show', [$advert->id])}}" class="advertLink">
        @include('displayadverts.showall.components.poster.image')
        @include('displayadverts.showall.components.poster.title')
        @include('displayadverts.showall.components.poster.brand')
        @include('displayadverts.showall.components.poster.cost')
        @include('displayadverts.showall.components.poster.rating')
        @include('displayadverts.showall.components.poster.bottom-line')
    </a>

</div>