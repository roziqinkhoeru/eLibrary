<?php
use App\Helpers\CustomCurrency;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="description"
        content="Jelajahi koleksi buku digital dan sumber daya luas di eLibrary. Tingkatkan pengetahuan Anda dan temukan dunia baru melalui perpustakaan online komprehensif kami.">
    <meta name="keywords"
        content="eLibrary, buku digital, perpustakaan online, pengetahuan, sumber daya, membaca, ebook">
    <meta name="author" content="eLibrary">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="eLibrary - Temukan Dunia Pengetahuan">
    <meta property="og:description"
        content="Tingkatkan pengetahuan Anda dan jelajahi koleksi buku digital dan sumber daya luas di eLibrary.">
    <meta property="og:image" content="{{ asset('assets/icon/apple-touch-icon.png') }}">
    <meta property="og:url" content="https://www.elibrary.site">

    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    {{-- apple touch icon --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/icon/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/icon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/icon/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/icon/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/icon/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/icon/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/icon/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icon/apple-touch-icon-180x180.png') }}">

    {{-- microsoft touch icon --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/icon/apple-touch-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    {{-- CSS Files --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/css/print.css') }}">
</head>

<body>
    <main id="bodyPrint">
        <h4 class="text-center">REKAP DENDA PERPUSTAKAAN PER {{ $finesMonth }}
            {{ $finesYear }}</h4>
        <div class="w-100 mb-4">
            <table class="w-100 table" id="finesTableReport">
                <thead>
                    <tr class="space-nowrap">
                        <th class="text-center">No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Total Denda</th>
                    </tr>
                </thead>
                <tbody id="finesTableReportBody">
                    @if ($fines->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data denda pada bulan ini</td>
                        </tr>
                    @else
                        @foreach ($fines as $finesData)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $finesData->nis }}</td>
                                <td>{{ $finesData->name }}</td>
                                <td class="text-center">{{ $finesData->class_school->name }}</td>
                                <td class="text-center">
                                    {{ CustomCurrency::format_idr($finesData->transactions_sum_penalty) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                @if ($fines->count() != 0)
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-bold">TOTAL</th>
                            <th class="text-center text-bold">{{ CustomCurrency::format_idr($totalFines) }}</th>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
        <p class="text-italic">Dicetak melalui aplikasi eLibrary pada <span id="printDay"></span>,
            <span id="printDate"></span> <span id="printTime"></span>
            WIB
        </p>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Sweet Alert --}}
    <script src="{{ asset('assets/template/admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Cache the jQuery objects for better performance
            var $printDay = $('#printDay');
            var $printDate = $('#printDate');
            var $printTime = $('#printTime');

            // Call the updateRealTimeValues function initially
            updateRealTimeValues();

            // Call the updateRealTimeValues function every second
            setInterval(updateRealTimeValues, 1000);

            // Function to update the real-time values
            function updateRealTimeValues() {
                var now = new Date();
                var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var day = days[now.getDay()];
                var date = now.getDate();
                var month = now.getMonth() + 1;
                var year = now.getFullYear();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                // Update the text content of the elements with the real-time values
                $printDay.text(day);
                $printDate.text(formatNumber(date) + '-' + formatNumber(month) + '-' + year);
                $printTime.text(formatNumber(hours) + ':' + formatNumber(minutes) + ':' + formatNumber(seconds));
            }

            // Helper function to format numbers with leading zeros
            function formatNumber(number) {
                return number.toString().padStart(2, '0');
            }

            const titlePrint = "Rekap Denda Siswa Perpustakaan Per {{ $finesMonth }} {{ $finesYear }}";
            var prtContent = document.getElementById("bodyPrint");

            if (prtContent) {
                // Buat elemen style untuk CSS khusus cetak
                var customStyle = document.createElement('style');
                customStyle.innerHTML =
                    `@page{size:A4;margin:1cm;transform:scale(0.8);-webkit-transform:scale(0.8);-moz-transform:scale(0.8);-ms-transform:scale(0.8);-o-transform:scale(0.8)}h4{text-transform:uppercase;font-size:14px!important}p,span,.body-print .table-desc{font-size:12px!important}.text-center{text-align:center!important}.text-right{text-align:right!important;}.mb-4{margin-bottom:18px!important}.text-italic{font-style:italic!important}.text-bold{font-weight:700!important;}.w-100{width:100%!important}#finesTableReport.table{border-collapse:collapse!important;width:100%;font-size:12px!important}#finesTableReport th,#finesTableReport td{border:1px solid #000;padding:4px;text-align:left}#finesTableReport th{background-color:#f2f2f2;font-size:11px!important;text-transform:uppercase}`;

                var WinPrint = window.open('', '',
                    'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write('<title>' + titlePrint + '</title>');
                WinPrint.document.write(customStyle.outerHTML);
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
            } else {
                swal({
                    title: "Gagal!",
                    text: "Terjadi kesalahan pada sistem. Silahkan coba beberapa saat lagi!",
                    icon: "error",
                    dangerMode: true,
                });
            }
        });

        const intToMonth = (month) => {
            const months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            return months[(month - 1) % 12];
        };
    </script>
</body>

</html>
