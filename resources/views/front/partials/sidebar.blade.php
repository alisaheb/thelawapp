<div class="profile_image">                    
    @if(!empty(Auth::user()->profile_image))
        <img class="profile_pic" style="width:195px"
                     src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
    @else
        {{ Html::image('assets/front/img/profile.png') }}
    @endif
    
{{ Auth::user()->fname }} {{ Auth::user()->lname }}

</div>
<div class="dashboard-links">
    <ul>
        <li><a href="{{ url('cases') }}">Browse Cases</a></li>
        <li><a href="{{ url('payment_history') }}">Payments History</a></li>
        <li><a href="{{ url('payments') }}">Payment Methods</a></li>
        <li><a href="profile">Profile</a></li>
@if(Auth::user()->type == 'lawyer')
        <li><a href="skills">Skills</a></li>
@endif
        <li><a href="{{url('verification')}}">Verifications</a></li>
        <li><a href="{{url('notifications')}}">Notifications</a></li>
        <li><a href="{{url('reviews')}}">Reviews</a></li>
    </ul>
</div>
