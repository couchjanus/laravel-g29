<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Name - @yield('title')</title>


    <link rel="icon" href="favicon.ico" />

  </head>

  <body>

    <!-- Navigation -->
    <header class="page-header">

      <nav class="navbar">
        <a href="/">Home</a>
        <a href="/admin">Admin</a>
        <a href="/admin/categories">Categories</a>
        <a href="/about">About</a>
      </nav>

    </header>


    <!-- /Navigation -->
     @yield('content')

    @yield('footer')



    <!-- <script src="js/db.js"></script> -->
    <!-- <script src="js/components/carousel.js"></script> -->

  </body>

</html>
