<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleepy Panda - Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Urbanist dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #20223F;
            font-family: 'Urbanist', sans-serif;
        }

        .custom-container {
            background-color: rgba(32, 34, 63, 0.6);
            border: 1px solid white;
        }

        .btn-custom-primary {
            background-color: #35968F;
            border-color: #35968F;
        }

        .btn-custom-primary:hover {
            background-color: #35968F;
            border-color: #35968F;
        }
    </style>
</head>

<body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center py-4">
        <!-- Lebar border: ubah max-width untuk mengatur lebar kotak border (contoh: 400px, 500px, 350px) -->
        <div class="custom-container border p-4" style="max-width: 350px; width: 100%;">
            <!-- Jarak gambar panda dengan border atas: ubah margin-top -->
            <div class="text-center" style="margin-top: 130px; margin-bottom: 20px;">
                <!-- Jarak antara icon panda dengan logo text: ubah margin-bottom -->
                <img src="{{ asset('images/icon.png') }}" alt="Sleepy Panda Icon" style="width: 80px;">
                <br>
                <!-- Jarak logo Sleepy Panda dengan teks bawah: ubah margin-bottom -->
                <img src="{{ asset('images/Sleepy Panda.png') }}" alt="Sleepy Panda" style="width: 180px; margin-bottom: 160px;">
            </div>

            <!-- Jarak teks dengan tombol Masuk: ubah margin-bottom -->
            <p class="text-center text-muted px-3" style="font-size: 18px; color: #B8B9C5 !important; margin-bottom: 25px;">
                Mulai dengan masuk atau mendaftar untuk melihat analisa tidur mu
            </p>

            <!-- Panjang tombol: ubah width, jarak tombol Daftar dengan border bawah: ubah margin-bottom, jarak antar tombol: ubah gap -->
            <div class="d-flex flex-column align-items-center" style="gap: 15px; margin-bottom: 35px;">
                <!-- Ukuran tombol: ubah width untuk panjang, padding untuk tinggi -->
                <a href="{{ route('login') }}" class="btn btn-custom-primary text-white" style="width: 95%; padding: 6px 20px;">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-light" style="width: 95%; padding: 6px 20px; color: #35968F;">Daftar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>