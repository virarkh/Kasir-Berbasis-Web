<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Pengeluaran</title>
</head><body>
  <h2 id="title">Laporan Pengeluaran</h2>
  <p id="title2"><?php echo $label ?></p>
  <hr>
  <table class="table">
    <thead><tr>
    <th style="text-align:center" id="no">No</th>
    <th id="tgl">Tanggal</th>
    <th id="nota">Nota</th>
    <th id="supplier">Supplier</th>
    <th id="bersangkutan">Bersangkutan</th>
    <th id="item">Item</th>
    <th id="bayar">Biaya</th>
    </tr></thead>
    <?php
      if(empty($detail_pengeluaran)){
        echo "<tbody><tr>
          <td> - </td>
          <td> - </td>
          <td> - </td>
          <td> - </td>
          <td> - </td>
          <td> - </td>
          <td style=text-align:right>Rp 0</td>
        </tr></tbody>";
        echo "<tfoot><tr>
            <td colspan=6>Grand Total</td>
            <td>Rp 0</td>
          </tr></tfoot>";
      }else {
        $no = 1;
        $grand_total = 0;
        foreach ($detail_pengeluaran as $t) {
          setlocale(LC_ALL, 'id-ID', 'id-ID');
          $tanggal = strftime('%e %B %Y', strtotime($t->tanggal));

          echo "<tbody><tr>
            <td style=text-align:center>".$no++."</td>
            <td>$tanggal</td>
            <td>$t->kode</td>
            <td>$t->nama_suppliers</td>
            <td>$t->username</td>
            <td>$t->item</td>
            <td style=text-align:right>Rp ".number_format($t->harga, 0, ',', '.') ."</td>
          </tr></tbody>";

          $grand_total += $t->harga;
        }
        echo "<tfoot><tr>
            <td colspan=6>Grand Total</td>
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

  #no {
    width: 5%
  }

  #tgl {
    width: 15%
  }

  #nota {
    width: 12%
  }

  #supplier {
    width: 23%
  }

  #bersangkutan {
    width: 12%
  }

  #item {
    width: 20%
  }

  #bayar {
    width: 20%;
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
