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
    <form action="cek_login.php" method="post">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="text" id="form2Example1" class="form-control" name="username" required />
        <label class="form-label" for="form2Example1">Email address</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="form2Example2" class="form-control" name="password" required />
        <label class="form-label" for="form2Example2">Password</label>
      </div>

      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
            <label class="form-check-label" for="form2Example31"> Remember me </label>
          </div>
        </div>

        <div class="col">
          <!-- Simple link -->
          <a href="#!">Forgot password?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="#!">Register</a></p>
        <p>or sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>
    </form>
  </div>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
