<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Index</title>
</head>
<body>
    <h1>Kirim Email dari Localhost dengan PHPMailer</h1>

    <hr>

    <form action="kirim.php" method="post">
        <p>
            <label>No. Invoice</label>
            <input type="text" name="no_invoice" placeholder="Isikan angka saja">
        </p>
        <p>
            <label>Nama Pengirim</label>
            <input type="text" name="nama_pengirim" placeholder="Isikan Nama Anda">
        </p>
        <p>
            <label>Email</label>
            <input type="text" name="email" placeholder="Isikan Email Anda">
        </p>
        <button type="submit" name="submit">Kirim</button>
    
    </form>
</body>
</html>