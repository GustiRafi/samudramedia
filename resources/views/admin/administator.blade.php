@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <h3 id="jam" class="my-2"></h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Welcome back {{ auth()->user()->name }}</li>
    </ol>
    {{-- <h2>Welcome back {{ auth()->user()->name }}</h2> --}}
    <div class="row mt-3">
        <div class="col-12 col-lg-3 col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="py-4">
                    <h4><i class="fas fa-book"></i></h4>
                    <h5>Book</h5>
                    <h6 class="">{{ $book }}</h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="py-4">
                    <h4><i class="fas fa-list"></i></h4>
                    <h5>Product</h5>
                    <h6 class="">{{ $product }}</h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="py-4">
                    <h4><i class="fa-solid fa-bell-concierge"></i></h4>
                    <h5>Service</h5>
                    <h6 class="">{{ $service }}</h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="py-4">
                    <h4><i class="fa-solid fa-book"></i></h4>
                    <h5>Journal</h5>
                    <h6 class="">{{ $journal }}</h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="py-4">
                    <h4><i class="fas fa-envelope"></i></h4>
                    <h5>Email</h5>
                    <h6 class="">{{ $inbox }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        <h4 class="card-title">Pertumbuhan Buku Minggu Ini</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div id="pertumbuhan-buku"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        <h4 class="card-title">Email / Pertanyaan Minggu Ini</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div id="pertumbuhan-email" class="w-100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function updateJam() {
        // Mendapatkan waktu saat ini
        const waktuSekarang = new Date();

        // Mendapatkan jam, menit, dan detik dari waktu saat ini
        const jam = waktuSekarang.getHours();
        const menit = waktuSekarang.getMinutes();
        const detik = waktuSekarang.getSeconds();

        // Format jam, menit, dan detik agar selalu memiliki 2 digit angka (misalnya: 09:05:02)
        const jamFormat = String(jam).padStart(2, '0');
        const menitFormat = String(menit).padStart(2, '0');
        const detikFormat = String(detik).padStart(2, '0');

        // Menampilkan waktu jam dalam elemen dengan format: "jam:menit:detik"
        $('#jam').text(`${jamFormat}:${menitFormat}:${detikFormat}`);
    }

    $(document).ready(function () {
        updateJam(); // Panggil fungsi ini pertama kali agar jam langsung muncul saat halaman dimuat.
        setInterval(updateJam, 1000); // Memanggil fungsi updateJam setiap detik (1000ms)
    });

    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'pertumbuhan-buku',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: JSON.parse(`{!! json_encode($bookAnalytic) !!}`),
        // The name of the data record attribute that contains x-values.
        xkey: 'date',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        xLabelFormat: function (d) {
            return ("0" + d.getDate()).slice(-2) + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d
                .getFullYear();
        },
        gridTextSize: 10,
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Book'],
        lineColors: ['#0040e5']
    });

    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'pertumbuhan-email',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: JSON.parse(`{!! json_encode($inboxAnalytic) !!}`),
        // The name of the data record attribute that contains x-values.
        xkey: 'date',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['terkirim', 'dibalas'],
        xLabelFormat: function (d) {
            return ("0" + d.getDate()).slice(-2) + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d
                .getFullYear();
        },
        gridTextSize: 10,
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['email belum dijawab', 'email dijawab'],
        lineColors: ['#0040e5', '#dc3545']
    });

</script>
@endsection
