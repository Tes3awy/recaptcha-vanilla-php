<?php require_once('environment.php'); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reCAPTCHA Validation using Vanilla PHP</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src='//www.google.com/recaptcha/api.js' async></script>
  </head>

  <body>
    <?php
    // Recommended to be always stored in environment variables
      $site_key = $_ENV["SITE_KEY"];
      $secret_key = $_ENV["SECRET_KEY"];

      if (isset($_POST['submit'])) {
        $response = $_POST['g-recaptcha-response'];
        $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$response);
        $res = json_decode($payload, TRUE);

        if($res['success'] != 1) {
          $error = 'Sorry. Missing validation!!!';
        } else {
          $success = 'Thank you!';
        }
      }
    ?>
    <div class="container p-4">
      <div class="row">
        <div class="col-md-6 ml-auto">
          <h1 class="text-white">Server-side Google reCAPTCHA Validation</h1>
          <?php if(isset($_POST["submit"])): ?>
          <?php if(!empty($success)): ?>
          <div class="alert alert-success" role="alert">
            <strong>
              <?php echo $success; ?></strong>
          </div>
          <?php else: ?>
          <div class="alert alert-danger" role="alert">
            <strong>
              <?php echo $error; ?></strong>
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <!-- Form -->
          <form method="post" role="form">
            <fieldset>
              <!-- Name Field -->
              <input class="form-control mb-3" type="text" name="name" placeholder="Your name" required>
              <!-- Message Area -->
              <textarea class="form-control mb-3" name="message" rows="10" placeholder="Your message" required></textarea>
              <!-- g-recaptcha div -->
              <div class="g-recaptcha mb-3" data-theme="dark" data-sitekey=<?php echo $site_key; ?>
                data-callback="captchaVerified"></div>
              <!-- Submit Btn -->
              <div class="text-center">
                <input class="btn btn-lg btn-info" id="submit" type="submit" name="submit" value="Send" disabled>
              </div>
            </fieldset>
          </form>
          <!-- End of Form -->
        </div>
      </div>
    </div>

    <script>
      function captchaVerified() {
        var submitBtn = document.getElementById('submit');
        submitBtn.removeAttribute('disabled');
      }

    </script>
  </body>

</html>
