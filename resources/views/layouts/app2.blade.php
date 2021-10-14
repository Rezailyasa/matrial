@php
use Illuminate\Support\Facades\Auth;
use App\Models\User_role;
$role = AUTH::User()->user_role_id;
$roleid = User_role::find($role);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>{{$title}} @if($sub_menu)|| {{$sub_menu}} @endif </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="{{asset('/img/image.png')}}" type="image/x-icon" />
  <script src="{{asset('/js/plugin/webfont/webfont.min.js')}}"></script>


  <script src="{{asset('/js/core/jquery.3.2.1.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('/css/fonts.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/atlantis.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/demo.css')}}">
  @stack('css')
</head>
@if (AUTH::User()->mode_gelap != 1)

<body>

  @else

  <body data-background-color="dark">

    @endif

    <div class="wrapper sidebar_minimize">
      <div class="main-header">
        <!-- Logo Header -->
        @if (AUTH::User()->mode_gelap != 1)
        <div class="logo-header" data-background-color="blue2">

          @else
          <div class="logo-header" data-background-color="dark">

            @endif

            <a href="#" class="logo">
              {{-- <img src="{{asset('/img/icon.ico')}}" alt="navbar brand" class="navbar-brand"> --}}
              <b class="text-white">SMK BC Cirebon</b>
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
              data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
              </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
              </button>
            </div>
          </div>
          <!-- End Logo Header -->


          <!-- Navbar Header -->
          @if (AUTH::User()->mode_gelap != 1)
          <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

            @else
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

              @endif

              <div class="container-fluid">
                <div class="collapse" id="search-nav">

                </div>

                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                  <h5 class="text-white mr-3 mt-3 text-right">{{date('l, d F Y')}} <br> {{$user->name}} </h5>
                  <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                      <div class="avatar-sm">
                        <img src="{{asset('/img/profile_user/'. AUTH::user()->image)}}" alt="..."
                          class="avatar-img rounded-circle">
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                      <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                          <div class="user-box">
                            <div class="avatar-lg"><img src="{{asset('/img/profile_user/'. AUTH::user()->image)}}"
                                alt="image profile" class="avatar-img rounded"></div>
                            <div class="u-text">
                              <h4>{{AUTH::User()->name}}</h4>
                              <p class="text-muted">{{$roleid->role}}<br>{{AUTH::User()->email}}</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{url('user')}}"><i class="fas fa-user-tie mr-3"></i> My
                            Profile</a>
                          <a class="dropdown-item" href="{{url('password')}}"><i class="fas fa-user-tag mr-3"></i>
                            Change Password</a>

                          <div class="form-group">


                            <div class="dropdown-divider"></div>

                            <form action="{{url('user')}}/{{$user->id}}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                <label class="form-label d-block ml-2 mr-5 mt-3">Mode :</label>
                                <label class="selectgroup-item mt-2">
                                  <input type="radio" name="mode" value="2" class="selectgroup-input" @if
                                    ($user->mode_gelap == 2)
                                  checked=""
                                  @endif onclick="submit()">
                                  <span class="selectgroup-button selectgroup-button-icon"><i
                                      class="fa fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item mt-2">
                                  <input type="radio" name="mode" value="1" class="selectgroup-input" onclick="submit()"
                                    @if ($user->mode_gelap == 1)
                                  checked=""
                                  @endif>
                                  <span class="selectgroup-button selectgroup-button-icon"><i
                                      class="fa fa-moon"></i></span>
                                </label>

                              </div>
                            </form>
                          </div>
                          {{-- <a class="dropdown-item" href="#">Mode Gelap :</a>  --}}
                          {{-- <div class="dropdown-divider"></div> --}}
                          {{-- <a class="dropdown-item" href="#">Account Setting</a> --}}
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{route('logout')}}"
                            onclick="return confirm('Anda akan keluar dari aplikasi!, Yakin?')"><i
                              class="icon-logout mr-3"></i>Logout</a>
                        </li>
                      </div>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->

        @if (AUTH::User()->mode_gelap != 1)
        <div class="sidebar sidebar-style-2">

          @else
          <div class="sidebar sidebar-style-2" data-background-color="dark">

            @endif

            <div class="sidebar-wrapper scrollbar scrollbar-inner">
              <div class="sidebar-content">
                <div class="user">
                  <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('/img/profile_user/'. AUTH::user()->image)}}" alt="..."
                      class="avatar-img rounded-circle">
                  </div>
                  <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                      <span>
                        {{AUTH::User()->name}}
                        <span class="user-level">

                          {{$roleid->role}}
                        </span>
                        <span class="caret"></span>
                      </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                      <ul class="nav">
                        <li>
                          <a href="{{ url('/user')}}">
                            <span class="link-collapse">My Profile</span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ url('/password')}}">
                            <span class="link-collapse">ChangePassword</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <ul class="nav nav-primary">
                  <?php
          $menu = DB::select('SELECT m.* FROM user_access_menu u , user_menu m WHERE u.user_menu_id = m.id AND u.user_role_id = :role', ['role' => $user->user_role_id]);
          foreach ($menu as $m) {
          ?>

                  <li class="nav-section active">
                    <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section"> {{ $m->menu }}</h4>
                  </li>

                  <?php
            $menusub = DB::select('SELECT * FROM `user_sub_menu` WHERE `user_menu_id` = :menu_id', ['menu_id' => $m->id]);
            foreach ($menusub as $sb) {
          ?>
                  <?php
            $menusubsub = DB::select('SELECT * FROM `user_subsub_menu` WHERE `user_sub_menu_id` = :sub_menu_id', ['sub_menu_id' => $sb->id]);
          ?>
                  <!-- Nav Item - Charts -->
                  @if($menusubsub)
                  @if($title == $sb->title)
                  <li class="nav-item active">
                    @else
                    @if ($sub_menu == $sb->title)
                  <li class="nav-item active submenu">
                    @else
                  <li class="nav-item">
                    @endif
                    @endif
                    <a data-toggle="collapse" href="#{{$sb->title}}">
                      <i class="{{ $sb->icon}}"></i>
                      <p>{{ $sb->title}}</p>
                      <span class="caret"></span>
                    </a>
                    @if ($sub_menu == $sb->title)
                    <div class="collapse show" id="{{$sb->title}}">
                      @else
                      <div class="collapse" id="{{$sb->title}}">
                        @endif
                        <ul class="nav nav-collapse">
                          @foreach($menusubsub as $sbsb)
                          @if($title == $sbsb->title)
                          <li class="active">
                            @else
                          <li>
                            @endif
                            <?php
                      $menusubsubsub = DB::select('SELECT * FROM `user_subsubsub_menu` WHERE `user_subsub_menu_id` = :sub_menu_id', ['sub_menu_id' => $sbsb->id]);
                    ?>
                            @if ($menusubsubsub)
                            <a data-toggle="collapse" href="#{{$sbsb->id}}">
                              <span class="sub-item">{{$sbsb->title}}</span>
                              <span class="caret"></span>
                            </a>
                            <div class="collapse" id="{{$sbsb->id}}">
                              <ul class="nav nav-collapse subnav">
                                @foreach($menusubsubsub as $lv3)

                                @if($title == $lv3->title)
                                <li class="active">
                                  @else
                                <li>
                                  @endif
                                  <a href="{{url($lv3->url)}}">
                                    <span class="sub-item">{{$lv3->title}}</span>
                                  </a>
                                </li>
                                @endforeach
                              </ul>
                            </div>
                            @else
                            <a href="{{ url($sbsb->url)}}">
                              <span class="sub-item">{{$sbsb->title}}</span>
                            </a>
                            @endif

                            @endforeach
                        </ul>
                      </div>

                  </li>
                  @else
                  @if($title == $sb->title)
                  <li class="nav-item active">
                    @else
                  <li class="nav-item">
                    @endif
                    <a href="{{url($sb->url)}}">
                      <i class="{{$sb->icon}}"></i>
                      <p>{{$sb->title}}</p>

                    </a>
                  </li>
                  @endif

                  <?php } ?>
                  <?php } ?>


                  <li class="nav-item">

                    <a href="{{url('logout')}}" onclick="return confirm('Anda akan keluar dari aplikasi!, Yakin?')">
                      <i class="icon-logout"></i>
                      <p>Logout</p>
                      <!-- <span class="badge badge-success">4</span> -->
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="main-panel">

            <div class="content">

              <!-- Begin Page Content -->
              @yield('content')
              <!-- /.container-fluid -->
              <!-- End of Main Content -->
            </div>
            <footer class="footer">
              <div class="container-fluid">
                <nav class="pull-left">
                  <ul class="nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#">

                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        E-Learning App
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="https://cic.ac.id">
                        Ujian Online
                      </a>
                    </li>
                  </ul>
                </nav>
                <div class="copyright ml-auto">
                  @php
                  echo date('Y');
                  @endphp, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Labirin</a>
                </div>
              </div>
            </footer>
          </div>
        </div>

        {{-- <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
      <div class="title">Settings</div>
      <div class="custom-content">
        <div class="switcher">
          <div class="switch-block">
            <h4>Logo Header</h4>
            <div class="btnSwitch">
              <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
              <button type="button" class="selected changeLogoHeaderColor" data-color="purple"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
              <br/>
              <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
            </div>
          </div>
          <div class="switch-block">
            <h4>Navbar Header</h4>
            <div class="btnSwitch">
              <button type="button" class="changeTopBarColor" data-color="dark"></button>
              <button type="button" class="changeTopBarColor" data-color="blue"></button>
              <button type="button" class="changeTopBarColor" data-color="purple"></button>
              <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
              <button type="button" class="changeTopBarColor" data-color="green"></button>
              <button type="button" class="changeTopBarColor" data-color="orange"></button>
              <button type="button" class="changeTopBarColor" data-color="red"></button>
              <button type="button" class="changeTopBarColor" data-color="white"></button>
              <br/>
              <button type="button" class="changeTopBarColor" data-color="dark2"></button>
              <button type="button" class="changeTopBarColor" data-color="blue2"></button>
              <button type="button" class="selected changeTopBarColor" data-color="purple2"></button>
              <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
              <button type="button" class="changeTopBarColor" data-color="green2"></button>
              <button type="button" class="changeTopBarColor" data-color="orange2"></button>
              <button type="button" class="changeTopBarColor" data-color="red2"></button>
            </div>
          </div>
          <div class="switch-block">
            <h4>Sidebar</h4>
            <div class="btnSwitch">
              <button type="button" class="selected changeSideBarColor" data-color="white"></button>
              <button type="button" class="changeSideBarColor" data-color="dark"></button>
              <button type="button" class="changeSideBarColor" data-color="dark2"></button>
            </div>
          </div>
          <div class="switch-block">
            <h4>Background</h4>
            <div class="btnSwitch">
              <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
              <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
              <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
              <button type="button" class="changeBackgroundColor" data-color="dark"></button>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-toggle">
        <i class="flaticon-settings"></i>
      </div>
    </div>
    <!-- End Custom template -->
  </div> --}}
        <!--   Core JS Files   -->
        <script src="{{asset('/js/core/popper.min.js')}}"></script>
        <script src="{{asset('/js/core/bootstrap.min.js')}}"></script>
        <!-- jQuery UI -->
        <script src="{{asset('/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
        {{-- <script src="{{asset('/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script> --}}

        <!-- jQuery Scrollbar -->
        <script src="{{asset('/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
        <!-- Datatables -->
        <script src="{{asset('/js/plugin/datatables/datatables.min.js')}}"></script>
        <!-- Atlantis JS -->
        <script src="{{asset('/js/atlantis.min.js')}}"></script>
        <!-- Atlantis DEMO methods, don't include it in your project! -->
        <script src="{{asset('/js/setting-demo2.js')}}"></script>

        @stack('scripts')

        <script>
          $(document).ready(function() {



      $('#basic-datatables').DataTable({
      });

      $('#multi-filter-select').DataTable( {
        "pageLength": 5,
        initComplete: function () {
          this.api().columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );

              column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
            } );

            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });

      // Add Row
      $('#add-row').DataTable({
        "pageLength": 5,
      });

      var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action
          ]);
        $('#addRowModal').modal('hide');

      });
    });
        </script>
  </body>

</html>