    <?php 

    require_once "./view/clients.php";
    require_once "./view/dentists.php";
    require_once "./view/appointment.php";
    require_once "./view/admin.php";

      $pages = ["consultas"=> "", "clientes"=>"", "dentistas"=>"", "administrativo"=>""];

      $pages["clientes"] = $clients;
      $pages["dentistas"] = $dentists;
      $pages["consultas"] = $appointment;
      $pages["administrativo"] = $admin;

    ?> 
<html>
  <head>
    <title>PHP Test</title>
    <link rel="stylesheet" href="./view/style.css?v=<?php echo filemtime('./view/style.css'); ?>">
  </head>
  <body>
    <header class="header">
      <img src="./view/assets/dentinho.svg" alt="imagem do dentinho" />
      <?php
      $menu =  '';
      foreach($pages as $key => $value){
        $menu  .= '<a class="menu-item" href="?page=' . $key .'">'.ucfirst($key). '</a>';
      }
      echo '<div class="menu">' . $menu . '</div>';
    ?></header>
    <?php
      $pageIndex = (isset($_GET['page']) ? $_GET['page'] : 'admin');
      echo $pages[$pageIndex];
      ?>

  </body>
</html>