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
                        <li class="breadcrumb-item active">Send to Mpesa</li>
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
                                        <a class="nav-link active text-info" id="vert-tabs-sendtompesa-tab" data-toggle="pill" href="#vert-tabs-sendtompesa" role="tab" aria-controls="vert-tabs-sendtompesa" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>


                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-sendtompesa" role="tabpanel" aria-labelledby="vert-tabs-sendtompesa-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Send to Mpesa</h3>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="bs-stepper" id="stepper-sendtompesa">
                                                                <div class="bs-stepper-header" role="tablist">
                                                                    <!-- your steps here -->
                                                                    <div class="step" data-target="#sendtompesa-source-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="sendtompesa-source-part" id="sendtompesa-source-part-trigger">
                                                                            <span class="bs-stepper-circle">1</span>
                                                                            <span class="bs-stepper-label">Source</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#sendtompesa-destination-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="sendtompesa-destination-part" id="sendtompesa-destination-part-trigger">
                                                                            <span class="bs-stepper-circle">2</span>
                                                                            <span class="bs-stepper-label">Destination</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#sendtompesa-finish-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="sendtompesa-finish-part" id="sendtompesa-finish-part-trigger">
                                                                            <span class="bs-stepper-circle">3</span>
                                                                            <span class="bs-stepper-label">Finish</span>
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                                <div class="bs-stepper-content">
                                                                    <!-- your steps content here -->
                                                                    <div id="sendtompesa-source-part" class="content" role="tabpanel" aria-labelledby="sendtompesa-source-part-trigger">
                                                                        <form id="form_sendtompesa_source">
                                                                            <div class="row">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Source Account No.</label>
                                                                                        <select class="form-control select2 rounded-0" name="sourceaccountno" id="sourceaccountno" style="width: 100%;">
                                                                                          <option selected="selected">Select Account</option>
                                                                                            @foreach ($bankaccounts as $bankaccount)
                                                                                               <option value="{{ $bankaccount->bank_account_no }}">{{ $bankaccount->bank_account_no }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Amount</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="amount" id="amount" placeholder="Enter Amount">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Narration</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="narration" id="narration" placeholder="Enter Narration">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6"></div>



                                                                            </div>
                                                                        </form>
                                                                        <button  class="btn btn-info btn-flat" id="btnSendToMpesaSource">Next</button>

                                                                    </div>
                                                                    <div id="sendtompesa-destination-part" class="content" role="tabpanel" aria-labelledby="sendtompesa-destination-part-trigger">

                                                                        <form id="form_sendtompesa_destination">
                                                                            <div class="row">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Destination Mobile No.</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="phoneno" id="phoneno" placeholder="Enter Destination Mobile No.">
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-sm-6"></div>

                                                                            </div>
                                                                        </form>
                                                                        <button class="btn btn-primary btn-flat" onclick="stepper5.previous()">Previous</button>
                                                                        <button type="submit" class="btn btn-info btn-flat float-right" id="btnSendToMpesaDestination">Next</button>

                                                                    </div>
                                                                    <div id="sendtompesa-finish-part" class="content" role="tabpanel" aria-labelledby="sendtompesa-finish-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-sm-2"></div>
                                                                            <div class="col-sm-8 text-center text-success">
                                                                                <label class="h3" id="lbSendToMpesaFinish"></label>

                                                                            </div>
                                                                            <div class="col-sm-2"></div>
                                                                        </div>

                                                                        <button class="btn btn-primary btn-flat" onclick="stepper5.previous()">Previous</button>
                                                                        <button type="button" class="btn btn-info btn-flat float-right" id="btnSendToMpesaFinish">Post</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer">
                                                            Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                                                        </div>
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                            <!-- /.row -->




                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-result" role="tabpanel" aria-labelledby="vert-tabs-result-tab">
                                            <table id="tbl_result" class="table table-dt table-responsive table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Request ID</th>
                                                        <th>Request Type</th>
                                                        <th>Request By</th>
                                                        <th>Request Date</th>
                                                        <th>Request Time</th>
                                                        <th>Message Reference</th>
                                                        <th>Message Code</th>
                                                        <th>Message Description</th>
                                                        <th>Raw Response</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($sendtompesaresults as $sendtompesaresult)
                                                    <tr>
                                                        <td>{{ $sendtompesaresult->id }}</td>
                                                        <td>{{ $sendtompesaresult->request_id }}</td>
                                                        <td>{{ $sendtompesaresult->request_type }}</td>
                                                        <td>{{ $sendtompesaresult->request_by }}</td>
                                                        <td>{{ $sendtompesaresult->request_date }}</td>
                                                        <td>{{ $sendtompesaresult->request_time }}</td>
                                                        <td>{{ $sendtompesaresult->message_reference }}</td>
                                                        <td>{{ $sendtompesaresult->message_code }}</td>
                                                        <td>{{ $sendtompesaresult->message_description }}</td>
                                                        <td>{{ $sendtompesaresult->raw_response }}</td>


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
                                                        <th>Message Code</th>
                                                        <th>Message Description</th>
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

    validateSendToMpesa();

});

