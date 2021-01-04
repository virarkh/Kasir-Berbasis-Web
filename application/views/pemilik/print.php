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
    <?php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    ?>
    <h2 style="text-align: center; font-family: sans-serif;">Data Pengeluaran</h2>
    <p style="text-align: center; font-size: 12pt; font-family: sans-serif; margin-top: -5px;"><?php echo $label ?><p>
            <hr>
            <table class="table" width="100%" style="">

                <?php
                
                if (empty($pengeluaran)) {

                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                } else {
                    $no = 1;
                    foreach ($pengeluaran as $p) {
                        // $tanggal = strftime('%a, %d %b %Y', strtotime($p->tanggal));

                        echo "<tr>";
                            echo "<td colspan=5 style=border:none><b>Tanggal : </b>" . strftime('%A, %d %B %Y', strtotime($p->tanggal)) . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td colspan=5 style=border:none><b>Bersangkutan : </b>" . $p->nama_user . "</td>";
                        echo "</tr>";
                        // echo "<tr>";
                        //      echo "<td colspan=5 style=border:none><b>Kode Nota : </b>" . $p->kode . "</td>";
                        // echo "</tr>";

                        // echo "<tr>";
                           
                        // echo "</tr>";

                        echo "<tr border:1px>";
                            echo "<th style=text-align:center>No</th>";
                            echo "<th style=text-align:center>No. Nota</th>";
                            echo "<th style=text-align:center;>Pengeluaran</th>";
                            echo "<th style=text-align:center;>Detail</th>";
                            echo "<th style=text-align:center;>Biaya</th>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td style=width:2px; text-align:center>" . $no++ . "</td>";
                            echo "<td style=text-align:center>" . $p->kode. "</td>";
                            echo "<td style=text-align:center>" . $p->nama_pengeluaran . "</td>";
                            echo "<td style=text-align:center>" . $p->detail . "</td>";
                            echo "<td style=text-align:center>Rp " . number_format($p->biaya,0,',','.') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
</body></html>