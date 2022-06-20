<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" href="../static/css/staticThemeConfigs.css" /> -->
    <link rel="stylesheet" href="../static/css/styles.css" />
    <title>Login</title>
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

        <form action="/login" method="post">
          <h1 class="h3 fw-normal">Sign In</h1>

          <div class="form-floating">
            <input type="email" class="form-control signUp_In_form_control" id="floatingInput"  name="email" placeholder="name@example.com"/>
            <label for="floatingInput" class="input">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control signUp_In_form_control" id="floatingPassword" name="password" placeholder="Password"/>
            <label for="floatingPassword" class="input">Password</label>
          </div>

          <button class="w-100 btn btn-lg btn-primary signUp_InBtn" type="submit"> Sign in </button>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"  /> Remember me
            </label>
          </div>
          <div class="login-signup-now">
            New to Jetflix?
            <br/>
            <span class="signup"><a class="signUp_In_a" target="_self" href="/register">Sign up now</a></span>
          </div>
          <br/>
          <p class="mb-3 text-muted">&copy; 2017 - 2022</p>
        </form>
      </main>
    </div>
  </body>
</html>
