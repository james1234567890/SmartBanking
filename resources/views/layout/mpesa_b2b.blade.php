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
                        <li class="breadcrumb-item active">B2B</li>
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
                                Mpesa B2B
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-mpesa-b2b-tab" data-toggle="pill" href="#vert-tabs-mpesa-b2b" role="tab" aria-controls="vert-tabs-mpesa-b2b" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-mpesa-b2b" role="tabpanel" aria-labelledby="vert-tabs-mpesa-b2b-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_mpesa_b2b">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Mpesa B2B</h3>
                                                            </div>
                                                            <div class="card-body">

                                                                <div class="form-group">
                                                                    <label>Sender Short Code</label>
                                                                    <select class="form-control select2 rounded-0" name="sendershortcode" id="sendershortcode" style="width: 100%;">
                                                                       <option selected="selected">Select Short Code</option>
                                                                         @foreach ($bankaccounts as $bankaccount)
                                                                            <option value="{{ $bankaccount->bank_account_no }}">{{ $bankaccount->bank_account_no }}</option>
                                                                         @endforeach
                                                                    </select>
                                                                </div>

                                                                 <div class="form-group">
                                                                    <label>Receiver Short Code</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="receivershortcode" name="receivershortcode" placeholder="Enter Receiver Short Code">
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
                                                                <button type="button" id="btnMpesaB2B" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->
                                                    <div class="text-center text-success " id="dvMpesaB2B">
                                                        <label class="h3 " id="lbMpesaB2B"></label>
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
                                                                <th>Sender Short Code</th>
                                                                <th>Receiver Short Code</th>
                                                                <th>Amount</th>
                                                                <th>Account Reference</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Originator Conversation ID</th>
                                                                <th>Conversation ID</th>
                                                                <th>Transaction ID</th>


                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($b2bresults as $b2bresult)
                                                            <tr>
                                                                <td>{{ $b2bresult->id }}</td>
                                                                <td>{{ $b2bresult->request_id }}</td>
                                                                <td>{{ $b2bresult->request_type }}</td>
                                                                <td>{{ $b2bresult->request_by }}</td>
                                                                <td>{{ $b2bresult->request_date }}</td>
                                                                <td>{{ $b2bresult->request_time }}</td>
                                                                <td>{{ $b2bresult->sender_shortcode }}</td>
                                                                <td>{{ $b2bresult->receiver_shortcode }}</td>
                                                                <td>{{ $b2bresult->amount }}</td>
                                                                <td>{{ $b2bresult->account_reference }}</td>
                                                                <td>{{ $b2bresult->result_code }}</td>
                                                                <td>{{ $b2bresult->result_desc }}</td>
                                                                <td>{{ $b2bresult->originator_conversation_id }}</td>
                                                                <td>{{ $b2bresult->conversation_id }}</td>
                                                                <td>{{ $b2bresult->transaction_id }}</td>


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
                                                                <th>Sender Short Code</th>
                                                                <th>Receiver Short Code</th>
                                                                <th>Amount</th>
                                                                <th>Account Reference</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Originator Conversation ID</th>
                                                                <th>Conversation ID</th>
                                                                <th>Transaction ID</th>
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
    validateMpesaB2B();
    $('#sendershortcode').change(function () {
        if ($(this).val() != "")
        {
            $(this).valid();
            $('#receivershortcode').valid();
        }
    });
    $('#receivershortcode').change(function () {
        if ($(this).val() != "")
        {
            $(this).valid();
            $('#sendershortcode').valid();
        }
    });

});


$("#btnMpesaB2B").click(function (e) {

    e.preventDefault();
    if ($("#form_mpesa_b2b").valid()) {
        $.ajax({
            type: 'POST',
            url: "{{ url('/mpesa_b2b') }}",
            data: $('#form_mpesa_b2b').serialize(),
            beforeSend: function () {
                $("#dvMpesaB2B").removeClass("bg-success");
                $("#lbMpesaB2B").text("Please wait..").addClass('text-success');
            },
            success: function (response) {

                $("#lbMpesaB2B").text(response);
                $("#dvMpesaB2B").addClass("bg-success");
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/mpesa_callback/4') }}" + "/" + response.OriginatorConversationID,
                    beforeSend: function () {
                        $("#dvMpesaB2B").removeClass("bg-success");
                        $("#lbMpesaB2B").text("Waiting for callback..");
                    },
                    success: function (response) {

                        $("#dvMpesaB2B").addClass("bg-success");
                        $("#lbMpesaB2B").text(response).removeClass('text-success');

                    },
                    error: function (response) {
                        $("#lbMpesaB2B").text("No Callback");
                    }
                });
            },
            error: function (e) {
                $("#lbMpesaB2B").text("Failed");
            }

        });
    } else {
        return false;
    }
});

function validateMpesaB2B() {

    $('#form_mpesa_b2b').validate({
        rules: {
            sendershortcode: {
                required: true,
                notEqualTo: '#receivershortcode'

            },
            receivershortcode: {
                required: true,
                notEqualTo: '#sendershortcode'

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
            sendershortcode: {
                required: "Please Select Sender Short Code",
                notEqualTo: "Sender Short Code cannot be the same as Receiver Short Code"
            },
            receivershortcode: {
                required: "Please Select Receiver Short Code",
                notEqualTo: "Receiver Short Code cannot be the same as Sender Short Code"
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
            $(element)
                    .closest('.form-group').removeClass('has-error');
        },

    });
}







</script>