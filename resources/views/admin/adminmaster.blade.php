
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>School Managment Admin - Dashboard</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css  ">

	<!-- Style-->
	<link rel="stylesheet" href=" {{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendor_components/toastr/toastr.min.css')}}">

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
@include('admin.admin_partial.header')

  <!-- Left side column. contains the logo and sidebar -->
 @include('admin.admin_partial.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		@yield('admin_content')
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.admin_partial.footer')

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

	<!-- Vendor JS -->
	<script src="  {{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/toastr/toastr.min.js')}}"></script>

    <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
    {{-- <script>
        $(document).on("click", "#softDelete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Are you Want to Soft Delete?",
                 text: "Once Delete, This will be Soft Delete!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Safe Data!");
                 }
               });
           });
    </script> --}}
    <script>
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Are you Want to delete?",
                 text: "Once Delete, This will be Permanently Delete!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Safe Data!");
                 }
               });
           });
    </script>
    
    {{-- before  logout showing alert message --}}
    <script>
        $(document).on("click", "#logout", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Are you Want to logout?",
                 text: "",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Not Logout!");
                 }
               });
           });
    </script>

    <script>
       @if(Session::has('messege'))
         var type="{{Session::get('alert-type','info')}}"
         switch(type){
             case 'info':
                  toastr.info("{{ Session::get('messege') }}");
                  break;
             case 'success':
                 toastr.success("{{ Session::get('messege') }}");
                 break;
             case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                 break;
             case 'error':
                 toastr.error("{{ Session::get('messege') }}");
                 break;
               }
       @endif
     </script>
</body>
</html>
