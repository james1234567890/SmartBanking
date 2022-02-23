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
                        <li class="breadcrumb-item active">Refer Friend</li>
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
                                Refer Friend
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
                                                <th>Surname</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Social Name</th>
                                                <th>Phone No.</th>
                                                <th>Huduma No.</th>
                                                <th>National ID</th>
                                                <th>PIN No.</th>
                                                <th>Nationality</th>
                                                <th>Marital Status</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                 <th>Occupation</th>
                                                <th>Postal Address</th>
                                                <th>Physical Address</th>
                                                <th>Email Address</th>
                                                <th>Current Residence</th>
                                                 <th>Referral Phone No.</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($mobilebankingreferfriends as $mobilebankingreferfriend)
                                            <tr>
                                                <td>{{ $mobilebankingreferfriend->id }}</td>
                                                <td>{{ $mobilebankingreferfriend->request_id }}</td>
                                                 <td>{{ $mobilebankingreferfriend->channel_type }}</td>
                                                <td>{{ $mobilebankingreferfriend->sur_name }}</td>
                                                <td>{{ $mobilebankingreferfriend->first_name }}</td>
                                                <td>{{ $mobilebankingreferfriend->last_name }}</td>
                                                <td>{{ $mobilebankingreferfriend->social_name }}</td>
                                                <td>{{ $mobilebankingreferfriend->phone_no }}</td>
                                                <td>{{ $mobilebankingreferfriend->huduma_no }}</td>
                                                <td>{{ $mobilebankingreferfriend->national_id }}</td>
                                                <td>{{ $mobilebankingreferfriend->pin_no }}</td>
                                                <td>{{ $mobilebankingreferfriend->nationality }}</td>
                                                <td>{{ $mobilebankingreferfriend->marital_status }}</td>
                                                <td>{{ $mobilebankingreferfriend->gender }}</td>
                                                <td>{{ $mobilebankingreferfriend->date_of_birth }}</td>
                                                <td>{{ $mobilebankingreferfriend->occupation }}</td>
                                                <td>{{ $mobilebankingreferfriend->postal_address }}</td>
                                                <td>{{ $mobilebankingreferfriend->physical_address }}</td>
                                                <td>{{ $mobilebankingreferfriend->email_address }}</td>
                                                <td>{{ $mobilebankingreferfriend->current_residence }}</td>
                                                <td>{{ $mobilebankingreferfriend->referral_phone_no }}</td>
                                                <td>{{ $mobilebankingreferfriend->transaction_date }}</td>
                                                <td>{{ $mobilebankingreferfriend->transaction_time }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Request ID</th>
                                                <th>Channel Type</th>
                                                <th>Surname</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Social Name</th>
                                                <th>Phone No.</th>
                                                <th>Huduma No.</th>
                                                <th>National ID</th>
                                                <th>PIN No.</th>
                                                <th>Nationality</th>
                                                <th>Marital Status</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                 <th>Occupation</th>
                                                <th>Postal Address</th>
                                                <th>Physical Address</th>
                                                <th>Email Address</th>
                                                <th>Current Residence</th>
                                                 <th>Referral Phone No.</th>
                                                <th>Transaction Date</th>
                                                <th>Transaction Time</th>
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