<div id="form-content">
 @if(!empty(session('email')))
<p><b>Write Your Review</b></p>   
<form  action="{{url('/review/'.session('item_id'))}}" method="post" id="review-form">
    {{ csrf_field() }}
<span>
<input type="text" value="{{session('username')}}" name="username">
    <input type="email" value="{{session('email')}}" name="email" placeholder="{{session('email')}}"/>
</span>
<textarea  name="review"  placeholder="Add Review" value="" required></textarea>
<b >Rating: </b> <br>
<fieldset class="rating" >
<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
</fieldset>
<input type="submit" class="pull-right btn-btn success"value="submit">

</form>
@else
{{--  login message   --}}
<div class="register-req">
	<p>Please Login</p>
</div><!--/register-req-->
@endif

</div>
