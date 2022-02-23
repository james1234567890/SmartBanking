<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">COOP</a></li>
                        <li class="breadcrumb-item active">PesaLink to Account</li>
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
                                        <a class="nav-link active text-info" id="vert-tabs-pesalinktoaccount-tab" data-toggle="pill" href="#vert-tabs-pesalinktoaccount" role="tab" aria-controls="vert-tabs-pesalinktoaccount" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>


                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-pesalinktoaccount" role="tabpanel" aria-labelledby="vert-tabs-pesalinktoaccount-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">PesaLink to Account</h3>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="bs-stepper" id="stepper-pesalinktoaccount">
                                                                <div class="bs-stepper-header" role="tablist">
                                                                    <!-- your steps here -->
                                                                    <div class="step" data-target="#pesalinktoaccount-source-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="pesalinktoaccount-source-part" id="pesalinktoaccount-source-part-trigger">
                                                                            <span class="bs-stepper-circle">1</span>
                                                                            <span class="bs-stepper-label">Source</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#pesalinktoaccount-destination-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="pesalinktoaccount-destination-part" id="pesalinktoaccount-destination-part-trigger">
                                                                            <span class="bs-stepper-circle">2</span>
                                                                            <span class="bs-stepper-label">Destination</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#pesalinktoaccount-finish-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="pesalinktoaccount-finish-part" id="pesalinktoaccount-finish-part-trigger">
                                                                            <span class="bs-stepper-circle">3</span>
                                                                            <span class="bs-stepper-label">Finish</span>
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                                <div class="bs-stepper-content">
                                                                    <!-- your steps content here -->
                                                                    <div id="pesalinktoaccount-source-part" class="content" role="tabpanel" aria-labelledby="pesalinktoaccount-source-part-trigger">
                                                                        <form id="form_pesalinktoaccount_source">
                                                                            <div class="row">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Source Account No.</label>
                                                                                        <select class="form-control select2 rounded-0" name="sourceaccountno" id="sourceaccountno" style="width: 100%;">
                                                                                            <option selected="selected" value="Select Account">Select Account</option>
                                                                                            <option  value="36001873000">36001873000</option>
                                                                                            <option>Alaska</option>
                                                                                            <option>California</option>
                                                                                            <option>Delaware</option>
                                                                                            <option>Tennessee</option>
                                                                                            <option>Texas</option>
                                                                                            <option>Washington</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Amount</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="amount" id="amount" placeholder="Enter Amount">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Narration</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="narration" id="narration" placeholder="Enter Narration">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6"></div>



                                                                            </div>
                                                                        </form>
                                                                        <button  class="btn btn-info btn-flat" id="btnPesaLinkToAccountSource">Next</button>

                                                                    </div>
                                                                    <div id="pesalinktoaccount-destination-part" class="content" role="tabpanel" aria-labelledby="pesalinktoaccount-destination-part-trigger">

                                                                        <form id="form_pesalinktoaccount_destination">
                                                                            <div class="row">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Destination Account No.</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="destinationaccountno" id="destinationaccountno" placeholder="Enter Destination Account No.">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Destination Bank Code</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="destinationbankcode" id="destinationbankcode" placeholder="Enter Destination Bank Code">
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-sm-6"></div>

                                                                            </div>
                                                                        </form>
                                                                        <button class="btn btn-primary btn-flat" onclick="stepper6.previous()">Previous</button>
                                                                        <button type="submit" class="btn btn-info btn-flat float-right" id="btnPesaLinkToAccountDestination">Next</button>

                                                                    </div>
                                                                    <div id="pesalinktoaccount-finish-part" class="content" role="tabpanel" aria-labelledby="pesalinktoaccount-finish-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-sm-2"></div>
                                                                            <div class="col-sm-8 text-center text-success">
                                                                                <label class="h3" id="lbPesaLinkToAccountFinish"></label>

                                                                            </div>
                                                                            <div class="col-sm-2"></div>
                                                                        </div>

                                                                        <button class="btn btn-primary btn-flat" onclick="stepper6.previous()">Previous</button>
                                                                        <button type="button" class="btn btn-info btn-flat float-right" id="btnPesaLinkToAccountFinish">Post</button>
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
                                            <table id="tbl_pesalinktoaccount_result" class="table table-dt table-responsive table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Request ID</th>
                                                        <th>Request Type</th>
                                                        <th>Request By</th>
                                                        <th>Request Date</th>
                                                        <th>Request Time</th>
                                                        <th>Message Reference</th>
                                                        <th>Message Code</th>
                                                        <th>Message Description</th>
                                                        <th>Raw Response</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($pesalinktoaccountresults as $pesalinktoaccountresult)
                                                    <tr>
                                                        <td>{{ $pesalinktoaccountresult->id }}</td>
                                                        <td>{{ $pesalinktoaccountresult->request_id }}</td>
                                                        <td>{{ $pesalinktoaccountresult->request_type }}</td>
                                                        <td>{{ $pesalinktoaccountresult->request_by }}</td>
                                                        <td>{{ $pesalinktoaccountresult->request_date }}</td>
                                                        <td>{{ $pesalinktoaccountresult->request_time }}</td>
                                                        <td>{{ $pesalinktoaccountresult->message_reference }}</td>
                                                        <td>{{ $pesalinktoaccountresult->message_code }}</td>
                                                        <td>{{ $pesalinktoaccountresult->message_description }}</td>
                                                        <td>{{ $pesalinktoaccountresult->raw_response }}</td>


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
                                                        <th>Message Code</th>
                                                        <th>Message Description</th>
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
                                                                                validatePesaLinkToAccount();

                                                                            });

                                                                            var stepper6 = new Stepper($('#stepper-pesalinktoaccount')[0]);

                                                                            $('#btnPesaLinkToAccountSource').click(function () {
                                                                                if ($('#form_pesalinktoaccount_source').valid()) {


                                                                                    $.ajax({
                                                                                        url: "{{ url('/pesalink_to_account_source') }}",
                                                                                        type: 'POST',
                                                                                        data: $('#form_pesalinktoaccount_source').serialize(),

                                                                                        success: function (response) {

                                                                                            //alert(response.success);
                                                                                            stepper6.next();

                                                                                        }

                                                                                    });



                                                                                } else {
                                                                                    return false;
                                                                                }
                                                                            });
                                                                            $('#btnPesaLinkToAccountDestination').click(function () {
                                                                                if ($('#form_pesalinktoaccount_destination').valid()) {
                                                                                    //e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: "{{ url('/pesalink_to_account_destination') }}",
                                                                                        data: $('#form_pesalinktoaccount_destination').serialize(),
                                                                                        success: function (response) {

                                                                                            //alert(response.success);
                                                                                            stepper6.next();

                                                                                        }
                                                                                    });

                                                                                    // stepper4.next();
                                                                                } else {
                                                                                    return false;
                                                                                }
                                                                            });
                                                                            $('#btnPesaLinkToAccountFinish').click(function () {

                                                                                $.ajax({
                                                                                    type: 'POST',
                                                                                    url: "{{ url('/coop_pesalink_to_account') }}",
                                                                                    //data: $('#form_transaction_status').serialize(),
                                                                                    beforeSend: function () {
                                                                                        $("#lbPesaLinkToAccountFinish").text("Please wait..");
                                                                                    },
                                                                                    success: function (response) {
                                                                                        //$("#dvTransactionStatus").addClass("bg-success");
                                                                                        $("#lbPesaLinkToAccountFinish").text(response.MessageDescription),
//                                                                                        $.ajax({
//                                                                                            type: 'GET',
//                                                                                            url: "{{ url('/coop_callback/2') }}" + "/" + response.MessageReference,
//                                                                                            beforeSend: function () {
//                                                                                                $("#lbPesaLinkToAccountFinish").text("Waiting for callback..");
//                                                                                            },
//                                                                                            success: function (response) {
//                                                                                                $("#lbPesaLinkToAccountFinish").text(response);
//
//                                                                                            },
//                                                                                            error: function (response) {
//                                                                                                $("#lbPesaLinkToAccountFinish").text("No Callback");
//                                                                                            }
//                                                                                        });
                                                                                    },
                                                                                    error: function (e) {
                                                                                        $("#lbPesaLinkToAccountFinish").text("Failed");
                                                                                    }
                                                                                });

                                                                                stepper6.next();

                                                                            });

                                                                            function validatePesaLinkToAccount() {

                                                                                $('#form_pesalinktoaccount_source').validate({
                                                                                    rules: {

                                                                                        amount: {
                                                                                            required: true,
                                                                                            number: true
                                                                                        },
                                                                                        narration: {
                                                                                            required: true
                                                                                        }

                                                                                    },
                                                                                    messages: {

                                                                                        amount: {
                                                                                            required: "Please Enter Amount",
                                                                                            number: "Please Enter Numbers"
                                                                                        },
                                                                                        narration: {
                                                                                            required: "Please Enter Narration"

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

                                                                                $('#form_pesalinktoaccount_destination').validate({
                                                                                    rules: {

                                                                                        destinationaccountno: {
                                                                                            required: true,
                                                                                            number: true

                                                                                        },
                                                                                        destinationbankcode: {
                                                                                            required: true,
                                                                                            number: true

                                                                                        }


                                                                                    },
                                                                                    messages: {

                                                                                        destinationaccountno: {
                                                                                            required: "Please Enter Destination Account No.",
                                                                                            number: "Please Enter Numbers"

                                                                                        },
                                                                                        destinationbankcode: {
                                                                                            required: "Please Enter Destination Bank Code",
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