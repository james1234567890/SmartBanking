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
                        <li class="breadcrumb-item"><a href="#">Setup</a></li>
                        <li class="breadcrumb-item active">Permissions</li>
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
                                Permissions
                            </h3>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active text-info" id="vert-tabs-mpesa-permission-tab" data-toggle="pill" href="#vert-tabs-mpesa-permission" role="tab" aria-controls="vert-tabs-mpesa-permission" aria-selected="true">Mpesa</a>
                                        <a class="nav-link text-info" id="vert-tabs-coop-permission-tab" data-toggle="pill" href="#vert-tabs-coop-permission" role="tab" aria-controls="vert-tabs-coop-permission" aria-selected="false">COOP</a>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-mpesa-permission" role="tabpanel" aria-labelledby="vert-tabs-mpesa-permission-tab">
                                            <form id="form_mpesa_permissions">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="accountbalance">
                                                            <label for="accountbalance">
                                                                Account Balance
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="transactionstatus">
                                                            <label for="transactionstatus">
                                                                Transaction Status
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="mpesac2b">
                                                            <label for="mpesac2b">
                                                                Mpesa C2B
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="mpesab2c">
                                                            <label for="mpesab2c">
                                                                Mpesa B2C
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="mpesab2b">
                                                            <label for="mpesab2b">
                                                                Mpesa B2B
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="express">
                                                            <label for="express">
                                                                Mpesa Express
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="expressquery">
                                                            <label for="expressquery">
                                                                Mpesa Express Query
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="reversal">
                                                            <label for="reversal">
                                                                Mpesa Reversal
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">




                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="tab-pane fade" id="vert-tabs-coop-permission" role="tabpanel" aria-labelledby="vert-tabs-coop-permission-tab">
                                            <div class="row">

                                                

                                                    <div class="col-md-4">
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopaccountbalance">
                                                            <label for="coopaccountbalance">
                                                                Account Balance
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="cooptransactionstatus">
                                                            <label for="cooptransactionstatus">
                                                                Transaction Status
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopacounttransactions">
                                                            <label for="coopacounttransactions">
                                                                Account Transactions
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopministatement">
                                                            <label for="coopministatement">
                                                                Ministatement
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopfullstatement">
                                                            <label for="coopfullstatement">
                                                                Fullstatement
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopift">
                                                            <label for="coopift">
                                                                Internal Funds Transfer
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopsendtompesa">
                                                            <label for="coopsendtompesa">
                                                                Send to Mpesa
                                                            </label>
                                                        </div>
                                                        <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="cooppesalinktoaccount">
                                                            <label for="cooppesalinktoaccount">
                                                                PesaLink to Account
                                                            </label>
                                                        </div>
                                                         <p></p>
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="cooppesalinktophone">
                                                            <label for="cooppesalinktophone">
                                                                PesaLink to Phone
                                                            </label>
                                                        </div>
                                                          <p></p>
                                                         <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopexchangerate">
                                                            <label for="coopexchangerate">
                                                                Exchange Rate
                                                            </label>
                                                        </div>
                                                           <p></p>
                                                         <div class="icheck-success d-inline">
                                                            <input type="checkbox" id="coopaccountvalidation">
                                                            <label for="coopaccountvalidation">
                                                                Validation
                                                            </label>
                                                        </div>
                                                    </div>

                                                <div class="col-md-4"></div>
                                                <div class="col-md-4"></div>

                                            </div>
                                        </div>



                                    </div>
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
<script src="{{asset('adminlte/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jquery-validation/additional-methods.min.js')}}"></script><script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {

    validateMpesaReversal();

});









</script>
