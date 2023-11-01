<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            .border {
                border: #263342 solid 1px;
                border-collapse: collapse;
            }

            .py-2 {
                padding: 0.5rem;
            }

            .p-2 {
                padding: 0.5rem;
            }

            .text-center {
                text-align: center;
            }

            .bg-rose-400 {
                background-color: rgb(251 113 133);
            }

            .table-auto {
                width: 100%;
            }

            .w-full {
                width: 100%;
            }

            .text-end {
                text-align: end;
            }

            .text-white {
                color: white;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center">Rekap Produksi Sirap</h1>
        <h2>Bulan {{ month($month) }} {{ $year }}</h2>
        <table class="table-auto w-full mt-3 border rounded">
            <thead>
                <tr>
                    <th class="border py-2" rowspan="2">NAMA</th>
                    <th class="border py-2" colspan="{{ $maxDays }}">TANGGAL</th>
                    <th class="border py-2" width="5%" rowspan="2">SUB TOTAL</th>
                </tr>
                <tr>
                    @foreach(range(1, $maxDays) as $date)
                        <th class="border p-2 text-center">{{ $date < 10 ? '0' . $date : $date }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data as $name => $result)
                    @php($total = 0)
                    <tr>
                        <td class="border p-2">{{ $name }}</td>
                        @foreach($result as $result)
                            @php($total += $result)
                            <td class="border p-2 text-center text-sm {{ $result === 0 ? 'text-white' : '' }} {{ $result === 0 ? 'bg-rose-400' : '' }}">{{ $result === 0 ? '-' : $result }}</td>
                        @endforeach
                        <td class="border p-2 text-center font-semibold">{{ $total }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="border p-2"></td>
                    <td class="border p-2 text-end font-semibold" colspan="{{  $maxDays }}">GRAND TOTAL</td>
                    <td class="border p-2 text-center font-semibold">{{ $grandTotal }}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
