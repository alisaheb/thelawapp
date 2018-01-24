<html>
<head>

<script src="{{url('js/jquery-1.12.3.js')}}"></script>
<script src="{{url('js/jquery.dataTables.min.js')}}"></script>

<script>
$(document).ready(function() {
    $('#user').DataTable();
} );
</script>

<link rel="stylesheet" type="text/css" href="{{url('css/jquery.dataTables.min.css')}}">
</head>


<body>
<table id="user" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Registration Date</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Registration Date</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td><a href="javascript:;" id="edit">Edit</a><a href="javascript:;" id="edit">Update</a><a href="javascript:;" id="edit">Delete</a></td>
            </tr>
          
        </tbody>
    </table>
</body>
</html>
