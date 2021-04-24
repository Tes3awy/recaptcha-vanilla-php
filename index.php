<!-- Requiring environment.php file -->
<?php require_once('environment.php');
  // Recommended to be always stored in environment variables
  $site_key = $_ENV['SITE_KEY'];
  $secret_key = $_ENV['SECRET_KEY'];
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png" />
    <title>Google reCAPTCHA Server-Side Validation using Plain PHP</title>
    <!-- CSS styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- FontAwesome 4 -->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- GR Script -->
    <script src='//www.google.com/recaptcha/api.js' async defer></script>
  </head>

  <body>
    <?php
      // Server side validation
      if (isset($_POST['submit'])) {
          // reCAPTCHA response on submitting the form
          $response = $_POST['g-recaptcha-response'];
          // remoteip param is optional
          $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$response);
          // Decoding JSON response from Google. TRUE param for assoc. array
          $res = json_decode($payload, true);
          // Checking payload response
          if ($res['success'] != 1):
            // Failure case
            $error = '✖ Oops! Missing reCAPTCHA validation.'; else:
            // Success case
            $success = '✔ Your message was sent successfully. Thank you!';
          endif;
      }
    ?>
    <div class="container p-4">
      <h1 class="text-white text-center mb-5">Google reCAPTCHA V2 <span class="text-info">Server-Side</span> Validation
      </h1>
      <div class="row">
        <div class="col-md-6 col-12 ml-md-auto">
          <?php if (isset($_POST["submit"])): ?>
          <!-- Displaying validation status -->
          <?php if (!empty($success)): ?>
          <!-- Success case -->
          <div class="alert alert-success" role="alert">
            <strong>
              <?php echo $success; ?></strong>
          </div>
          <?php else: ?>
          <!-- Failure case -->
          <div class="alert alert-danger" role="alert">
            <strong>
              <?php echo $error; ?></strong>
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <!-- Form -->
          <form method="POST" role="form">
            <!-- Name Field -->
            <div class="form-group">
              <input class="form-control border-0 shadow-sm" type="text" name="name" placeholder="Full name"
                autocomplete="true" required>
            </div>
            <!-- Email Address -->
            <div class="form-group">
              <input class="form-control border-0 shadow-sm" type="email" name="email" placeholder="Email address"
                autocomplete="true" required>
            </div>
            <!-- Mobile Phone -->
            <div class="form-group">
              <input class="form-control border-0 shadow-sm" type="tel" name="phone" placeholder="Mobile phone"
                autocomplete="true" required>
            </div>
            <!-- Message Area -->
            <div class="form-group">
              <textarea class="form-control border-0 shadow-sm" name="message" rows="8" placeholder="Message"
                required></textarea>
            </div>
            <!-- g-recaptcha div -->
            <div class="form-group text-center">
              <div class="g-recaptcha" data-theme="light" data-size="normal" data-callback="captchaVerified"
                data-expired-callback="captchaExpired" data-sitekey=<?php echo $site_key; ?>></div>
            </div>
            <!-- Submit Btn -->
            <div class="text-center">
              <button class="btn btn-lg btn-outline-info shadow-sm" id="submit" type="submit" name="submit" disabled
                aria-disabled="true"><i class="fa fa-paper-plane"></i> &nbsp; Send</button>
            </div>
          </form>
          <!-- End of Form -->
        </div>
      </div>
    </div>

    <!-- Front-End Validation Callback Functions -->
    <script>
      // Verification callback function
      function captchaVerified() {
        var submitBtn = document.getElementById('submit');
        submitBtn.removeAttribute('disabled');
        submitBtn.removeAttribute('aria-disabled');
      }
      // reCAPTCHA Expired callback function
      function captchaExpired() {
        grecaptcha.reset();
      }
    </script>
  </body>

</html>