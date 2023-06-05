<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Supir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan Data Supir</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    NO
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    ID Supir
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Nama Supir
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Alamat Supir
                </th>
                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Notelp
                </th>
                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Nama Truk
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($supir as $pgw)
            <?php $no++ ?>

            <tr>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $no }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->id_supir }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama_supir }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->alamat_supir }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->notelp }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $pgw->nama_truk }}</p>
                </td>
                <td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>