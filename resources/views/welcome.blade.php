<!DOCTYPE html>
<!--
	Moon by GetTemplates.co
	URL: https://gettemplates.co
-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UD Berkah Abadi</title>
    <meta name="description" content="Core HTML Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/lightcase/lightcase.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/stylewelcome.min.css')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="https://file.myfontastic.com/7vRKgqrN3iFEnLHuqYhYuL/icons.css" rel="stylesheet">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>

<body data-spy="scroll" data-target="#navbar-nav-header" class="static-layout">
    <div class="boxed-page">
        <nav id="gtco-header-navbar" class="navbar navbar-expand-lg py-4">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <span class="lnr lnr-moon"></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-nav-header">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-bg-secondary text-info btn-sm" href="{{route('login')}}">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <div class="jumbotron d-flex align-items-center" style="background-image: url('{{asset('img/hero-2.jpg')}}')">
            <div class="container text-center">
                <h1 class="display-2 mb-4">Welcome to<br> UD Berkah Abadi</h1>
            </div>
        </div> <!-- Contact Form Section -->
        <section id="gtco-contact-form" class="bg-white">
            <div class="container">
                <div class="section-content">
                    <!-- Section Title -->
                    <div class="title-wrap">
                        <h2 class="section-title">Check Invoice Disini</h2>
                        <p class="section-sub-title">Masukkan nomer INVOICE kamu di bawah ini<br> Pastikan nomer INVOICE kamu benar.</p>
                    </div>
                    <!-- End of Section Title -->
                    <div class="row">
                        <!-- Contact Form Holder -->
                        <div class="col-md-8 offset-md-2 contact-form-holder mt-4">
                            <form method="GET" name="contact-us" action="{{url('searching')}}">
                                <div class="row">
                                    <div class="col-md-12 form-textarea">
                                        <input class="form-control" id="message" name="search" rows="2" value="{{request('search')}}" placeholder="Cari Invoice disini..."></input>
                                    </div>
                                    <div class="col-md-12 form-btn text-center">
                                        <button class="btn btn-block btn-secondary btn-red" type="submit" name="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div id="form-message-warning"></div>
                            <div id="form-message-success">
                                Your message was sent, thank you!
                            </div>
                        </div>
                        <!-- End of Contact Form Holder -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Contact Form Section -->
        <footer class="mastfoot mb-3 bg-white py-4 border-top">
            <div class="inner container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
                        <p class="mb-0">&copy; 2022 UD Berkah Abadi. All Right Reserved. Design by <a class="text-secondary" href="https://gettemplates.co" target="_blank">GetTemplates.co</a>.</p>
                    </div>

                    <div class="col-md-6">
                        <nav class="nav nav-mastfoot justify-content-md-end justify-content-center">
                            <a class="nav-link" href="#">
                                <i class="icon-facebook"></i>
                            </a>
                            <a class="nav-link" href="#">
                                <i class="icon-twitter"></i>
                            </a>
                            <a class="nav-link" href="#">
                                <i class="icon-instagram"></i>
                            </a>

                            <a class="nav-link" href="#">
                                <i class="icon-youtube"></i>
                            </a>

                        </nav>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    </div>
    <!-- External JS -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script src="{{asset('vendor/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}} "></script>
    <script src="{{asset('vendor/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/isotope/isotope.min.js')}}"></script>
    <script src="{{asset('vendor/lightcase/lightcase.js')}}"></script>
    <script src="{{asset('vendor/waypoints/waypoint.min.js')}}"></script>
    <script src="{{asset('vendor/countTo/jquery.countTo.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('js/appwelcome.min.js')}}"></script>
    <script src="//localhost:35729/livereload.js"></script>
</body>

</html>