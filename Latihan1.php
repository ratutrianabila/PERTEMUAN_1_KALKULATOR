<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        }
        .kalkulator {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 320px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .button-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            padding: 15px;
            font-size: 18px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        input[type="submit"]:active {
            transform: translateY(1px);
        }
        #hasil {
            background-color: #f8f9fa;
            color: #333;
            font-weight: bold;
            cursor: default;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="kalkulator">
    <h2>Kalkulator</h2>
    <form method="POST">
        <input type="text" name="angka1" placeholder="Angka Pertama" required>
        <input type="text" name="angka2" placeholder="Angka Kedua" required>
        
        <!-- Grid untuk tombol operasi -->
        <div class="button-grid">
            <input type="submit" name="operasi" value="+">
            <input type="submit" name="operasi" value="-">
            <input type="submit" name="operasi" value="x">
            <input type="submit" name="operasi" value=":">
        </div>
        
        <!-- Tampilan hasil -->
        <input type="text" id="hasil" placeholder="Hasil" value="<?php echo isset($hasil) ? $hasil : ''; ?>" readonly>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = isset($_POST['angka1']) ? floatval($_POST['angka1']) : 0;
    $angka2 = isset($_POST['angka2']) ? floatval($_POST['angka2']) : 0;
    $operasi = $_POST['operasi'];
    $hasil = '';

    switch ($operasi) {
        case '+':
            $hasil = $angka1 + $angka2;
            break;
        case '-':
            $hasil = $angka1 - $angka2;
            break;
        case 'x':
            $hasil = $angka1 * $angka2;
            break;
        case ':':
            if ($angka2 == 0) {
                $hasil = "Tidak bisa membagi dengan nol!";
            } else {
                $hasil = $angka1 / $angka2;
            }
            break;
        default:
            $hasil = "Operasi tidak valid!";
    }

    echo "<script>document.getElementById('hasil').value = '$hasil';</script>";
}
?>

</body>
</html>