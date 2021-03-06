<head>
    <title>@yield("title", "Home") | TridentSDK</title>

    <meta name="keywords" content="minecraft,server,software,trident,tridentsdk">
    <meta name="description" content="A successor to the Minecraft server Software!">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{ asset("/assets/css/google.css") }}" type="text/css">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="{{ asset("/node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css") }}">

    <link rel="stylesheet" type="text/css" href="{{ asset("/node_modules/summernote/dist/summernote.css") }}">

    <link rel="stylesheet" type="text/css" href="{{ asset("/node_modules/open-iconic/font/css/open-iconic-bootstrap.css") }}">

    <link href="{{ asset("/css/app.css") }}" rel="stylesheet" type="text/css">

    <style type="text/css">
        .bv-form .help-block{margin-bottom:0}.bv-form .tooltip-inner{text-align:left}.nav-tabs li.bv-tab-success>a{color:#3c763d}.nav-tabs li.bv-tab-error>a{color:#a94442}
    </style>

    <link rel="shortcut icon" href="{{ asset("/assets/images/favicon.ico") }}" type="image/x-icon">
    <link rel="icon" href="{{ asset("/assets/images/favicon.ico") }}" type="image/x-icon">

    <script src="{{ asset("/node_modules/jquery/dist/jquery.min.js") }}" type="text/javascript"></script>

    @yield("header-extra")
</head>