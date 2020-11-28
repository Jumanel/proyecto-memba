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
          <div class="callout callout-info">
              <center><h2>Importar BD </h2></center>
            <p></p>
          </div>
          <br>
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
                  <div class="col-md-6">
                    <input type="file" class="form-control" name="file" >
                  </div>
                </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </div>
              </form>
            </div>
                  <inputto" >
            </div>
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