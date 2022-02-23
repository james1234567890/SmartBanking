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
              <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">Add User</h3>
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
                    <div class="step" data-target="#security-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="security-part" id="security-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Security</span>
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
                       <form id="form_user_general">
                            <div class="row">
                         
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" name="surname" id="surname" class="form-control form-control-sm"  placeholder="Enter Surname">
                                  </div>
                                  <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control form-control-sm"  placeholder="Enter First Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control form-control-sm"  placeholder="Enter Last Name">
                                  </div>
                                   <div class="form-group">
                                    <label for="nationalid">National ID</label>
                                    <input type="text" name="nationalid" id="nationalid" class="form-control form-control-sm"  placeholder="Enter National ID">
                                  </div>
                                    <div class="form-group">
                                    <label for="hudumano">Huduma No.</label>
                                    <input type="text" name="hudumano" id="hudumano" class="form-control form-control-sm"  placeholder="Huduma No.">
                                  </div>
                                
                                  <div class="form-group">
                                    <label for="passportno">Passport No.</label>
                                    <input type="text" name="passportno" id="passportno" class="form-control form-control-sm"  placeholder="Enter Passport No.">
                                   </div>
                                     <div class="form-group">
                                    <label for="pinno">PIN No.</label>
                                    <input type="text" name="pinno" id="pinno" class="form-control form-control-sm"  placeholder="Enter PIN No.">
                                   </div>
                              </div>
                              
                              <div class="col-md-6">
                              
                                
                                <div class="form-group">
                                  <label>Gender</label>
                                  <select class="form-control form-control-sm select2" name="gender" id="gender" style="width: 100%;">
                                    <option selected="selected">Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                    
                                  </select>
                                </div>
                                 <div class="form-group">
                                  <label>Nationality</label>
                                  <select class="form-control form-control-sm select2" name="nationality" id="nationality" style="width: 100%;">
                                    <option selected="selected">Kenya</option>
                                    <option>Uganda</option>
                                    <option>Tanzania</option>
                                    <option>Ethiopia</option>
                                    <option>South Sudan</option>
                                    
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Date of Birth</label>
                                    <div class="input-group date"  id="reservationdate"  data-target-input="nearest">
                                        <input type="text" name="dob"  id="dob" class="form-control form-control-sm datetimepicker-input" data-target="#reservationdate"/>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                              <div class="form-group">
                                <label for="userpicture">Attach Picture</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="userpicture" name="userpicture">
                                    <label class="custom-file-label" for="userpicture">Choose file</label>
                                  </div>
                                  <!--<div class="input-group-append">
                                    <span class="input-group-text">Upload</span>-->
                                  </div>
                                </div>
                                <div class="form-group">
                                <label for="userpicturepreview"></label>
                                 <img src="#" id="userpicturepreview" name="userpicturepreview" class="" width="200" height="150"/>
                                <!--<img src="{{ url('/image/1134754271.jpg') }}" class="" width="200" height="150"/>-->
                              </div>
                              
                          </div>
                      </div>  
                       
                      </form>
                     <button class="btn btn-info btn-flat" id="btnUserGeneralNext">Next</button>
                     
                    </div>
                    
                    <div id="communication-part" class="content" role="tabpanel" aria-labelledby="communication-part-trigger">
                        <form id="form_user_communication">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneno">Phone No.</label>
                                     <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    <input type="text" name="phoneno" id="phoneno" class="form-control form-control-sm"  placeholder="Enter Phone No.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phoneno2">Phone No. 2</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    <input type="text" name="phoneno2" id="phoneno2" class="form-control form-control-sm"  placeholder="Enter Phone No. 2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input type="email" name="emailaddress" id="emailaddress" class="form-control form-control-sm"  placeholder="Enter Email Address">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postaladdress">Postal Address</label>
                                    <input type="text" name="postaladdress" id="postaladdress" class="form-control form-control-sm"  placeholder="Enter Postal Address">
                                </div>
                                <div class="form-group">
                                    <label for="physicaladdress">Physical Address</label>
                                    <input type="text" name="physicaladdress" id="physicaladdress" class="form-control form-control-sm"  placeholder="Enter Physical Address">
                                </div>
                                <div class="form-group">
                                    <label for="currentresidence">Current Residence</label>
                                    <input type="text" name="currentresidence" id="currentresidence" class="form-control form-control-sm"  placeholder="Enter Current Residence">
                                </div>
                              
                            </div>
                        </div>
                       
                        </form>
                        <button class="btn btn-primary btn-flat"  onclick="stepTo(1);return false;">Previous</button>
                        <button class="btn btn-info btn-flat float-right"  id="btnUserCommunicationNext">Next</button>                          
                    
                    </div>
                    
                    <div id="security-part" class="content" role="tabpanel" aria-labelledby="security-part-trigger">
                        <form id="form_user_security">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-sm"  placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-sm"  placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirmpassword">Confirm Password</label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-control-sm"  placeholder="Enter Confirm Password">
                                </div>
                             
                              
                            </div>
                           
                        </div>
                      
                        </form>
                        <button class="btn btn-primary btn-flat"  onclick="stepTo(2);return false;">Previous</button>
                        <button class="btn btn-info btn-flat float-right" id="btnUserSecurityNext">Next</button>
                         
                        
                    </div>
                    
                    <div id="finish-part" class="content" role="tabpanel" aria-labelledby="finish-part-trigger">
                         <button class="btn btn-primary btn-flat" onclick="stepTo(3);return false;">Previous</button>
                         <button class="btn btn-info btn-flat float-right" id="btnSaveUserInfo">Save</button>
                         
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
     validateUserGeneralInfo();
     validateUserCommunicationInfo();
     validateUserSecurityInfo();
     
     
    $('#btnUserGeneralNext').click(function() {  
      if($('#form_user_general').valid()){
        submitUserGeneralInfo();
        stepTo(2);
      } else {
        //alert("Not valid");
      }
    });

    $('#btnUserCommunicationNext').click(function() {  
      if($('#form_user_communication').valid()){
        submitUserCommunicationInfo();
        stepTo(3);
      } else {
       // alert("Not valid");
      }
    });

    $('#btnUserSecurityNext').click(function() {  
      if($('#form_user_security').valid()){
        submitUserSecurityInfo();
        stepTo(4);
      } else {
        //alert("Not valid");
      }
    });

    $('#btnSaveUserInfo').click(function() {  
        saveUserInfo();
    });
      
    transformUPPERCASE();  
  
    $("#userpicture").change(function(){
        readUserPictureURL(this);
    });
  
  
});
function transformUPPERCASE(){
    $("#surname").keyup(function(){
        this.value = this.value.toLocaleUpperCase();
        $("#surnamevalue").text($(this).val());   //OR $("#label1").html($(this).val());
    });
    $("#firstname").keyup(function(){
        this.value = this.value.toLocaleUpperCase();
        $("#firstnamevalue").text($(this).val());   //OR $("#label1").html($(this).val());
    });
    $("#lastname").keyup(function(){
        this.value = this.value.toLocaleUpperCase();
        $("#lastnamevalue").text($(this).val());   //OR $("#label1").html($(this).val());
    });
    $("#nationalid").keyup(function(){
       this.value = this.value.toLocaleUpperCase();
       $("#nationalidvalue").text($(this).val());   //OR $("#label1").html($(this).val());
    });
    $("#hudumano").keyup(function(){
       this.value = this.value.toLocaleUpperCase();
       $("#hudumanovalue").text($(this).val());   //OR $("#label1").html($(this).val());
    });
    $("#passportno").keyup(function(){
       this.value = this.value.toLocaleUpperCase();
       $("#passportnovalue").text($(this).val());   //OR $("#label1").html($(this).val());
    });
    $("#gender").keyup(function(){
       $("#gendervalue").text($(this).val());   //OR $("#label1").html($(this).val());
    });
    $("#dob").keyup(function(){
        $("#dobvalue").text($(this).val()); 
    });
}
function validateUserGeneralInfo(){

$('#form_user_general').validate({
rules: {
  surname: {
  required: true,
  
  },
  firstname: {
    required: true,
   
  },
  lastname: {
    required: true,
  },
  nationalid: {
    required: true,
    number:true,
  },
  hudumano: {
    required: true,
  },
  passportno: {
    required: true,
  },
  gender: {
    required: true,
  },
  dob: {
    required: true,
  },
  pinno: {
    required: true,
  },
  userpicture: {
    required: true,
  },
 
},
messages: {
   surname: {
    required: "Please enter Surname",
  },
  firstname: {
    required: "Please enter First Name",
  },
  lastname: {
    required: "Please enter Last Name",
  },
  nationalid: {
    required: "Please enter National ID",
    number:   "Please enter Numbers Only"
  },
  hudumano: {
    required: "Please enter Huduma No.",
  },
  passportno: {
    required: "Please enter Passport No.",
  },
  gender: {
    required: "Please select Gender",
  },
  dob: {
    required: "Please enter Date of Birth",
  },
  pinno: {
    required: "Please enter PIN No.",
  },
  userpicture: {
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
function validateUserCommunicationInfo(){

$('#form_user_communication').validate({
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
  currentresidence: {
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
 currentresidence: {
    required: "Please enter Current Residence",
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
function validateUserSecurityInfo(){

$('#form_user_security').validate({
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


function submitUserGeneralInfo(){
    var surname = $("#surname").val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var nationalid = $("#nationalid").val();
    var hudumano = $("#hudumano").val();
    var passportno = $("#passportno").val();
    var gender = $("#gender").val();
    var nationality = $("#nationality").val();
    var dob = $("#dob").val();
    var pinno = $("#pinno").val();
    var token   = $('meta[name="csrf-token"]').attr('content');
    var picture_data = $('#userpicture').prop('files')[0];
        
        var formData = new FormData();                   
       
        formData.append("surname", surname);
        formData.append("firstname", firstname);
        formData.append("lastname", lastname);
        formData.append("nationalid", nationalid);
        formData.append("hudumano", hudumano);
        formData.append("passportno", passportno);
        formData.append("gender", gender);
        formData.append("nationality", nationality);
        formData.append("dob", dob);
        formData.append("pinno", pinno);
        formData.append("token", token);
        formData.append('picture', picture_data);  
    
     $.ajax({
           url:"{{ url('post_user_general') }}",
           type:'POST',
           data:formData,
           contentType: false,
           processData: false,
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
                //alert(response.success);
              }
           }

        });
 
}
function submitUserCommunicationInfo(){
    var phoneno = $("#phoneno").val();
    var phoneno2 = $("#phoneno2").val();
    var emailaddress = $("#emailaddress").val();
    var postaladdress = $("#postaladdress").val();
    var physicaladdress = $("#physicaladdress").val();
    var currentresidence = $("#currentresidence").val();
   
    var token   = $('meta[name="csrf-token"]').attr('content');
    //alert(token);
     $.ajax({
           url:"{{ url('post_user_communication') }}",
           type:'POST',
           data:{phoneno:phoneno,
                 phoneno2:phoneno2,
                 emailaddress:emailaddress,
                 postaladdress:postaladdress,
                 physicaladdress:physicaladdress,
                 currentresidence:currentresidence,
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
function submitUserSecurityInfo(){
    var username = $("#username").val();
    var password = $("#password").val();
    var token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
           url:"{{ url('post_user_security') }}",
           type:'POST',
           data:{username:username,
                 password:password,
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
function saveUserInfo(){
    var token= $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
           url:"{{ url('post_user_register') }}",
           type:'POST',
           success:function(response){
              if(response) {
                $('.success').text(response.success);
                //$("#ajaxform")[0].reset();
               // alert(response.success);
               window.location.href = "{{url('/show_users')}}";
              }
           }

        });
 
}

function readUserPictureURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#userpicturepreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
 var stepper = new Stepper($('.bs-stepper')[0])
 
 function stepTo(i){
      stepper.to(i);
 }
</script>