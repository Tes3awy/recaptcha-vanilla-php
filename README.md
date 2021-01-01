# Google reCAPTCHA V2 Checkbox Server-Side and Client-Side Validation

> The repo includes a complete sample code of how server-side Google reCATPCHA validation works. *(Client-side validation is also included)*

You must add `sitekey` and `secretkey` in `environment.php` file first. Those keys are provided when you create a reCAPTCHA V2 Checkbox.

It's best to add those keys in environment variables as no one should have access to your `secretkey`.

```
data-sitekey=<YOUR_SITE_KEY> (Required)
data-theme=<DARK_OR_LIGHT> (Optional)
data-callback=<YOUR_CALLBACK_FUNCTION> (Optional)
data-expired-callback=<YOUR_EXPIRY_CALLBACK_FUNCTION> (Optional)
```

I used [Bootstrap v4.5.3](https://getbootstrap.com/docs/4.5/getting-started/introduction/) as the front-end library. And the `bootstrap.min.css` was downloaded from [Bootswatch](https://bootswatch.com/)

I made tutorial about this server-side validation on ![YouTube](/images/YouTube.png "YouTube Logo")

[![Server Side Validation](https://img.youtube.com/vi/oJzGpDbeSuA/0.jpg)](https://www.youtube.com/watch?v=oJzGpDbeSuA)

---

You can also view the client-side tutorial on ![YouTube](/images/YouTube.png "YouTube Logo")

[![Client Side Validation](https://img.youtube.com/vi/okaZ6OIqlzs/0.jpg)](https://www.youtube.com/watch?v=okaZ6OIqlzs)

---

For reference, visit [Google reCAPTCHA Official Website](https://developers.google.com/recaptcha/).
