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
                <h5 class="card-title"><a class="btn btn-info btn-flat" href="{{ url('/show_add_company') }}" >Add Company</a></h5>
                 
                <p class="card-text">
                   <table id="companyinfo" class="table table-responsive table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Email Address</th>
                    <th>Phone No.</th>
                    <th>PIN No.</th>
                   
                     <!--<th colspan=2>Action</th>-->
                  </tr>
                  </thead>
                  
                  <tbody>
                  @foreach ($company as $comp)
                  <tr>
                    <td>{{ $comp->company_name }}</td>
                    <td>{{ $comp->postal_address }}</td>
                    <td>{{ $comp->physical_address }}</td>
                    <td>{{ $comp->email_address }}</td>
                    <td>{{ $comp->phone_no }}</td>
                    <td>{{ $comp->pin_no }}</td>
                   
                    <td>
        			    <a class="btn btn-info btn-flat" href="" >Edit</a>
        			</td>
        		
                  </tr>
                  @endforeach
                  </tbody>
                  
                  <tfoot>
                  <tr>
                    <th>Company Name</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Email Address</th>
                    <th>Phone No.</th>
                    <th>PIN No.</th>
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
 