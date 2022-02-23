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
                        <li class="breadcrumb-item active">C2B</li>
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
                                Mpesa C2B
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-mpesa-c2b-tab" data-toggle="pill" href="#vert-tabs-mpesa-c2b" role="tab" aria-controls="vert-tabs-mpesa-c2b" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>
                                        <a class="nav-link text-info" id="vert-tabs-register-url-tab" data-toggle="pill" href="#vert-tabs-register-url" role="tab" aria-controls="vert-tabs-register-url" aria-selected="true">Register URL</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-mpesa-c2b" role="tabpanel" aria-labelledby="vert-tabs-mpesa-c2b-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_mpesa_c2b">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Mpesa C2B</h3>
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
                                                                <button type="button" id="btnMpesaC2B" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->

                                                    <div class="text-center text-success" id="dvMpesaC2B">

                                                        <label class="h3" id="lbMpesaC2B"></label>

                                                    </div>


                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-result" role="tabpanel" aria-labelledby="vert-tabs-result-tab">
                                            <div class="row">

                                                <div class="col-md-12">


                                                    <table id="tbl_c2b" class="table table-dt table-responsive table-bordered table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Transaction Type</th>
                                                                <th>Transaction ID</th>
                                                                <th>Transaction Time</th>
                                                                <th>First Name</th>
                                                                <th>Middle Name</th>
                                                                <th>Last Name</th>
                                                                <th>Business Short Code</th>
                                                                <th>Bill Ref Number</th>
                                                                <th>Invoice Number</th>
                                                                <th>MSISDN</th>
                                                                <th>Amount</th>
                                                                <th>Org Account Balance</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($c2btransactions as $c2btransaction)
                                                            <tr>
                                                                <td>{{ $c2btransaction->id }}</td>
                                                                <td>{{ $c2btransaction->transaction_type }}</td>
                                                                <td>{{ $c2btransaction->transaction_id }}</td>
                                                                <td>{{ $c2btransaction->transaction_time }}</td>
                                                                <td>{{ $c2btransaction->first_name }}</td>
                                                                <td>{{ $c2btransaction->middle_name }}</td>
                                                                <td>{{ $c2btransaction->last_name }}</td>
                                                                <td>{{ $c2btransaction->business_short_code }}</td>
                                                                <td>{{ $c2btransaction->bill_ref_number }}</td>
                                                                <td>{{ $c2btransaction->invoice_number }}</td>
                                                                <td>{{ $c2btransaction->msisdn }}</td>
                                                                <td>{{ $c2btransaction->transaction_amount }}</td>
                                                                <td>{{ $c2btransaction->org_account_balance }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>

                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Transaction Type</th>
                                                                <th>Transaction ID</th>
                                                                <th>Transaction Time</th>
                                                                <th>First Name</th>
                                                                <th>Middle Name</th>
                                                                <th>Last Name</th>
                                                                <th>Business Short Code</th>
                                                                <th>Bill Ref Number</th>
                                                                <th>Invoice Number</th>
                                                                <th>MSISDN</th>
                                                                <th>Amount</th>
                                                                <th>Org Account Balance</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="vert-tabs-register-url" role="tabpanel" aria-labelledby="vert-tabs-register-url-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_mpesa_register_url">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Mpesa Register URL</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label>Short Code</label>
                                                                    <select class="form-control select2 rounded-0" name="shortcode" id="shortcode" style="width: 100%;">
                                                                        <option selected="selected" value="600000">600000</option>
                                                                        <option>California</option>
                                                                        <option>Delaware</option>
                                                                        <option>Tennessee</option>
                                                                        <option>Texas</option>
                                                                        <option>Washington</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Validation URL</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="validationurl" name="validationurl" placeholder="Enter Validation URL">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Confirmation URL</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="confirmationurl" name="confirmationurl" placeholder="Enter Confirmation URL">
                                                                </div>



                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer">
                                                                <button type="button" id="btnMpesaRegisterURL" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->

                                                    <div class="text-center text-success" id="dvMpesaRegisterURL">

                                                        <label class="h3" id="lbMpesaRegisterURL"></label>

                                                    </div>


                                                </div>
                                                <div class="col-md-2"></div>
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
    validateRegisterURL();
    validateMpesaC2B();
});

$("#btnMpesaC2B").click(function (e) {

    e.preventDefault();
    if ($("#form_mpesa_c2b").valid()) {
        $.ajax({
            type: 'POST',
            url: "{{ url('/mpesa_c2b') }}",
            data: $('#form_mpesa_c2b').serialize(),
            beforeSend: function () {
                $("#dvMpesaC2B").removeClass("bg-success");
                $("#lbMpesaC2B").text("");
                $("#lbMpesaC2B").text("Please wait..");
            },
            success: function (response) {

                $("#lbMpesaC2B").text(response.ResponseDescription);
                $("#dvMpesaC2B").addClass("bg-success");
//            $.ajax({
//                type: 'get',
//                url: "{{ url('/mpesa_callback/2') }}"+"/"+response.OriginatorConversationID,
//                beforeSend: function () {
//                    $("#dvMpesaC2B").removeClass("bg-success");
//                    $("#lbMpesaC2B").text("Waiting for callback..");
//                },
//                success: function (response) {
//
//                    $("#dvMpesaC2B").addClass("bg-success");
//                    $("#lbMpesaC2B").text(response);
//
//                },
//                error: function (response) {
//                    $("#lbMpesaC2B").text("No Callback");
//                }
//            });
            },
            error: function (e) {
                $("#lbMpesaC2B").text("Failed");
            }

        });
    } else {
        return false;
    }
});

$("#btnMpesaRegisterURL").click(function (e) {

    e.preventDefault();
    if ($("#form_mpesa_register_url").valid()) {
        $.ajax({
            type: 'POST',
            url: "{{ url('/mpesa_register_url') }}",
            data: $('#form_mpesa_register_url').serialize(),
            beforeSend: function () {
                $("#dvMpesaRegisterURL").removeClass("bg-success");
                $("#lbMpesaRegisterURL").text("Please wait..");

            },
            success: function (response) {
                $("#dvMpesaRegisterURL").addClass("bg-success");
                $("#lbMpesaRegisterURL").text(response.ResponseDescription);
            }, error: function (e) {
                $("#lbMpesaRegisterURL").text("Failed");
            }

        });
    } else {
        return false;
    }
});

function validateRegisterURL() {

    $('#form_mpesa_register_url').validate({
        rules: {
            validationurl: {
                required: true
            },
            confirmationurl: {
                required: true
            }
        },
        messages: {
            validationurl: {
                required: "Please Enter Validation URL",
            },
            confirmationurl: {
                required: "Please Enter Confirmation URL",
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

function validateMpesaC2B() {

    $('#form_mpesa_c2b').validate({
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