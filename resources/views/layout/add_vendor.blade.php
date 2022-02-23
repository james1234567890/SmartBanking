  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Vendor</h3>
              </div>
             
              <div class="card-body p-0">
                  
                  
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#general-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="general-part" id="general-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">General</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#communication-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="communication-part" id="communication-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Communication</span>
                      </button>
                    </div>
                     <div class="line"></div>
                    <div class="step" data-target="#invoicing-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="invoicing-part" id="invoicing-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Invoicing</span>
                      </button>
                    </div>
                     <div class="line"></div>
                    <div class="step" data-target="#finish-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="finish-part" id="finish-part-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">Finish</span>
                      </button>
                    </div>
                    
                  </div>
                   
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    
                    <div id="general-part" class="content" role="tabpanel" aria-labelledby="general-part-trigger">
                       <form id="form_vendor_general">
                            <div class="row">
                         
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="vendorname">Vendor Name</label>
                                    <input type="text" name="vendorname" id="vendorname" class="form-control form-control-sm"  placeholder="Enter Vendor Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="pinno">PIN No.</label>
                                    <input type="text" name="pinno" id="pinno" class="form-control form-control-sm"  placeholder="Enter PIN No.">
                                  </div>
                                  <div class="form-group">
                                    <label for="bankaccountno">Bank Account No.</label>
                                    <input type="text" name="bankaccountno" id="bankaccountno" class="form-control form-control-sm"  placeholder="Enter Bank Account No.">
                                  </div>
                                   <div class="form-group">
                                    <label for="bankaccountno2">Bank Account No. 2</label>
                                    <input type="text" name="bankaccountno2" id="bankaccountno2" class="form-control form-control-sm"  placeholder="Enter Bank Account No. 2">
                                  </div>
                                   
                              </div>
                              
                              <div class="col-md-6">
                              
                               
                                 <div class="form-group">
                                  <label>Country</label>
                                  <select class="form-control form-control-sm select2" name="country" id="country" style="width: 100%;">
                                    <option selected="selected">Kenya</option>
                                    <option>Uganda</option>
                                    <option>Tanzania</option>
                                    <option>Ethiopia</option>
                                    <option>South Sudan</option>
                                    
                                  </select>
                                </div>
                               
                              <div class="form-group">
                                <label for="vendorpicture">Attach Picture</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="vendorpicture" name="vendorpicture">
                                    <label class="custom-file-label" for="vendorpicture">Choose file</label>
                                  </div>
                                  <!--<div class="input-group-append">
                                    <span class="input-group-text">Upload</span>-->
                                  </div>
                                </div>
                                <div class="form-group">
                                <label for="vendorpicturepreview"></label>
                                 <img src="#" id="vendorpicturepreview" name="vendorpicturepreview" class="" width="150" height="100"/>
                                <!--<img src="{{ url('/image/1134754271.jpg') }}" class="" width="200" height="150"/>-->
                              </div>
                                <div class="form-group clearfix">
                             
                              <div class="icheck-success d-inline">
                                <input type="checkbox" id="blocked">
                                <label for="blocked"> Blocked
                                </label>
                              </div>
                             
                            </div>
                    
                          </div>
                      </div>  
                       
                      </form>
                     <button class="btn btn-info btn-flat" id="btnVendorGeneralNext">Next</button>
                     
                    </div>
                    
                    <div id="communication-part" class="content" role="tabpanel" aria-labelledby="communication-part-trigger">
                        <form id="form_vendor_communication">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PhoneNo">Phone No.</label>
                                     <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    <input type="text" name="phoneno" id="phoneno" class="form-control form-control-sm"  placeholder="Enter Phone No.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="PhoneNo2">Phone No. 2</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    <input type="text" name="phoneno2" id="phoneno2" class="form-control form-control-sm"  placeholder="Enter Phone No. 2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="EmailAddress">Email address</label>
                                    <input type="email" name="emailaddress" id="emailaddress" class="form-control form-control-sm"  placeholder="Enter Email Address">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="PostalAddress">Postal Address</label>
                                    <input type="text" name="postaladdress" id="postaladdress" class="form-control form-control-sm"  placeholder="Enter Postal Address">
                                </div>
                                <div class="form-group">
                                    <label for="physicaladdress">Physical Address</label>
                                    <input type="text" name="physicaladdress" id="physicaladdress" class="form-control form-control-sm"  placeholder="Enter Physical Address">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" name="website" id="website" class="form-control form-control-sm"  placeholder="Enter Website">
                                </div>
                              
                            </div>
                        </div>
                       
                        </form>
                        <button class="btn btn-primary btn-flat"  onclick="stepTo(1);return false;">Previous</button>
                        <button class="btn btn-info btn-flat float-right"  id="btnVendorCommunicationNext">Next</button>                          
                    
                    </div>
                    
                    <div id="invoicing-part" class="content" role="tabpanel" aria-labelledby="invoicing-part-trigger">
                        <form id="form_vendor_invoicing">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vendorpostinggroup">Vendor Posting Group</label>
                                    <input type="text" name="vendorpostinggroup" id="vendorpostinggroup" class="form-control form-control-sm"  placeholder="Enter Vendor Posting Group">
                                </div>
                                <div class="form-group">
                                    <label for="vatpostinggroup">VAT Posting Group</label>
                                    <input type="text" name="vatpostinggroup" id="vatpostinggroup" class="form-control form-control-sm"  placeholder="Enter VAT Posting Group">
                                </div>
                               
                              
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="wtaxpostinggroup">W/Tax Posting Group</label>
                                    <input type="text" name="wtaxpostinggroup" id="wtaxpostinggroup" class="form-control form-control-sm"  placeholder="Enter W/Tax Posting Group">
                                </div>
                               <div class="form-group">
                                  <label>Payment Method</label>
                                  <select class="form-control form-control-sm select2" name="paymentmethod" id="paymentmethod" style="width: 100%;">
                                    <option selected="selected"></option>
                                    <option>Cash</option>
                                    <option>Cheque</option>
                                    <option>EFT</option>
                                    <option>Mpesa</option>
                                    
                                  </select>
                                </div>

                            </div>
                          </div>
                      
                        </form>
                        <button class="btn btn-primary btn-flat"  onclick="stepTo(2);return false;">Previous</button>
                        <button class="btn btn-info btn-flat float-right" id="btnVendorInvoicingNext">Next</button>
                         
                        
                    </div>
                    
                    <div id="finish-part" class="content" role="tabpanel" aria-labelledby="finish-part-trigger">
                        <form id="form_vendor_finish">
                          <div class="row">
                            
                          </div>
                      
                        </form>
                        <button class="btn btn-primary btn-flat"  onclick="stepTo(3);return false;">Previous</button>
                        <button class="btn btn-info btn-flat float-right" id="btnSaveVendorInfo">Save</button>
                         
                        
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
       
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- ./wrapper -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

