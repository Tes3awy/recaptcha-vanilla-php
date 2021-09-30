[![YouTube Views](https://img.shields.io/youtube/views/oJzGpDbeSuA?label=Views&style=social)](https://youtube.com/watch?v=oJzGpDbeSuA)
![Top Lang](https://img.shields.io/github/languages/top/Tes3awy/recaptcha-vanilla-php?color=777BB4&logo=php&style=flat-square)
![Forks](https://img.shields.io/github/forks/Tes3awy/recaptcha-vanilla-php?label=Total%20Forks&style=flat-square)
![Stars](https://img.shields.io/github/stars/Tes3awy/recaptcha-vanilla-php?label=Total%20Stars&style=flat-square)
![Issues](https://img.shields.io/github/issues/Tes3awy/recaptcha-vanilla-php?style=flat-square)
[![Pre-Commit](https://img.shields.io/badge/pre--commit-enabled-brightgreen?logo=pre-commit&logoColor=white&style=flat-square)](https://github.com/pre-commit/pre-commit)
[![License](https://img.shields.io/github/license/Tes3awy/recaptcha-vanilla-php?color=purple&style=flat-square)](https://github.com/Tes3awy/recaptcha-vanilla-php/blob/master/LICENSE)
# Google reCAPTCHA V2 Checkbox Server-Side and Client-Side Validation

> The repo includes a complete sample code of how server-side &amp; client-side Google reCATPCHA V2 validations work.

## Table of Contents

1. [Installation](#installation)
2. [Data Attributes](#data-attributes)
3. [YouTube Tutorials](#youtube-tutorials)
   1. [Server Side Validation](#server-side-validation)
   2. [Client Side Validation](#client-side-validation)

---

### Installation

```bash
$ git clone https://github.com/Tes3awy/recaptcha-vanilla-php.git
$ cd recaptcha-vanilla-php
$ code . # Only if you are using VSCode
```

To begin with, you **MUST** provide `sitekey` and `secretkey` in `environment.php`. These keys are provided when you [create](https://www.google.com/recaptcha/admin/create) a reCAPTCHA V2 Checkbox.

> It's a best practice approach to add those keys in environment variables as no one should have access to your `secretkey`.

### Data Attributes

```php
data-sitekey="<SITE_KEY>" (Required)
data-theme="<THEME>" (Optional. Allowed values: "dark" or "light". Default: light)
data-size="<SIZE>" (Optional. Allowed values: "normal" or "compact". Default: normal)
data-callback="<CALLBACK_FUNCTION>" (Optional)
data-expired-callback="<EXPIRY_CALLBACK_FUNCTION>" (Optional)
```

> I used [Bootstrap v5.1.1](https://getbootstrap.com/docs/5.1/getting-started/introduction/) as the front-end library. And the `bootstrap.min.css` was downloaded from [Bootswatch (Cosmos Theme)](https://bootswatch.com/cosmos/)

---

### YouTube Tutorials

#### Server Side Validation

I made a tutorial about the server-side validation on ![YouTube](assets/images/YouTube.png 'YouTube Logo'). Grab your cup of coffee and enjoy watching!

[![Server Side Validation](https://img.youtube.com/vi/oJzGpDbeSuA/0.jpg)](https://youtube.com/watch?v=oJzGpDbeSuA)

---

#### Client Side Validation

You can also watch the client-side validation tutorial on ![YouTube](assets/images/YouTube.png 'YouTube Logo')

[![Client Side Validation](https://img.youtube.com/vi/okaZ6OIqlzs/0.jpg)](https://youtube.com/watch?v=okaZ6OIqlzs)

---

For reference, please visit [Google reCAPTCHA Developers Guide](https://developers.google.com/recaptcha/docs/verify).
