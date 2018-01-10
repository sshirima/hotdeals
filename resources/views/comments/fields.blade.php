<form class="form-inline" action="{{route('comment.store')}}" method="post">
    <div class="form-group col-sm-10">
        <input style="width: 100%;" class="form-control col-sm-10" type="text" placeholder="Add comment..."
               name="com_contents">
    </div>
    <input type="hidden" name="advert_id" value="{{ $advert->id }}">
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn btn-primary">Post comment</button>
</form>
<br>
