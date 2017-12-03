<div class="col-md-4">
    <a href="{{route('seller.product-advert.show', [$advert->id])}}" class="advertLink">
        @include('includes.advert.image')
        @include('includes.advert.title')
        @include('includes.advert.brand')
        @include('includes.advert.cost')
        @include('includes.advert.status')
        @include('includes.advert.bottom-line')
    </a>
</div>