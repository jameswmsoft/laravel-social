
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('')}}css/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{asset('')}}css/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{asset('')}}css/custom.css">

        <!-- Head Libs -->
        <script src="{{asset('')}}vendor/modernizr/modernizr.js"></script>

        <!-- Basic Css files -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

        <link href="{{asset('toastor/css/toastr.css')}}"rel="stylesheet" type="text/css">

        <link href="{{asset('css/project.css')}}" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left" style="background: #CCFFCC">

        @if(Request::is('profile/member/*') || Request::is('search/*'))
                @include('includes/profileLeftbar')
         @else
                @include('includes/leftbar')
        @endif
@include('includes/topbar')