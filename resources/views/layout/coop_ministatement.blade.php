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
                        <li class="breadcrumb-item"><a href="#">COOP</a></li>
                        <li class="breadcrumb-item active">Ministatement</li>
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
                                        <a class="nav-link active text-info" id="vert-tabs-ministatement-tab" data-toggle="pill" href="#vert-tabs-ministatement" role="tab" aria-controls="vert-tabs-ministatement" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>


                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-ministatement" role="tabpanel" aria-labelledby="vert-tabs-ministatement-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Ministatement</h3>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="bs-stepper" id="stepper-ministatement">
                                                                <div class="bs-stepper-header" role="tablist">
                                                                    <!-- your steps here -->
                                                                    <div class="step" data-target="#query-ministatement-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="query-ministatement-part" id="query-ministatement-part-trigger">
                                                                            <span class="bs-stepper-circle">1</span>
                                                                            <span class="bs-stepper-label">Query</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#result-ministatement-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="result-ministatement-part" id="result-ministatement-part-trigger">
                                                                            <span class="bs-stepper-circle">2</span>
                                                                            <span class="bs-stepper-label">Results</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="bs-stepper-content">
                                                                    <!-- your steps content here -->
                                                                    <div id="query-ministatement-part" class="content" role="tabpanel" aria-labelledby="query-ministatement-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-md-2"></div>
                                                                            <div class="col-md-8">
                                                                                <form id="form_ministatement">
                                                                                    <div class="card card-default">
                                                                                        <div class="card-header">
                                                                                            <h3 class="card-title text-center">Ministatement</h3>
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
                                                                                            <button type="button" id="btnMinistatement" class="btn btn-info btn-flat float-right">Submit</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form><!-- /.card -->

                                                                                <div class="text-center text-success" id="dvMinistatement">

                                                                                    <label class="h3" id="lbMinistatement"></label>

                                                                                </div>




                                                                            </div>

                                                                            <div class="col-sm-12">


                                                                            </div>
                                                                            <div class="col-md-2"></div>
                                                                        </div>
                                                                        <button class="btn btn-info btn-flat" onclick="stepper2.next()">Next</button>
                                                                    </div>
                                                                    <div id="result-ministatement-part" class="content" role="tabpanel" aria-labelledby="result-ministatement-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">

                                                                                <table id="tblMinistatement" class="table table-responsive table-bordered table-striped ">
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
                                                                        <button class="btn btn-info btn-flat" onclick="stepper2.previous()">Previous</button>

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
                                            <table id="tbl_ministatement_result" class="table table-dt table-responsive table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Request ID</th>
                                                        <th>Request Type</th>
                                                        <th>Request By</th>
                                                        <th>Request Date</th>
                                                        <th>Request Time</th>
                                                        <th>Message Reference</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($ministatementresults as $ministatementresult)
                                                    <tr>
                                                        <td>{{ $ministatementresult->id }}</td>
                                                        <td>{{ $ministatementresult->request_id }}</td>
                                                        <td>{{ $ministatementresult->request_type }}</td>
                                                        <td>{{ $ministatementresult->request_by }}</td>
                                                        <td>{{ $ministatementresult->request_date }}</td>
                                                        <td>{{ $ministatementresult->request_time }}</td>
                                                        <td>{{ $ministatementresult->message_reference }}</td>


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

        //$('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        // here is the new selected tab id
        var selectedTabId = e.target.id;

    });

var stepper2 = new Stepper($('#stepper-ministatement')[0]);
$("#btnMinistatement").click(function (e) {

    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: "{{ url('/coop_ministatement') }}",
        data: $('#form_ministatement').serialize(),
        beforeSend: function () {
            $("#lbMinistatement").text("Please wait..");
        },
        success: function (response) {
            stepper2.next();
            $("#lbMinistatement").text("");
            transactions = response.Transactions;
            $("#tblMinistatement").dataTable({
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
            $("#lbMinistatement").text("Failed");
        }

    });
});






</script>