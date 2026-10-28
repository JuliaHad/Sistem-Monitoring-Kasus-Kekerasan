<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>

        @page {
            margin: 15px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 7px;
        }

        h2 {
            text-align: center;
            font-size: 13px;
            margin-bottom: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th {
            background-color: #eeeeee;
            font-weight: bold;
            text-align: center;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 3px;
            word-wrap: break-word;
        }

        .center {
            text-align: center;
        }

    </style>
</head>

<body>

    <h2>
    LAPORAN DATA KASUS P3AKB
    @if($tahun !== 'Semua Tahun')
        TAHUN {{ $tahun }}
    @endif
</h2>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Kabupaten/Kota</th>
                <th>Usia</th>
                <th>Pekerjaan</th>
                <th>Perkawinan</th>
                <th>Tempat Kejadian</th>
                <th>Bentuk Kekerasan</th>
                <th>Pendidikan</th>
                <th>Layanan</th>
            </tr>
        </thead>

        <tbody>

            @foreach($kasus as $item)

                <tr>

                    <td class="center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="center">
                        {{ $item->tahun ?? '-' }}
                    </td>

                    <td>
                        {{ optional($item->kabupatenKota)->nama_kabupaten ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $item->usia_korban ?? '-' }}
                    </td>

                    <td>
                        {{ optional($item->statusPekerjaan)->nama_pekerjaan ?? '-' }}
                    </td>

                    <td>
                        {{ optional($item->statusPerkawinan)->nama_perkawinan ?? '-' }}
                    </td>

                    <td>
                        {{ optional($item->tempatKejadian)->nama_tempat ?? '-' }}
                    </td>

                    <td>
                        {{ optional($item->bentukKekerasan)->nama_kekerasan ?? '-' }}
                    </td>

                    <td>
                        {{ optional($item->tingkatPendidikan)->nama_pendidikan ?? '-' }}
                    </td>

                    <td>
                        {{ optional($item->jenisLayanan)->nama_layanan ?? '-' }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>