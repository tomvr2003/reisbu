<?php 
session_start();
include("./components/head.php");
include("./components/header.php");
?>

<div class="index-banner">
  <?php
    if(!isset($_SESSION['username'])) {
  ?>
  <h1 class="banner-title">JTA Travel</h1>
  <?php 
  } else {
    echo "<h1 class='banner-title'>Welkom " . $_SESSION['username'] . "</h1>";
  }
  ?>
</div>

<form class="search-bar-con" method="POST" action="./locaties.php">
    <input class="search-bar" name="zoekveld" type="text" placeholder="Zoek uw reis...">
    <button class="search-button">Zoek</button>
    <input type="hidden" name="submitted" value="true">
</form>


<div class="boxes-container">
  <div class="box">
      <h1 style="font-size: 40px;" class="box-text">Over<br>Ons</h1>
      <p style="margin: 50px 0;" class="box-text">Leer meer over ons</p>
      <a href="./over.php"><button class="box-button">Ontdek</button></a>  </div>
  <div class="box-2">
      <h1 style="font-size: 40px;" class="box-text">Locaties<br>Bekijken</h1>
      <p style="margin: 50px 0;" class="box-text">Bekijk al onze locaties</p>
      <a href="./locaties.php"><button class="box-button">Ontdek</button></a>  </div>
  <div class="box-3">
      <h1 style="font-size: 40px;" class="box-text">Contact</h1>
      <p style="margin: 50px 0;" class="box-text">Neem contact met ons op</p>
      <a href="./contact.php"><button class="box-button">Ontdek</button></a>
  </div>
</div>

<div class="top-6-title-container">
    <h1 style="font-size: 40px;">Top 4 favoriete ontdekkingen</h1>
</div>

<?php
    $query = "SELECT * FROM reizen LIMIT 4";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<div id="top-6">
    <div class="top-6-boxes-container" style="margin-bottom: 50px;">
        <a href="reispagina.php?id=<?php echo $row['id'];?>"><div class="top-6-box">
            <div class="top-6-box-left">
                <img src="<?php echo $row["image"]; ?>" alt="place" class="top-6-img">
            </div>
            <div class="top-6-box-center">
                <div class="star-rating-6">
                    <i class="fa-solid fa-star"></i>
                    <h3 class="star-text"><?php echo $row["star"]; ?></h3>
                </div>
                <h3 class="top-6-title"><?php echo $row["title"]; ?></h3>
                <h4 class="top-6-des"><?php echo $row["omschrijving"]; ?></h4>
                <div class="reis-info-6">
                    <h6 style="font-weight: 500;" class="top-6-des"><?php echo $row["reisinfo"]; ?></h6>
                </div>
            </div>
            <div class="top-6-box-right">
                <i class="fa-solid fa-message"></i>
                <h3 class="rating-6"><?php echo $row["rating"]; ?></h3>
            </div>
        </div></a>
    </div>
</div>

<?php 
    }
?>


<?php
include("./components/footer.php");
?>