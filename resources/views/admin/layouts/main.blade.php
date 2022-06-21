<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="توضیحات صفحه وب">
    <meta charset="utf-8">
    <meta name="author" content="Asie Sohrabi">
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex,nofollow">
    <title>پنل مدیریتی</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-rtl.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admin/css/all.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    
  </head>

  <body>

  <section id="container">

      
        @include('admin.layouts.sidebar')
      

      
        @yield('main')
      
    
    


     <!-- js placed at the end of the document so the pages load faster -->
   
     <script src="{{asset('admin/js/jquery-3.5.1.min.js')}}"></script> 
     <script src="{{asset('admin/js/popper.min.js')}}"></script> 
     <!-- <script src="js/bootstrap.min.js"></script> -->
     <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script> 
     <script src="{{asset('admin/js/all.min.js')}}"></script> 
    <script src="{{asset('admin/js/ckeditor/ckeditor.js')}}"></script>

 <script>

    CKEDITOR.replace('editor-id', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});


    document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('button-image').addEventListener('click', (event) => {
    event.preventDefault();

    window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });
    });

// set file link
    function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
    }
     
 </script>

 </body>
</html>
