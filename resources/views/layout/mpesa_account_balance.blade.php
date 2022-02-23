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
                        <li class="breadcrumb-item"><a href="#">Mpesa</a></li>
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
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-tasks"></i>
                                Account Balance
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-task-tab" data-toggle="pill" href="#vert-tabs-task" role="tab" aria-controls="vert-tabs-task" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-task" role="tabpanel" aria-labelledby="vert-tabs-task-tab">
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
                                                                    <label>Short Code</label>                                                    
                                                                    <select class="form-control select2 rounded-0" name="shortcode" id="shortcode" style="width: 100%;">
                                                                        <option selected="selected">Select Short Code</option>
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
                                                        <label class="h3" id="lbAccountBalance"></label>
                                                        <span class="spinner-border spinner-border-lg text-success" role="status" aria-hidden="true"></span>
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="text-center text-success" id="dvWorkingBalance">
                                                        <label class="h3" id="lbWorkingBalance"></label>
                                                    </div>
                                                    <div class="text-center text-success" id="dvFloatBalance">
                                                        <label class="h3" id="lbFloatBalance"></label>
                                                    </div>
                                                    <div class="text-center text-success" id="dvUtilityBalance">
                                                        <label class="h3" id="lbUtilityBalance"></label>
                                                    </div><!-- comment -->




                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-result" role="tabpanel" aria-labelledby="vert-tabs-result-tab">
                                            <div class="row">

                                                <div class="col-md-12">


                                                    <table id="tbl_result" class="table table-dt table-responsive table-bordered table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Request ID</th>
                                                                <th>Request Type</th>
                                                                <th>Request By</th>
                                                                <th>Request Date</th>
                                                                <th>Request Time</th>
                                                                <th>Original Conversation ID</th>
                                                                <th>Conversation ID</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Transaction ID</th>
                                                                <th>Account Balance</th>
                                                                <th>Completed DateTime</th>



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
                                                                <td>{{ $accountbalanceresult->originator_conversation_id }}</td>
                                                                <td>{{ $accountbalanceresult->conversation_id }}</td>
                                                                <td>{{ $accountbalanceresult->result_code }}</td>
                                                                <td>{{ $accountbalanceresult->result_desc }}</td>
                                                                <td>{{ $accountbalanceresult->transaction_id }}</td>
                                                                <td>{{ $accountbalanceresult->account_balance }}</td>
                                                                <td>{{ $accountbalanceresult->completed_datetime }}</td>

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
                                                                <th>Original Conversation ID</th>
                                                                <th>Conversation ID</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Transaction ID</th>
                                                                <th>Account Balance</th>
                                                                <th>Completed DateTime</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer"></div>

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

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
   $('.spinner-border').hide();

});

//var stepper = new Stepper($('#stepper-accounttransactions')[0]);

$("#btnAccountBalance").click(function (e) {
    e.preventDefault();


    $.ajax({
        type: 'POST',
        url: "{{ url('/mpesa_account_balance') }}",
        data: $('#form_account_balance').serialize(),

        beforeSend: function () {
            $("#dvWorkingBalance").removeClass("bg-success");
            $("#dvFloatBalance").removeClass("bg-success");
            $("#dvUtilityBalance").removeClass("bg-success");

            $("#lbWorkingBalance").text("");
            $("#lbFloatBalance").text("");
            $("#lbUtilityBalance").text("");

            $("#lbAccountBalance").text("Please wait..");
            $('.spinner-border').show();
        },
        success: function (response) {

            $("#lbAccountBalance").text(response.OriginatorConversationID);
            $("#dvAccountBalance").addClass("bg-success");
            $.ajax({
                type: 'GET',
                url: "{{ url('/mpesa_callback/0') }}" + "/" + response.OriginatorConversationID,
                beforeSend: function () {
                    $("#dvWorkingBalance").removeClass("bg-success");
                    $("#dvFloatBalance").removeClass("bg-success");
                    $("#dvUtilityBalance").removeClass("bg-success");

                    $("#lbWorkingBalance").text("");
                    $("#lbFloatBalance").text("");
                    $("#lbUtilityBalance").text("");

                    $("#lbAccountBalance").text("");
                    $("#lbAccountBalance").text("Waiting for callback..");
                },
                success: function (response) {
                    $("#lbAccountBalance").text("");
                    $("#dvWorkingBalance").addClass("bg-success");
                    $("#dvFloatBalance").addClass("bg-success");
                    $("#dvUtilityBalance").addClass("bg-success");

                    $("#lbWorkingBalance").text("Working Balance: " + formatNumber(response[0]));
                    $("#lbFloatBalance").text("Float Balance: " + formatNumber(response[1]));
                    $("#lbUtilityBalance").text("Utility Balance: " + formatNumber(response[2]));
                    
                    $('.spinner-border').hide();
                },
                error: function (response) {
                    $("#lbAccountBalance").text("No Callback");
                }
            });
        },
        error: function (e) {
            $("#lbAccountBalanceMessage").text("Failed");
        }

    });

});









</script>