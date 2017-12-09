<br>
<div class="panel-body">
    <fieldset class="col-md-12">
        <legend>Comments</legend>
        <div class="panel panel-default">
            @foreach($advert['comments'] as $comment)
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-1">
                            <div data-letters="{{substr($comment['user']['first_name'], 0,1).substr($comment['user']['last_name'], 0,1)}}"></div>
                        </div>
                        <div class="col-md-11">
                            <strong>{{$comment['user']['first_name'].', '.$comment['user']['last_name']}}</strong><br>
                            <i>{{$comment['posted_at'].' ago'}}</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{$comment->com_contents}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </fieldset>

    <div class="clearfix"></div>
</div>
