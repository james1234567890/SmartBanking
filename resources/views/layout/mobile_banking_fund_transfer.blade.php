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
                        <li class="breadcrumb-item active">Fund Transfer</li>
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
                                Fund Transfer
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
                                                <th>Source Account No.</th>
                                                <th>Source Account Name</th>
                                                <th>Destination Account Ownership</th>
                                                <th>Destination Account Type</th>
                                                <th>Destination Account No.</th>
                                                <th>Destination Account Name</th>
                                                <th>Amount</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>                                            
                                                <th>Response Code</th>
                                                <th>Response Description</th>
                                                <th>Posted</th>
                                                <th>Posted Date</th>
                                                <th>Posted Time</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($mobilebankingfundtransfers as $mobilebankingfundtransfer)
                                            <tr>
                                                <td>{{ $mobilebankingfundtransfer->id }}</td>
                                                <td>{{ $mobilebankingfundtransfer->request_id }}</td>
                                                 <td>{{ $mobilebankingfundtransfer->channel_type }}</td>
                                                <td>{{ $mobilebankingfundtransfer->source_account_no }}</td>
                                                <td>{{ $mobilebankingfundtransfer->source_account_name }}</td>
                                                <td>{{ $mobilebankingfundtransfer->destination_account_owner}}</td>
                                                <td>{{ $mobilebankingfundtransfer->destination_account_type }}</td>
                                                <td>{{ $mobilebankingfundtransfer->destination_account_no }}</td>
                                                <td>{{ $mobilebankingfundtransfer->destination_account_name }}</td>
                                                <td>{{ $mobilebankingfundtransfer->amount }}</td>
                                                <td>{{ $mobilebankingfundtransfer->transaction_date }}</td>
                                                <td>{{ $mobilebankingfundtransfer->transaction_time }}</td>
                                                <td>{{ $mobilebankingfundtransfer->response_code }}</td>
                                                <td>{{ $mobilebankingfundtransfer->response_desc }}</td>      
                                                <td>{{ $mobilebankingfundtransfer->posted }}</td>
                                                <td>{{ $mobilebankingfundtransfer->posted_date }}</td>
                                                <td>{{ $mobilebankingfundtransfer->posted_time }}</td>


                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Request ID</th>
                                                <th>Channel Type</th>
                                                <th>Source Account No.</th>
                                                <th>Source Account Name</th>
                                                <th>Destination Account Ownership</th>
                                                <th>Destination Account Type</th>
                                                <th>Destination Account No.</th>
                                                <th>Destination Account Name</th>
                                                <th>Amount</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>                                            
                                                <th>Response Code</th>
                                                <th>Response Description</th>
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