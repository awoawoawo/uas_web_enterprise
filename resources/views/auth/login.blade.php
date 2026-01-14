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
            position: relative;
            overflow: hidden;
        }

        .btn-custom-primary {
            background-color: #35968F;
            border-color: #35968F;
        }

        .btn-custom-primary:hover {
            background-color: #35968F;
            border-color: #35968F;
        }

        /* Style untuk form input */
        .form-control {
            background-color: #2d2f4a;
            border: none;
            color: white;
            padding: 10px 15px;
        }

        .form-control::placeholder {
            color: white;
        }

        .form-control:focus {
            background-color: #2d2f4a;
            border: none;
            color: white;
            box-shadow: none;
        }

        .input-group-text {
            background-color: #2d2f4a;
            border: none;
            color: white;
            padding: 10px 12px;
        }

        .link-success {
            color: #35968F !important;
        }

        .link-success:hover {
            color: #2d7d77 !important;
        }

        /* Popup Lupa Password */
        .forgot-password-popup {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(45, 47, 74, 0.98);
            padding: 0 20px 30px 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
            max-height: 320px;
        }

        .forgot-password-popup.show {
            transform: translateY(0);
        }

        /* Overlay backdrop */
        .popup-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: transparent;
            z-index: 999;
            display: none;
        }

        .popup-overlay.show {
            display: block;
        }

        /* Garis horizontal hijau */
        .divider-line {
            width: 40px;
            height: 3px;
            background-color: #35968F;
            margin: 0 auto 20px;
            cursor: pointer;
        }

        /* Form putih di popup */
        .forgot-password-popup .form-control {
            background-color: white;
            color: #20223F;
        }

        .forgot-password-popup .form-control::placeholder {
            color: rgba(32, 34, 63, 0.6);
        }

        .forgot-password-popup .input-group-text {
            background-color: white;
            color: #20223F;
        }

        /* Error message styling */
        .error-message {
            color: #ff4444;
            font-size: 12px;
            margin-top: 8px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        /* Forgot password error message styling */
        .forgot-error-message {
            color: #ff4444;
            font-size: 11px;
            margin-top: 8px;
            margin-bottom: 8px;
            display: none;
            text-align: center;
        }

        .forgot-error-message.show {
            display: block;
        }

        /* Success message styling */
        .success-message {
            background-color: #35968F;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-size: 13px;
            margin-bottom: 15px;
            display: none;
        }

        .success-message.show {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center py-4">
        <!-- Lebar border: ubah max-width untuk mengatur lebar kotak border (contoh: 400px, 500px, 350px) -->
        <div class="custom-container border p-4" style="max-width: 350px; width: 100%;">
            <!-- Jarak gambar panda dengan border atas: ubah margin-top -->
            <div class="text-center" style="margin-top: 130px;">
                <!-- Jarak antara icon panda dengan logo text: ubah margin-bottom -->
                <img src="{{ asset('images/icon.png') }}" alt="Sleepy Panda Icon" style="width: 80px;">
            </div>

            <!-- Jarak teks dengan form: ubah margin-bottom -->
            <p class="text-center text-muted px-3" style="font-size: 18px; color: #B8B9C5 !important; margin-bottom: 80px;">
                Masuk menggunakan akun yang sudah kamu daftarkan
            </p>

            <!-- Form Login: panjang form mengikuti panjang teks di atas -->
            <form method="POST" action="{{ route('login') }}" class="px-3" id="loginForm">
                @csrf

                <!-- Pesan error -->
                <div class="error-message text-center px-3" id="errorMessage">email/password incorrect</div>

                <!-- Form Email dengan icon -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text" style="border-right: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                            </svg>
                        </span>
                        <input type="email" name="email" id="emailInput" class="form-control" placeholder="Email" required style="border-left: none;">
                    </div>
                </div>

                <!-- Form Password dengan icon -->
                <div class="mb-2">
                    <div class="input-group">
                        <span class="input-group-text" style="border-right: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg>
                        </span>
                        <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Password" required style="border-left: none;">
                    </div>
                </div>

                <!-- Lupa Password (kanan bawah) -->
                <div class="text-end mb-3">
                    <a href="#" class="link-success text-decoration-none" style="font-size: 12px;" onclick="showForgotPassword(event)">Lupa Password?</a>
                </div>

                <!-- Tombol Masuk: panjang mengikuti panjang teks maksimal -->
                <div class="mb-3" style="margin-top: 80px;">
                    <button type="submit" class="btn btn-custom-primary text-white w-100" style="padding: 8px 20px;">Masuk</button>
                </div>

                <!-- Link ke Register -->
                <div class="text-center" style="font-size: 12px; color: #B8B9C5;">
                    Belum memiliki akun? <a href="{{ route('register') }}" class="link-success text-decoration-none fw-semibold">Daftar sekarang</a>
                </div>
            </form>

            <!-- Jarak form dengan border bawah -->
            <div style="margin-bottom: 60px;"></div>

            <!-- Overlay untuk menutup popup saat klik di luar -->
            <div class="popup-overlay" id="popupOverlay" onclick="hideForgotPassword()"></div>

            <!-- Popup Lupa Password -->
            <div class="forgot-password-popup" id="forgotPasswordPopup">
                <!-- Garis horizontal hijau - klik untuk menutup -->
                <div class="divider-line" style="margin-top: 10px;" onclick="hideForgotPassword()"></div>

                <h4 class="text-white text-center mb-3 fw-bold">Lupa password?</h4>

                <p class="text-center mb-4 px-3" style="font-size: 13px; color: #B8B9C5; line-height: 1.5;">
                    Instruksi untuk melakukan reset password akan dikirim melalui email yang kamu gunakan untuk mendaftar
                </p>

                <!-- Success message -->
                <div class="success-message px-3" id="forgotSuccessMessage">
                    <strong>Email Terkirim!</strong><br>
                    Kode OTP dan instruksi reset password telah dikirim ke email Anda. Silakan cek inbox atau folder spam.
                </div>

                <form method="POST" action="#" class="px-3" id="forgotPasswordForm" onsubmit="return validateForgotPassword(event)">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                                </svg>
                            </span>
                            <input type="text" name="reset_email" id="resetEmailInput" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="forgot-error-message" id="forgotErrorMessage"></div>
                    </div>

                    <button type="submit" class="btn btn-custom-primary text-white w-100" style="padding: 10px 20px;">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Daftar domain email yang valid
        const validDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com', 'icloud.com', 'live.com', 'aol.com', 'protonmail.com', 'zoho.com', 'mail.com'];

        // Validasi login form sebelum submit
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const email = document.getElementById('emailInput').value.trim();
            const password = document.getElementById('passwordInput').value;
            const errorMessage = document.getElementById('errorMessage');

            // Reset error message
            errorMessage.classList.remove('show');

            // 1. Validasi tidak boleh kosong
            if (email === '' || password === '') {
                errorMessage.classList.add('show');
                event.preventDefault();
                return false;
            }

            // 2. Validasi format email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errorMessage.classList.add('show');
                event.preventDefault();
                return false;
            }

            // 3. Validasi domain email
            const domain = email.split('@')[1];
            if (!validDomains.includes(domain.toLowerCase())) {
                errorMessage.classList.add('show');
                event.preventDefault();
                return false;
            }

            // 4. Validasi password minimal 8 karakter
            if (password.length < 8) {
                errorMessage.classList.add('show');
                event.preventDefault();
                return false;
            }

            // Jika semua validasi berhasil, form akan di-submit ke server
            return true;
        });

        function validateForgotPassword(event) {
            event.preventDefault();

            const email = document.getElementById('resetEmailInput').value.trim();
            const errorMessage = document.getElementById('forgotErrorMessage');
            const successMessage = document.getElementById('forgotSuccessMessage');

            // Reset messages
            errorMessage.classList.remove('show');
            successMessage.classList.remove('show');
            errorMessage.textContent = '';

            // 1. Validasi tidak boleh kosong
            if (email === '') {
                errorMessage.textContent = 'Email tidak boleh kosong';
                errorMessage.classList.add('show');
                return false;
            }

            // 2. Validasi format email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errorMessage.textContent = 'Email Anda Salah';
                errorMessage.classList.add('show');
                return false;
            }

            // 3. Validasi domain email
            const domain = email.split('@')[1];
            if (!validDomains.includes(domain.toLowerCase())) {
                errorMessage.textContent = 'Email Anda Salah';
                errorMessage.classList.add('show');
                return false;
            }

            // Jika validasi berhasil, tampilkan success message (simulasi SMTP)
            successMessage.classList.add('show');
            document.getElementById('forgotPasswordForm').reset();

            // Auto close popup setelah 3 detik
            setTimeout(() => {
                hideForgotPassword();
                successMessage.classList.remove('show');
            }, 2000);

            return false; // Prevent actual form submission
        }

        function showForgotPassword(event) {
            event.preventDefault();
            // Reset messages saat membuka popup
            document.getElementById('forgotErrorMessage').classList.remove('show');
            document.getElementById('forgotSuccessMessage').classList.remove('show');
            document.getElementById('forgotPasswordForm').reset();

            document.getElementById('forgotPasswordPopup').classList.add('show');
            document.getElementById('popupOverlay').classList.add('show');
        }

        function hideForgotPassword() {
            document.getElementById('forgotPasswordPopup').classList.remove('show');
            document.getElementById('popupOverlay').classList.remove('show');
        }
    </script>
</body>

</html>