<script type="text/javascript">

$(document).ready(function(){
     validateVendorGeneralInfo();
     validateVendorCommunicationInfo();
     validateVendorInvoicingInfo();


    $('#btnVendorGeneralNext').click(function() {  
      if($('#form_vendor_general').valid()){
        submitVendorGeneralInfo();
        stepTo(2);
      } else {
        //alert("Not valid");
      }
    });

    $('#btnVendorCommunicationNext').click(function() {  
      if($('#form_vendor_communication').valid()){
        submitVendorCommunicationInfo();
        stepTo(3);
      } else {
       // alert("Not valid");
      }
    });

    $('#btnVendorInvoicingNext').click(function() {  
      if($('#form_vendor_invoicing').valid()){
        submitVendorInvoicingInfo();
        stepTo(4);
      } else {
        //alert("Not valid");
      }
    });

    $('#btnSaveVendorInfo').click(function() {  
        postVendorInfo();
    });
    
    $("#vendorpicture").change(function(){
        readVendorPictureURL(this);

    });

});

function transformUPPERCASE(){
    
}
function validateVendorGeneralInfo(){
 
  $('#form_vendor_general').validate({
    rules: {
      vendorname: {
      required: true,
      },
      bankaccountno: {
        required: true,
      },
      bankaccountno2: {
        required: true,
      },
      pinno: {
        required: true,
      },
      country: {
        required: true,
      },
      vendorpicture: {
        required: true,
      },
      
    },
    messages: {
       vendorname: {
        required: "Please enter Vendor Name",
      },
      bankaccountno: {
        required: "Please enter Bank Account No.",
      },
      bankaccountno2: {
        required: "Please enter Bank Account No. 2",
      },
      pinno: {
        required: "Please enter PIN No.",
      },
      country: {
        required: "Please select Country",
      },
      vendorpicture: {
        required: "Please attach Picture",
      },
     
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
function validateVendorCommunicationInfo(){
 
    $('#form_vendor_communication').validate({
    rules: {
      phoneno: {
         required: true,
         number:true,
      },
      phoneno2: {
        required: true,
        number:true,
      },
      emailaddress: {
        required: true,
        email:true,
      },
      postaladdress: {
        required: true,
      },
      physicaladdress: {
        required: true,
      },
      website: {
        required: true,
      },
     
    },
    messages: {
      phoneno: {
        required: "Please enter Phone No.",
        number:   "Please enter Numbers Only"
      },
      phoneno2: {
        required: "Please enter Phone No. 2",
        number:   "Please enter Numbers Only"
      },
      emailaddress: {
        required: "Please enter Email Address",
        email: "Please enter a vaild Email Address"
      },
      postaladdress: {
        required: "Please enter Postal Address",
      },
      physicaladdress: {
        required: "Please enter Physical Address",
      },
     website: {
        required: "Please enter Website",
      },
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
function validateVendorInvoicingInfo(){
 
  $('#form_vendor_invoicing').validate({
    rules: {
      username: {
      required: true,
      
      },
     password: {
        required: true,
        minlength: 5
      },
     confirmpassword : {
        required: true,
        minlength : 5,
        equalTo : "#password"
      }
    },
    messages: {
      username: {
        required: "Please enter Username",
      },
     password: {
        required: "Please enter Password",
        minlength: "Your Password must be at least 5 characters long"
      },
      confirmpassword:"Please confirm your password"
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

function submitVendorGeneralInfo(){
    var vendorname = $("#vendorname").val();
    var bankaccountno = $("#bankaccountno").val();
    var bankaccountno2 = $("#bankaccountno2").val();
    var country = $("#country").val();
    var pinno = $("#pinno").val();
    var token   = $('meta[name="csrf-token"]').attr('content');
    var picture_data = $('#vendorpicture').prop('files')[0];
        
        var formData = new FormData();                   
       
        formData.append("vendorname", vendorname);
        formData.append("bankaccountno", bankaccountno);
        formData.append("bankaccountno2", bankaccountno2);
        formData.append("country", country);
        formData.append("pinno", pinno);
        formData.append("token", token);
        formData.append('picture', picture_data);  
    
     $.ajax({
           url:"{{ url('post_vendor_general') }}",
           type:'POST',
           data:formData,
           contentType: false,
           processData: false,
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
                alert(response.success);
              }
           }

        });
 
}
function submitVendorCommunicationInfo(){
    var phoneno = $("#phoneno").val();
    var phoneno2 = $("#phoneno2").val();
    var emailaddress = $("#emailaddress").val();
    var postaladdress = $("#postaladdress").val();
    var physicaladdress = $("#physicaladdress").val();
    var website = $("#website").val();
   
    var token   = $('meta[name="csrf-token"]').attr('content');
    //alert(token);
     $.ajax({
           url:"{{ url('post_vendor_communication') }}",
           type:'POST',
           data:{phoneno:phoneno,
                 phoneno2:phoneno2,
                 emailaddress:emailaddress,
                 postaladdress:postaladdress,
                 physicaladdress:physicaladdress,
                 website:website,
                 token:token,
        },
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
               // alert(response.success);
              }
           }

        });
 
}
function submitVendorInvoicingInfo(){
    var vendorpostinggroup = $("#vendorpostinggroup").val();
    var vatpostinggroup = $("#vatpostinggroup").val();
    var wtaxpostinggroup = $("#wtaxpostinggroup").val();
    var paymentmethod = $("#paymentmethod").val();
    var token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url:"{{ url('post_vendor_invoicing') }}",
           type:'POST',
           data:{vendorpostinggroup:vendorpostinggroup,
                 vatpostinggroup:vatpostinggroup,
                 wtaxpostinggroup:wtaxpostinggroup,
                 paymentmethod:paymentmethod,
                 token:token,
        },
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
                //alert(response.success);
              }
           }

        });
 
}
function postVendorInfo(){
    var token= $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
           url:"{{ url('post_vendor_register') }}",
           type:'POST',
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
               // alert(response.success);
               window.location.href = "{{url('/show_vendors')}}";
              }
           }

        });
 
}

function readVendorPictureURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#vendorpicturepreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

var stepper = new Stepper($('.bs-stepper')[0])
 
 function stepTo(i){
      stepper.to(i);
 }
</script>

