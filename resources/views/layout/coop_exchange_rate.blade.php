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
                        <li class="breadcrumb-item active">Exchange Rate</li>
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
                                        <a class="nav-link active text-info" id="vert-tabs-exchangerate-tab" data-toggle="pill" href="#vert-tabs-exchangerate" role="tab" aria-controls="vert-tabs-exchangerate" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>


                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-exchangerate" role="tabpanel" aria-labelledby="vert-tabs-exchangerate-tab">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <form id="form_exchange_rate">
                                                        @csrf
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title text-center">Exchange Rate</h3>
                                                            </div>
                                                            <div class="card-body">





                                                            </div>
                                                            <!-- /.card-body -->
                                                            <div class="card-footer">
                                                                <button type="button" id="btnExchangeRate" class="btn btn-info btn-flat float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form><!-- /.card -->

                                                    <div class="text-center text-success" id="dvExchangeRate">
                                                        <label class="h3" id="lbExchangeRate"></label>
                                                        <!--                                                        <label class="h3" id="lbFromCurrencyCode"></label>
                                                                                                                <label class="h3" id="lbToCurrencyCode"></label>
                                                                                                                <label class="h3" id="lbRateType"></label>
                                                                                                                <label class="h3" id="lbRate"></label>
                                                                                                                <label class="h3" id="lbTolerance"></label>
                                                                                                                <label class="h3" id="lbMultiplyDivide"></label>-->

                                                    </div>


                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-result" role="tabpanel" aria-labelledby="vert-tabs-result-tab">
                                            <table id="tbl_exchangerate_result" class="table table-dt table-responsive table-bordered table-striped ">
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
                                                    @foreach ($exchangerateresults as $exchangerateresult)
                                                    <tr>
                                                        <td>{{ $exchangerateresult->id }}</td>
                                                        <td>{{ $exchangerateresult->request_id }}</td>
                                                        <td>{{ $exchangerateresult->request_type }}</td>
                                                        <td>{{ $exchangerateresult->request_by }}</td>
                                                        <td>{{ $exchangerateresult->request_date }}</td>
                                                        <td>{{ $exchangerateresult->request_time }}</td>
                                                        <td>{{ $exchangerateresult->message_reference }}</td>
                                                        <td>{{ $exchangerateresult->raw_response }}</td>


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


});


$("#btnExchangeRate").click(function (e) {

    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: "{{ url('/coop_exchange_rate') }}",
        data: $('#form_exchange_rate').serialize(),
        beforeSend: function () {
            $("#dvExchangeRate").removeClass("bg-success");
            $("#lbExchangeRate").text("Please wait..");

        },
        success: function (response) {
            $("#dvExchangeRate").addClass("bg-success");
            $("#lbExchangeRate").text(response.FromCurrencyCode + "->" +
                    response.ToCurrencyCode + "    " + response.Rate);
                                                                                       $("#lbFromCurrencyCode").text(response.FromCurrencyCode);
        }, error: function (e) {
            $("#lbExchangeRate").text("Failed");
        }

    });
});









</script>