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
                        <li class="breadcrumb-item active">Express</li>
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
                                Mpesa Express
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-mpesa-express-tab" data-toggle="pill" href="#vert-tabs-mpesa-express" role="tab" aria-controls="vert-tabs-mpesa-express" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-mpesa-express" role="tabpanel" aria-labelledby="vert-tabs-mpesa-express-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_mpesa_express">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Mpesa Express</h3>
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
                                                                    <label>Phone No.</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="phoneno" name="phoneno" placeholder="Enter Phone No.">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Amount</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="amount" name="amount" placeholder="Enter Amount">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Account Reference</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="accountreference" name="accountreference" placeholder="Enter Account Reference">
                                                                </div>


                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer">
                                                                <button type="button" id="btnMpesaExpress" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->

                                                    <div class="text-center text-success" id="dvMpesaExpress">

                                                        <label class="h3" id="lbMpesaExpress"></label>

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
                                                                <th>Phone No.</th>
                                                                <th>Amount</th>
                                                                <th>Account Reference</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Merchant Request ID</th>
                                                                <th>Checkout Request ID</th>


                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($expressresults as $expressresult)
                                                            <tr>
                                                                <td>{{ $expressresult->id }}</td>
                                                                <td>{{ $expressresult->request_id }}</td>
                                                                <td>{{ $expressresult->request_type }}</td>
                                                                <td>{{ $expressresult->request_by }}</td>
                                                                <td>{{ $expressresult->request_date }}</td>
                                                                <td>{{ $expressresult->request_time }}</td>
                                                                <td>{{ $expressresult->short_code }}</td>
                                                                <td>{{ $expressresult->phone_no }}</td>
                                                                <td>{{ $expressresult->amount }}</td>
                                                                <td>{{ $expressresult->account_reference }}</td>
                                                                <td>{{ $expressresult->result_code }}</td>
                                                                <td>{{ $expressresult->result_desc }}</td>
                                                                <td>{{ $expressresult->merchant_request_id }}</td>
                                                                <td>{{ $expressresult->checkout_request_id }}</td>


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
                                                                <th>Phone No.</th>
                                                                <th>Amount</th>
                                                                <th>Account Reference</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Merchant Request ID</th>
                                                                <th>Checkout Request ID</th>
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
    validateMpesaExpress();

});



$("#btnMpesaExpress").click(function (e) {

    e.preventDefault();
    if ($("#form_mpesa_express").valid()) {
        $.ajax({
            type: 'POST',
            url: "{{ url('/mpesa_express') }}",
            data: $('#form_mpesa_express').serialize(),
            beforeSend: function () {
                $("#dvMpesaExpress").removeClass("bg-success");
                $("#lbMpesaExpress").text("");
                $("#lbMpesaExpress").text("Please wait..");
            },
            success: function (response) {

                $("#lbMpesaExpress").text(response.ResponseDescription);
                $("#dvMpesaExpress").addClass("bg-success");
                $.ajax({
                    type: 'get',
                    url: "{{ url('/mpesa_callback/5') }}" + "/" + response.MerchantRequestID,
                    beforeSend: function () {
                        $("#dvMpesaExpress").removeClass("bg-success");

                        $("#lbMpesaExpress").text("");
                        $("#lbMpesaExpress").text("Waiting for callback..");
                    },
                    success: function (response) {

                        $("#dvMpesaExpress").addClass("bg-success");
                        $("#lbMpesaExpress").text(response);

                    },
                    error: function (response) {
                        $("#lbMpesaExpress").text("No Callback");
                    }
                });
            },
            error: function (e) {
                $("#lbMpesaExpress").text("Failed");
            }

        });
    } else {
        return false;
    }
});

function validateMpesaExpress() {

    $('#form_mpesa_express').validate({
        rules: {
            phoneno: {
                required: true,
                number: true,
                minlength: 12,
                maxlength: 12
            },
            amount: {
                required: true,
                number: true
            },
            accountreference: {
                required: true
            }

        },
        messages: {
            phoneno: {
                required: "Please Enter Phone No.",
                number: "Please Enter Numbers",
                minlength: "Phone No. cannot be less than 12 digits",
                maxlength: "Phone No. cannot exceed 12 digits"
            },
            amount: {
                required: "Please Enter Amount",
                number: "Please Enter Numbers"
            },
            accountreference: {
                required: "Please Enter Account Reference"

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