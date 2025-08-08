<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/simple.css" />
    <link rel="stylesheet" href="./styles/custom.css" />
    <!-- checks if the page has a title; if true, adds it to the website title -->
    <title>Fonte da Culinária <?php if (!empty($pageTitle)): ?> &bull; <?php echo $pageTitle;?> <?php endif; ?></title>
</head>
<body>
  <?php
    // checks if headerImg is empty; if true, adds a default image
    if (empty($headerImg)) $headerImg = './images/pexels-rachel-claire-4577740.jpg';
  ?>

  <header class="header-with-background" style="background-image: url('<?php echo $headerImg;?>'); ">
    <h1>Fonte da Culinária</h1>
    <p>Seu santuário para sabores excepcionais!</p>
    <nav>
      <!-- checks if pageKey has not been declared; if true, declares the variable as empty.
      This prevents errors when accessing an undefined variable in the following ifs,
      avoiding the need to repeat the condition (!empty($pageKey)) inside each if -->
      <?php
        if (!isset($pageKey)) $pageKey = '';
      ?>

      <!-- 1st way to add the 'active' class to the selected page -->
      <?php if($pageKey === 'mission') : ?>
        <a class="active" href="our-mission.php">Missão</a>
      <?php else: ?>
        <a href="our-mission.php">Missão</a>
      <?php endif; ?>

      <!-- 2nd way -->
      <a class="<?php if ($pageKey === 'ingredients') echo 'active'; ?>" href="ingredients.php">Ingredientes</a>

      <!-- 3rd way -->
      <a 
        <?php if($pageKey === 'menu') : ?>
          class="active"
        <?php endif; ?> 
        href="menu.php">Menu</a>
    </nav>
  </header>

  <main>