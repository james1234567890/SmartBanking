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
                        <li class="breadcrumb-item active">Internal Funds Transfer</li>
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
                                        <a class="nav-link active text-info" id="vert-tabs-ift-tab" data-toggle="pill" href="#vert-tabs-ift" role="tab" aria-controls="vert-tabs-ift" aria-selected="true">Task</a>
                                        <a class="nav-link text-info" id="vert-tabs-result-tab" data-toggle="pill" href="#vert-tabs-result" role="tab" aria-controls="vert-tabs-result" aria-selected="false">Result</a>


                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-ift" role="tabpanel" aria-labelledby="vert-tabs-ift-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Internal Funds Transfer</h3>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="bs-stepper" id="stepper-ift">
                                                                <div class="bs-stepper-header" role="tablist">
                                                                    <!-- your steps here -->
                                                                    <div class="step" data-target="#ift-source-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="ift-source-part" id="ift-source-part-trigger">
                                                                            <span class="bs-stepper-circle">1</span>
                                                                            <span class="bs-stepper-label">Source</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#ift-destination-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="ift-destination-part" id="ift-destination-part-trigger">
                                                                            <span class="bs-stepper-circle">2</span>
                                                                            <span class="bs-stepper-label">Destination</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div class="step" data-target="#ift-finish-part">
                                                                        <button type="button" class="step-trigger" role="tab" aria-controls="ift-finish-part" id="ift-finish-part-trigger">
                                                                            <span class="bs-stepper-circle">3</span>
                                                                            <span class="bs-stepper-label">Finish</span>
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                                <div class="bs-stepper-content">
                                                                    <!-- your steps content here -->
                                                                    <div id="ift-source-part" class="content" role="tabpanel" aria-labelledby="ift-source-part-trigger">
                                                                        <form id="form_ift_source">
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
                                                                        <button  class="btn btn-info btn-flat" id="btnIFTSource">Next</button>

                                                                    </div>
                                                                    <div id="ift-destination-part" class="content" role="tabpanel" aria-labelledby="ift-destination-part-trigger">

                                                                        <form id="form_ift_destination">
                                                                            <div class="row">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label>Destination Account No.</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="destinationaccountno" id="destinationaccountno" placeholder="Enter Destination Account No.">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Destination Bank Code</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="destinationbankcode" id="destinationbankcode" placeholder="Enter Destination Bank Code">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Destination Branch Code</label>
                                                                                        <input class="form-control form-control-sm rounded-0" type="text" name="destinationbranchcode" id="destinationbranchcode" placeholder="Enter Destination Branch Code">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6"></div>

                                                                            </div>
                                                                        </form>
                                                                        <button class="btn btn-primary btn-flat" onclick="stepper4.previous()">Previous</button>
                                                                        <button type="submit" class="btn btn-info btn-flat float-right" id="btnIFTDestination">Next</button>

                                                                    </div>
                                                                    <div id="ift-finish-part" class="content" role="tabpanel" aria-labelledby="ift-finish-part-trigger">
                                                                        <div class="row">
                                                                            <div class="col-sm-2"></div>
                                                                            <div class="col-sm-8 text-center text-success">
                                                                                <label class="h3" id="lbIFTFinish"></label>

                                                                            </div>
                                                                            <div class="col-sm-2"></div>
                                                                        </div>

                                                                        <button class="btn btn-primary btn-flat" onclick="stepper4.previous()">Previous</button>
                                                                        <button type="button" class="btn btn-info btn-flat float-right" id="btnIFTFinish">Post</button>
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
                                            <table id="tbl_ift_result" class="table table-dt table-responsive table-bordered table-striped ">
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
                                                    @foreach ($iftresults as $iftresult)
                                                    <tr>
                                                        <td>{{ $iftresult->id }}</td>
                                                        <td>{{ $iftresult->request_id }}</td>
                                                        <td>{{ $iftresult->request_type }}</td>
                                                        <td>{{ $iftresult->request_by }}</td>
                                                        <td>{{ $iftresult->request_date }}</td>
                                                        <td>{{ $iftresult->request_time }}</td>
                                                        <td>{{ $iftresult->message_reference }}</td>
                                                         <td>{{ $iftresult->message_code }}</td>
                                                         <td>{{ $iftresult->message_description }}</td>
                                                         <td>{{ $iftresult->raw_response }}</td>


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

    validateIFT();

});

var stepper4 = new Stepper($('#stepper-ift')[0]);
$('#btnIFTSource').click(function () {
  if ($('#form_ift_source').valid()) {


      $.ajax({
          url: "{{ url('/ift_source') }}",
          type: 'POST',
          data: $('#form_ift_source').serialize(),

          success: function (response) {

              //alert(response.success);
              stepper4.next();

          }

      });



  } else {
      //alert("Not valid");
      return false;
  }
});
$('#btnIFTDestination').click(function () {
  if ($('#form_ift_destination').valid()) {
      //e.preventDefault();
      $.ajax({
          type: 'POST',
          url: "{{ url('/ift_destination') }}",
          data: $('#form_ift_destination').serialize(),
          success: function (response) {

              //alert(response.success);
              stepper4.next();

          }
      });

      // stepper4.next();
  } else {
      //alert("Not valid");
  }
});
$('#btnIFTFinish').click(function () {

  $.ajax({
      type: 'POST',
      url: "{{ url('/ift_account_to_account') }}",
      //data: $('#form_transaction_status').serialize(),
      beforeSend: function () {
          $("#lbIFTFinish").text("Please wait..");
      },
      success: function (response) {
          //$("#dvTransactionStatus").addClass("bg-success");
          $("#lbIFTFinish").text(response.MessageDescription);
          $.ajax({
              type: 'GET',
              url: "{{ url('/coop_callback/0') }}"+"/"+response.MessageReference,
              beforeSend: function () {
                  $("#lbIFTFinish").text("Waiting for callback..");
              },
              success: function (response) {
                   $("#lbIFTFinish").text(response);
                 

              },
              error: function (response2) {
                  $("#lbIFTFinish").text("No Callback");
              }
          });
      },
      error: function (e) {
          $("#lbIFTFinish").text("Failed");
      }
  });

  stepper4.next();

});

function validateIFT() {

    $('#form_ift_source').validate({
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
    
     $('#form_ift_destination').validate({
        rules: {
           
            destinationaccountno: {
                required: true,
                number: true
            },
            destinationbankcode: {
                required: true,
                number: true
            },
             destinationbranchcode: {
                required: true,
                number: true
            }

        },
        messages: {
           
            destinationaccountno: {
                required: "Please Enter Destination Account No.",
                number: "Please Enter Numbers"
            },
            destinationbankcode: {
                required: "Please Enter Destination Bank Code",
                number: "Please Enter Numbers"
            },
            destinationbranchcode: {
                required: "Please Enter Destination Branch Code",
                number: "Please Enter Numbers"
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