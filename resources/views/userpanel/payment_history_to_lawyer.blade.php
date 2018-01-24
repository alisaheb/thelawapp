<!DOCTYPE html>
<html>
@include('includes.head')


<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<style>
    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .recent-acivity.acivity-notifications, .notofications.acivity-notifications {
        max-height: 400px;
        overflow-y: scroll;
    }

</style>
</head>
<body>
<div id="fb-root"></div>


<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="skills-page">
        <div id="app-header">
            <!-- <div id="header-block" style="height:94px;"></div> -->
            @include('includes.header')
        </div>
    </div>
    <div id="page-and-screen-content">
        <div class="content">
            <div class="inner-page">
                <div class="left-sidebar-account">
                    <div class="images-icon">

                        @if(!empty(Auth::user()->profile_image))
                            <img class="profile_pic" style="width:195px"
                                 src="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}">
                        @else
                            <img src="{{asset('assets/userpanel/images/image-icon.png')}}">
                        @endif
                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>
                <div class="right-side">
                    <h3 class="inner-page-headings">Earned</h3>
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Payment By</th>
                            <th>Email</th>
                            <th>Task Title</th>
                            <th>Amount($)</th>
                            <th>Status</th>
                            <th>Payment on</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Payment By</th>
                            <th>Email</th>
                            <th>Task Title</th>
                            <th>Amount($)</th>
                            <th>Status</th>
                            <th>Payment on</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>

                                <td>{{$payment->user['fname']}} {{$payment->user['lname']}}</td>
                                <td>{{$payment->user['email']}} </td>
                                <td>{{$payment->task['title']}} </td>
                                <td>{{$payment->payment_gros}}</td>
                                <td>{{$payment->status}}</td>
                                <td>{{$payment->updated_at}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div id="static-page-content"></div>
</div>
</div>
</div>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@include('includes.footer')
@include('includes.login')
</body>
</html>