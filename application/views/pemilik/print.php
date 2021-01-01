<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF</title>
    <style>
        .table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        .table th {
            padding: 5px;
        }

        .table td {
            word-wrap: break-word;
            width: 20%;
            padding: 5px;
        }

        hr.line {
            border-top: 1px solid black;
        }
    </style>
</head><body>
    <h2 style="text-align: center; font-family: sans-serif;">Data Pengeluaran</h2>
    <p style="text-align: center; font-size: 12pt; font-family: sans-serif; margin-top: -5px;"><?php echo $label ?><p>
            <hr class="line">
            <table class="table" border="1" width="100%" style="margin-top:30px; rules:none">
                <!--  <tr>
            <th>Tanggal</th>
            <th>Kode Nota</th>
            <th>Nama Pengeluaran</th>
            <th>Biaya</th>
            <th>Detail</th>
            <th>User</th>
        </tr> -->
                <?php
                if (empty($pengeluaran)) {
                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                } else {
                    $no = 1;
                    foreach ($pengeluaran as $p) {
                        $tanggal = date('d-m-Y', strtotime($p->tanggal));

                        echo "<tr>";
                        echo "<td colspan=2 style=border:none><b>Tanggal : </b>" . $tanggal . "</td>";
                        echo "<td colspan=2 style=border:none><b>Bersangkutan : </b>" . $p->nama_user . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td style=border:none><b>Kode Nota : </b>" . $p->kode . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th style=text-align:left;>No</th>";
                        echo "<th style=text-align:left;>Pengeluaran</th>";
                        echo "<th style=text-align:left;>Detail</th>";
                        echo "<th style=text-align:left;>Biaya</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $p->nama_pengeluaran . "</td>";
                        echo "<td>" . $p->detail . "</td>";
                        echo "<td>" . $p->biaya . "</td>";
                        echo "</tr>";

                        // echo "<tr>";
                        // echo "<td>" . $tanggal . "</td>";
                        // echo "<td>" . $p->kode . "</td>";
                        // echo "<td>" . $p->nama_pengeluaran . "</td>";
                        // echo "<td>" . $p->biaya . "</td>";
                        // echo "<td>" . $p->detail . "</td>";
                        // echo "<td>" . $p->nama_user . "</td>";
                        // echo "</tr>";
                    }
                }
                ?>
            </table>
</body></html>