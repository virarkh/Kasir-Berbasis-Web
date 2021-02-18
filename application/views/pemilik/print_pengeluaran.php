<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .body{
        font-family: sans-serif;
        font-size: 15px;
      }
      #title{
        text-align: center;
        font-family: sans-serif;
        margin-top: 5px;
      }
      .line-title{
        border: 0;
        /* border-style: solid ; */
        border-top: 1px solid #000;
      }
      #table1 {
      	font-family: sans-serif;
      	color: #000;
        border-collapse: collapse;
      }
      table{
        width: 100%;
      }
      #table2 {
      	font-family: sans-serif;
      	color: black;
        border: 0;
        /* border-collapse: collapse; */
      }
    </style>
</head><body class="body">
  <?php
    setlocale(LC_ALL, 'id-ID', 'id_ID');
  ?>

  <h2 id="title">Laporan Pengeluaran</h2>
  <p id="title"><?php echo $label ?></p>

  <hr class="line-title">

  <table border="1">
    <?php
        if (empty($pengeluaran)) {
            echo "<tr>
                    <td colspan='5'>Data tidak ada</td>
                  </tr>";
        } else {
            $no = 1;
            foreach ($pengeluaran as $p) {
              // $tanggal = strftime('%a, %d %b %Y', strtotime($p->tanggal));
                    echo "<tr>
                      <td colspan=5 style=border:none>Tanggal : " . strftime('%A, %d %B %Y', strtotime($p->tanggal)) . "</td>
                    </tr>";
                    echo "<tr>
                      <td colspan=5 style=border:none>Bersangkutan : $p->nama_user</td>
                    </tr>";

                    echo "<tr style=text-align:center>
                      <th id=table2>No</th>
                      <th>No. Nota</th>
                      <th>Pengeluaran</th>
                      <th>Detail</th>
                      <th>Biaya</th>
                    </tr>";

                    echo "<tr style=text-align:center;>
                      <td>" . $no++ ." </td>
                      <td> $p->kode </td>
                      <td> $p->nama_pengeluaran </td>
                      <td> $p->detail </td>
                      <td>Rp " . number_format($p->biaya, 0, ',', '.') . "</td>
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
