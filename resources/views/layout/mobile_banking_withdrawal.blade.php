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
                        <li class="breadcrumb-item active">Withdrawal</li>
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
                                Withdrawal
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
                                                <th>Short Code</th>
                                                <th>Channel Type</th>
                                                <th>Account No.</th>
                                                <th>Account Name</th>
                                                <th>Phone Owner</th>
                                                <th>Phone No.</th>
                                                <th>Amount</th>
                                                <th>Disbursal Mode</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>
                                                <th>Remarks</th>
                                                <th>Originator Conversation ID</th>
                                                <th>Conversation ID</th>
                                                <th>Transaction ID</th>
                                                <th>Result Code</th>
                                                <th>Result Description</th>
                                                <th>Posted</th>
                                                <th>Posted Date</th>
                                                <th>Posted Time</th>
                                                <th>CBS Response Code</th>
                                                <th>CBS Response Message</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($mobilebankingwithdrawals as $mobilebankingwithdrawal)
                                            <tr>
                                                <td>{{ $mobilebankingwithdrawal->id }}</td>
                                                <td>{{ $mobilebankingwithdrawal->request_id }}</td>
                                                <td>{{ $mobilebankingwithdrawal->short_code }}</td>
                                                <td>{{ $mobilebankingwithdrawal->channel_type }}</td>
                                                <td>{{ $mobilebankingwithdrawal->account_no }}</td>
                                                <td>{{ $mobilebankingwithdrawal->account_name }}</td>
                                                <td>{{ $mobilebankingwithdrawal->phone_owner }}</td>
                                                <td>{{ $mobilebankingwithdrawal->phone_no }}</td>
                                                <td>{{ $mobilebankingwithdrawal->amount }}</td>
                                                <td>{{ $mobilebankingwithdrawal->disbursal_mode }}</td>
                                                <td>{{ $mobilebankingwithdrawal->transaction_date }}</td>
                                                <td>{{ $mobilebankingwithdrawal->transaction_time }}</td>
                                                <td>{{ $mobilebankingwithdrawal->remarks }}</td>
                                                <td>{{ $mobilebankingwithdrawal->originator_conversation_id }}</td>
                                                <td>{{ $mobilebankingwithdrawal->conversation_id }}</td>
                                                <td>{{ $mobilebankingwithdrawal->transaction_id }}</td>
                                                <td>{{ $mobilebankingwithdrawal->result_code }}</td>
                                                <td>{{ $mobilebankingwithdrawal->result_desc }}</td>
                                                <td>{{ $mobilebankingwithdrawal->posted }}</td>
                                                <td>{{ $mobilebankingwithdrawal->posted_date }}</td>
                                                <td>{{ $mobilebankingwithdrawal->posted_time }}</td>
                                                 <td>{{ $mobilebankingwithdrawal->response_code }}</td>
                                                <td>{{ $mobilebankingwithdrawal->response_message }}</td>


                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Request ID</th>
                                                <th>Short Code</th>
                                                <th>Channel Type</th>
                                                <th>Account No.</th>
                                                <th>Account Name</th>
                                                <th>Phone Owner</th>
                                                <th>Phone No.</th>
                                                <th>Amount</th>
                                                <th>Disbursal Mode</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>
                                                <th>Remarks</th>
                                                <th>Originator Conversation ID</th>
                                                <th>Conversation ID</th>
                                                <th>Transaction ID</th>
                                                <th>Result Code</th>
                                                <th>Result Description</th>
                                                <th>Posted</th>
                                                <th>Posted Date</th>
                                                <th>Posted Time</th>
                                                 <th>CBS Response Code</th>
                                                <th>CBS Response Message</th>
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