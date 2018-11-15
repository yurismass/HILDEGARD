
<?php session_start();
$hora_actual = time(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HILDEGARD</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>

<body class="skin-black">
  <input type="hidden" id="hora_login" value="<?=$hora_actual?>">
  <input type="hidden" id="hora_ultimo_movimiento" value="0">
  <input type="hidden" id="modal_activa" value="no">
      <!-- **********************************************************************************************************************************************************-->
      <!--header start-->
    <?php include('paginas/menu/header.php'); ?>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
          <?php include('paginas/menu/menu.php'); ?>
        </aside>

      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
        <aside class="right-side" id="contenedor_principal">

        </aside><!-- /.right-side -->
      </div><!-- ./wrapper -->



  </body>
  </html>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

<script src="paginas/menu/menu_principal.js"></script>


<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript">
 $(document).ready(function(){
 // $("#raiz_sitio").html('<i class="fa fa-dashboard"></i> Escritorio');
   var hora_login = parseInt($("#hora_login").val());
   var hora_actual = Math.round(new Date().getTime()/1000.0);
   //$("#p").html(hora_actual-(hora_login+10));
   var eval=hora_actual-(hora_login+10);
   // if (eval<10) {
   //     $("#modal").addClass( "modal-backdrop fade in" );
   //     $.get('logDin/modal_sesion_caduco.php').done(function(htmlexterno){
   //       $("#contenedor_principal").html(htmlexterno);
   //      });
   // }else {
   //   $.get('index.php').done(function(htmlexterno){
   //     $("#contenedor_principal").html(htmlexterno);
   //    });
   // }
   });

      $(document).mousemove(function(){
       //var hora_login = $("#hora_login").val();
       var su_ultimo_acceso = $("#hora_ultimo_movimiento").val()
       var hora_actual = Math.round(new Date().getTime()/1000.0);
       var modal_activa = $("#modal_activa").val();
      // tenemos 1000 en el if
      // alert(hora_actual);
      // alert(su_ultimo_acceso);


       if ((hora_actual-su_ultimo_acceso)>1000 && su_ultimo_acceso!=0 && modal_activa=='no') { // PRUEBA DE 10 SEGUNDOS
         var minutos = parseInt((hora_actual-su_ultimo_acceso)/60);

         // alert('Estubo inactivo por '+minutos+' Minutos');
         // TRAER MODAL CON EL CIERRE DE SESSION
         $("#modal").addClass( "modal-backdrop fade in" );
         $.get('login/modal_sesion_caduco.php',{minutos:minutos}).done(function(htmlexterno){
           $("#contenedor_principal").html(htmlexterno);
          });
         setTimeout(function() {
           window.location.assign('login/cerrar_sesion.php');
         },2500);
       $("#modal_activa").val('si');
       }
       $("#hora_ultimo_movimiento").val(hora_actual);
       //var p = parseInt($("#p").text());
     });


     //
     // swal({
     //   title: "Hola <?=$_SESSION['usuario_activo']?>, bienvenido al sistema",
     //   text: "",
     //   timer: 2000,
     //   showConfirmButton: false
     // });

 //  $(document).ready( function () {
 //      $('#tabla_id').DataTable({
 //       "language":{
 //        "lengthMenu":"Mostrar _MENU_ registros por página.",
 //        "zeroRecords": "Lo sentimos. No se encontraron registros.",
 //              "info": "Mostrando página _PAGE_ de _PAGES_",
 //              "infoEmpty": "No hay registros aún.",
 //              "infoFiltered": "(filtrados de un total de _MAX_ registros)",
 //              "search" : "Búsqueda",
 //              "LoadingRecords": "Cargando ...",
 //              "Processing": "Procesando...",
 //              "SearchPlaceholder": "Comience a teclear...",
 //              "paginate": {
 //      "previous": "Anterior",
 //      "next": "Siguiente",
 //      }
 //       }
 //      });
 //  } );
 //
 </script>
