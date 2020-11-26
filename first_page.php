<?php
  include_once 'header.php';
?>
     
    <img class="img-responsive" width="100%" src="images/image5.jpg" alt="background_image"> 
    <div class="centered">
    <h1 class="h1">Welcome To Swaad Catering Service!</h1>
    <p class="text">Order on your special day</p>
    <ul class="text" style="list-style-type:square;">
      <li>Weddings</li>
      <li>Birthdays</li>
      <li>Get Together</li>
      <li>Any other event</li>
    </ul>
    <p class="text">Swaad caterers offers a wide variety of delicious and delightful food that will make your day special. Check out our food menu for some amazing list of food items. Swaad caterers has always been working to deliver the best of our services and satisfy our customers. We will be pleased to serve you with the best.
Explore our website for more details.
</p>

  </div>
  
  <div style="margin-left: 200px; margin-right: 200px">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->

  <div class="carousel-inner">
    <div class="item active">
      <img src="images/p6.jpg" width="100%" alt="food1">
      <div class="carousel-caption t1">
        <h1>Special Events</h1>
        <ul style="list-style-type:square;">
          <li>Weddings</li>
          <li>Anniversaries</li>
        </ul>
        <a class="t1" href="#">CLICK HERE BOOK NOW</a>
      </div>
    </div>

    <div class="item">
      <img src="images/p7.jpg" width="100%" alt="food2">
      <div class="carousel-caption t1">
        <h1>Corporate Events</h1>
        <ul style="list-style-type:square;">
          <li>Corporate Parties</li>
          <li>Meetings</li>
        </ul>
        <a class="t1" href="#">CLICK HERE BOOK NOW</a>
      </div>
    </div>
 <div class="item">
      <img src="images/p5.jpg" width="100%" alt="food3">
       <div class="carousel-caption t1">
        <h1>Social Events</h1>
        <ul style="list-style-type:square;">
          <li>Birthday Parties</li>
          <li>Get Together</li>
        </ul>
        <a class="t1" href="#">CLICK HERE BOOK NOW</a>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<?php
  include_once 'footer.php';
?>