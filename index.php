<!-- Requiring environment.php file -->
<?php require_once('environment.php');
// Recommended to be always stored in environment variables
$site_key = $_ENV['SITE_KEY'];
$secret_key = $_ENV['SECRET_KEY'];
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/images/favicon.png" />
  <title>Google reCAPTCHA Server-Side Validation using Plain PHP</title>
  <!-- CSS styles -->
  <link rel="stylesheet" href="assets/css/zephyr.min.css" />
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
    $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response);
    // Decoding JSON response from Google. TRUE param for assoc. array
    $res = json_decode($payload, true);
    // Checking payload response
    if (!$res['success']) :
      // Failure case
      $error = 'Missing reCAPTCHA validation.';
    else :
      // Success case
      $success = 'Your message was sent successfully. Thank you!';
    endif;
  }
  ?>
  <div class="container p-4">
    <h1 class="text-white text-center mb-5">Google reCAPTCHA V2 <span class="text-info">Server-Side</span> Validation
    </h1>
    <div class="row">
      <div class="col-md-6 col-12 ms-md-auto">
        <?php if (isset($_POST["submit"])) : ?>
          <!-- Displaying validation status -->
          <?php if (!empty($success)) : ?>
            <!-- Success case -->
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Success</h4>
              <?php echo $success; ?>
            </div>
          <?php
          else : ?>
            <!-- Failure case -->
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Error</h4>
              <?php echo $error; ?>
            </div>
          <?php
          endif; ?>
        <?php
        endif; ?>
        <!-- Form -->
        <form method="POST" role="form" novalidate>
          <div class="row g-2">
            <div class="col-md-6 mb-1">
              <div class="form-group">
                <!-- First Name Field -->
                <input class="form-control border-0 rounded-1 shadow" type="text" name="first_name" placeholder="First name" autocomplete="true" required>
              </div>
            </div>
            <div class="col-md-6 mb-1">
              <div class="form-group">
                <!-- Last Name Field -->
                <input class="form-control border-0 rounded-1 shadow" type="text" name="last_name" placeholder="Last name" autocomplete="true" required>
              </div>
            </div>
            <div class="col-md-6 mb-1">
              <div class="form-group">
                <!-- Email Address -->
                <input class="form-control border-0 rounded-1 shadow" type="email" name="email" placeholder="Email address" autocomplete="true" required>
              </div>
            </div>
            <div class="col-md-6 mb-1">
              <div class="form-group">
                <!-- Mobile Phone -->
                <input class="form-control border-0 rounded-1 shadow" type="tel" name="phone" placeholder="Mobile phone" autocomplete="true" required>
              </div>
            </div>
            <div class="col-12 mb-2">
              <div class="form-group">
                <!-- Message Box -->
                <textarea class="form-control border-0 rounded-1 shadow" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
            </div>
          </div>
          <!-- g-recaptcha div -->
          <div class="g-recaptcha" data-theme="light" data-size="normal" data-callback="captchaVerified" data-expired-callback="captchaExpired" data-error-callback="captchaFailed" data-sitekey=<?php echo $site_key; ?>></div>
          <!-- Submit Btn -->
          <div class="text-center mt-2">
            <button class="btn btn-outline-info shadow disabled" id="submit" type="submit" name="submit" disabled aria-disabled="true"><i class="fa fa-paper-plane"></i> &nbsp; Send</button>
          </div>
        </form>
        <!-- End of Form -->
      </div>
    </div>
  </div>

  <!-- Front-End Validation Callback Functions -->
  <script type="text/javascript">
    // Verification callback function
    function captchaVerified() {
      var submitBtn = document.getElementById('submit');
      submitBtn.removeAttribute('disabled');
      submitBtn.removeAttribute('aria-disabled');
      submitBtn.classList.remove('btn-outline-info', 'disabled');
      submitBtn.classList.add('btn-info');
    }
    // Expiration callback function
    function captchaExpired() {
      grecaptcha.reset();
    }
    // Error Callback function
    function captchaFailed() {
      alert('Failed to verify reCAPTCHA! There might be a connection issue. Please refresh the page and retry');
    }
  </script>
</body>

</html>