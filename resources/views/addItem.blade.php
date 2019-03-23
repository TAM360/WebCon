<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Product</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    @include('layouts.header')
    
    <style>
    label {
        font-size: 20px;
    }
    
    #submit {
        align-items: center;
    }
    </style>
</head>

<body class="home page-template page-template-template-parts page-template-construction-home page-template-template-partsconstruction-home-php page page-id-22 wp-custom-logo">
    <input type="hidden" id="ajax-url" url="https://demo.accesspressthemes.com/construction/wp-admin/admin-ajax.php" />
    <div id="page" class="site">
        
        <header id="masthead" class="site-header" role="banner">
           @include('layouts.menubar')
        </header>
       
        <div class="container">    
                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Add New Product</div>
                        </div>  
                        <div class="panel-body" >
                            <form  class="form-horizontal" method="POST" action="{{url('/products/new')}}" enctype='multipart/form-data'>
                                @csrf
                                    
                                {{-- <div id="div_id_As" class="form-group required">
                                    <label for="id_As"  class="control-label col-md-4  requiredField">As<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                        <label class="radio-inline"> <input type="radio" name="As" id="id_As_1" value="I"  style="margin-bottom: 10px">Individual </label>
                                        <label class="radio-inline"> <input type="radio" name="As" id="id_As_2" value="CI"  style="margin-bottom: 10px">Company/Institute </label>
                                    </div>
                                </div> --}}

                                <div id="div_id_username" class="form-group required">
                                    <label for="id_username" class="control-label col-md-4  requiredField"> Name <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="name" placeholder="Product Name" style="margin-bottom: 10px" type="text" />
                                    </div>
                                </div>
                                <div id="div_id_email" class="form-group required">
                                    <label for="id_email" class="control-label col-md-4  requiredField"> Descripion<span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input class="input-md form-control-lg  form-control" id="id_email" name="description" placeholder="Product Description" style="margin-bottom: 10px" type="text" />
                                    </div>     
                                </div>
                                <div id="div_id_username" class="form-group required">
                                    <label for="id_username" class="control-label col-md-4  requiredField"> Category <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="category" placeholder="Product Category" style="margin-bottom: 10px" type="text" />
                                    </div>
                                </div>
                                <div id="div_id_username" class="form-group required">
                                    <label for="id_username" class="control-label col-md-4  requiredField"> Price <span class="asteriskField">*</span> </label>
                                    <div class="controls col-md-8 ">
                                        <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="price" placeholder="Product Price" style="margin-bottom: 10px" type="text" />
                                    </div>
                                </div>
                                

                                <input type="file" name="image_name" class="form-control" id="name" value="">
                                    @if($errors->has('image_name'))
                                        <span class="help-block">{{ $errors->first('image_name') }}</span>
                                    @endif
                                

                                <div id="div_id_username" class="form-group required">
                                    <button type="submit" id="submit" class="btn btn-primary btn-large">
                                            submit
                                        </button>
                                </div>        
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            @include('layouts.footer')
        </footer>
    </div>   
</html>