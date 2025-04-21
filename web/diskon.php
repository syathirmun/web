<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Diskon</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #6e8efb 0%, #a777e3 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 20px;
}

.container {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 450px;
    transition: all 0.3s ease;
}

.container:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

h2 {
    color: #2c3e50;
    text-align: center;
    margin-bottom: 30px;
    font-size: 28px;
    letter-spacing: 1.5px;
    transition: color 0.3s ease;
}

h2:hover {
    color: #6e8efb;
}

form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

label {
    color: #2c3e50;
    font-size: 16px;
    font-weight: 500;
    transition: color 0.3s ease;
}

label:hover {
    color: #6e8efb;
}

input[type="number"] {
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 16px;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

input[type="number"]:hover {
    border-color: #6e8efb;
    background: #fff;
}

input[type="number"]:focus {
    outline: none;
    border-color: #a777e3;
    box-shadow: 0 0 10px rgba(167, 119, 227, 0.3);
    background: #fff;
}

button {
    padding: 14px;
    background: linear-gradient(45deg, #6e8efb, #a777e3);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

button:hover {
    background: linear-gradient(45deg, #a777e3, #6e8efb);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(167, 119, 227, 0.4);
}

button:active {
    transform: translateY(0);
}

h3 {
    margin: 15px 0;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 8px;
    text-align: center;
    font-size: 16px;
    color: #2c3e50;
    transition: all 0.3s ease;
}

h3:hover {
    background: #e8f0fe;
    transform: scale(1.02);
}

h3[style*="color: red"] {
    background: #ffe6e6;
    color: #c0392b !important;
}

h3[style*="color: red"]:hover {
    background: #ffd1d1;
}
</style>
<body>
    <div class="container">
        <h2>Hitung Diskon</h2>
        <form method="post" action="">
           <label for="harga">Harga Barang</label>
           <input type="number" id="harga" name="harga" step="any" min="0" required>
           <label for="diskon">Diskon (%)</label>
           <input type="number" id="diskon" name="diskon" step="any" min="0" max="100" required>
           <button type="submit" name="submit">Hitung</button>
        </form>
        <?php
        $harga = 0;
        $diskon = 0;
        $total_diskon = 0;
        $total_bayar = 0;
        $error = '';

        if (isset($_POST['submit'])) {
            $harga = floatval($_POST['harga']);
            $diskon = floatval($_POST['diskon']);

            if ($harga <= 0 || $diskon < 0 || $diskon > 100) {
                $error = "Harga harus lebih dari 0 dan diskon antara 0-100%";
            } else {
                $total_diskon = $harga * ($diskon / 100);
                $total_bayar = $harga - $total_diskon;
            }
        }
        ?>
        <?php if ($error): ?>
            <h3 style="color: red;"><?php echo $error; ?></h3>
        <?php elseif (isset($_POST['submit']) && !$error): ?>
            <h3>Harga: Rp. <?php echo number_format($harga, 2, ',', '.'); ?></h3>
            <h3>Diskon: Rp. <?php echo number_format($total_diskon, 2, ',', '.'); ?></h3>
            <h3>Total Bayar: Rp. <?php echo number_format($total_bayar, 2, ',', '.'); ?></h3>
        <?php endif; ?>
    </div>
</body>
</html>