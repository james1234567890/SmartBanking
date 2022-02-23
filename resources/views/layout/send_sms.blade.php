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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">SMS</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form id="form_send_sms">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                               
                                <div class="form-group">
                                    <label>Phone No.</label>
                                    <input class="form-control form-control-sm rounded-0" type="text" id="phoneno" name="phoneno" placeholder="Enter Phone No.">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <input class="form-control form-control-sm rounded-0" type="text" id="message" name="message" placeholder="Enter Message">
                                </div>
                                <button type="button" id="btnSendSMS" class="btn btn-info btn-flat float-right">Send</button>
                                <div class="text-center text-success" id="dvSendSMS">

                                    <label class="h3" id="lbSendSMS"></label>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </form>
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
    $("#btnSendSMS").click(function (e) {

        e.preventDefault();

        if ($("#form_send_sms").valid()) {
            $.ajax({
                type: 'POST',
                url: "{{ url('/send_sms') }}",
                data: $('#form_send_sms').serialize(),
                beforeSend: function () {                 
                    $("#lbSendSMS").text("Please wait..");
                },
                success: function (response) {
                    $("#lbSendSMS").text(response);
                },
                error: function (e) {
                    $("#lbSendSMS").text("Failed");
                }

            });
        } else {
            //return false;
            alert('invalid');
        }
    });
</script>
