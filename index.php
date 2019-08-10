<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHPspanS2 - Pagination and Infinite Scrolling</title>
  <link rel="stylesheet" href="./index.css">
</head>
<body>

<?php
require_once("./repository.php");
$currentPage = 1;
$jsonData = Repository::getInstance()->getProductPerPage(1);

$items = json_decode($jsonData);

foreach ($items as $item)
{
?>
<div class="item">
  <div class="top-wrapper">
    <div class="id-wrapper">
      <span class="id"><?= $item->id ?></span>
    </div>
    
    <div class="name-wrapper">
      <span class="name"><?= $item->name ?></span>
    </div>
  </div>

  <div class="main-data-wrapper">
    <div class="price">
      <span><?= $item->price ?></span>
    </div>
    
    <div class="stock">
      <span><b><?= $item->stock ?></b> item(s) left</span>
    </div>
  </div>
</div>
<?php
}
?>

</body>
</html>