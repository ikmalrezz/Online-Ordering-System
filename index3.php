<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruwe Kopi</title>
    
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts -->

<header class="header">

    <a href="#" class="logo">
        <img src="images/logo.jpg" alt="Logo">
    </a>

    <nav class="navbar">
      <a href="index3.php">Home</a>
      <a href="#menu">Drinks</a>
      <a href="#products">Menu</a>
      <a href="#review">Review</a>
      <a href="#contact">Contact</a>
    </nav>

    <div class="icons">
    <div class="fas fa-user" id="user-btn"></>
    <div class="fas fa-search" id="search-btn"></div>
    <div class="fas fa-shopping-cart" id="cart-btn"></div>
    <div class="fas fa-bars" id="menu-btn"></div>
</div>

    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>

    <div class="cart-items-container">
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/about.jpg" alt="">
            <div class="content">
                <h3>cart item 01</h3>
                <div class="price">RM7.00</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/about.jpg" alt="">
            <div class="content">
                <h3>cart item 02</h3>
                <div class="price">RM9.00</div>
            </div>
        </div>
        <a href="#" class="btn">checkout now</a>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts -->

<section class="home" id="home">

    <div class="content">
        <h3> Ruwe Kopi in Machang</h3>
        <p>Coffee Lover Highway Zone | Beware of Coffee Bump!</p>
        <a href="login.php" class="btn">Join Us Now</a>
        <a href="#products" class="btn">Get Yours Now</a>
        <a href="logout.php" class="btn">Logout</a>


</section>

<!-- home section ends -->

<!--menu section starts-->

<section class="menu" id="menu">

    <h1 class="heading"> OUR <span>DRINKS</span></h1>

    <div class="box-container">

        <div class="box">
            <img src="images/cappucino.png" alt="">
            <h3>ESPRESSO</h3>
            <p><h3>Concentrated form of coffee produced with hot water</h3></p>
            <a href="espresso.html" class="btn">View Full Menu</a>
        </div>

        <div class="box">
            <img src="images/mocha.png" alt="">
            <h3>SIGNATURE</h3>
            <p><h3>Chocolate with steamed milk</h3></p>
            <a href="signatures.html" class="btn">View Full Menu</a>
        </div>

        <div class="box">
            <img src="images/espresso.png" alt="">
            <h3>COFFEE LATTE</h3>
            <p><h3>Milk Coffee with shot of esporesso and steamed milk</h3></p>
            <a href="coffee latte.html" class="btn">View Full Menu</a>
        </div>

        <div class="box">
            <img src="images/latte.png" alt="">
            <h3>CHOFFEE</h3>
            <p><h3>Drinks created from roasted cocoa beans</h3></p>
            <a href="choffee.html" class="btn">View Full Menu</a>
        </div>

        <div class="box">
            <img src="images/mohito.jpg" alt="">
            <h3>MOHITO</h3>
            <p><h3>Popular Summer Drink</h3></p>
            <a href="mohito.html" class="btn">View Full Menu</a>
        </div>

        <div class="box">
            <img src="images/choco.jpg" alt="">
            <h3>NON COFFEE</h3>
            <p><h3>Drink with milk base</h3></p>
            <a href="noncoffee.html" class="btn">View Full Menu</a>
        </div>


</section>

<!--menu section ends-->

<!--product section starts-->

<section class="products" id="products">

<h1 class="heading">OUR <span>MENU</span></h1>

<div class="box-container">

    <div class="box">
        <div class="image">
            <img src="images/spaghettif.jpg" alt="">
        </div>
        <div class="content">
            <h3>FOOD</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="food.html" class="btn">View Menu</a>
        </div>
    </div>

    <div class="box">
         <div class="image">
            <img src="images/nugfries.jpg" alt="">
        </div>
        <div class="content">
            <h3>SNACKS</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="snack.html" class="btn">View Menu</a>
            </div>
        </div>

    <div class="box">
        <div class="image">
            <img src="images/cakes.jpg" alt="">
        </div>
        <div class="content">
            <h3>DESSERTS</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="dessert.html" class="btn">View Menu</a>
        </div>
    </div>
</div>

</section>

<!--products section ends-->

<!--reviews section starts-->

<section class="review" id="review">

    <h1 class="heading"> customer <span>review</span></h1>

    <div class="box-container">

    <div class="box">
            <p>Great ambience, friendly staff and good service. Very satisfied and very recommended!</p>
            <img src="images/landonorris.jpg" class="user" alt="">
            <h3>Lando Norris</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <div class="box">
            <p>Ruwe Kopi offers a delightul selection of food menu that complements the coffee experience beautifully.</p>
            <img src="images/charlesleclerc.jpg" class="user" alt="">
            <h3>Charles Leclerc</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <div class="box">
            <p>Affordable food and drinks. Definitely a good place to hang out with friends!</p>
            <img src="images/oliiebearman.jpeg" class="user" alt="">
            <h3>Ollie Bearman</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

    </div>

</section>

<!--reviews section ends-->

<!--contact section starts-->

<section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us</h1>

    <div class="row">

    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.5427158395955!2d102.20470739999999!3d5.778725500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b4251812ca4265%3A0x13b232cfff75184c!2sruwe%20kopi!5e0!3m2!1sen!2smy!4v1720846608327!5m2!1sen!2smy" 
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"

        <form action="">
        <h3>Get in Touch with us</h3>
        <div class="inputBox">
            <span class="fas fa-user"></span>
            <input type="text" placeholder="Name">
        </div>
        <div class="inputBox">
            <span class="fas fa-envelope"></span>
            <input type="text" placeholder="Email">
        </div>
        <div class="inputBox">
            <span class="fas fa-phone"></span>
            <input type="number" placeholder="Number">
        </div>
    
        <input type="submit" value="contact now" class="btn" onclick="location.href='mailto:ikmalrezz02@email.com'">
    </form>
    </div>
</section>
<!--contact section ends-->

<!--footer section starts-->

<section class="footer">

    <div class="shar">
        <a href="https://www.instagram.com/ruwekopi?igsh=MTh6dGkwa2RheDJoYw==" class="fab fa-instagram"></a>
        <a href="https://www.tiktok.com/@ruwekopi?_t=8o2nGIQNfDU&_r=1" class="fab fa-tiktok"></a>
    </div>

    <div class="links">
        <a href="#index3.php">Home</a>
        <a href="#menu">Drinks</a>
        <a href="#products">Menu</a>
        <a href="#review">Review</a>
        <a href="#contact">Contact</a>
    </div>


</section>

<!-- footer section ends -->

<!-- custom js file link -->
<script src="js/script.js"></script>

</body>
</html>

<?php 
} else {
    header("Location: index.php");
    exit();
}
?>
