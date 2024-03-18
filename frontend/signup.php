<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - QuickShop</title>
    <link rel="stylesheet" href="signup.css"> <!-- Ensure you have a CSS file named style.css -->
    <script src="signup.js" defer></script> <!-- Optional: For any JavaScript, ensure you have a file named script.js -->
</head>
<body>
  <main class="sign-up">
    <div class="sign-up__container">
    <div class="sign-up__image">
    <!-- SVG or an image tag for a logo or relevant graphic -->
    <img src="assests/pexels-dmitry-zvolskiy-2199190.jpg" alt="QuickShop Logo">
  </div>
      <div class="sign-up__content">
        <header class="sign-up__header">
          <h1 class="sign-up__title">Sign up</h1>
          <p class="sign-up__descr">Welcome, please sign up to create your account.</p>
        </header>
        <form action="../backend/api/register.php" method="POST" class="sign-up__form form" novalidate>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" name="name" id="name" placeholder="Full Name" required type="text">
                <label class="input__label" for="name">Full Name</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" name="email" id="email" placeholder="Email" required type="email">
                <label class="input__label" for="email">Email</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" name="password" id="password" placeholder="Password" required type="password">
                <label class="input__label" for="password">Password</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="input">
              <div class="input__container">
                <input class="input__field" name="confirm_password" id="confirm-password" placeholder="Confirm Password" required type="password">
                <label class="input__label" for="confirm-password">Confirm Password</label>
              </div>
            </div>
          </div>
          <div class="form__row">
            <div class="component component--primary form__button">
              <button class="btn btn--regular" id="sign-up-button" type="submit">Sign Up</button>
            </div>
          </div>
          <div class="form__row sign-up__sign">
            Already have an account? <a class="link" href="index.php">Sign in.</a>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
