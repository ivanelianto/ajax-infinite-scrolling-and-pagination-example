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
$current_page = 1;
$jsonData = Repository::getInstance()->getProductPerPage($current_page);

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

</body>

<script src="./jquery-3.4.1.min.js"></script>
<script>

$(document).ready(() => {
  getData(<?= ++$current_page?>)

  $(window).scroll(() => {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
      getData(<?= ++$current_page?>)
    }
  });
})

function getData(page)
{
  $.ajax({
    url: `http://localhost:8001/repository.php?page=${page}`,
    method: "GET",
    success: (response) => {
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

      $(".item-wrapper").append(dirtyHTMLItems);
    }
  })
}
</script>
</html>