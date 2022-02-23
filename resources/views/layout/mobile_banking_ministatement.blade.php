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
                        <li class="breadcrumb-item"><a href="#">Mobile Banking</a></li>
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
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-tasks"></i>
                                Ministatement
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">

                                       <table id="tbl_result" class="table table-dt table-responsive table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Request ID</th>
                                                <th>Channel Type</th>
                                                <th>Account Type</th>
                                                <th>Account No.</th>
                                                <th>Account Name</th>
                                                <th>Phone No.</th>
                                                <th>Response Code</th>
                                                <th>Response Description</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>
                                                 <th>Posted</th>
                                                 <th>Posted Date</th>
                                                <th>Posted Time</th>
                                             

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($mobilebankingministatements as $mobilebankingministatement)
                                            <tr>
                                                <td>{{ $mobilebankingministatement->id }}</td>
                                                <td>{{ $mobilebankingministatement->request_id }}</td>
                                                <td>{{ $mobilebankingministatement->channel_type }}</td>
                                                <td>{{ $mobilebankingministatement->account_type }}</td>
                                                <td>{{ $mobilebankingministatement->account_no }}</td>
                                                <td>{{ $mobilebankingministatement->account_name }}</td>
                                                <td>{{ $mobilebankingministatement->phone_no }}</td>
                                                <td>{{ $mobilebankingministatement->response_code }}</td>
                                                <td>{{ $mobilebankingministatement->response_desc }}</td>
                                                <td>{{ $mobilebankingministatement->transaction_date }}</td>
                                                <td>{{ $mobilebankingministatement->transaction_time }}</td>
                                                <td>{{ $mobilebankingministatement->posted }}</td>
                                                <td>{{ $mobilebankingministatement->posted_date }}</td>
                                                <td>{{ $mobilebankingministatement->posted_time }}</td>
                                              
                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Request ID</th>
                                                <th>Channel Type</th>
                                                <th>Account Type</th>
                                                <th>Account No.</th>
                                                <th>Account Name</th>
                                                <th>Phone No.</th>
                                                <th>Response Code</th>
                                                <th>Response Description</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>
                                                 <th>Posted</th>
                                                 <th>Posted Date</th>
                                                <th>Posted Time</th>
                                            </tr>
                                        </tfoot>
                                    </table>

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


});









</script>