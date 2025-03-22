
<!-- ======================================================= -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SMK Muda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: 'Roboto', sans-serif;
        }

        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            margin-bottom: 30px;
            font-weight: 700;
            color: #333;
        }

        .form-outline {
            position: relative;
            margin-bottom: 20px;
        }

        .form-outline input {
            border-radius: 30px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .form-outline label {
            position: absolute;
            top: -10px;
            left: 20px;
            background: #fff;
            padding: 0 5px;
            font-size: 12px;
            color: #777;
        }

        .btn-primary {
            background: #9b59b6;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            width: 100%;
            font-size: 16px;
        }

        .btn-primary:hover {
            background: #8e44ad;
        }

        .text-center p {
            margin-top: 20px;
            color: #555;
        }

        .text-center a {
            color: #9b59b6;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .btn-link {
            color: #9b59b6;
        }

        .btn-link:hover {
            color: #8e44ad;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="<?php echo base_url('auth/action_login'); ?>" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="username" class="form-control" id="username" name="username" required>
                <label class="form-label" for="username">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" class="form-control" id="password" name="password" required>
                <label class="form-label" for="password">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col">
                    <!-- Simple link -->
                    <a href="<?= site_url('forgot_password') ?>">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
