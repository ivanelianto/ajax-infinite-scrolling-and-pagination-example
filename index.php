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
$total_row = Repository::getInstance()->getTotalProduct() / Repository::ITEM_PER_PAGE;
$jsonData = Repository::getInstance()->getProductPerPage(1);

$items = json_decode($jsonData);
?>

<div class="item-wrapper">
  <?php
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
</div>

<div class="pagination-wrapper">
  <?php
    for ($i = 1; $i <= $total_row; $i++)
    {
  ?>
  <button class="page-button" value=<?= $i ?> onclick="getData(this)">
    <?= $i ?>
  </button>
  <?php
    }
  ?>
</div>

</body>

<script src="./jquery-3.4.1.min.js"></script>
<script>
function getData(element)
{
  $.ajax({
    url: `http://localhost:8001/repository.php?page=${element.value}`,
    method: "GET",
    success: (response) => {
      $(".item-wrapper").empty()

      let dirtyHTMLItems = "";

      let items = JSON.parse(response)

      items.forEach((v, k) => {
        dirtyHTMLItems += `
        <div class="item">
          <div class="top-wrapper">
            <div class="id-wrapper">
              <span class="id">${v['id']}</span>
            </div>
            
            <div class="name-wrapper">
              <span class="name">${v['name']}</span>
            </div>
          </div>

          <div class="main-data-wrapper">
            <div class="price">
              <span>${v['price']}</span>
            </div>
            
            <div class="stock">
              <span><b>${v['stock']}</b> item(s) left</span>
            </div>
          </div>
        </div>
        `
      })

      $(".item-wrapper").html(dirtyHTMLItems);
    }
  })
}
</script>
</html>