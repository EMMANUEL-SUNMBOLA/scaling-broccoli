<?php include_once "head3.php";
        if($_SESSION['auth'] !=='1001001001'){
            header("Location:/404.php");
} 
// header("Location: /404.php") ?>
<div class="bg-danger text-center text-white">
    <div class="dp text-center">
        <img src="images/pic-1.png" alt="">
    </div>
    <h1>Welcome #name</h1>
</div>
<div class="row gx-3">
    <div class="col text-center">
        <h1 class="text-capitalize">customer perks</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt inventore laboriosam soluta doloribus ea dolores a corporis consequatur sunt iste.</p>
    </div>
    <div class="col text-center">
        <h1 class="text-capitalize">customer perks</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt inventore laboriosam soluta doloribus ea dolores a corporis consequatur sunt iste.</p>
    </div>
    <div class="col text-center">
        <h1 class="text-capitalize">customer perks</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt inventore laboriosam soluta doloribus ea dolores a corporis consequatur sunt iste.</p>
    </div>
</div>

<?php include_once "footer.php";?>
