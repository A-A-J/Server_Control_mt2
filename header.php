<!DOCTYPE html>
<html lang="<?php echo $lang['lang'];?>" dir="<?php echo $lang['dir']?>" class="h-100">

<head>
  <title><?php echo $lang['title'];?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/img/icon.ico" type="image/x-icon">

  <!--   CSS -->
  <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.<?php echo ($lang['dir'] == 'rtl' ? 'rtl.' : null)?>min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/notiflix@3.2.5/dist/notiflix-3.2.5.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  <!-- FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- STLYE -->
  <style>
    .btn-max {
        <?php echo $lang['dire'];?>: 7px !important;
    }
    div#account_filter{
      text-align:<?php echo $lang['dire'];?> !important;
    }
  </style>
  <!-- SVG -->
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-aio-1.5.0.min.js"></script>
</head>

<body class="d-flex flex-column h-100">
  <header>
    <div class="pt-2 pb-2">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
          <a href="index.php" class="d-flex align-items-center justify-content-center my-2 my-lg-0 me-lg-auto text-center navbar-brand"><?php echo $lang['title'];?></a>
        </div>
      </div>
    </div>
  </header>
  <nav class="header-nav">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="index.php" class="nav-link px-2 active" aria-current="page"><?php echo $lang['home'];?></a></li>
        <li class="nav-item"><a href="<?php echo url;?>accounts" class="nav-link px-2"><?php echo $lang['accounts'];?></a></li>
        <li class="nav-item"><a href="<?php echo url;?>command" class="nav-link px-2"><?php echo $lang['command'];?></a></li>
        <li class="nav-item"><a href="<?php echo url;?>faqs" class="nav-link px-2"><?php echo $lang['faq'];?></a></li>
        <li class="nav-item"><a href="https://github.com/A-A-J/Server_Control_mt2/pulls" target="_blank" class="nav-link px-2"><?php echo $lang['send_errors'];?></a></li>
      </ul>
      <!-- <ul class="nav">
        <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Channel: 1~online</a></li>
      </ul> -->
    </div>
  </nav>
  <main class="flex-shrink-0 mt-5">
    <div class="container">

      <?php if(isset($_GET['page'])): ?>
      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home'];?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['page'];?></li>
        </ol>
      </nav>
      <?php endif; ?>