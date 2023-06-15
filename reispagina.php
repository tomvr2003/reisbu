<?php
session_start();
include("./components/head.php");
include("./components/header.php");

$id = $_GET["id"]; 

$query = "SELECT * FROM reizen WHERE id = :id"; 
$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="reispagina-container">
    <div class="reispagina-container-left">
        <img src="<?php echo $row["image"]; ?>" alt="reis" class="reispagina-image">
    </div>
    <div class="reispagina-container-right">
        <div class="reispagina-container-right-1">
            <i class="fa-solid fa-star fa-s-2"></i>
            <h3 class="star-text-reispagina"><?php echo $row["star"]; ?></h3>
            <i class="fa-solid fa-message fa-m-2"></i>
            <h3 class="rating-6-reispagina"><?php echo $row["rating"]; ?></h3>
        </div>
        <div class="reispagina-container-right-2">
            <h1 class="top-6-title" style="font-size: 40px;"><?php echo $row["title"]; ?></h1>
        </div>
        <div class="reispagina-container-right-3">
            <h4 class="top-6-des"><?php echo $row["omschrijving"]; ?></h4>
        </div>
        <div class="reispagina-container-right-4">
            <h6 style="font-weight: 500;" class="top-6-des"><?php echo $row["reisinfo"]; ?></h6>
        </div>
        <div class="reispagina-container-right-5">
            <input type="date">
        </div>
        <div class="reispagina-container-right-6">
            <button class="reispagina-button">Boeken</button>
        </div>
        <div class="reispagina-container-right-7">
            <h4 style="font-size: 40px;" class="top-6-title"><?php echo $row["prijs"]; ?>,-</h4>
        </div>
    </div>
</div>

<?php
include("./components/footer.php");
?>
