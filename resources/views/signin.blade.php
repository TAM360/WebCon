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
    <input type="hidden" id="ajax-url" url="https://demo.accesspressthemes.com/construction/wp-admin/admin-ajax.php" />
    <div id="page" class="site">
        

        <header id="masthead" class="site-header" role="banner">
           @include('layouts.menubar')
        </header>
       
        <div id="content" class="site-content">
            @include('layouts.login.loginForm')
        </div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            @include('layouts.footer')
        </footer>
    </div>   
</html>