<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Samudra Media Nusantara</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link href="/assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/trix.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    @include('partials.nav')
    <div id="layoutSidenav">
        @include('partials.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('partials.footer')
        </div>
    </div>
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    {{-- <script src="/assets/demo/chart-area-demo.js"></script>
    <script src="/assets/demo/chart-bar-demo.js"></script> --}}
    <script src="/assets/js/trix.js"></script>
    <script>
    document.addEventListener("trix-file-accept", event => {
        event.preventDefault()
    })

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    {{-- <script src="js/datatables-simple-demo.js"></script> --}}
</body>

</html>