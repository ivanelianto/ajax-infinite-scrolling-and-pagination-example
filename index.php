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
/**
 * TODO: Import Repository.php
 * 
 */

 /**
 * TODO: Create Current Page Variable To Store Current Loaded Page Data
 * 
 */

 /**
 * TODO: Get Product Per Page
 * 
 */

/**
 * TODO: Parse JSON Products Data
 * 
 */
?>

<div class="item-wrapper">
  <?php
  /**
   * TODO: Loop Each Product
   */
  ?>
    <div class="item">
      <div class="top-wrapper">
        <div class="id-wrapper">
          <span class="id"><?php /**TODO: Display Product Stock*/ ?></span>
        </div>
        
        <div class="name-wrapper">
          <span class="name"><?php /**TODO: Display Product Stock*/ ?></span>
        </div>
      </div>

      <div class="main-data-wrapper">
        <div class="price">
          <span><?php /**TODO: Display Product Stock*/ ?></span>
        </div>
        
        <div class="stock">
          <span>
            <b>
              <?php /**TODO: Display Product Stock*/ ?>
            </b>
            &nbsp;item(s) left
          </span>
        </div>
      </div>
    </div>
</div>

</body>

<script src="./jquery-3.4.1.min.js"></script>
<script>

$(document).ready(() => {
  /**
   * TODO: Load Second Page Data So That Page Have Enough For Scrolled.
   *
   */

  /**
   * TODO: Detect Scroll to Bottom and Load Next Page Data
   *
   */
})

/**
 * jQuery AJAX Infinite Scrooling Simple Logic
 */
}
</script>
</html>