<html>
    <head?>
        <title>Laporan Data Produk Toko Elektronik</title>
        <style>
            body {
                font-size: 12px;
                color: #333;
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            .header{
                text-align: center;
                margin-bottom: 25px;
                border-bottom: 3px solid coral;
                padding-bottom: 10px;
            }
            .title{
                font-size: 18px;
            }
            table{
                width: 100%;
                border-collapse: collapse;
            }
            th{
                background-color: #f2f2f2;
                font-weight: bold;
                padding: 8px;
                border: 1px solid #ddd;
            }
            td{
                padding: 8px;
                border: 1px solid #ddd;
            }
            .text-center{
                text-align: center;
            }
        </style>
</head>
<body>
    <div class="header">
        <div class="title"> LAPORAN DATA PRODUK MY TOKO ELEKTRONIK </div>
        <p>dicetak secara otomatis oleh sistem</p>
    </div>
    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
      <tbody>
        @foreach ($products as $key => $p)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $p->nama_barang }}</td>
                <td>Rp. {{ number_format($p->harga, 0, ',', '.') }}</td>
                <td>{{ $p->stok }}</td>
                <td>{{ $p->deskripsi }}</td>
            </tr>
        @endforeach
      </tbody>
</table>
    </body>
</html>