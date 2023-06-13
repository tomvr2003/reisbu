<?php
session_start();
include("./components/head.php");
include("./components/header.php");
?>

<?php
  if (!isset($_SESSION["username"])) { 
    echo "<center><h1 style='margin-top: 20px;'>Je moet ingelogd zijn om deze pagina te bezoeken</h1><center>";
  } 
  else {
?>

<main style="display: flex; justify-content: center;">
  <div class="account-container">
    <div class="account-info">
      <h1 class="acc-username"><?= $_SESSION['username'] ?></h1>
      <p class="acc-email"><?= $_SESSION['email'] ?></p>
    </div>
    <div class="account-boekingen">
      <div class="account-boekingen-top">
        <h4>Mijn boekingen:</h4>
      </div>
      <div class="account-boekingen-bottom"></div>
    </div>
  </div>
</main>

<?php
  }
  include("./components/footer.php");
?>