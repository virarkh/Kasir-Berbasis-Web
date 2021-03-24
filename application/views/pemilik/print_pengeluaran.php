<!DOCTYPE html>
<html><head>
  <title>Laporan Pengeluaran</title>
  <style type="text/css">
    .table1{
      font-family: sans-serif;
      color: #000;
      border-collapse: collapse;
      width: 100%;
      /* border: 1px solid #000; */
      font-size: 15px;
    }

    .table1 thead th{
      background-color: #808080;
      color: white;
      text-align: center;
      border: 1px solid gainsboro;
    }

    .table1 tbody td{
      text-align: center;
      background-color: #F5F5F5;
      /* border-bottom: 1px solid gainsboro; */
      border-right: 1px solid gainsboro;
    }

    #title{
      text-align: center;
      font-family: sans-serif;
      margin-top: 5px;
    }

    .line-title{
        border: 0;
        /* border-style: solid ; */
        border-top: 3px solid #000;
      }

  </style>
</head><body>
    <h2 id="title">Laporan Pengeluaran </h2>
    <p id="title"><?php echo $label ?></p>

    <hr class="line-title">

  <table class="table1">
    <?php
        if (empty($pengeluaran)) {
            echo "<tr>
                    <td style=text-align:center>Data tidak ada</td>
                  </tr>";
        } else {
            $no = 1;
            foreach ($pengeluaran as $p) {
              setlocale(LC_ALL, 'id-ID', 'id_ID');
        $tanggal = strftime('%e %B %Y', strtotime($p->tanggal));

                    echo "<tr>
                      <td><b>Tanggal</b></td><td>: $tanggal</td>
                    </tr>
                    <tr>
                      <td><b>Bersangkutan</b></td><td> : $p->nama_user</td>
                    </tr>";

                    echo "<thead><tr>
                      <th style=text-align:center>No</th>
                      <th>No. Nota</th>
                      <th>Pengeluaran</th>
                      <th>Detail</th>
                      <th style=text-align:center>Biaya</th>
                    </tr></thead>";

                    echo "<tbody><tr>
                      <td style=text-align:center>" . $no++ ." </td>
                      <td> $p->kode </td>
                      <td> $p->nama_pengeluaran </td>
                      <td> $p->detail </td>
                      <td>Rp " . number_format($p->biaya, 0, ',', '.') . "</td>
                    </tr></tbody>";

                    echo "<tr>
                      <td style=border:none></td>
                    </tr>";
                    echo "<tr>
                      <td style=border:none></td>
                    </tr>";
                    echo "<tr>
                      <td style=border:none></td>
                    </tr>";
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
  </table></body></html>
