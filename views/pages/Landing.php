<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../static/css/staticThemeConfigs.css"> -->
    <link rel="stylesheet" href="../static/css/styles.css">
    <link rel="icon" href="../static/img/favicon.ico">
    <title>jetflix</title>

</head>
<body>
  <div class="bg_img">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href=""><img src="../static/img/logo.png" alt="Jetflix" width="150" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>  
          <a class="btn btn-danger btn-lg" href="/login" >Login</a>
        </div>
      </div>
    </nav>

    <div class="landing-window container">
      <div class="row">
        <div class="landing-left-window col-lg-12">
          <div id="carouselExampleSlidesOnly" class="carousel carousel-fade slide" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner" >
              <?php
              $row_0 = $results[0];
              $movieName_0 = $row_0['name'];
              echo "<div class='carousel-item active'>
                      <img src='../static/img/newMovies/$movieName_0.jpg' height='400' alt='$movieName_0' title='$movieName_0'>
                    </div>
              ";

              for($i=1; $i<count($result);$i++){
                $row = $result[$i];
                $movieName = $row['name'];
                echo "<div class='carousel-item'>
                        <img src='../static/img/newMovies/$movieName.jpg' height='400' alt='$movieName' title='$movieName'>
                      </div>
                ";
              }
              ?>
              
            </div>
          </div>
        </div>

        <div class="landing-right-window col-lg-12">
          <p class="landing-ques">Ready to enter World of Movies?</p>
          <form class="input-group mb-2">
            <input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
            <a class="btn btn-danger" type="button" href="/register" id="register">Sign up</a>
          </form>
        </div>

      </div>
    </div>
  </div>
  
  

  
  <script>
    const input = document.querySelector('#email');
    const btn = document.querySelector('#register');

     function clickHandler(){
      let value = input.value;
      sessionStorage.setItem('user-email', value);
     }

     btn.addEventListener('click', clickHandler)

     console.log(sessionStorage.getItem('user-email'))
    
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>