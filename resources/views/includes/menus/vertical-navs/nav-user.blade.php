<ul class="nav nav-pills nav-stacked col-md-3">
    @foreach($topCategories as $topCategory)
        <li style="border-bottom: 1px solid lightgray">
            <a href="{{route($link_category, $topCategory->id)}}">
                <h5>
                    <i class="fa fa-bars"
                       aria-hidden="true"></i><strong>{{'  '.$topCategory->cat_name}}</strong>
                </h5>
            </a>
        </li>
    @endforeach
</ul>
