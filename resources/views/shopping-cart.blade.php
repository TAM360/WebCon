<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    @include('layouts.header')
    
</head>

<body class="home page-template page-template-template-parts page-template-construction-home page-template-template-partsconstruction-home-php page page-id-22 wp-custom-logo">
    {{-- <input type="hidden" id="ajax-url" url="https://demo.accesspressthemes.com/construction/wp-admin/admin-ajax.php" /> --}}
    <div id="page" class="site">
        <header id="masthead" class="site-header" role="banner">
           @include('layouts.menubar')
        </header>
       
        <div id="content" class="container">
            <div class="card text-white bg-warning mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="https://picsum.photos/200/300" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Item Name</h5>
                      <p class="card-text">
                          Item Description
                      </p>
                      <p class="card-text">Item Price</p>
                      <p class="card-text">Item Quantity</p>
                      <button class="btn btn-primary btn-sm">Remove From Cart</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <footer id="colophon" class="site-footer" role="contentinfo">
            @include('layouts.footer')
        </footer>
    </div>   
</html>