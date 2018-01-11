<!-- Picture Fields -->
<div class="row">
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @for($i=0;$i<count($advert->images);$i++)
                    <div style="width: 100%; height: 450px; padding: 5px"
                         class=" img-rounded item @if($i==0)active @endif">
                        <img src="{{ $advert->images[$i]->img_name}}">
                    </div>
                @endfor
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

    </div>
</div>