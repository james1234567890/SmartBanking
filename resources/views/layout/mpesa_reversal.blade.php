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
                        <li class="breadcrumb-item active">Reversal</li>
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
                                Mpesa Reversal
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-mpesa-reversal-tab" data-toggle="pill" href="#vert-tabs-mpesa-reversal" role="tab" aria-controls="vert-tabs-mpesa-reversal" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-mpesa-reversal" role="tabpanel" aria-labelledby="vert-tabs-mpesa-reversal-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_mpesa_reversal">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Reversal</h3>
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
                                                                <div class="form-group">
                                                                    <label>Amount</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="amount" name="amount" placeholder="Enter Amount">
                                                                </div>


                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer">
                                                                <button type="button" id="btnReversal" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->

                                                    <div class="text-center text-success" id="dvReversal">

                                                        <label class="h3" id="lbReversal"></label>

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
                                                                <th>Short Code</th>
                                                                <th>Transaction ID</th>
                                                                <th>Amount</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Originator Conversation ID</th>
                                                                <th>Conversation ID</th>
                                                                <th>Result Transaction ID</th>



                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($reversalresults as $reversalresult)
                                                            <tr>
                                                                <td>{{ $reversalresult->id }}</td>
                                                                <td>{{ $reversalresult->request_id }}</td>
                                                                <td>{{ $reversalresult->request_type }}</td>
                                                                <td>{{ $reversalresult->request_by }}</td>
                                                                <td>{{ $reversalresult->request_date }}</td>
                                                                <td>{{ $reversalresult->request_time }}</td>
                                                                <td>{{ $reversalresult->short_code }}</td>
                                                                <td>{{ $reversalresult->transaction_id }}</td>
                                                                <td>{{ $reversalresult->amount }}</td>
                                                                <td>{{ $reversalresult->result_code }}</td>
                                                                <td>{{ $reversalresult->result_desc }}</td>
                                                                <td>{{ $reversalresult->originator_conversation_id }}</td>
                                                                <td>{{ $reversalresult->conversation_id }}</td>
                                                                <td>{{ $reversalresult->result_transaction_id }}</td>


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
                                                                <th>Short Code</th>
                                                                <th>Transaction ID</th>
                                                                <th>Amount</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Originator Conversation ID</th>
                                                                <th>Conversation ID</th>
                                                                <th>Result Transaction ID</th>
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
<script src="{{asset('adminlte/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jquery-validation/additional-methods.min.js')}}"></script><script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {

    validateMpesaReversal();

});


$("#btnReversal").click(function (e) {

    e.preventDefault();

    if ($("#form_mpesa_reversal").valid()) {
        $.ajax({
            type: 'POST',
            url: "{{ url('/mpesa_reversal') }}",
            data: $('#form_mpesa_reversal').serialize(),
            beforeSend: function () {
                $("#dvReversal").removeClass("bg-success");
                $("#lbReversal").text("");
                $("#lbReversal").text("Please wait..");
            },
            success: function (response) {

                $("#lbReversal").text(response.ResponseDescription);
                $("#dvReversal").addClass("bg-success");
                $.ajax({
                    type: 'get',
                    url: "{{ url('/mpesa_callback/7') }}" + "/" + response.OriginatorConversationID,
                    beforeSend: function () {
                        $("#dvReversal").removeClass("bg-success");

                        $("#lbReversal").text("");
                        $("#lbReversal").text("Waiting for callback..");
                    },
                    success: function (response) {

                        $("#dvReversal").addClass("bg-success");
                        $("#lbReversal").text(response);

                    },
                    error: function (response) {
                        $("#lbReversal").text("No Callback");
                    }
                });
            },
            error: function (e) {
                $("#lbReversal").text("Failed");
            }

        });
    } else {
        return false;
    }
});

function validateMpesaReversal() {

    $('#form_mpesa_reversal').validate({
        rules: {
            transactionid: {
                required: true
            },
            amount: {
                required: true,
                number: true
            }
        },
        messages: {
            transactionid: {
                required: "Please Enter Transaction ID"
            },
            amount: {
                required: "Please Enter Amount",
                number: "Please Enter Numbers"
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