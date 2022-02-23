<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
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
                <h5 class="card-title"><a class="btn btn-info btn-flat" href="{{ url('/show_add_bank_account') }}" >Add Bank Account</a></h5>
                 
                <p>
                   <table id="tbl_bank_accounts" class="table table-dt table-responsive table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Bank Account Type</th>
                    <th>Bank Account Name</th>
                    <th>Bank Account No.</th>
                    <th>Bank Code</th>
                    <th>Bank Name</th>
                    <th>Phone No.</th>
                    <th>Phone No. 2</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Email Address</th>
                    <th>Website</th>
                    <th>Bank Posting Group</th>
                  
                     <!--<th colspan=2>Action</th>-->
                  </tr>
                  </thead>
                  
                  <tbody>
                  @foreach ($bankaccounts as $bankaccount)
                  <tr>
                    <td>{{ $bankaccount->id }}</td>
                    <td>{{ $bankaccount->bank_account_type}}</td>
                    <td>{{ $bankaccount->bank_account_name }}</td>
                    <td>{{ $bankaccount->bank_account_no }}</td>
                    <td>{{ $bankaccount->bank_code }}</td>
                    <td>{{ $bankaccount->bank_name }}</td>
                    <td>{{ $bankaccount->phone_no}}</td>
                    <td>{{ $bankaccount->phone_no2 }}</td>
                    <td>{{ $bankaccount->postal_address }}</td>
                    <td>{{ $bankaccount->physical_address }}</td>
                    <td>{{ $bankaccount->email_address }}</td>
                    <td>{{ $bankaccount->website }}</td>
                    <td>{{ $bankaccount->bank_posting_group }}</td>
                    
                    <!--<td>
        			    <a class="btn btn-info btn-flat" href="{{ url('edit_user/'.$bankaccount->id) }}" >Edit</a>
        			</td>
        			<td>
        				<a class="btn btn-danger btn-flat" href="{{ url('edit_user/'.$bankaccount->id) }}" >Delete</a>
        			</td>-->
                  </tr>
                  @endforeach
                  </tbody>
                  
                  <tfoot>
                  <tr>
                   <th>ID</th>
                    <th>Bank Account Type</th>
                    <th>Bank Account Name</th>
                    <th>Bank Account No.</th>
                     <th>Bank Code</th>
                    <th>Bank Name</th>
                    <th>Phone No.</th>
                    <th>Phone No. 2</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Email Address</th>
                    <th>Website</th>
                    <th>Bank Posting Group</th>
                    <!--<th colspan=2>Action</th>-->
                  </tr>
                  </tfoot>
                </table>
               </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
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
 