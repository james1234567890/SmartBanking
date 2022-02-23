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
              <li class="breadcrumb-item active">Payee</li>
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
                <h3 class="card-title">Company Information</h3>
              </div>
             
              <div class="card-body">
                  <form id="form_company_info">
                      @csrf
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="companyname" class="text-sm">Company Name</label>
                            <input type="text" name="companyname" id="companyname" class="form-control form-control-sm"  placeholder="Enter Company Name">
                          </div>
                          <div class="form-group">
                            <label for="displayname">Display Name</label>
                            <input type="text" name="displayname" id="displayname" class="form-control form-control-sm"  placeholder="Enter Display Name">
                          </div>
                          <div class="form-group">
                            <label for="postaladdress">Postal Address</label>
                            <input type="text" name="postaladdress" id="postaladdress" class="form-control form-control-sm"  placeholder="Enter Postal Address">
                          </div>
                          <div class="form-group">
                            <label for="physicaladdress">Physical Address</label>
                            <input type="text" name="physicaladdress" id="physicaladdress" class="form-control form-control-sm"  placeholder="Enter Physical Address">
                          </div>
                          <div class="form-group">
                        <label for="emailaddress">Email Address</label>
                        <input type="email" name="emailaddress" id="emailaddress" class="form-control form-control-sm"  placeholder="Enter Email Address">
                      </div>
                      </div>
                     <div class="col-md-6">
                      
                      <div class="form-group">
                        <label for="phoneno">Phone No.</label>
                        <input type="text" name="phoneno" id="phoneno" class="form-control form-control-sm"  placeholder=" Enter Phone No.">
                      </div>
                      <div class="form-group">
                        <label for="pinno">PIN No.</label>
                        <input type="text" name="pinno" id="pinno" class="form-control form-control-sm"  placeholder=" Enter PIN.">
                       </div>
                       <div class="form-group">
                        <label for="companypicture">Attach Picture</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="companypicture" name="companypicture">
                            <label class="custom-file-label" for="picture">Choose file</label>
                          </div>
                          <!--<div class="input-group-append">
                            <span class="input-group-text">Upload</span>-->
                          </div>
                        </div>
                        <label for="companypicturepreview"></label>
                         <img src="#" id="companypicturepreview" name="companypicturepreview" class="" width="200" height="150"/>
                        <!--<img src="{{ url('/image/1134754271.jpg') }}" class="" width="200" height="150"/>-->
                      </div>
                      
                  </div>
                  
                </form>
                <button class="btn btn-info btn-flat float-right" id="btnSaveCompanyInfo" >Save</button>

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

<script type="text/javascript">

$(document).ready(function(){
    validateCompanyInfo();
  
    $('#btnSaveCompanyInfo').click(function() {  
      if($('#form_company_info').valid()){
         // alert("valid");
        saveCompanyInfo();
      } else {
        //alert("Not valid");
      }
    });
  
    $("#companypicture").change(function(){
        readCompanyPictureURL(this);
    });
  
   transformUPPERCASE();
  
  
});

function transformUPPERCASE(){
    $('#companyname').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    $('#displayname').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    $('#postaladdress').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    $('#physicaladdress').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    $("#pinno").keyup(function(){
        this.value = this.value.toLocaleUpperCase();
    });
}

function validateCompanyInfo(){
 
  $('#form_company_info').validate({
    rules: {
      companyname: {
        required: true,
      },
      displayname: {
        required: true,
      },
     postaladdress: {
        required: true,
      },
     physicaladdress : {
        required: true,
      },
     emailaddress : {
        required: true,
        email:true,
      },
     phoneno : {
        required: true,
      },
     pinno : {
        required: true,
      },
     companypicture : {
        required: true,
      
      }
    },
    messages: {
      companyname: {
        required: "Please enter Company Name",
      },
      companyname: {
        required: "Please enter Company Name",
      },
     postaladdress: {
        required: "Please enter Postal Address",
      },
    physicaladdress: {
        required: "Please enter Physical Address",
      },
    emailaddress: {
       required: "Please enter Email Address",
       email: "Please enter a vaild Email Address"
      },
    phoneno: {
        required: "Please enter Phone No.",
      },
    companypicture: {
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

function saveCompanyInfo(){
   
        var companyname = $("#companyname").val();
        var displayname = $("#displayname").val();
        var postaladdress = $("#postaladdress").val();
        var physicaladdress = $("#physicaladdress").val();
        var emailaddress = $("#emailaddress").val();
        var phoneno = $("#phoneno").val();
        var pinno = $("#pinno").val();
        var picture_data = $('#companypicture').prop('files')[0];
        var formData = new FormData();                   
       
        formData.append("companyname", companyname);
        formData.append("displayname", displayname);
        formData.append("postaladdress", postaladdress);
        formData.append("physicaladdress", physicaladdress);
        formData.append("emailaddress", emailaddress);
        formData.append("phoneno", phoneno);
        formData.append("pinno", pinno);
        formData.append('picture', picture_data);  

       $.ajax({
          type:'POST',
          url:"{{ url('post_company') }}",
           data: formData,
           contentType: false,
           processData: false,
           success:function(response){
              if(response) {
                //$('.success').text(response.success);
                //$("#ajaxform")[0].reset();
                alert(response.success);
               window.location.href = "{{url('/show_company')}}";
              }
           },
           error: function(response){
              //console.log(response);
               // $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
}

function readCompanyPictureURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#companypicturepreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

