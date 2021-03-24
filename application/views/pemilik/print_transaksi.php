<!DOCTYPE html>
<html><head>
  <title>Laporan Transaksi</title>
  <style type="text/css">
    .table1 {
      font-family: sans-serif;
      /* color: #000; */
      border-collapse: collapse;
      width: 100%;
      /* border: 1px solid #000; */
      font-size: 15px;
    }

    .table1 thead th {
      background-color: #808080;
      color: white;
      text-align: center;
      border: 1px solid gainsboro;
    }

    .table1 tbody td {
      text-align: center;
      background-color: #F5F5F5;
      border: 1px solid gainsboro;
    }

    .table1 tfoot td {
      text-align: center;
      background-color: #F5F5F5;
      border-right: 1px solid gainsboro;
    }

    #title {
      text-align: center;
      font-family: sans-serif;
      margin-top: 5px;
    }

    .line-title {
      border: 0;
      /* border-style: solid ; */
      border-top: 3px solid #000;
    }
  </style>
</head><body>
  <h2 id="title">Laporan Transaksi</h2>
  <p id="title"><?php echo $label ?></p>

  <hr class="line-title">

  <table class="table1">
    <?php
    if (empty($transaksi)) {
      echo "<tr><td colspan='5' style=text-align:center>Data tidak ada</td></tr>";
    } else {
      $no = 1;
      foreach ($transaksi as $t) {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $tanggal = strftime('%A, %e %B %Y, %H:%M:%S', strtotime($t->tanggal));

        echo "<tr>
            <td style=text-align:left><b>Tanggal </b></td><td>: $tanggal</td>
            </tr><tr>
            <td style=text-align:left><b>Kasir </b></td><td>: $t->nama_user</td>
            </tr><tr>              
            <td style=text-align:left><b>Invoice </b></td><td>: $t->invoice</td>
          </tr>";

        echo "<tr>
          <td style=border:none></td>
        </tr>";

        echo "<thead><tr>
          <th>No</th>
          <th>Customer</th>
          <th>Tarif</th>
          <th>Tarif Tambahan</th>
          <th>Sub Total</th>
        </tr></thead>";

        echo "<tbody><tr>
          <td>" . $no++ . "</td>
          <td>$t->nama_customer</td>
          <td>Rp " . number_format($t->tarif, 0, ',', '.') . "</td>
          <td>Rp " . number_format($t->tarif_tambahan, 0, ',', '.') . "</td>
          <td style=text-align:right>Rp " . number_format($t->sub_total, 0, ',', '.') . "</td>
        </tr><tr>
          <td style=text-align:right; colspan=4>Diskon</td>
          <td style=text-align:right; colspan=4>Rp " . number_format($t->potongan_harga, 0, ',', '.') . "</td>
        </tr></tbody>";

        echo "<tfoot><tr>
          <td style=text-align:right; colspan=4><b>Total</b></td>
          <td style=text-align:right; colspan=4><b>Rp " . number_format($t->total, 0, ',', '.') . "</b></td>
        </tr></tfoot>";

        echo "<tr>
          <td style=border:none></td>
        </tr>";
        echo "<tr>
          <td style=border:none></td>
        </tr>";
        echo "<tr>
          <td style=border:none></td>
        </tr>";
      }
    }
    ?>
  </table>
<body><html>