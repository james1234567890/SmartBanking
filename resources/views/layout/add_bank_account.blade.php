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
              <li class="breadcrumb-item active">Bank Account</li>
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
                <h3 class="card-title">Add Bank Account</h3>
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
                    <div class="step" data-target="#posting-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="posting-part" id="posting-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Posting</span>
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
                       <form id="form_bankacc_general">
                            <div class="row">
                         
                              <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Bank Account Type</label>
                                       <select class="form-control form-control-sm select2" name="bankaccounttype" id="bankaccounttype" style="width: 100%;" onchange="validateSelectBankType(this.value);">
                                           <option selected="selected" value="">Select Bank Account Type</option>
                                           <option value="0">Bank Account</option>
                                           <option value="1">MPESA Paybill</option>


                                       </select>
                                       
                                </div>
                                  <div class="form-group" id="dvbankname">
                                       <label>Bank Name</label>
                                       <select class="form-control form-control-sm select2" name="bankname" id="bankname" style="width: 100%;">
                                           <option selected="selected" value="">Select Bank</option>
                                           <option value="1">KCB</option>
                                           <option value="2">Standard Charted Bank KE</option>
                                           <option value="3">Absa Bank</option>
                                           <option value="7">NCBA</option>
                                           <option value="10">Prime Bank</option>
                                           <option value="11">Cooperative Bank</option>
                                           <option value="12">National Bank</option>
                                           <option value="16">Citibank</option>
                                           <option value="17">Habib Bank AG Zurich</option>
                                           <option value="18">Middle East Bank</option>
                                           <option value="19">Bank of Africa</option>
                                           <option value="23">Consolidated Bank</option>
                                           <option value="31">Stanbic Bank</option>
                                           <option value="35">ABC Bank</option>
                                           <option value="41">NIC Bank</option>
                                           <option value="49">Spire Bank</option>                                    
                                           <option value="50">Paramount Universal Bank</option>
                                           <option value="51">Kingdom Bank</option>
                                           <option value="53">Guaranty Bank</option>
                                           <option value="54">Victoria Commercial Bank</option>
                                           <option value="55">Guardian Bank</option> 
                                           <option value="57">I&M Bank</option>   
                                           <option value="63">DTB</option> 
                                           <option value="66">Sidian Bank</option>
                                           <option value="68">Equity Bank</option>
                                           <option value="70">Family Bank</option>
                                           <option value="72">Gulf African Bank</option>
                                           <option value="74">First Community Bank</option>
                                           <option value="78">KWFT Bank</option>
                                          
                                       </select>
                                       
                                </div>
                                  <div class="form-group">
                                    <label for="bankaccountname">Bank Account Name</label>
                                    <input type="text" name="bankaccountname" id="bankaccountname" class="form-control form-control-sm"  placeholder="Enter Bank Account Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="bankaccountno">Bank Account No.</label>
                                    <input type="text" name="bankaccountno" id="bankaccountno" class="form-control form-control-sm"  placeholder="Enter Bank Account No.">
                                  </div>
                                <div class="form-group">   
                                  <div class="icheck-success d-inline">
                                    <input type="checkbox" id="blocked">
                                    <label for="blocked"> Blocked
                                    </label>
                                  </div>  
                                 </div>
                              
                                   
                                   
                              </div>
                              
                              <div class="col-md-6">
                            
                              
                             
                             
                            </div>
                    
                       
                      </div>  
                       
                      </form>
                     <button class="btn btn-info btn-flat" id="btnBankAccountGeneralNext">Next</button>
                     
                    </div>
                    
                    <div id="communication-part" class="content" role="tabpanel" aria-labelledby="communication-part-trigger">
                        <form id="form_bankacc_communication">
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
                        <button class="btn btn-info btn-flat float-right"  id="btnBankAccountCommunicationNext">Next</button>                          
                    
                    </div>
                    
                    <div id="posting-part" class="content" role="tabpanel" aria-labelledby="posting-part-trigger">
                        <form id="form_bankacc_posting">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bankpostinggroup">Bank Posting Group</label>
                                    <input type="text" name="bankpostinggroup" id="bankpostinggroup" class="form-control form-control-sm"  placeholder="Enter Bank Posting Group">
                                </div>
                               
                              
                            </div>
                            <div class="col-md-6">
                                

                            </div>
                          </div>
                      
                        </form>
                        <button class="btn btn-primary btn-flat"  onclick="stepTo(2);return false;">Previous</button>
                        <button class="btn btn-info btn-flat float-right" id="btnBankAccountPostingNext">Next</button>
                         
                        
                    </div>
                    
                    <div id="finish-part" class="content" role="tabpanel" aria-labelledby="finish-part-trigger">
                        <form id="form_bankacc_finish">
                          <div class="row">
                            
                          </div>
                      
                        </form>
                        <button class="btn btn-primary btn-flat"  onclick="stepTo(3);return false;">Previous</button>
                        <button class="btn btn-info btn-flat float-right" id="btnSaveBankAccountInfo">Save</button>
                         
                        
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
<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

