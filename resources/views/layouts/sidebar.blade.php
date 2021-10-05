<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ url('/') }}">PDCA KPI Portal</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('img/logo/logo3.png') }}" alt="">
    </div>
    <ul class="sidebar-menu">
        <li><a class="nav-link text-default" href="{{ url('/') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
        
        {{-- <li class="menu-header text-danger">Master</li> --}}
        {{-- <li id="nav-master" class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown text-danger"><i class="fas fa-book"></i><span>Master</span></a>
          <ul class="dropdown-menu">
            <li id="nav-master-country"><a class="nav-link" href="{{ url('master/country') }}">Country</a></li>
            <li id="nav-master-stateprovince"><a class="nav-link" href="{{ url('master/stateprovince') }}">State Province</a></li>
            <li id="nav-master-city"><a class="nav-link" href="{{ url('master/city') }}">City</a></li>
            <hr>
            <li id="nav-master-modulepackage"><a class="nav-link" href="{{ url('master/modulepackage') }}">Module Package</a></li>
            <li id="nav-master-module"><a class="nav-link" href="{{ url('master/module') }}">Module</a></li>
            <hr>
            <li id="nav-master-currency"><a class="nav-link" href="{{ url('master/currency') }}">Currency</a></li>
            <li id="nav-master-gender"><a class="nav-link" href="{{ url('master/gender') }}">Gender</a></li>
            <li id="nav-master-messagetype"><a class="nav-link" href="{{ url('master/messagetype') }}">Message Type</a></li>
            <li id="nav-master-nameprefix"><a class="nav-link" href="{{ url('master/nameprefix') }}">Name Prefix</a></li>
            <li id="nav-master-religion"><a class="nav-link" href="{{ url('master/religion') }}">Religion</a></li>
            <li id="nav-master-status"><a class="nav-link" href="{{ url('master/status') }}">Status</a></li>
            <li id="nav-master-paymenttype"><a class="nav-link" href="{{ url('master/paymenttype') }}">Payment type</a></li>
            <li id="nav-master-picturecategory"><a class="nav-link" href="{{ url('master/picturecategory') }}">Picture category</a></li>
            <li id="nav-master-referralsource"><a class="nav-link" href="{{ url('master/referralsource') }}">Referral source</a></li>
          </ul>
        </li> --}}

        <li class="menu-header text-default">Transaction</li>
        <li id="nav-user" class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown text-default"><i class="fas fa-users"></i><span>Transaction</span></a>
          <ul class="dropdown-menu">
            <li id="nav-user-person"><a class="nav-strategic_direction" href="{{ url('strategic_direction') }}">Strategic Direction</a></li>
            <li id="nav-user-person"><a class="nav-strategic_priority" href="{{ url('strategic_priority') }}">Strategic Priorities</a></li>
            <li id="nav-user-person"><a class="nav-activity_division" href="{{ url('activity_division') }}">AP Division</a></li>
          </ul>
        </li>

        {{-- <li class="menu-header text-default">Strategic Direction</li>
        <li id="nav-strategic_direction" class="nav-item dropdown">
          <a href="{{ url('strategic_direction') }}" class="text-default"><i class="fas fa-shopping-basket"></i><span>Strategic Direction</span></a>
        </li>

        <li class="menu-header text-default">Strategic Priority</li>
        <li id="nav-strategic_priority" class="nav-item dropdown">
          <a href="{{ url('strategic_priority') }}" class="text-default"><i class="fas fa-address-card"></i><span>Strategic Priority</span></a>
        </li>

        <li class="menu-header text-default">Activity Division</li>
        <li id="nav-activity_division" class="nav-item dropdown">
          <a href="{{ url('activity_division') }}" class="text-default"><i class="fab fa-accusoft"></i><span>Activity Division</span></a>
        </li> --}}

        <li class="menu-header text-default">Master</li>
        <li id="nav-master" class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown text-default"><i class="fas fa-book"></i><span>Master</span></a>
          <ul class="dropdown-menu">
            <li id="nav-master-division"><a class="nav-link" href="{{ url('master/division') }}">Division</a></li>
            <li id="nav-master-departemen"><a class="nav-link" href="{{ url('master/departemen') }}">Departemen</a></li>
          </ul>
        </li>
        {{-- <li class="menu-header text-primary">Product</li>
        <li id="nav-product" class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown text-info"><i class="fas fa-shopping-basket"></i><span>Product</span></a>
          <ul class="dropdown-menu">
            <li id="nav-product-product"><a class="nav-link" href="{{ url('product/product') }}">Product</a></li>
            <li id="nav-product-producttype"><a class="nav-link" href="{{ url('product/producttype') }}">Product type</a></li>
            <li id="nav-product-productvouchertype"><a class="nav-link" href="{{ url('product/productvouchertype') }}">Product voucher type</a></li>
          </ul>
        </li>
        <li class="menu-header text-warning">Voucher</li>
        <li id="nav-voucher" class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown text-warning"><i class="fas fa-address-card"></i><span>Voucher</span></a>
          <ul class="dropdown-menu">
            <li id="nav-voucher-voucher"><a class="nav-link" href="{{ url('voucher/voucher') }}">Voucher</a></li>
            <li id="nav-voucher-voucher"><a class="nav-link" href="{{ url('voucher/vouchertype') }}">Voucher Type</a></li>
            <li id="nav-voucher-voucherproducttype"><a class="nav-link" href="{{ url('voucher/voucherproducttype') }}">Voucher Product Type</a></li>
            <li id="nav-voucher-vouchertypeproducttype" data-toggle="tooltip" data-placement="bottom" title="Voucher Type Product Type"><a class="nav-link" href="{{ url('voucher/vouchertypeproducttype') }}">Voucher-T Product-T</a></li>
          </ul>
        </li> --}}
      </ul>
  </aside>
</div>
