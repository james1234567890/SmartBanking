<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Balance</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Tasks</h4>
                            <div class="row">

                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-accountbalance-tab" data-toggle="pill" href="#vert-tabs-accountbalance" role="tab" aria-controls="vert-tabs-accountbalance" aria-selected="true">Account Balance</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>
                                        
                                       
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-accountbalance" role="tabpanel" aria-labelledby="vert-tabs-accountbalance-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_account_balance">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Account Balance</h3>
                                                            </div>
                                                            <div class="card-body">

                                                                <div class="form-group">
                                                                    <label>Account No.</label>
                                                                    <select class="form-control select2 rounded-0" name="accountno" id="accountno" style="width: 100%;">
                                                                       <option selected="selected">Select Account</option>
                                                                         @foreach ($bankaccounts as $bankaccount)
                                                                            <option value="{{ $bankaccount->bank_account_no }}">{{ $bankaccount->bank_account_no }}</option>
                                                                         @endforeach
                                                                    </select>
                                                                </div>


                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer">
                                                                <button type="button" id="btnAccountBalance" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->
                                                    <div class="text-center text-success">
                                                        <label class="h3" id="lbAccountBalanceMessage"></label>
                                                    </div>

                                                    <div class="text-center" id="dvBookBalance">
                                                        <label class="h3" id="lbBookBalance"></label>
                                                    </div>
                                                    <div class="text-center" id="dvAvailableBalance">
                                                        <label class="h3" id="lbAvailableBalance"></label>
                                                    </div>


                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-result" role="tabpanel" aria-labelledby="vert-tabs-result-tab">
                                            <table id="tbl_account_balance_result" class="table table-dt table-responsive table-bordered table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Request ID</th>
                                                                <th>Request Type</th>
                                                                <th>Request By</th>
                                                                <th>Request Date</th>
                                                                <th>Request Time</th>
                                                                <th>Account Reference</th>
                                                                <th>Raw Response</th>
                                                                

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                             @foreach ($accountbalanceresults as $accountbalanceresult)
                                                            <tr>
                                                                <td>{{ $accountbalanceresult->id }}</td>
                                                                <td>{{ $accountbalanceresult->request_id }}</td>
                                                                <td>{{ $accountbalanceresult->request_type }}</td>
                                                                <td>{{ $accountbalanceresult->request_by }}</td>
                                                                <td>{{ $accountbalanceresult->request_date }}</td>
                                                                <td>{{ $accountbalanceresult->request_time }}</td>
                                                                <td>{{ $accountbalanceresult->message_reference }}</td>
                                                                <td>{{ $accountbalanceresult->raw_response }}</td>
                                                               

                                                            </tr>
                                                           @endforeach
                                                        </tbody>

                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Request ID</th>
                                                                <th>Request Type</th>
                                                                <th>Request By</th>
                                                                <th>Request Date</th>
                                                                <th>Request Time</th>
                                                                <th>Account Reference</th>
                                                                <th>Raw Response</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                        </div>
                                       

                                    </div>
                                </div>
                            </div>
                            <!--
                           <a href="#" class="card-link">Card link</a>
                           <a href="#" class="card-link">Another link</a>-->
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script type="text/javascript">
$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});
$(document).ready(function () {

 

});





$("#btnAccountBalance").click(function (e) {

    e.preventDefault();
   
    $.ajax({
        type: 'POST',
        url: "{{ url('/coop_account_balance') }}",
        data: $('#form_account_balance').serialize(),
        beforeSend: function () {
            $("#dvBookBalance").removeClass("bg-success");
            $("#dvAvailableBalance").removeClass("bg-success");
            $("#lbBookBalance").text("");
            $("#lbAvailableBalance").text("");
            $("#lbAccountBalanceMessage").text("Please wait..");
        },
        success: function (response) {
            $("#lbAccountBalanceMessage").text("");
            $("#dvBookBalance").addClass("bg-success");
            $("#dvAvailableBalance").addClass("bg-success");
            if (response.MessageCode == 0) {
                //var messagedescription = response.MessageDescription;
                $("#lbBookBalance").text("Book Balance: " + response.Currency + " " + formatNumber(response.BookedBalance));
                $("#lbAvailableBalance").text("Available Balance: " + response.Currency + " " + formatNumber(response.AvailableBalance));

            } else {
                //$("#dvBookBalance").removeClass("bg-success");
                $("#dvAvailableBalance").removeClass("bg-success");
                $("#lbBookBalance").text(response.MessageDescription);
            }


        },
        error: function (e) {
            $("#lbAccountBalanceMessage").text("Failed");
        }

    });
});


</script>