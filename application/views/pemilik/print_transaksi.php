<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Transaksi</title>
</head><body>
  <h2 id="title">Laporan Transaksi</h2>
  <p id="title2"><?php echo $label ?></p>
  <hr>
  <table class="table">
    <thead><tr>
     <th>Invoice</th>
     <th>Tanggal</th>
     <th>Kasir</th>
     <th>Customer</th>
     <th style="text-align:right">Sub Total</th>
     <th style="text-align:right">Total</th>
     </tr></thead>
    <?php
      if(empty($transaksi)){
        echo "<tbody><tr>
          <td> - </td>
          <td> - </td>
          <td> - </td>
          <td> - </td>
          <td style=text-align:right>Rp 0</td>
          <td style=text-align:right>Rp 0</td>
        </tr></tbody>";
        echo "<tfoot><tr>
            <td colspan=5>Grand Total</td>
            <td>Rp 0</td>
          </tr></tfoot>";
      }else {
        // $no = 1;
        $grand_total = 0;
        foreach ($transaksi as $t) {
          setlocale(LC_ALL, 'id-ID', 'id-ID');
          $tanggal = strftime('%d-%m-%y, %H:%M', strtotime($t->tanggal));

          echo "<tbody><tr>
            <td>$t->invoice</td>
            <td>$tanggal</td>
            <td>$t->nama_user</td>
            <td>$t->nama_customer</td>
            <td style=text-align:right>Rp ".number_format($t->sub_total, 0, ',', '.') ."</td>
            <td style=text-align:right>Rp ".number_format($t->total, 0, ',', '.')."</td>
          </tr></tbody>";

          $grand_total += $t->total;
        }
        echo "<tfoot><tr>
            <td colspan=5>Grand Total</td>
            <td>Rp ".number_format($grand_total, 0, ',', '.')."</td>
          </tr></tfoot>";
      }
    ?>
    <!-- <tfoot><tr>
        <td colspan="5">Grand Total</td>
        <td>Rp <?php echo number_format($grand_total, 0, ',','.')?></td>
      </tr></tfoot> -->
  </table>
</body><style>
  body {
    font-family: sans-serif;
    font-size: 15px;
  }

  #title {
    text-align: center;
  }

  #title2 {
    text-align: center;
    margin-top: 5px;
  }

  hr {
    border: 0px;
    border-top: 3px solid #000;
  }

  .table {
    width: 100%;
    /* border: 1px solid #000; */
    border-collapse: collapse;
  }

  .table thead th, .table tbody td, .table tfoot td {
    border: 1px solid #ddd;
    padding: 3px;
  }

  .table thead th {
    text-align: left;
    background-color: #808080;
    color: white;
  }

  .table tfoot td {
    text-align: right;
    font-weight: bold;
    background-color: #808080;
    color: white;
  }

</style></html>
