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
                        <li class="breadcrumb-item active">Deposit</li>
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
                                Deposit
                            </h3>
                        </div>
                        <div class="card-body">

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
                                            @foreach ($mobilebankingdeposits as $mobilebankingdeposit)
                                            <tr>
                                                <td>{{ $mobilebankingdeposit->id }}</td>
                                                <td>{{ $mobilebankingdeposit->transaction_type }}</td>
                                                <td>{{ $mobilebankingdeposit->transaction_id }}</td>
                                                <td>{{ $mobilebankingdeposit->transaction_time }}</td>
                                                <td>{{ $mobilebankingdeposit->first_name }}</td>
                                                <td>{{ $mobilebankingdeposit->middle_name }}</td>
                                                <td>{{ $mobilebankingdeposit->last_name }}</td>
                                                <td>{{ $mobilebankingdeposit->business_short_code }}</td>
                                                <td>{{ $mobilebankingdeposit->bill_ref_number }}</td>
                                                <td>{{ $mobilebankingdeposit->invoice_number }}</td>
                                                <td>{{ $mobilebankingdeposit->msisdn }}</td>
                                                <td>{{ $mobilebankingdeposit->transaction_amount }}</td>
                                                <td>{{ $mobilebankingdeposit->org_account_balance }}</td>
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