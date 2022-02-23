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
                        <li class="breadcrumb-item active">Fullstatement</li>
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
                                        <a class="nav-link active text-info" id="vert-tabs-fullstatement-tab" data-toggle="pill" href="#vert-tabs-fullstatement" role="tab" aria-controls="vert-tabs-fullstatement" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>


                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-fullstatement" role="tabpanel" aria-labelledby="vert-tabs-fullstatement-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Full statement</h3>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="bs-stepper" id="stepper-fullstatement">
                                                                <div class="bs-stepper-header" role="tablist">
                                                                    <!-- your steps here -->
                                                                    <div class="step" data-target="#query-fullstatement-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="query-fullstatement-part" id="query-fullstatement-part-trigger">
                                                                            <span class="bs-stepper-circle">1</span>
                                                                            <span class="bs-stepper-label">Query</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#result-fullstatement-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="result-fullstatement-part" id="result-fullstatement-part-trigger">
                                                                            <span class="bs-stepper-circle">2</span>
                                                                            <span class="bs-stepper-label">Results</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="bs-stepper-content">
                                                                    <!-- your steps content here -->
                                                                    <div id="query-fullstatement-part" class="content" role="tabpanel" aria-labelledby="query-fullstatement-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-md-2"></div>
                                                                            <div class="col-md-8">
                                                                                <form id="form_fullstatement">
                                                                                    <div class="card card-default">
                                                                                        <div class="card-header">
                                                                                            <h3 class="card-title text-center">Full Statement</h3>
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
                                                                                                <label>No. of Months Backwards</label>
                                                                                                <input class="form-control form-control-sm rounded-0" type="text" name="noofmonthsbackwards" id="noofmonthsbackwards" placeholder="Enter No. of Months">
                                                                                            </div>

                                                                                        </div>
                                                                                        <!-- /.card-body -->
                                                                                        <div class="card-footer">
                                                                                            <button type="button" id="btnFullstatement" class="btn btn-info btn-flat float-right">Submit</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form><!-- /.card -->

                                                                                <div class="text-center text-success" id="dvFullstatement">

                                                                                    <label class="h3" id="lbFullstatement"></label>

                                                                                </div>




                                                                            </div>

                                                                            <div class="col-sm-12">


                                                                            </div>
                                                                            <div class="col-md-2"></div>
                                                                        </div>
                                                                        <button class="btn btn-info btn-flat" onclick="stepper3.next()">Next</button>
                                                                    </div>
                                                                    <div id="result-fullstatement-part" class="content" role="tabpanel" aria-labelledby="result-fullstatement-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">

                                                                                <table id="tblFullstatement" class="table table-responsive table-bordered table-striped ">
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
                                                                        <button class="btn btn-info btn-flat" onclick="stepper3.previous()">Previous</button>

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
                                            <table id="tbl_fullstatement_result" class="table table-dt table-responsive table-bordered table-striped ">
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
                                                    @foreach ($fullstatementresults as $fullstatementresult)
                                                    <tr>
                                                        <td>{{ $fullstatementresult->id }}</td>
                                                        <td>{{ $fullstatementresult->request_id }}</td>
                                                        <td>{{ $fullstatementresult->request_type }}</td>
                                                        <td>{{ $fullstatementresult->request_by }}</td>
                                                        <td>{{ $fullstatementresult->request_date }}</td>
                                                        <td>{{ $fullstatementresult->request_time }}</td>
                                                        <td>{{ $fullstatementresult->message_reference }}</td>


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
    validateFullstatement();

});

var stepper3 = new Stepper($('#stepper-fullstatement')[0]);
$("#btnFullstatement").click(function (e) {

    e.preventDefault();
 if ($("#form_fullstatement").valid()) { 
    $.ajax({
        type: 'POST',
        url: "{{ url('/coop_fullstatement') }}",
        data: $('#form_fullstatement').serialize(),
        beforeSend: function () {
            $("#lbFullstatement").text("Please wait..");
        },
        success: function (response) {
            stepper3.next();
            $("#lbFullstatement").text("");
            transactions = response.Transactions;
            $("#tblFullstatement").dataTable({
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
            $("#lbFullstatement").text("Failed");
        }

    });
    }else{
        return false;
    }
});

function validateFullstatement() {

    $('#form_fullstatement').validate({
        rules: {
            noofmonthsbackwards: {
                required: true
            }
        },
        messages: {
            noofmonthsbackwards: {
                required: "Please Enter No. of Months"
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