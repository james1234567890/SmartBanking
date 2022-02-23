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
                        <li class="breadcrumb-item active">Express Query</li>
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
                                Mpesa Express Query
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-mpesa-express-query-tab" data-toggle="pill" href="#vert-tabs-mpesa-express-query" role="tab" aria-controls="vert-tabs-mpesa-express-query" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-mpesa-express-query" role="tabpanel" aria-labelledby="vert-tabs-mpesa-express-query-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_mpesa_express_query">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Mpesa Express Query</h3>
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
                                                                    <label>Checkout Request ID</label>
                                                                    <input class="form-control form-control-sm rounded-0" type="text" id="checkoutrequestid" name="checkoutrequestid" placeholder="Enter Checkout Request ID">
                                                                </div>



                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer">
                                                                <button type="button" id="btnMpesaExpressQuery" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->

                                                    <div class="text-center text-success" id="dvMpesaExpressQuery">

                                                        <label class="h3" id="lbMpesaExpressQuery"></label>

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
                                                                <th>Response Code</th>
                                                                <th>Response Description</th>
                                                                <th>Result Code</th>
                                                                <th>Result Description</th>
                                                                <th>Merchant Request ID</th>
                                                                <th>Checkout Request ID</th>



                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($expressqueryresults as $expressqueryresult)
                                                            <tr>
                                                                <td>{{ $expressqueryresult->id }}</td>
                                                                <td>{{ $expressqueryresult->request_id }}</td>
                                                                <td>{{ $expressqueryresult->request_type }}</td>
                                                                <td>{{ $expressqueryresult->request_by }}</td>
                                                                <td>{{ $expressqueryresult->request_date }}</td>
                                                                <td>{{ $expressqueryresult->request_time }}</td>
                                                                <td>{{ $expressqueryresult->short_code }}</td>
                                                                <td>{{ $expressqueryresult->response_code }}</td>
                                                                <td>{{ $expressqueryresult->response_desc }}</td>
                                                                <td>{{ $expressqueryresult->result_code }}</td>
                                                                <td>{{ $expressqueryresult->result_desc }}</td>
                                                                <td>{{ $expressqueryresult->merchant_request_id }}</td>
                                                                <td>{{ $expressqueryresult->checkout_request_id }}</td>


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
                                                                <th>Response Code</th>
                                                                <th>Response Description</th>
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
   validateMpesaExpressQuery();

});

$("#btnMpesaExpressQuery").click(function (e) {

    e.preventDefault();
    if ($("#form_mpesa_express_query").valid()) {
        $.ajax({
            type: 'POST',
            url: "{{ url('/mpesa_express_query') }}",
            data: $('#form_mpesa_express_query').serialize(),
            beforeSend: function () {
                $("#dvMpesaExpressQuery").removeClass("bg-success");
                $("#lbMpesaExpressQuery").text("Please wait..");
            },
            success: function (response) {
                //responseobject = JSON.parse(response);

                $("#lbMpesaExpressQuery").text(response.ResultDesc);
                $("#dvMpesaExpressQuery").addClass("bg-success");

            },
            error: function (e) {
                $("#lbMpesaExpressQuery").text("Failed");
            }

        });
    } else {
        return false;
    }
});

function validateMpesaExpressQuery() {

    $('#form_mpesa_express_query').validate({
        rules: {
            checkoutrequestid: {
                required: true
            }

        },
        messages: {
            checkoutrequestid: {
                required: "Please Enter Checkout Request ID"
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