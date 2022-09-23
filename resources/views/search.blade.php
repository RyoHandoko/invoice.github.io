<!DOCTYPE html>
<!--
	Moon by GetTemplates.co
	URL: https://gettemplates.co
-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Moon - Multipurpose Bootstrap 4 Template by GetTemplates.co</title>
    <meta name="description" content="Core HTML Project">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/lightcase/lightcase.css')}}">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <div class="jumbotron d-flex align-items-center" style="background-image: url('{{asset('img/hero-2.jpg')}}')">
            <div class="container text-center">
                <div class="col-12 contact-form-holder mt-4">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Address</th>
                                <th scope="col">Print</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cari->count() > 0)
                            @foreach($cari as $cr)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$cr->user->nama}}</td>
                                <td>{{$cr->invoice}}</td>
                                <td>{{$cr->user->alamat}}</td>
                                <td>
                                    <a href="{{url('print/'.$cr->id)}}" target="_blank"><i class="text-success fa-solid fa-file-invoice-dollar"></i></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-uppercase">
                                    <strong>
                                        Invoice Tidak Ditemukan
                                    </strong>
                                </td>
                                <td></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- Contact Form Section -->
        <section id="gtco-contact-form" class="bg-white">
            <div class="container">
                <div class="section-content">
                    <!-- Section Title -->
                    <div class="title-wrap">
                        <h2 class="section-title">Check Invoice</h2>
                        <p class="section-sub-title">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. <br> pharetra augue. Donec id elit non mi.</p>

                    </div>
                    <!-- End of Section Title -->
                    <div class="row">
                        <!-- Contact Form Holder -->
                        <div class="col-md-8 offset-md-2 contact-form-holder mt-4">
                            <form method="GET" name="contact-us" action="{{url('searching')}}">
                                <div class="row">
                                    <!-- <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-input">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    </div> -->
                                    <div class="col-md-12 form-textarea">
                                        <textarea class="form-control" id="message" name="search" rows="6" value="{{request('search')}}" placeholder=" Searc Your Invoice in here.."></textarea>
                                    </div>
                                    <div class="col-md-12 form-btn text-center">
                                        <button class="btn btn-block btn-secondary btn-red" type="submit" name="submit">Search</button>
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
                        <p class="mb-0">&copy; 2019 Moon. All Right Reserved. Design by <a href="https://gettemplates.co" target="_blank">GetTemplates.co</a>.</p>
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
                                <i class="icon-linkedin"></i>
                            </a>
                            <a class="nav-link" href="#">
                                <i class="icon-youtube"></i>
                            </a>
                            <a class="nav-link" href="#">
                                <i class="icon-pinterest"></i>
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