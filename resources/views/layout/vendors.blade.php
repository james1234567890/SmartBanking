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
                <h5 class="card-title"><a class="btn btn-info btn-flat" href="{{ url('/show_add_vendor') }}" >Add Vendor</a></h5>
                 
                <p class="card-text">
                   <table id="tbl_vendors" class="table table-dt table-responsive table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Bank Account No.</th>
                    <th>Bank Account No. 2</th>
                    <th>PIN No.</th>
                    <th>Country</th>
                    <th>Phone No.</th>
                    <th>Phone No. 2</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Email Address</th>
                    <th>Website</th>
                    <th>Vendor Posting Group</th>
                    <th>VAT Posting Group</th>
                    <th>WTax Posting Group</th>
                    <th>Payment Method</th>
                     <!--<th colspan=2>Action</th>-->
                  </tr>
                  </thead>
                  
                  <tbody>
                  @foreach ($vendors as $vendor)
                  <tr>
                    <td>{{ $vendor->id }}</td>
                    <td>{{ $vendor->vendor_name }}</td>
                    <td>{{ $vendor->bank_account_no }}</td>
                    <td>{{ $vendor->bank_account_no2 }}</td>
                    <td>{{ $vendor->pin_no }}</td>
                    <td>{{ $vendor->country }}</td>
                    <td>{{ $vendor->phone_no}}</td>
                    <td>{{ $vendor->phone_no2 }}</td>
                    <td>{{ $vendor->postal_address }}</td>
                    <td>{{ $vendor->physical_address }}</td>
                    <td>{{ $vendor->email_address }}</td>
                    <td>{{ $vendor->website }}</td>
                    <td>{{ $vendor->vendor_posting_group }}</td>
                    <td>{{ $vendor->vat_posting_group }}</td>
                    <td>{{ $vendor->wtax_posting_group }}</td>
                    <td>{{ $vendor->payment_method }}</td>
                    <!--<td>
        			    <a class="btn btn-info btn-flat" href="{{ url('edit_user/'.$vendor->id) }}" >Edit</a>
        			</td>
        			<td>
        				<a class="btn btn-danger btn-flat" href="{{ url('edit_user/'.$vendor->id) }}" >Delete</a>
        			</td>-->
                  </tr>
                  @endforeach
                  </tbody>
                  
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Bank Account No.</th>
                    <th>Bank Account No. 2</th>
                    <th>PIN No.</th>
                    <th>Country</th>
                    <th>Phone No.</th>
                    <th>Phone No. 2</th>
                    <th>Postal Address</th>
                    <th>Physical Address</th>
                    <th>Email Address</th>
                    <th>Website</th>
                    <th>Vendor Posting Group</th>
                    <th>VAT Posting Group</th>
                    <th>WTax Posting Group</th>
                    <th>Payment Method</th>
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
 