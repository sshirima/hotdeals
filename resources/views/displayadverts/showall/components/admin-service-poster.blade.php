<div class="col-md-4">
    <a href="{{route('admin.service-advert.show', [$advert->id])}}" class="advertLink">
        @include('displayadverts.showall.components.poster.image')
        @include('displayadverts.showall.components.poster.title')
        @include('displayadverts.showall.components.poster.brand')
        @include('displayadverts.showall.components.poster.status')
        @include('displayadverts.showall.components.poster.bottom-line')
    </a>
</div>