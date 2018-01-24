@extends('layouts.front')
@section('title','The law app')
@section('content')
<div class="container inner_content">
    <div class="row">
        <!-- Left Dashboard Area-->
        <div class="col-md-2 bashboard_left">
            @include('front.partials.sidebar')
        </div>
        <!-- Right Dashboard Area-->
        <div class="col-md-10">
                    <div class="dashboard-right">

                        <div class="dash-title">
                            <h2>Earned</h2>
                            <hr>
                        </div>

                        <!-- Right Area-->
                        <div class="payment-history-container">

                            <table id="payment-history-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>nixon@gmail.com</td>
                                        <td>Family Problem</td>
                                        <td>500</td>
                                        <td>Good</td>
                                        <td>Pypal</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
    </div>
</div>
@endsection