<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Ustora Demo Admin</title>
  <link rel="icon" href="{{asset('assets/img/logo.png')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">

  <!-- Your custom styles (optional) -->
  <style>
    .card.card-cascade .view.gradient-card-header {
        padding: 1.1rem 1rem;
    }

    .card.card-cascade .view {
        box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
    }
  </style>
</head>

<body class="fixed-sn white-skin">

  <!--Main Navigation-->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li class="logo-sn waves-effect">
          <div class="text-center">
            <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" class=""></a>
          </div>
        </li>
        <!--/. Logo -->

        <!--Search Form-->
        <li>
          <form class="search-form" role="search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
              <input type="text" class="form-control" placeholder="Search">
            </div>
          </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
          <a href="{{route('admin.product.index')}}"><strong>Product list</strong></a>
        </li>
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fas fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto">
        <p>Dashboard v.1</p>
      </div>

      <!--Navbar links-->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->
        <li class="nav-item dropdown notifications-nav">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="badge red">3</span> <i class="fas fa-bell"></i>
            <span class="d-none d-md-inline-block">Notifications</span>
          </a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">
              <i class="fas fa-money mr-2" aria-hidden="true"></i>
              <span>New order received</span>
              <span class="float-right"><i class="far  fa-clock" aria-hidden="true"></i> 13 min</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-money mr-2" aria-hidden="true"></i>
              <span>New order received</span>
              <span class="float-right"><i class="far  fa-clock" aria-hidden="true"></i> 33 min</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-line-chart mr-2" aria-hidden="true"></i>
              <span>Your campaign is about to end</span>
              <span class="float-right"><i class="far  fa-clock" aria-hidden="true"></i> 53 min</span>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span></a>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Log Out</a>
            <a class="dropdown-item" href="#">My account</a>
          </div>
        </li>

      </ul>
      <!--/Navbar links-->
    </nav>
    <!-- /.Navbar -->

    <!-- Fixed button -->
    <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">
      <a class="btn-floating btn-lg red">
        <i class="fas fa-pencil-alt"></i>
      </a>

      <ul class="list-unstyled">
        <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
        <li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
        <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
        <li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
      </ul>
    </div>
    <!-- Fixed button -->

  </header>
  <!--Main Navigation-->


  <!--Main layout-->
  <main>
    <div class="container-fluid w-100">

      @yield('content')

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer pt-0 mt-5 rgba-stylish-light">

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        ?? 2018 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>

      </div>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->


   <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
  <!--Initializations-->
  <script type="text/javascript" src="{{asset('js/addons/datatables.min.js')}}"></script>
  <!--Custom scripts-->
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    Ps.initialize(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    $('#dtMaterialDesignExample').DataTable();
    $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
      $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
      $('input').attr("placeholder", "Search");
      $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
    $('#dtMaterialDesignExample_wrapper select').removeClass(
      'custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

  </script>

  <!-- Charts -->
  <script>
    // Small chart
    $(function () {
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#FF5252",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
    });

    //Main chart
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          fillColor: "#fff",
          backgroundColor: 'rgba(255, 255, 255, .3)',
          borderColor: 'rgba(255, 255, 255)',
          data: [0, 10, 5, 2, 20, 30, 45],
        }]
      },
      options: {
        legend: {
          labels: {
            fontColor: "#fff",
          }
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: true,
              color: "rgba(255,255,255,.25)"
            },
            ticks: {
              fontColor: "#fff",
            },
          }],
          yAxes: [{
            display: true,
            gridLines: {
              display: true,
              color: "rgba(255,255,255,.25)"
            },
            ticks: {
              fontColor: "#fff",
            },
          }],
        }
      }
    });

  </script>

</body>

</html>
