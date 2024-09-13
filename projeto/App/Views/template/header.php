<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="/assets/plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="/assets/plugins/codemirror/theme/monokai.css">

<link rel="stylesheet" href="/assets/plugins/simplemde/simplemde.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php if ($_SESSION['logado'] == true): ?>

      <!-- Navbar -->
      <?php require_once __DIR__ . '/../../../App/Views/template/navbar.php'; ?>

      <!-- Sidebar -->
      <?php require_once __DIR__ . '/../../../App/Views/template/sidebar.php'; ?>

      <div class="content-wrapper p-2">

      <?php endif ?>

      <?php if (isset($_SESSION['sucesso'])) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?= $_SESSION['sucesso'] ?>
        </div>

      <?php
        unset($_SESSION['sucesso']);
      }
   
      if (isset($_SESSION['erro'])) { ?>

        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?= $_SESSION['erro'] ?>
        </div>

      <?php
        unset($_SESSION['erro']);
      }
      ?>