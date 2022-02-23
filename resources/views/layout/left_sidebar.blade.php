<!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-no-expand sidebar-dark-info">
    <!-- Brand Logo -->
         @foreach ($company as $comp)
         <!-- {{$comp->company_name}}-->
        
    <a href="#" class="brand-link text-sm navbar-info">
      <img src="{{ url('/picture/'.$comp->picture_name) }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold h6">Smart Banking</span>
    </a>
    @endforeach
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @if(auth()->user())
          <a href="#" class="d-block">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
          @endif
        </div>
      </div>
 
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mobile Banking
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                 <li class="nav-item">
                <a href="{{url('/show_mobile_banking_users')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/show_mobile_banking_withdrawal')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Withdrawal</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mobile_banking_deposit')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Deposits</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/show_mobile_banking_fund_transfer')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Fund Transfer</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mobile_banking_account_balance')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Account Balance</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mobile_banking_ministatement')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Ministatement</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mobile_banking_utility_services')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Utility Services</p>
                </a>
              </li>
             
               <li class="nav-item">
                <a href="{{url('/show_mobile_banking_refer_friend')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Refer Friend</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mpesa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/show_mpesa_account_balance')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Account Balance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/show_mpesa_transaction_status')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Transaction Status</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mpesa_c2b')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Mpesa C2B</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mpesa_b2c')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Mpesa B2C</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mpesa_b2b')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Mpesa B2B</p>
                </a>
              </li> <li class="nav-item">
                <a href="{{url('/show_mpesa_express')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Mpesa Express</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mpesa_express_query')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Mpesa Express Query</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_mpesa_reversal')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Mpesa Reversal</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                COOP Bank
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/show_coop_account_balance')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Account Balance</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_transaction_status')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Transaction Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/show_coop_account_transactions')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Account Transactions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/show_coop_ministatement')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Ministatement</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_fullstatement')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Fullstatement</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_ift')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Internal Funds Transfer</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_send_to_mpesa')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Send to Mpesa</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_pesalink_to_account')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>PesaLink to Account</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_pesalink_to_phone')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>PesaLink to Phone</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_exchange_rate')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Exchange Rate</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/show_coop_account_validation')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Account Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Setup
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/show_vendors')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/show_bank_accounts')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Bank Accounts</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Administration
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/show_users')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/show_company')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Company</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="{{url('/show_permissions')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Permissions</p>
                </a>
              </li>
            </ul>
          </li>
       <li class="nav-item">
            <a href="{{url('/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Logout
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>