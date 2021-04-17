# Google reCAPTCHA V2 Checkbox Server-Side and Client-Side Validation

> The repo includes a complete sample code of how server-side Google reCATPCHA validation works. *(Client-side validation is also included)*

## Table of Contents
1. [Installation](#installation)
2. [Data Attributes](#data-attributes)
3. [Tutorials](#tutorials)
    1. [Server Side Validation](#server-side-validation)
    2. [Client Side Validation](#client-side-validation)

---

### Installation

```bash
git clone https://github.com/Tes3awy/recaptcha-vanilla-php.git
```

First, you **must** add `sitekey` and `secretkey` in `environment.php`. Those keys are provided when you [create](https://www.google.com/recaptcha/admin/create) a reCAPTCHA V2 Checkbox.

> It's a best practice approach to add those keys in environment variables as no one should have access to your `secretkey`.


### Data Attributes
```
data-sitekey="<SITE_KEY>" (Required)
data-theme="<DARK_OR_LIGHT>" (Optional)
data-callback="<CALLBACK_FUNCTION>" (Optional)
data-expired-callback="<EXPIRY_CALLBACK_FUNCTION>" (Optional)
```

> I used [Bootstrap v4.6.0](https://getbootstrap.com/docs/4.6/getting-started/introduction/) as the front-end library. And the `bootstrap.min.css` was downloaded from [Bootswatch (Cosmos Theme)](https://bootswatch.com/cosmos/)

---

### Tutorials

#### Server Side Validation

I made a tutorial about the server-side validation on ![YouTube](/images/YouTube.png "YouTube Logo"). Grab your cup of tea or coffee and enjoy it.

[![Server Side Validation](https://img.youtube.com/vi/oJzGpDbeSuA/0.jpg)](https://www.youtube.com/watch?v=oJzGpDbeSuA)

---

#### Client Side Validation

You can also view the client-side tutorial on ![YouTube](/images/YouTube.png "YouTube Logo")

[![Client Side Validation](https://img.youtube.com/vi/okaZ6OIqlzs/0.jpg)](https://www.youtube.com/watch?v=okaZ6OIqlzs)

---

For reference, visit [Google reCAPTCHA Official Website](https://developers.google.com/recaptcha/).
