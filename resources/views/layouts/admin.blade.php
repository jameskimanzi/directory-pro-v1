<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Directory-Pro</title>

  <!-- Custom fonts for this template-->
  
  <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
{{--  <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">--}}
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav navbar-light sidebar sidebar-light accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("admin.home") }}">
        <img src="/images/logo.jpg" alt="logo" style="width:100px;height:100px;margin-left:-30px; margin-bottom: 2rem;padding-top: 2rem">
      </a>

      <hr class="sidebar-divider my-0" >

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link text-dark" href="{{ route('admin.home') }}" >
          <i class="fas fa-fw fa-tachometer-alt text-gray-900"></i>
          <span style="color:#000000">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Membership Menu -->
      @can('user_management_access')
      <li class="nav-item" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" >
          <i class="fas fa-fw fa-user-circle" style="color:#000000"></i>
          <span style="color:#000000"><strong>Membership</strong></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @can('user_access')
            <a class="collapse-item {{ request()->is('members') || request()->is('members/*') ? 'active' : '' }}" href="{{ route('members.index') }}"><i class="fas fa-user"></i> Members</a>
            <a class="collapse-item" href="{{ route('groups.index') }}"><i class="fas fa-users">
              </i> Groups</a>
            @endcan
          </div>
        </div>
      </li>
      @endcan

      <!-- Nav Item - Admin_structure Menu -->
      @can('user_management_access')
      <li class="nav-item" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" >
          <i class="fas fa-fw fa-globe" style="color:#000000"></i>
          <span ><strong style="color:#000000">Admin Structure</strong></span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @can('user_access')
            <a class="collapse-item {{ request()->is('groups') || request()->is('groups/*') ? 'active' : '' }}" href="{{ route('counties.index') }}"><i class="fas fa-street-view"></i> Provincial</a>
            <a class="collapse-item {{ request()->is('constituencies') || request()->is('constituencies/*') ? 'active' : '' }}" href="{{ route('constituencies.index') }}"><i class="fas fa-street-view"></i> Electoral</a>
            @endcan
          </div>
        </div>
      </li>
      @endcan

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Admin_structure Menu -->
      @can('permission_access')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#system" aria-expanded="true" aria-controls="system" >
          <i class="fas fa-fw fa-cog" style="color:#000000"></i>
          <span ><strong style="color:#000000">System</strong></span>
        </a>
        <div id="system" class="collapse" aria-labelledby="system" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @can('permission_access')
            <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}"><i class="fas fa-unlock-alt"></i> Permissions</a>
            @endcan
            @can('role_access')
            <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="fas fa-briefcase"></i> Roles</a>
            @endcan
            @can('permission_access')
            <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> Users</a>
            @endcan
          </div>
        </div>
      </li>
      @endcan

      <!-- Nav Item - Reports -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area" style="color:#000000"></i>
          <span style="color:#000000">Reports</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? '' }}</span>
                <img class="img-profile rounded-circle" src="/images/logo.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('/profile/editProfile/'.Auth::user()->id )}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{ url('/profile/passwordChange') }}">
                  <i class="fas fa-user-shield fa-sm fa-fw mr-2 text-gray-400"></i>
                  Manage Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>
        </nav>
        <!-- End of Topbar -->
        @include('flash-message')

        @yield('content')


      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright float-left justify-content-end my-auto">
            <span> <b>DirectoryPro</b> ver 1.0</span>
          </div>
          <div class="copyright text-center my-auto">
            <span> <strong> &copy;</strong> 2019 Directcore Technologies. All Rights Reserved.</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
        $('#county_id').on('change', function () {
            let county = $(this).find(':selected').val();
            console.log(county);
            let html = '';
            if (county) {
                $.ajax({
                    url: "{{url('/api/get-constituencies')}}/"+county,
                    data: "",
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        html = "<select name=\"constituency_id\" class=\"form-control\" id=\"constituency_id\" onchange=\"getWard(this);\" required>" +
                            "  <option value=\"\">--Select Constituency--</option>";
                        for (let i = 0; i < data.length; i++) {
                            html += "<option value= \"" + data[i].id + "\">" + data[i].constituency_name + "</option>";
                        }
                        html += "</select>";
                        $("#old_constituency").hide();
                        $("#get-constituencies").html(html);


                    },

                });
            }
            else {
                html = '';
                $("#old_constituency").hide();
                $("#get-constituencies").html(html);
            }
        });

    });


</script>
<script type="text/javascript">
                  // Start on wards
        function getWard(constituency){
            let const_id = constituency.options[constituency.selectedIndex].getAttribute("value");
            console.log("Constituency is : "+const_id);
            let html1 = '';
            if (const_id) {
                $.ajax({
                    url: "{{url('/api/get-wards')}}/"+const_id,
                    data: "",
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        html1 = "<select name=\"ward_id\" class=\"form-control\" id=\"id\" required>" +
                            "  <option value=\"\">--Select Ward--</option>";
                        for (let i = 0; i < data.length; i++) {
                            html1 += "<option value= \"" + data[i].id + "\">" + data[i].ward_name + "</option>";
                        }
                        html1 += "</select>";
                        $("#old_ward").hide();
                        $("#get-wards").html(html1);


                    },

                });
            }
            else {
                html1 = '';
                $("#old_ward").hide();
                $("#get-wards").html(html1);
            }
        }

</script>
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
        $('#show-groups').hide();
    });
</script>
 
	<script src="{{ asset('js/main.js') }}"></script>
	<script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset ('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset ('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset ('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset ('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset ('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset ('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset ('js/demo/chart-pie-demo.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
 
 
	
    <script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(900, 0).slideUp(900, function(){
        $(this).remove(); 
    });
}, 4000);
 
});

 </script>
 

     
    
@yield('scripts')

</body>

</html>
