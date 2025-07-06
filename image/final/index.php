<?php   

    session_start();

    require('./config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

    <!------------------------ NAVBAR Section ------------------------>
    <nav class="navbar">
        <div class="logo">
            <h1>Tata IPL</h1>

        </div>

        <div class="menu_open">
            <i class="fas fa-bars"></i>

        </div>

        <ul class="links">
            <div class="menu_close">
                <i class="fas fa-times"></i>
            </div>
            <li><a href="./index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="./index.php#blogs-container">Blogs</a></li>

            <?php if(isset($_SESSION["id"])):  ?>
            <li><a href="./admin-panel/blogs/create.php">Create a Blog</a></li>
            <li><a href="./logout.php" style="color:red; font-weight: 500;">LOGOUT</a></li>

            <?php else: ?>
            <li><a href="./login.php">Login</a></li>

            <?php endif; ?>            

            <!-- <li><a href="#" class="logout">LOGOUT</a></li> -->
            
        </ul>
        
    </nav>

    <!------------------------ BANNER Section ------------------------>
    <div class="slide-container">
        <div class="slide">
            <img src="./images/slider1.jpg" alt="">
            <!-- <div class="caption">Caption Text 1</div> -->

        </div>
        <div class="slide">
            <img src="./images/slider5.webp" alt="">
            <!-- <div class="caption">Caption Text 2</div> -->

        </div>
        <div class="slide">
            <img src="./images/slider6.webp" alt="">
            <!-- <div class="caption">Caption Text 3</div> -->

        </div>
        <div class="slide">
            <img src="./images/slider7.png" alt="">
            <!-- <div class="caption">Caption Text 4</div> -->

        </div>

        <span class="arrow prev" onclick="controller(-1)">&#10094;</span>
        <span class="arrow next" onclick="controller(1)">&#10095;</span>
    </div>

    <!------------------------ BLOGS Section ------------------------>
    <div class="blogs-container" id="blogs-container">

        <div class="blogs">
            <!-- Heading -->
            <div class="heading">
                <h1>Blogs</h1>
                <h4>IPL Season 18 Teams and Players</h4>
            </div>
            <!-- Blog -->
            <div class="cards">

                <?php

                    $blogs = mysqli_query($db, "SELECT * FROM `blogs`");

                    if(!$blogs){
                        die("Invalid Query !!!".mysqli_error($db));
                    }
                    else{
                        while($row = mysqli_fetch_assoc($blogs)){
                            echo "
                                <div class='card'>
                                    <img src='./db-images/blogs/$row[image]' alt=''>
                                    <p class='tagline'>$row[category]</p>
                                    <h4 class='title'>$row[title]</h4>
                                    <p class='content'>To read the complete blog click on Read More below.....</p>
                                    <a href='./single-blog.php?id=$row[id]'>Read More</a>
                                </div>
                            ";
                        }
                    }
                ?>

            </div>
        </div>
    </div>

    <!------------------------ FOOTER Section ------------------------>
    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Our services</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Affiliate program</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order status</a></li>
                        <li><a href="#">Payment options</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Online shop</h4>
                    <ul>
                        <li><a href="#">Watch</a></li>
                        <li><a href="#">Bag</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Dress</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>

                    </div>

                </div>
            </div>

        </div>
        </div>
    </footer>

    <!-- Custom Js Script -->
    <script src="./js/script.js"></script>


</body>

</html>