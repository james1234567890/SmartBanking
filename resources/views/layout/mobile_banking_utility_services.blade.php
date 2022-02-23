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
                        <li class="breadcrumb-item active">Utility Services</li>
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
                                Utility Services
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
                                                <th>Sender Short Code</th>
                                                <th>Channel Type</th>
                                                <th>Account No.</th>
                                                <th>Account Name</th>
                                                <th>Utility Type</th>
                                                <th>Reference No.</th>
                                                <th>Amount</th>
                                                <th>Receiver Short Code</th>
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
                                            @foreach ($mobilebankingutilityservices as $mobilebankingutilityservice)
                                            <tr>
                                                <td>{{ $mobilebankingutilityservice->id }}</td>
                                                <td>{{ $mobilebankingutilityservice->request_id }}</td>
                                                <td>{{ $mobilebankingutilityservice->sender_shortcode }}</td>
                                                <td>{{ $mobilebankingutilityservice->channel_type }}</td>
                                                <td>{{ $mobilebankingutilityservice->account_no }}</td>
                                                <td>{{ $mobilebankingutilityservice->account_name }}</td>
                                                <td>{{ $mobilebankingutilityservice->utility_type }}</td>
                                                <td>{{ $mobilebankingutilityservice->reference_no }}</td>
                                                <td>{{ $mobilebankingutilityservice->amount }}</td>
                                                <td>{{ $mobilebankingutilityservice->receiver_shortcode }}</td>
                                                <td>{{ $mobilebankingutilityservice->transaction_date }}</td>
                                                <td>{{ $mobilebankingutilityservice->transaction_time }}</td>
                                                <td>{{ $mobilebankingutilityservice->remarks }}</td>
                                                <td>{{ $mobilebankingutilityservice->originator_conversation_id }}</td>
                                                <td>{{ $mobilebankingutilityservice->conversation_id }}</td>
                                                <td>{{ $mobilebankingutilityservice->transaction_id }}</td>
                                                <td>{{ $mobilebankingutilityservice->result_code }}</td>
                                                <td>{{ $mobilebankingutilityservice->result_desc }}</td>
                                                <td>{{ $mobilebankingutilityservice->posted }}</td>
                                                <td>{{ $mobilebankingutilityservice->posted_date }}</td>
                                                <td>{{ $mobilebankingutilityservice->posted_time }}</td>
                                                 <td>{{ $mobilebankingutilityservice->response_code }}</td>
                                                <td>{{ $mobilebankingutilityservice->response_message }}</td>


                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Request ID</th>
                                                <th>Sender Short Code</th>
                                                <th>Channel Type</th>
                                                <th>Account No.</th>
                                                <th>Account Name</th>
                                                 <th>Utility Type</th>
                                                <th>Reference No.</th>
                                                <th>Amount</th>
                                                <th>Receiver Short Code</th>
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