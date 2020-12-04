<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> PP - Meemba</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}} ">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/skins/_all-skins.min.css")}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue layout-boxed sidebar-mini">
    <!--site wrapper-->
    <div class="wrapper">
      <!--inicio header-->
      @include("theme/$theme/header")
      <!--fin header-->
      <!--inicio aside-->
      @include("theme/$theme/aside")
      <!--fin aside-->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
        <section class="content">

          @php ($alerterrors = 0)
          @if(isset($status))
            @if(empty($status))

              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check">Esta todo ok</i>
              </div>

            @else
              @php ($alerterrors = 1)
            @endif
          @endif


          @if(isset($mensajeno))
            <div class="alert alert-danger" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <h4><i class="fa fa-ban"></i>{!!$mensajeno!!}</h4>
            </div>
          @endif

          <h1><center><b>IMPORTAR BD</b></center></h1>
          <div class="box">
            <div class="box-header with-border">
              <center><h3 class="box-title"> Seleccione su Base de Datos SQLite</h3></center>
              <div class="box-tools pull-right">
              </div>
            </div>
            <br>

          <div class="box-body">
               <form method="POST" action="{{ route('save') }}" accept-charset="UTF-8" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                 <div class="form-group">
                  <div class="col-md-6" >
                      <input class="form-control" type="file" name="file" required="" >
                  </div>
                </div>


                <style>
                    .form-group{
                    margin: 0 0 1rem;
                    height: 5rem;
                    display: flex;
                    justify-content: center;
                    align-content: center;
                    }
                </style>


              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Verificar</button>
                </div>
              </div>
              </form>
            </div>



                  <inputto" >
            </div>
            @if($alerterrors == 1)
           <div class="alert alert-warning" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h2> <i class="fa fa-exclamation-triangle">La BD tiene Faltantes o errores </i> </h2>
              <br>
             <h4> </i>{!!$status!!}</h4>
            </div>
          @endif
          </div>


          <!-- /.box -->
        </section>
        <!-- /.content -->
      </div>
      <!--footer-->
      @include("theme/$theme/footer")
      <!--fin footer-->

    </div>

    <script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset("assets/$theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
    <!-- FastClick -->
    <script src="{{asset("assets/$theme/bower_components/fastclick/lib/fastclick.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("assets/$theme/dist/js/demo.js")}}"></script>
  </body>
</html>