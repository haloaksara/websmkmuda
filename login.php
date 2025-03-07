<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | SMK Muda</title>
     <link rel="stylesheet" type="text/css" href="Public/Css/style.css">
     <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-grid.min.css">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-grid.rtl.css">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-grid.rtl.min.css">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-reboot.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-reboot.min.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-reboot.rtl.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-reboot.rtl.min.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-utilities.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-utilities.min.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-utilities.rtl.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-utilities.rtl.min.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.rtl.css ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/ ">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.rtl.min.css ">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Public/Css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="cek_login.php" method="post">
           
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="form2Example1" class="form-control" name="username" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="password"/>
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
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
    <p>or sign up with:</p>
    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
    </div>


</body>
</html>
