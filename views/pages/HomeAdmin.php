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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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
                    data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
                    aria-labelledby="offcanvasScrollingLabel">
                    <br>
                    <br>
                    </br>
                    <div class="offcanvas-header z-index-2">
                        <div class="container text-center">
                            <a class="navbar-brand" href="/"><img src="../static/img/logo.png" alt="Jetflix" width="150"
                                    height="50"></a>
                        </div>
                    </div>
                    <br />
                    <br />
                    <br />
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
                    <div class='container central-view scrollable'>


                        <div id="carouselExampleSlidesOnly" class='carousel slide home_carousel booster mt-5'
                            data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $row_0 = $mostpop[0];
                                $movieName_0 = $row_0['name'];
                                $id = $row_0['ID'];

                                echo "<div class='carousel-item active'  data-bs-interval='1500'>
                                        <a href='/movie?id=$id'>
                                            <img src='../static/img/newMovies/$movieName_0.jpg' height='300' alt='$movieName_0' title='$movieName_0'>
                                        </a>
                                    </div>
                                ";

                                for($i=1; $i<count($mostpop);$i++){
                                    $row = $mostpop[$i];
                                    $movieName = $row['name'];
                                    $id = $row['ID'];
                                    echo "<div class='carousel-item' data-bs-interval='1700'>
                                            <a href='/movie?id=$id'>
                                                <img src='../static/img/newMovies/$movieName.jpg' height='300' alt='$movieName' title='$movieName'>
                                            </a>
                                        </div>
                                    ";
                                }
                                ?>
                            </div>
                        </div>


                        <a onclick="scrollR(1)"><i class="fa-solid fa-circle-chevron-right mt-4"
                                style="color:red; font-size:x-large; float:right; margin-left:5px;"></i></a>
                        <a onclick="scrollL(1)"><i class="fa-solid fa-circle-chevron-left  mt-4"
                                style="color:red; font-size:x-large; float:right;"></i></a>
                        <h4 class="mt-3" style="color: #ffffff;">Favorites</h4>

                        <div class="h_scrollFis">
                            <?php
                                foreach($favs as $id=>$value){
                                    $name = $value['name'];
                                    echo "
                                        <a href='/movie?id=$id'><img class='movie_poster' src='../static/img/newMovies/$name.jpg' alt='' width='150' height='200'></a>
                                        ";
                                }
                            ?>
                        </div>

                        <a onclick="scrollR(2)"><i class="fa-solid fa-circle-chevron-right mt-4"
                                style="color:red; font-size:x-large; float:right; margin-left:5px;"></i></a>
                        <a onclick="scrollL(2)"><i class="fa-solid fa-circle-chevron-left  mt-4"
                                style="color:red; font-size:x-large; float:right;"></i></a>
                        <h4 class="mt-3" style="color: #ffffff;">Watchlist</h4>

                        <div class="h_scrollSec mb-5">
                            <?php
                                foreach($watchlist as $id=>$value){
                                    $name = $value['name'];
                                    echo "
                                        <a href='/movie?id=$id'><img class='movie_poster' src='../static/img/newMovies/$name.jpg' alt='' width='150' height='200'></a>
                                        ";
                                }
                            ?>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <div class="col-side">
            <div class="offcanvas offcanvas-end show dark" style="width:18%;" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
                aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">

                    <form class="form-inline" action='/search' method='post'>
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name='search'
                            aria-label="Search">
                        <button class="btn btn-danger  my-sm-0" style="margin-top: 5px !important;"
                            type="submit">Search</button>
                    </form>
                    <!-- <button type="button" class="btn-close .netflix-red" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
                </div>
                <div class="offcanvas-body">
                    <br />
                    <h4>Recommendations</h4>
                    <br />
                    <div class="list-group">
                        <?php

                            function getRandomThree($mostpop){
                                $rands = array();
                                for($i=0;$i<3;$i++)
                                    $rands[$i]=rand(0,count($mostpop));

                                return $rands;
                            }

                            $recommendations = getRandomThree($mostpop);
                            $mostwatched = getRandomThree($mostpop);

                            foreach($recommendations as $key=>$value){
                                $row = $mostpop[$value];
                                $movieName = $row['name'];
                                $id = $row['ID'];
                                $rating = $row['rating'];
                                echo "
                                    <a href='/movie?id=$id' class='list-group-item list-group-item-action active item-style'>
                                        $movieName (Rating: $rating/10)
                                    </a>
                                ";
                            }
                        ?>
                    </div>
                    <br />
                    <br />
                    <h4>Most watched</h4>
                    <br />
                    <div class="list-group">
                        <?php

                            foreach($mostwatched as $key=>$value){
                                $row = $mostpop[$value];
                                $movieName = $row['name'];
                                $id = $row['ID'];
                                $rating = $row['rating'];
                                echo "
                                    <a href='/movie?id=$id' class='list-group-item list-group-item-action active item-style'>
                                        $movieName (Rating: $rating/10)
                                    </a>
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