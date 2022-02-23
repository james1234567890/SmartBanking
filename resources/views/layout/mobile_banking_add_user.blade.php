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
                        <li class="breadcrumb-item"><a href="#">Mobile Banking</a></li>
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
                            <h3 class="card-title">User Info</h3>
                        </div>

                        <div class="card-body">
                            <form id="form_add_user">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Member No.</label>
                                            <select class="form-control form-control-sm select2" name="memberno" id="memberno" style="width: 100%;" onchange="GetMemberInfo(this.value)">
                                                <option selected="selected">Select Member</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-sm">Member Name</label>
                                            <input type="text" name="membername" id="membername" class="form-control form-control-sm"  placeholder="Enter Member Name" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label>Account No.</label>
                                            <select class="form-control form-control-sm select2" name="accountno" id="accountno" style="width: 100%;" onchange="GetAccountInfo(this.value)">
                                                <option selected="selected">Select Account</option>
                                             

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="accountname">Account Name</label>
                                            <input type="text" name="accountname" id="accountname" class="form-control form-control-sm"  placeholder="Enter Account Name" readonly="readonly">
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phoneno">Phone No.</label>
                                            <input type="text" name="phoneno" id="phoneno" class="form-control form-control-sm"  placeholder="Enter Phone No.">
                                        </div>
                                        <div class="form-group">
                                            <label>Alert Option</label>
                                            <select class="form-control form-control-sm select2" name="alertoption" id="alertoption" style="width: 100%;">
                                                <option selected="selected">Select Alert Option</option>
                                                <option>Both</option>
                                                <option>Credit Only</option>
                                                <option>Debit Only</option>

                                            </select>
                                        </div>
                                        <div class="form-group clearfix">

                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="active" name="active">
                                                <label for="active"> Active
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-info btn-flat float-right" id="btnSaveUserInfo" >Save</button>

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
var membersMap,membersMap2,accountsMap;
$(document).ready(function () {
    GetAllMembers();
    validateUserInfo();

});
function GetAllMembers() {

    $.ajax({
        url: "{{ url('/all_members') }}",
        type: 'POST',
        success: function (response) {

            //var responseobject=JSON.parse(response);
            var len = 0;
            if (response != null) {
                len = response.length;
            }
            membersMap = new Map();
            membersMap2 = new Map();
            if (len > 0) {
                // Read data and create <option >
                for (var i = 0; i < len; i++) {                    
                  
                    var memberno=response[i].No;
                    var fullname=response[i].FullName;
                    var phoneno=response[i].PhoneNo;
                    var option = "<option value='" + memberno + "'>" + memberno +" "+fullname+ "</option>";
                    $("#memberno").append(option);
                    $("#memberno").select2({placeholder: "", allowClear: false});
                    
                    membersMap.set(memberno, fullname);
                    membersMap2.set(memberno, phoneno);
            }
            }
        }

    });
}
function GetMemberInfo(memberno){
   var fullname=membersMap.get(memberno);
   var phoneno=membersMap2.get(memberno);
   $('#membername').val(fullname);
   $('#phoneno').val(phoneno);
   
   GetSavingsAccounts(phoneno);
}

function GetSavingsAccounts(phoneno) {
   $.ajax({
        type: 'POST',
        url: "{{ url('savings_accounts') }}",
        data: {phoneno:phoneno},      
        success: function (response) {
            if (response) {
              var len = 0;
                if (response != null) {
                    len = response.length;
                }
                accountsMap=new Map();
                if (len > 0) {
                // Read data and create <option >
                for (var i = 0; i < len; i++) {                    
                  
                    var accountno=response[i].No;
                    var accountname=response[i].Name;
                  
                    var option = "<option value='" + accountno + "'>" + accountno +" "+accountname+ "</option>";
                    $("#accountno").append(option);
                    $("#accountno").select2({placeholder: "", allowClear: false});
                    
                  accountsMap.set(accountno, accountname);
            }
              
            }
        }
        },
        error: function (response) {
            
        }
    }); 
}
function GetAccountInfo(accountno){
   var accountname=accountsMap.get(accountno);
   $('#accountname').val(accountname);

}


function validateUserInfo() {

    $('#form_add_user').validate({
        rules: {       
            phoneno: {
                required: true
            }         
        },
        messages: {
           
            phoneno: {
                required: "Please enter Phone No."
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

function saveUserInfo() {

    var memberno = $("#memberno").val();
    var membername = $("#membername").val();
    var accountno = $("#accountno").val();
    var accountname = $("#accountname").val();
    var phoneno = $("#phoneno").val();
    var alertoption = $("#alertoption").val();
    var active = $("#active").val();
    var formData = new FormData();

    formData.append("memberno", memberno);
    formData.append("membername", membername);
    formData.append("accountno", accountno);
    formData.append("accountname", accountname);
    formData.append("phoneno", phoneno);
    formData.append("alertoption", alertoption);
    formData.append("active", active);

    $.ajax({
        type: 'POST',
        url: "{{ url('/mobile_banking_add_user') }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response) {              
                //alert(response.success);
                window.location.href = "{{url('/show_mobile_banking_users')}}";
            }
        },
        error: function (response) {
            //console.log(response);
            // $('#image-input-error').text(response.responseJSON.errors.file);
        }
    });
}
 $('#btnSaveUserInfo').click(function() {  
      if($('#form_add_user').valid()){
         // alert("valid");
        saveUserInfo();
      } else {
        //alert("Not valid");
      }
    });
</script>

