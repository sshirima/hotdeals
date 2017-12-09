<label for="rate">Ratings: </label>
<select class="form-group form-control " id="rate" name="value">
    <option value="5">
        5 stars
    </option>
    <option value="4">
        4 stars
    </option>
    <option value="3">
        3 stars
    </option>
    <option value="2">
        2 stars
    </option>
    <option value="1">
        1 star
    </option>
</select>
<button type="submit" class="btn btn-primary "> Rate</button>
<input type="hidden" name="advert_id" value="{{ $advert->id }}">
<input type="hidden" name="user_id" value="{{ $user->id }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">