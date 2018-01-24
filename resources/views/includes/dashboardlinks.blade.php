<div class="dashboard-links">
    <ul>
        <li><a href="{{url('dashboard')}}">My Dashboard</a></li>
        <li><a class="message-count" href="{{url('messages')}}">Messages </a></li>

        @if(Auth::user()->type=='client')
            <li><a href="{{url('mycase')}}">My Cases</a></li>
        @else
            <li><a href="{{url('cases')}}">Browse Cases</a></li>
        @endif

        <li><a href="{{url('payment_history')}}">Payments History</a></li>
        <li><a href="{{url('payments')}}">Payment Methods</a></li>
        <li><a href="{{url('profile')}}">Profile</a></li>

        @if(Auth::user()->type=='lawyer')
            <li><a href="{{url('skills')}}">Skills</a></li>
        @endif

        <li><a href="{{url('verification')}}">Verifications</a></li>
        <li><a href="{{url('reviews')}}">Reviews </a></li>
        <li><a class="notification-count" href="{{url('notifications')}}">Notifications</a></li>
        @if(Auth::user()->type=='lawyer')
            <li><a href="{{url('portfolio')}}">Portfolio</a></li>
        @endif
        <li><a href="{{url('password')}}">Password</a></li>

    </ul>
</div>