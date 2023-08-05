<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Denda Siswa Perpustakaan Per Month Year</title>
    <style>
        @page {
            size: A4;
            margin: 1cm;
            transform: scale(0.8);
            -webkit-transform: scale(0.8);
            -moz-transform: scale(0.8);
            -ms-transform: scale(0.8);
            -o-transform: scale(0.8);
        }

        h4 {
            text-transform: uppercase;
            font-size: 14px !important;
        }

        p,
        span,
        .body-print .table-desc {
            font-size: 12px !important;
        }

        .text-center {
            text-align: center !important;
        }

        .mb-4 {
            margin-bottom: 18px !important;
        }

        .text-italic {
            font-style: italic !important;
        }

        .w-100 {
            width: 100% !important;
        }

        #finesTableReport.table {
            border-collapse: collapse !important;
            width: 100%;
            font-size: 10px !important;
        }

        #finesTableReport th,
        #finesTableReport td {
            border: 1px solid #000000;
            padding: 4px;
            text-align: left;
        }

        #finesTableReport th {
            background-color: #f2f2f2;
            font-size: 9px !important;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <main id="bodyPrint">
        <h4 class="text-center">REKAP DENDA PERPUSTAKAAN PER BULAN MONTH YEAR</h4>
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
                    <tr>
                        <td class="text-center">1</td>
                        <td>123456789</td>
                        <td>John Doe</td>
                        <td class="text-center">XII</td>
                        <td class="text-center">Rp. 100.000</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>123456789</td>
                        <td>John Doe</td>
                        <td class="text-center">XII</td>
                        <td class="text-center">Rp. 100.000</td>
                </tbody>
            </table>
        </div>
        <p class="text-italic">Dicetak melalui aplikasi eLibrary pada <span id="printDay"></span>,
            <span id="printDate"></span> <span id="printTime"></span>
            WIB
        </p>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

            const titlePrint = `Rekap Denda Siswa Perpustakaan Per Month Year`;
            var prtContent = document.getElementById("bodyPrint");

            if (prtContent) {
                // Buat elemen style untuk CSS khusus cetak
                var customStyle = document.createElement('style');
                customStyle.innerHTML =
                    `@page{size:A4;margin:1cm;transform:scale(0.8);-webkit-transform:scale(0.8);-moz-transform:scale(0.8);-ms-transform:scale(0.8);-o-transform:scale(0.8)}h4{text-transform:uppercase;font-size:14px!important}p,span,.body-print .table-desc{font-size:12px!important}.text-center{text-align:center!important}.mb-4{margin-bottom:18px!important}.text-italic{font-style:italic!important}.w-100{width:100%!important}#finesTableReport.table{border-collapse:collapse!important;width:100%;font-size:12px!important}#finesTableReport th,#finesTableReport td{border:1px solid #000;padding:4px;text-align:left}#finesTableReport th{background-color:#f2f2f2;font-size:11px!important;text-transform:uppercase}`;

                var WinPrint = window.open('', '',
                    'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write('<title>' + titlePrint + '</title>');
                WinPrint.document.write(customStyle.outerHTML);
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
            } else {
                swal({
                    title: "Gagal!",
                    text: "Terjadi kesalahan pada sistem. Silahkan coba beberapa saat lagi!",
                    icon: "error",
                    dangerMode: true,
                });
            }
        });
    </script>
</body>

</html>
