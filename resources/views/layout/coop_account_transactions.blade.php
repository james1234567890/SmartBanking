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
                        <li class="breadcrumb-item active">Account Transactions</li>
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
                                        <a class="nav-link active text-info" id="vert-tabs-accounttransactions-tab" data-toggle="pill" href="#vert-tabs-accounttransactions" role="tab" aria-controls="vert-tabs-accounttransactions" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>


                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-accounttransactions" role="tabpanel" aria-labelledby="vert-tabs-accounttransactions-tab">


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Account Transactions</h3>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="bs-stepper" id="stepper-accounttransactions">
                                                                <div class="bs-stepper-header" role="tablist">
                                                                    <!-- your steps here -->
                                                                    <div class="step" data-target="#query-account-transactions-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="query-account-transactions-part" id="query-account-transactions-part-trigger">
                                                                            <span class="bs-stepper-circle">1</span>
                                                                            <span class="bs-stepper-label">Query</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#result-account-transactions-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="result-account-transactions-part" id="result-account-transactions-part-trigger">
                                                                            <span class="bs-stepper-circle">2</span>
                                                                            <span class="bs-stepper-label">Results</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="bs-stepper-content">
                                                                    <!-- your steps content here -->
                                                                    <div id="query-account-transactions-part" class="content" role="tabpanel" aria-labelledby="query-account-transactions-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-md-2"></div>
                                                                            <div class="col-md-8">
                                                                                <form id="form_account_transactions">
                                                                                    <div class="card card-info">
                                                                                        <div class="card-header">
                                                                                            <h3 class="card-title text-center">Account Transactions</h3>
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
                                                                                            <div class="form-group">
                                                                                                <label>No. of Transactions</label>
                                                                                                <input class="form-control form-control-sm rounded-0" type="text" name="nooftransactions" id="nooftransactions" placeholder="Enter No. of Transactions">
                                                                                            </div>


                                                                                        </div>
                                                                                        <!-- /.card-body -->
                                                                                        <div class="card-footer">
                                                                                            <button type="button" id="btnAccountTransactions" class="btn btn-info btn-flat float-right">Submit</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form><!-- /.card -->

                                                                                <div class="text-center text-success" id="dvAccountTransactions">

                                                                                    <label class="h3" id="lbAccountTransactions"></label>

                                                                                </div>




                                                                            </div>

                                                                            <div class="col-sm-12">


                                                                            </div>
                                                                            <div class="col-md-2"></div>
                                                                        </div>
                                                                        <button class="btn btn-info btn-flat" onclick="stepper.next()">Next</button>
                                                                    </div>
                                                                    <div id="result-account-transactions-part" class="content" role="tabpanel" aria-labelledby="result-account-transactions-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">

                                                                                <table id="tblAccountTransactions" class="table table-responsive table-bordered table-striped ">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Transaction ID</th>
                                                                                            <th>Transaction Date</th>
                                                                                            <th>Value Date</th>
                                                                                            <th>Narration</th>
                                                                                            <th>Service Point</th>
                                                                                            <th>Transaction Reference</th>
                                                                                            <th>Debit Amount</th>
                                                                                            <th>Credit Amount</th>
                                                                                            <th>Running Cleared Balance</th>
                                                                                            <th>Running Book Balance</th>
                                                                                            <th>Debit Limit</th>
                                                                                            <th>Limit Expiry Date</th>

                                                                                        </tr>
                                                                                    </thead>

                                                                                    <tbody>

                                                                                    </tbody>

                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th>Transaction ID</th>
                                                                                            <th>Transaction Date</th>
                                                                                            <th>Value Date</th>
                                                                                            <th>Narration</th>
                                                                                            <th>Service Point</th>
                                                                                            <th>Transaction Reference</th>
                                                                                            <th>Debit Amount</th>
                                                                                            <th>Credit Amount</th>
                                                                                            <th>Running Cleared Balance</th>
                                                                                            <th>Running Book Balance</th>
                                                                                            <th>Debit Limit</th>
                                                                                            <th>Limit Expiry Date</th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table> 
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-info btn-flat" onclick="stepper.previous()">Previous</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer">
                                                            Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                                                        </div>
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                            <!-- /.row -->


                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-result" role="tabpanel" aria-labelledby="vert-tabs-result-tab">
                                            <table id="tbl_account_transactions_result" class="table table-dt table-responsive table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Request ID</th>
                                                        <th>Request Type</th>
                                                        <th>Request By</th>
                                                        <th>Request Date</th>
                                                        <th>Request Time</th>
                                                         <th>Message Reference</th>
                                                          <th>Raw Response</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($accounttransactionsresults as $accounttransactionsresult)
                                                    <tr>
                                                        <td>{{ $accounttransactionsresult->id }}</td>
                                                        <td>{{ $accounttransactionsresult->request_id }}</td>
                                                        <td>{{ $accounttransactionsresult->request_type }}</td>
                                                        <td>{{ $accounttransactionsresult->request_by }}</td>
                                                        <td>{{ $accounttransactionsresult->request_date }}</td>
                                                        <td>{{ $accounttransactionsresult->request_time }}</td>
                                                         <td>{{ $accounttransactionsresult->message_reference }}</td>
                                                          <td>{{ $accounttransactionsresult->raw_response }}</td>


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
                                                         <th>Message Reference</th>
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

validateAccountTransactions();
});
var stepper = new Stepper($('#stepper-accounttransactions')[0]);
$("#btnAccountTransactions").click(function (e) {

   e.preventDefault();
 if ($("#form_account_transactions").valid()) { 
   $.ajax({
       type: 'POST',
       url: "{{ url('/coop_account_transactions') }}",
       data: $('#form_account_transactions').serialize(),
       beforeSend: function () {
           $("#lbAccountTransactions").text("Please wait..");
       },
       success: function (response) {
           stepper.next();
           $("#lbAccountTransactions").text("");
           transactions = response.Transactions;
           $("#tblAccountTransactions").dataTable({
               "dom": "Bfrtip",
               "responsive": true,
               "lengthChange": false,
               "autoWidth": false,
               "destroy": true,
               "data": transactions,
               "columns": [
                   {"data": "TransactionID"},
                   {"data": "TransactionDate"},
                   {"data": "ValueDate"},
                   {"data": "Narration"},
                   {"data": "ServicePoint"},
                   {"data": "TransactionReference"},
                   {"data": "DebitAmount"},
                   {"data": "CreditAmount"},
                   {"data": "RunningClearedBalance"},
                   {"data": "RunningBookBalance"},
                   {"data": "DebitLimit"},
                   {"data": "LimitExpiryDate"},
               ]
           });


       },
       error: function (e) {
           $("#lbAccountTransactions").text("Failed");
       }

   });
 }else{
     return false;
 }
});


function validateAccountTransactions() {

    $('#form_account_transactions').validate({
        rules: {
            nooftransactions: {
                required: true
            }
        },
        messages: {
            nooftransactions: {
                required: "Please Enter No. of Transactions"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}


</script>