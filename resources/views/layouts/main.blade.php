<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ url('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('assets/vendors/fontawesome/all.min.css') }}">
    <style>
        .fontawesome-icons {
            text-align: center;
        }

        article dl {
            background-color: rgba(0, 0, 0, .02);
            padding: 20px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>

    @yield('head')
</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        @yield('content')
    </div>

    <script src="{{ url('assets/js/jquery-3.6.0.js') }}"></script>

    <script src="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}">
    </script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('assets/js/mazer.js') }}"></script>

    <script src="{{ url('assets/vendors/fontawesome/all.min.js') }}"></script>

    @yield('script')

    <script>
        var url = window.location
        var urlsegment = url['href'].split('/')
        $('.sidebar-item a').each(function (e) {
            var link = $(this).attr('href');
            var linksegment = link.split('/')
            if (linksegment[3] == urlsegment[3]) {
                $(this).parent('li').addClass('active');
            }
        });

    </script>

</body>

</html>