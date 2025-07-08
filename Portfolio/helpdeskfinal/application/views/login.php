<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/'); ?>images/ubs1.1.png">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            padding: 2rem;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #091930;
            border-color: #091930;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">Login</h3>
                    <div id="login-message" class="alert alert-danger d-none"></div>
                    <!-- For displaying general error message -->
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div id="nik-error" class="text-danger"></div> <!-- Error message for NIK -->
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div id="password-error" class="text-danger"></div> <!-- Error message for Password -->
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (event) {
                event.preventDefault(); // Prevent the form from submitting via the browser

                // Clear previous error messages
                $('#nik-error').text('');
                $('#password-error').text('');
                $('#login-message').addClass('d-none').text('');

                $.ajax({
                    url: '<?= base_url('index.php/UserController/login_ajax') ?>', // URL ke controller untuk AJAX
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            window.location.href = response.redirect; // Redirect ke halaman berikutnya
                        } else if (response.status == 'error') {
                            if (response.type == 'nik') {
                                $('#nik-error').text(response.message); // Tampilkan error di NIK
                            } else if (response.type == 'password') {
                                $('#password-error').text(response.message); // Tampilkan error di password
                            } else {
                                $('#login-message').removeClass('d-none').text(response.message); // Error umum
                            }
                        }
                    },
                    error: function () {
                        $('#login-message').removeClass('d-none').text('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>