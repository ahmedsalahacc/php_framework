<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../static/css/staticThemeConfigs.css">
         -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../static/css/Homepage.css"> -->
        <link rel="stylesheet" href="../static/css/components.css">
        <link rel="stylesheet" href="../static/css/styles.css">
    <title>JETFLIX</title>
    <link rel="icon" href="../static/img/favicon.ico">
</head>
<body class="home_body">
    <div class="row">
        <div class="col-side">
            <div class="right-sidebar">
                <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                <!-- <a href="javascript:void(0);" class="icon hamburger" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a> -->
            
                <!--sidebar-->
                <div class="offcanvas offcanvas-start show dark z-index-2" style="width:18%;" data-bs-scroll="true"
                    data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <br>
                    <br>
                </br>
                <div class="offcanvas-header z-index-2">
                        <div class="container text-center">
                            <a class="navbar-brand" href="/"><img src="../static/img/logo.png" alt="Jetflix" width="150" height="50"></a>
                        </div>
                </div>
                    <br/>
                    <br/>
                    <br/>
                <div class="offcanvas-body z-index-2">

                        <div class="list-group">

                            <a href="/home" class="list-group-item list-group-item-action active item-style">
                                Home
                            </a>
                            <?php echo "<a href='/member?id=$id' class='list-group-item list-group-item-action active item-style'>";?>
                            My Profile
                            </a>
                            <a href="/member/all" class="list-group-item list-group-item-action item-style">View Members</a>
                            <a href="/logout" class="list-group-item list-group-item-action item-style">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="center">
            <div class="container">
                <div class="row">
                    <div class='container text-center central-view scrollable search-res-part s-results'>
                        <?php

                        for($i = 0;$i<count($result); $i++){
                            $row = $result[$i];
                            $username = $row['Username']; 
                            $id = $row['ID'];
                            $email = $row['Email'];
                            echo "
                                <span class='card mx-3' style='margin-top: 3rem;margin-bottom: 3rem;width: 25rem;display:inline-block;' >
                                <div class='row'>
                                    <div class='cd col-lg-6'>
                                        <img class='ci' src='../static/img/members/$username.jpg' >
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$username</h5>
                                            <p>$email</p>
                                        </div>
                                    </div>
                                    </div>
                                    <a href='/member?id=$id' class='btn btn-danger'>View</a>
                                </span>
                            
                            ";
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        // change the active field on click
        function changeActiveField(e){
            const active = document.querySelector('a.active');
            // remove the active class name
            active.classList.remove('active');
            e.target.classList.add('active');
        }

        const elements = document.querySelectorAll('.list-group a.list-group-item')
        elements.forEach(element => {
            element.addEventListener('click', changeActiveField)
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <script src="../static/js/moviesScroll.js"></script>
    <script src="https://kit.fontawesome.com/4f652f8988.js" crossorigin="anonymous"></script>
</body>

</html>