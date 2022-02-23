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
                        <li class="breadcrumb-item active">Transaction Status</li>
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
                                Transaction Status
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-transactionstatus-tab" data-toggle="pill" href="#vert-tabs-transactionstatus" role="tab" aria-controls="vert-tabs-transactionstatus" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-transactionstatus" role="tabpanel" aria-labelledby="vert-tabs-transactionstatus-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_transaction_status">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Transaction Status</h3>
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
                                                                <div class="form-group">
                                                                    <label>Transaction ID</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="transactionid" name="transactionid" placeholder="Enter Transaction ID">
                                                                </div>



                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer">
                                                                <button type="button" id="btnTransactionStatus" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->

                                                    <div class="text-center text-success" id="dvTransactionStatus">

                                                        <label class="h3" id="lbTransactionStatus"></label>

                                                    </div>


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
                                                                <th>Occasion</th>



                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($transactionstatusresults as $transactionstatusresult)
                                                            <tr>
                                                                <td>{{ $transactionstatusresult->id }}</td>
                                                                <td>{{ $transactionstatusresult->request_id }}</td>
                                                                <td>{{ $transactionstatusresult->request_type }}</td>
                                                                <td>{{ $transactionstatusresult->request_by }}</td>
                                                                <td>{{ $transactionstatusresult->request_date }}</td>
                                                                <td>{{ $transactionstatusresult->request_time }}</td>
                                                                <td>{{ $transactionstatusresult->originator_conversation_id }}</td>
                                                                <td>{{ $transactionstatusresult->conversation_id }}</td>
                                                                <td>{{ $transactionstatusresult->result_code }}</td>
                                                                <td>{{ $transactionstatusresult->result_desc }}</td>
                                                                <td>{{ $transactionstatusresult->transaction_id }}</td>
                                                                <td>{{ $transactionstatusresult->occasion }}</td>

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
                                                                <th>Occasion</th>
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
    validateTransactionStatus();


});


$("#btnTransactionStatus").click(function (e) {

    e.preventDefault();
if ($("#form_transaction_status").valid()) {
    $.ajax({
        type: 'POST',
        url: "{{ url('/mpesa_transaction_status') }}",
        data: $('#form_transaction_status').serialize(),
        beforeSend: function () {
            $("#dvTransactionStatus").removeClass("bg-success");
            $("#lbTransactionStatus").text("Please wait..");
        },
        success: function (response) {

            $("#lbTransactionStatus").text(response.OriginatorConversationID);
            $("#dvTransactionStatus").addClass("bg-success");
            $.ajax({
                type: 'GET',
                url: "{{ url('/mpesa_callback/1') }}"+"/"+response.OriginatorConversationID,
                beforeSend: function () {
                    $("#dvTransactionStatus").removeClass("bg-success");
                    $("#lbTransactionStatus").text("Waiting for callback..");
                },
                success: function (response) {

                    $("#dvTransactionStatus").addClass("bg-success");

                    $("#lbTransactionStatus").text(response);

                },
                error: function (response) {
                    $("#lbTransactionStatus").text("No Callback");
                }
            });
        },
        error: function (e) {
            $("#lbTransactionStatus").text("Failed");
        }

    });
    }else{
        return false;
    }
});

function validateTransactionStatus() {

    $('#form_transaction_status').validate({
        rules: {
            transactionid: {
                required: true
            }
           
        },
        messages: {
            transactionid: {
                required: "Please Enter Transaction ID"
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