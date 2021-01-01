<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url() ?>assets/logo.png" type="image/png" />
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
    <h2 style="text-align: center; font-family: sans-serif;">Data Transaksi</h2>
    <p style="text-align: center; font-size: 12pt; font-family: sans-serif; margin-top: -5px;"><?php echo $label ?><p>
            <hr class="line">
            <table class="table" border="1" width="100%" style="margin-top:30px; rules:none">
                <?php
                if (empty($transaksi)) {
                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                } else {
                    $no = 1;
                    foreach ($transaksi as $t) {
                        setlocale(LC_ALL, 'id-ID', 'id_ID');
                        $tanggal = strftime('%d %B %Y', strtotime($t->tanggal));

                        echo "<tr>";
                            echo "<td colspan=3 style=border:none><b>Tanggal : </b>" . $tanggal . "</td>";
                            echo "<td colspan=2 style=border:none><b>Invoice : </b>" . $t->invoice . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td colspan=5 style=border:none><b>Kasir : </b>" . $t->nama_user . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th style=text-align:left;>No</th>";
                            echo "<th style=text-align:left;>Customer</th>";
                            echo "<th style=text-align:left;>Tarif</th>";
                            echo "<th style=text-align:left;>Tarif Tambahan</th>";
                            echo "<th style=text-align:left;>Sub Total</th>";
                        echo "</tr>";
                        

                        echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $t->nama_customer . "</td>";
                            echo "<td>" .$t->tarif. "<br>(". $t->nama_kendaraan.")</td>";
                            echo "<td>" .$t->tarif_tambahan. "<br>(". $t->nama_metode . ")</td>";
                            echo "<td>".$t->sub_total."</td>";
                        echo "</tr>";

                        echo "<tr >";
                            echo "<th style=text-align: right; colspan=4>Diskon</th>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
</body></html>