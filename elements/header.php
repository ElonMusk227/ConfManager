<?php
  require_once 'C:\wamp64\www\confmanager\vendor\autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    <?= $title ?>
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <link id="pagestyle" href="./assets/css/style.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://linkedin.com/assogba-isaac" target="_blank">
        <img src="./assets/img/tesla-model-s.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">ConfManager</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Dashboard') ? 'active bg-gradient-primary' : '' ?>" href="./index.php">
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Conference') ? 'active bg-gradient-primary' : '' ?>" href="./create_conf.php">
            <span class="nav-link-text ms-1">Create a conference</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Add a relector') ? 'active bg-gradient-primary' : '' ?>" href="./add_relector.php">
            <span class="nav-link-text ms-1">Add a relector</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Author') ? 'active bg-gradient-primary' : '' ?>" href="./author.php">
            <span class="nav-link-text ms-1">Call an author</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Make Status') ? 'active bg-gradient-primary' : '' ?>" href="./make_status.php">
            <span class="nav-link-text ms-1">Make a status</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Hello Assogba Isaac</li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?= $title ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
    </nav>
