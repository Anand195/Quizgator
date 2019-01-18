<html>
<head>
  <title>quiz</title>
  <link rel="stylesheet" href="<?=base_url("Assets/css/bootstrap.min.css") ?>">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">QUIZ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("index.php/home/index")?>">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url("index.php/login/index")?>">Profile</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" id="myInput">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search Quiz</button>
    </form>
    <?php
          if($this->session->userdata('enrollment')){?>
            <li><a href="<?= base_url('profile/logout'); ?> " class="btn btn-danger">Logout</a></li>

<?php }
          ?>
  </div>
</nav>
