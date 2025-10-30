<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Order Laundry - Laundry Service</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f0f2f5;
        }
        .order-container {
            position: relative; /* supaya tombol X bisa absolute di dalamnya */
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: transparent;
            border: none;
            font-size: 24px;
            font-weight: bold;
            color: #004085;
            cursor: pointer;
            transition: color 0.3s;
        }
        .close-btn:hover {
            color: #ff0000;
        }
        h1 {
            color: #004085;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #004085;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        .payment-methods {
            margin-top: 10px;
        }
        .payment-methods label {
            font-weight: normal;
            margin-right: 15px;
            cursor: pointer;
        }
        #qrish-image {
            margin-top: 15px;
            display: none;
            text-align: center;
        }
        #qrish-image img {
            max-width: 200px;
        }
        button.submit-btn {
            margin-top: 25px;
            width: 100%;
            background-color: #004085;
            border: none;
            color: white;
            padding: 12px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button.submit-btn:hover {
            background-color: #003066;
        }
    </style>
    <script>
        function toggleQRISH() {
            const qrishImage = document.getElementById('qrish-image');
            const methodQRISH = document.getElementById('payment-qrish');

            if (methodQRISH.checked) {
                qrishImage.style.display = 'block';
            } else {
                qrishImage.style.display = 'none';
            }
        }

        window.onload = function() {
            toggleQRISH();
            const paymentRadios = document.querySelectorAll('input[name="metode_pembayaran"]');
            paymentRadios.forEach(radio => {
                radio.addEventListener('change', toggleQRISH);
            });
        };
    </script>
</head>
<body>
    <div class="order-container">
        <!-- Tombol close X -->
        <button class="close-btn" onclick="window.location.href='home.php'" aria-label="Kembali ke beranda">&times;</button>

        <h1>Form Order Laundry</h1>
        <form action="proses_order.php" method="post" enctype="multipart/form-data">
            <label for="layanan">Layanan:</label>
            <select name="layanan" id="layanan" required>
                <option value="">-- Pilih Layanan --</option>
                <option value="Setrika Saja">Setrika Saja (Rp5.000/kg)</option>
                <option value="Cuci Kering Lipat">Cuci Kering Lipat (Rp12.000/kg)</option>
                <option value="Cuci Kering Setrika">Cuci Kering Setrika (Rp15.000/kg)</option>
            </select>

            <label for="berat">Berat (kg):</label>
            <input type="number" id="berat" name="berat" min="1" required />

            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required />

            <label for="alamat">Alamat Lengkap:</label>
            <textarea id="alamat" name="alamat" required></textarea>

            <label>Metode Pembayaran:</label>
            <div class="payment-methods">
                <label><input type="radio" name="metode_pembayaran" value="Cash" id="payment-cash" checked /> Cash</label>
                <label><input type="radio" name="metode_pembayaran" value="QRISH" id="payment-qrish" /> QRISH</label>
            </div>

            <div id="qrish-image">
                <img src="assets/qrish.jpg" alt="QRISH Payment" />
                <p>Scan QRISH di atas untuk pembayaran.</p>
            </div>

            <label for="bukti_transfer">Bukti Transfer (jika bayar via QRISH):</label>
            <input type="file" id="bukti_transfer" name="bukti_transfer" accept="image/*" />

            <label for="catatan">Catatan (opsional):</label>
            <textarea id="catatan" name="catatan"></textarea>

            <button type="submit" class="submit-btn">Kirim Order</button>
        </form>
    </div>
</body>
</html>
