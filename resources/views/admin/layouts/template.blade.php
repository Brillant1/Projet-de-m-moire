<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>  MEMO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @include('admin.layouts.css')
  <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
</head>

<body>

  @include('admin.layouts.header')

  @include('admin.layouts.sidebar')


  <main id="main" class="main">


    @yield('content')

  </main>




{{-- <script type="text/javascript">
    $('#sampleTable').DataTable({
        responsive:true;
        pageLength: 5,
        lengthMenu: [
            [5, 10, 20, 30, -1],
            [5, 10, 20, 30]
        ]
    });
  </script> --}}

  <script>
    $('document').ready(function(){
      $('.dataTable-input').click(function(){
        $('this').addClass('border-0');
      })
    })
  </script>
  @include('admin.layouts.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   @include('admin.layouts.js')

</body>

</html>


