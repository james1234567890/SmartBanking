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
              <li class="breadcrumb-item"><a href="#">Mobile Banking</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                <h5 class="card-title"><a class="btn btn-info btn-flat" href="{{ url('/show_mobile_banking_add_user') }}" >Add User</a></h5>
                 
                <p class="card-text">
                   <table id="tbl_users" class="table table-dt table-responsive table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Member No.</th>
                    <th>Member Name</th>
                    <th>Account No.</th>
                    <th>Account Name</th>
                    <th>Phone No.</th>
                    <th>Alert Option</th>
                    <th>Active</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  @foreach ($mobilebankingusers as $mobilebankinguser)
                  <tr>
                    <td>{{ $mobilebankinguser->id }}</td>
                    <td>{{ $mobilebankinguser->member_no }}</td>
                    <td>{{ $mobilebankinguser->member_name }}</td>
                    <td>{{ $mobilebankinguser->account_no }}</td>
                    <td>{{ $mobilebankinguser->account_name }}</td>
                    <td>{{ $mobilebankinguser->phone_no }}</td>
                    <td>{{ $mobilebankinguser->alert_option }}</td>
                    <td>{{ $mobilebankinguser->active}}</td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                  
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Member No.</th>
                    <th>Member Name</th>
                    <th>Account No.</th>
                    <th>Account Name</th>
                    <th>Phone No.</th>
                    <th>Alert Option</th>
                    <th>Active</th>
                  </tr>
                  </tfoot>
                </table>
                </p>

<!--                <a href="#" class="card-link">Card link</a>
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
 