var stepper5 = new Stepper($('#stepper-sendtompesa')[0]);

$('#btnSendToMpesaSource').click(function () {
  if ($('#form_sendtompesa_source').valid()) {


      $.ajax({
          url: "{{ url('/send_to_mpesa_source') }}",
          type: 'POST',
          data: $('#form_sendtompesa_source').serialize(),

          success: function (response) {

              //alert(response.success);
              stepper5.next();

          }

      });



  } else {
      return false;
      //alert("Not valid");
  }
});
$('#btnSendToMpesaDestination').click(function () {
  if ($('#form_sendtompesa_destination').valid()) {
      //e.preventDefault();
      $.ajax({
          type: 'POST',
          url: "{{ url('/send_to_mpesa_destination') }}",
          data: $('#form_sendtompesa_destination').serialize(),
          success: function (response) {

              //alert(response.success);
              stepper5.next();

          }
      });

      // stepper4.next();
  } else {
      //alert("Not valid");
  }
});
$('#btnSendToMpesaFinish').click(function () {

  $.ajax({
      type: 'POST',
      url: "{{ url('/coop_send_to_mpesa') }}",
      //data: $('#form_transaction_status').serialize(),
      beforeSend: function () {
          $("#lbSendToMpesaFinish").text("Please wait..");
      },
      success: function (response) {
          //$("#dvTransactionStatus").addClass("bg-success");
          $("#lbSendToMpesaFinish").text(response.MessageDescription);
          $.ajax({
              type: 'get',
              url: "{{ url('/coop_callback/1') }}"+"/"+response.MessageReference,
              beforeSend: function () {
                  $("#lbSendToMpesaFinish").text("Waiting for callback..");
              },
              success: function (response) {
                  $("#lbSendToMpesaFinish").text(response);
                  

              },
              error: function (response2) {
                  $("#lbSendToMpesaFinish").text("No Callback");
              }
          });

      },
      error: function (e) {
          $("#lbSendToMpesaFinish").text("Failed");
      }
  });

  stepper5.next();

});

function validateSendToMpesa() {

    $('#form_sendtompesa_source').validate({
        rules: {
           
            amount: {
                required: true,
                number: true
            },
            narration: {
                required: true
            }

        },
        messages: {
           
            amount: {
                required: "Please Enter Amount",
                number: "Please Enter Numbers"
            },
            narration: {
                required: "Please Enter Narration"

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
    
     $('#form_sendtompesa_destination').validate({
        rules: {
           
            phoneno: {
                required: true,
                number: true,
                minlength: 12,
                maxlength: 12
            }
            

        },
        messages: {
           
             phoneno: {
                required: "Please Enter Phone No.",
                number: "Please Enter Numbers",
                minlength: "Phone No. cannot be less than 12 digits",
                maxlength: "Phone No. cannot exceed 12 digits"
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