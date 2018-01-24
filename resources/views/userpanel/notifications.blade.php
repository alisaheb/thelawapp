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
                                 src="{{url('../profile_images')}}/{{Auth::user()->profile_image}}">
                        @else
                            <img src="{{asset('userpanel/images/image-icon.png')}}">
                        @endif
                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>
                <div class="right-side">
                    <h3 class="inner-page-headings">Notifications</h3>

                </div>
            </div>
        </div>
    </div>
    <div id="static-page-content"></div>
</div>
</div>
</div>
<script src="{{asset('userpanel/js/custom.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@include('includes.footer')
@include('includes.login')
</body>
</html>