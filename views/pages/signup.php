<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" href="../static/css/staticThemeConfigs.css" /> -->
    <link rel="stylesheet" href="../static/css/styles.css" />
    <title>Sign Up</title>
    <link rel="icon" href="../static/img/favicon.ico">
  </head>
  <body class="bg_img">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><img id="logo" src="../static/img/logo.png" alt="Jetflix" width="150" height="50"/></a>
      </div>
    </nav>
    <div class="log-form">
      <main class="form-signin">

        <form action="/register" method="post">
          <h1 class="h3 fw-normal">Sign Up</h1>

          <div class="form-floating">
            <input type="text" name="name" class="form-control signUp_In_form_control" id="floatingInput" placeholder="username"/>
            <label for="floatingInput" class="input">Username</label>
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control signUp_In_form_control" id="email" placeholder="name@example.com"/>
            <label for="floatingInput" class="input">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control signUp_In_form_control" id="floatingPassword" placeholder="Password"/>
            <label for="floatingPassword" class="input">Password</label>
          </div>
          <div class="form-floating">
            <input type="password" name="confirmPassword" class="form-control signUp_In_form_control" id="ConfirmPassword" placeholder="Password"/>
            <label for="floatingPassword" class="input">Confirm Password</label>
          </div>
          <div>
            <label class="mb-1" >Profile Picture:</label>
            <input type="file" name="image" class="mb-1"/>
          </div>

          <button class="w-100 btn btn-lg btn-primary signUp_InBtn" type="submit"> Sign Up </button>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me" /><a class="signUp_In_a" href="https://help.netflix.com/legal/termsofuse">Terms and Conditions</a>
            </label>
          </div>
          <div class="login-signup-now">
            have an account already?
            <span class="signup"><a class=" signUp_In_a" target="_self" href="/login">Sign In</a></span>
          </div>
          <p class=" text-muted">&copy; 2017 - 2021</p>
        </form>
      </main>
    </div>
    <script>
      const inputEmail = document.querySelector('#email');
      inputEmail.value = sessionStorage.getItem('user-email');
      setTimeout(()=>{
        sessionStorage.removeItem('user-email');
      }, 5*60*1000);
    </script>
  </body>
</html>
