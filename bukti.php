<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Bahan Bakar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            margin: 30px auto;
            /* Memusatkan secara horizontal */
            text-align: center;
            width: 93%;
            padding: 5px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #container {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: wrap;
            width: 90%;
            /* Lebar container */
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            /* Padding container */
            border-radius: 10px;
            /* Border radius container */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Shadow container */
            margin-top: 25px;
        }

        form {
            flex: 1;
            max-width: 600px;
            /* Lebar maksimum form dan bukti pembayaran */
            margin: 15px;
            /* Jarak antara form dan bukti pembayaran */
            padding: 50px;
            /* Padding form dan bukti pembayaran */
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 10px;
            /* Border radius form dan bukti pembayaran */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Shadow form dan bukti pembayaran */
        }

        hr {
            width: 25%;
            border-style: dotted;
            border-width: 2px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="number"],
        select {
            padding: 8px;
            margin: 5px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: black;
            color: white;
            padding: 10px 20%;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #333;
        }

        .output-container {
            border: 1px solid #ddd;
            /* Menggunakan border yang sama seperti pada form */
            padding: 20px;
            margin: 15px auto;
            max-width: 600px;
            background-color: #f7f7f7;
            border-radius: 10px;
            /* Menambahkan border-radius yang sama */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Menambahkan shadow yang sama */
        }

        .output-container h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .output-container .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .output-container .header .date {
            font-size: 18px;
            font-weight: bold;
        }

        .output-container .header .invoice-no {
            font-size: 18px;
            font-weight: bold;
        }

        .output-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .output-container th,
        .output-container td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .output-container th {
            background-color: #f0f0f0;
        }

        .output-container .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .print-button {
            background-color: black;
            color: white;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
            text-align: center;
            /* Menengahkan secara horizontal */
        }

        .print-button:hover {
            background-color: #333;
        }

        .print-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            /* Sesuaikan jarak dari tabel transaksi */
        }

        .histori-container {
            margin: 30px auto;
            width: 90%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .histori-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .histori-container ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .histori-container ul li {
            margin-bottom: 10px;
        }

        /* Menyembunyikan elemen selain bukti transaksi saat mencetak */
        @media print {
            body>*:not(.output-container) {
                display: none;
            }

            form {
                display: none;
            }

            .print-button {
                display: none;
            }

            .output-container {
                border: 1px solid #ddd;
                /* Menggunakan border yang sama seperti pada form */
                padding: 50px;
                margin: 40px auto;
                max-width: 600px;
                background-color: #f7f7f7;
                border-radius: 10px;
                /* Menambahkan border-radius yang sama */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                /* Menambahkan shadow yang sama */
            }

            .output-container h3 {
                font-size: 40px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .output-container .header {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .output-container .header .date {
                font-size: 35px;
                font-weight: bold;
            }

            .output-container .header .invoice-no {
                font-size: 35px;
                font-weight: bold;
            }

            .output-container table {
                width: 100%;
                border-collapse: collapse;
            }

            .output-container th,
            .output-container td {
                border: 1px solid #ddd;
                padding: 20px;
                text-align: left;
                font-size: 28px;
            }

            .output-container th {
                background-color: #f0f0f0;
            }

            .output-container .total {
                font-size: 35px;
                font-weight: bold;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <h1>Shell Station</h1>
    <div id="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="jumlah">Masukkan Jumlah Liter:</label>
            <input type="number" id="jumlah" name="jumlah" min="0" step="1" required>
            <br><br>
            <label for="jenis">Tipe Bahan Bakar:</label>
            <select id="jenis" name="jenis">
                <option value="Shell Super">Shell Super</option>
                <option value="Shell V-Power">Shell V-Power</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
            </select>
            <br><br>
            <label for="uang_bayar">Uang Bayar:</label>
            <input type="number" id="uang_bayar" name="uang_bayar" min="0" step="0.01" required>
            <br><br>
            <button type="submit">Beli</button>
        </form>

        <?php
        // Proses pembelian dan histori transaksi
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            class Shell
            {
                protected $jenis;
                protected $harga;
                protected $jumlah;
                protected $ppn;

                public function __construct($jenis, $harga, $jumlah)
                {
                    $this->jenis = $jenis;
                    $this->harga = $harga;
                    $this->jumlah = $jumlah;
                    $this->ppn = 10; // PPN tetap 10%
                }

                public function getJenis()
                {
                    return $this->jenis;
                }

                public function getHarga()
                {
                    return $this->harga;
                }

                public function getJumlah()
                {
                    return $this->jumlah;
                }

                public function getPpn()
                {
                    return $this->ppn;
                }
            }

            class Beli extends Shell
            {
                public function hitungTotal()
                {
                    $total = $this->harga * $this->jumlah;
                    $total += $total * $this->ppn / 100;
                    return $total;
                }

                public function buktiTransaksi($uangBayar)
                {
                    $total = $this->hitungTotal();
                    $kembalian = $uangBayar - $total;
                    if ($kembalian >= 0) {
                        echo "<div class='output-container'>";
                        echo "<h3>Bukti Transaksi:</h3>";
                        echo "<div class='header'>";
                        echo "<span class='date'>" . date('d/m/Y') . "</span>";
                        echo "<span class='invoice-no'>#123456</span>"; // ganti dengan nomor invoice yang sesuai
                        echo "</div>";
                        echo "<table>";
                        echo "<tr><th>Tipe Bahan Bakar</th><th>Jumlah</th><th>Harga</th></tr>";
                        echo "<tr><td>" . $this->jenis . "</td><td>" . $this->jumlah . " Liter</td><td>Rp " . number_format($total, 2, ',', '.') . "</td></tr>";
                        echo "<tr><td colspan='2'>Total yang harus anda bayar:</td><td>Rp " . number_format($total, 2, ',', '.') . "</td></tr>";
                        echo "<tr><td colspan='2'>Uang Bayar:</td><td>Rp " . number_format($uangBayar, 2, ',', '.') . "</td></tr>";
                        echo "<tr><td colspan='2'>Kembalian:</td><td>Rp " . number_format($kembalian, 2, ',', '.') . "</td></tr>";
                        echo "</table>";
                        echo "<div class='total'>Total: Rp " . number_format($total, 2, ',', '.') . "</div>";
                        echo "<div class='print-container'>";
                        echo "<button class='print-button' onclick='window.print()'>Cetak Bukti Transaksi</button>";
                        echo "</div>";
                        echo "</div>";

                        // Simpan detail transaksi ke dalam session
                        $_SESSION['histori_transaksi'][] = [
                            'tanggal' => date('d/m/Y'),
                            'jenis' => $this->jenis,
                            'jumlah' => $this->jumlah,
                            'total' => number_format($total, 2, ',', '.')
                        ];
                    } else {
                        echo "<div class='output-container'>";
                        echo "<p style='text-align: center;'>Pembayaran anda tidak mencukupi.</p>";
                        echo "</div>";
                    }
                }
            }

            $hargaBahanBakar = [
                "Shell Super" => 15420.00,
                "Shell V-Power" => 16130.00,
                "Shell V-Power Diesel" => 18310.00,
                "Shell V-Power Nitro" => 16510.00,
            ];

            $jenis = $_POST["jenis"];
            $jumlah = $_POST["jumlah"];
            $uangBayar = $_POST["uang_bayar"];

            if (array_key_exists($jenis, $hargaBahanBakar)) {
                $harga = $hargaBahanBakar[$jenis];
                $beli = new Beli($jenis, $harga, $jumlah);
                $beli->buktiTransaksi($uangBayar);
            } else {
                echo "<p style='text-align: center;'>Jenis bahan bakar tidak valid.</p>";
            }
        }
        ?>

    </div>

    <!-- Tampilkan Histori Transaksi -->
    <div class="histori-container">
        <!-- Konten Histori Transaksi -->
        <?php
        if (isset($_SESSION['histori_transaksi']) && !empty($_SESSION['histori_transaksi'])) {
            echo "<h2>Histori Transaksi</h2>";
            echo "<ul>";
            foreach ($_SESSION['histori_transaksi'] as $index => $transaksi) {
                echo "<li>";
                echo "{$transaksi['tanggal']} | {$transaksi['jenis']} | {$transaksi['jumlah']} Liter | Rp {$transaksi['total']}";
                echo "<button class='delete-button' onclick='hapusTransaksi($index)'><i class='fas fa-trash'></i> Hapus</button>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Tidak ada histori transaksi.</p>";
        }
        ?>
    </div>

    <script>
        // Fungsi untuk menghapus transaksi
        function hapusTransaksi(index) {
            // Konfirmasi pengguna sebelum menghapus
            if (confirm("Anda yakin ingin menghapus transaksi ini?")) {
                // Redirect atau hapus langsung, sesuai kebutuhan
            }
        }
    </script>
</body>

</html>