<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Page</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/>
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
  <style>
    
    .header {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
      background-color: #bb3636;
      color: #fff;
      padding: 50px;
      text-align: center;
    }
    .body {
      font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
      background-color: #bb3636;
      color: #fff;
      padding: 50px;
      text-align: center;
    }

    .card {
      font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
      border: none;
      border-radius: 1rem;
      margin-bottom: 5rem;
      box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
      margin-top: 2rem; 
    }

    .btn-primary {
      background-color: #bb3636;
      border-color: #bb3636;
    }

    .text-light {
      display: none; 
    }

    .back-button {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.back-button a {
  background-color: #bb3636;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
  width: 26%;
  padding: 8px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
}

.back-button a:hover {
  background-color: #a63030;
}
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <img src="logo1.png" alt="Logo" width="150">
    <h1>Account Login</h1>
    <p>Always serve the right choice</p>
  </div>

  <!-- Page content -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="card-header bg-transparent pb-5">
          </div>
          <div class="card-body px-lg-5 py-lg-5">
            <form method="POST" action="Login.php" role="form">
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input class="form-control" placeholder="Account Number" type="text" name="account_number" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  </div>
                  <input class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
              </div>
              <!-- Error message -->
              <?php
                if (isset($_POST['password'])) {
                  $password = $_POST['password'];
                  if ($password !== 'correct_password') {
                    echo '<p style="color: red;">Incorrect password. Please try again.</p>';
                  }
                }
              ?>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Sign in</button>
              </div>
                <div class="back-button">
                    <a href="index.php" class="btn btn-primary my-4">Back</a>
                </div>

            </form>
          </div>
          <div class="card-footer py-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>






