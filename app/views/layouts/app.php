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
</head>
<body>
<div class="container">
   <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-start">
         <a class="p-2 text-muted" href="/">Last records</a>
         <a class="p-2 text-muted" href="/add-record">Add record</a>
         
      </nav>
   </div>
    <?= $content; ?>
   <footer class="blog-footer">
   </footer>
   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
           integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
           crossorigin="anonymous"></script>
   <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
   <script src="../../assets/js/vendor/popper.min.js"></script>
   <script src="../../dist/js/bootstrap.min.js"></script>
   <script src="../../assets/js/vendor/holder.min.js"></script>
   <script>
       Holder.addTheme('thumb', {
           bg: '#55595c',
           fg: '#eceeef',
           text: 'Thumbnail'
       });
   </script>
</body>
</html>