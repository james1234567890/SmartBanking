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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h5 class="card-title"><a class="btn btn-info btn-flat" href="{{ url('/show_add_user') }}" >Add User</a></h5>
                 
                <p class="card-text">
                   <table id="tbl_users" class="table table-dt table-responsive table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>National ID</th>
                    <th>Huduma No.</th>
                    <th>Passport No.</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Phone No.</th>
                    <th>Phone No. 2</th>
                    <th>Email Address</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Current Residence</th>
                     <!--<th colspan=2>Action</th>-->
                  </tr>
                  </thead>
                  
                  <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->sur_name }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->national_id }}</td>
                    <td>{{ $user->huduma_no }}</td>
                    <td>{{ $user->passport_no}}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->date_of_birth }}</td>
                    <td>{{ $user->phone_no }}</td>
                    <td>{{ $user->phone2_no }}</td>
                    <td>{{ $user->email_address }}</td>
                    <td>{{ $user->postal_address }}</td>
                    <td>{{ $user->physical_address }}</td>
                    <td>{{ $user->current_residence }}</td>
                    <!--<td>
        			    <a class="btn btn-info btn-flat" href="{{ url('edit_user/'.$user->id) }}" >Edit</a>
        			</td>
        			<td>
        				<a class="btn btn-danger btn-flat" href="{{ url('edit_user/'.$user->id) }}" >Delete</a>
        			</td>-->
                  </tr>
                  @endforeach
                  </tbody>
                  
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>National ID</th>
                    <th>Huduma No.</th>
                    <th>Passport No.</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Phone No.</th>
                    <th>Phone No. 2</th>
                    <th>Email Address</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Current Residence</th>
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
 