<script type="text/javascript">

$(document).ready(function(){
     validateBankAccountGeneralInfo();
     validateBankAccountCommunicationInfo();
     validateBankAccountPostingInfo();


    $('#btnBankAccountGeneralNext').click(function() {  
      if($('#form_bankacc_general').valid()){
        submitBankAccountGeneralInfo();
        stepTo(2);
      } else {
        //alert("Not valid");
      }
    });

    $('#btnBankAccountCommunicationNext').click(function() {  
      if($('#form_bankacc_communication').valid()){
        submitBankAccountCommunicationInfo();
        stepTo(3);
      } else {
       // alert("Not valid");
      }
    });

    $('#btnBankAccountPostingNext').click(function() {  
      if($('#form_bankacc_posting').valid()){
        submitBankAccountPostingInfo();
        stepTo(4);
      } else {
        //alert("Not valid");
      }
    });

    $('#btnSaveBankAccountInfo').click(function() {  
        postBankAccountInfo();
    });
    
  validateSelectBankType(9);
  transformUPPERCASE();

});

function transformUPPERCASE(){
    
}
function validateBankAccountGeneralInfo(){
 
  $('#form_bankacc_general').validate({
    rules: {
      bankaccounttype: {
      required: true,
      },
      bankaccountname: {
        required: true,
      },
      bankaccountno: {
        required: true,
        number:true
      },
     
      
    },
    messages: {
       bankaccounttype: {
        required: "Please select Bank Account Type",
      },
      bankaccountname: {
        required: "Please enter Bank Account Name",
      },
      bankaccountno: {
        required: "Please enter Bank Account No.",
        number: "Please enter Numbers",
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
function validateBankAccountCommunicationInfo(){
 
    $('#form_bankacc_communication').validate({
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
function validateBankAccountPostingInfo(){
 
  $('#form_bankacc_posting').validate({
    rules: {
      bankpostinggroup: {
      required: true,
      
      }
    
    },
    messages: {
      bankpostinggroup: {
        required: "Please enter Bank Posting Group",
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

function submitBankAccountGeneralInfo(){
    var bankaccounttype = $('#bankaccounttype').find('option:selected').text();
    var bankaccountname = $("#bankaccountname").val();
    var bankaccountno = $("#bankaccountno").val();
    var bankcode = $("#bankname").val();
    var bankname = $('#bankname').find('option:selected').text();
    
    var token   = $('meta[name="csrf-token"]').attr('content');

        var formData = new FormData();                   
      
        formData.append("bankaccounttype", bankaccounttype);
        formData.append("bankaccountname", bankaccountname);
        formData.append("bankaccountno", bankaccountno);
        formData.append("bankcode", bankcode);
        formData.append("bankname", bankname);
        formData.append("token", token);

     $.ajax({
           url:"{{ url('post_bankacc_general') }}",
           type:'POST',
           data:formData,
           contentType: false,
           processData: false,
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
                //.alert(response.success);
              }
           }

        });
 
}
function submitBankAccountCommunicationInfo(){
    var phoneno = $("#phoneno").val();
    var phoneno2 = $("#phoneno2").val();
    var emailaddress = $("#emailaddress").val();
    var postaladdress = $("#postaladdress").val();
    var physicaladdress = $("#physicaladdress").val();
    var website = $("#website").val();
   
    var token   = $('meta[name="csrf-token"]').attr('content');
    //alert(token);
     $.ajax({
           url:"{{ url('post_bankacc_communication') }}",
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
function submitBankAccountPostingInfo(){
    var bankpostinggroup = $("#bankpostinggroup").val();
    var token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url:"{{ url('post_bankacc_posting') }}",
           type:'POST',
           data:{bankpostinggroup:bankpostinggroup,
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
function postBankAccountInfo(){
    var token= $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
           url:"{{ url('post_bankacc_register') }}",
           type:'POST',
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
               // alert(response.success);
               window.location.href = "{{url('/show_bank_accounts')}}";
              }
           }

        });
 
}

var stepper = new Stepper($('.bs-stepper')[0])
 
 function stepTo(i){
      stepper.to(i);
 }


function validateSelectBankType(value)
{
   if (value==0){
      
       $("#dvbankname").show();
   }else{
       $("#dvbankname").hide();
   }
}

function transformUPPERCASE(){
    $("#bankaccountname").keyup(function(){
        this.value = this.value.toLocaleUpperCase();
        $("#bankaccountname").text($(this).val());   //OR $("#label1").html($(this).val());
    });

}
</script>

