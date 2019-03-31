<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="../../../../favicon.ico">
   <title>Blog Template for Bootstrap</title>
   <!-- Custom styles for this template -->
   <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900"
         rel="stylesheet">
   <link href="/public/css/app.css" rel="stylesheet">
   <link href="/public/css/owl.carousel.min.css" rel="stylesheet">
   <link href="/public/css/owl.theme.default.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
   <?php if(isset($_SESSION[ 'flash' ])&&$_SESSION[ 'flash' ]!=''): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <?= $_SESSION[ 'flash' ];?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
   <?php endif; ?>
   
   
   <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-start">
         <a class="p-2 text-muted" href="/">Last records</a>
         
      </nav>
   </div>
    <?= $content; ?>
   <footer class="blog-footer">
   </footer>
   <!-- Bootstrap core JavaScript
       ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="/public/js/jquery-3.2.1.slim.min.js" ></script>
   <script>window.jQuery || document.write('<script src="/public/js/jquery-slim.min.js"><\/script>')</script>
   <script src="/public/js/popper.min.js"></script>
   <script src="/public/js/bootstrap.min.js"></script>
   <script src="/public/js/owl.carousel.min.js"></script>
   <script>
      $(document).ready(function () {
          $('#popular-carousel').owlCarousel({
              loop:true,
              margin:10,
              nav:true,
              items:1
          })
      })
   </script>
   <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
   <!--<script src="/public/js/vendor/holder.min.js"></script>-->
</body>
</html>