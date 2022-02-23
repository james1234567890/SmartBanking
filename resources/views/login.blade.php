<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page text-sm accent-info">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Smart</b> Banking </a>
    </div>
    <form action="{{ url('/post_user_login') }}" method="post">
        @csrf
        <div class="card-body">
     @foreach ($company as $comp)
     <div class="text-center">
<!--         <label>{{ url('/picture/'.$comp->picture_name) }}</label>-->
      <img src="{{storage_path('app/public/picture/'. $comp->picture_name)}}" alt="#"  width="50" height="50" class="brand-image img-circle elevation-3 text-center" style="opacity: .8">
      </div>

      @endforeach
      <p class="login-box-msg text-sm accent-info">Sign in to start your session</p>
        @if(session()->has('error'))
           <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="input-group mb-3">
          <input type="text" id="username" name="username" class="form-control rounded-0" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control rounded-0" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-info">
              <input type="checkbox" id="remember">
              <label for="remember" class="text-sm accent-info">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-info btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
     

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary d-md-none ">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger invisible">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
     <p class="mb-0">
         <!--<a href="register.html" class="text-center">Register a new membership</a>-->
      </p>
    </div>
     </form>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
