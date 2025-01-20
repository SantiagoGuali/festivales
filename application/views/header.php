<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Management</title>
    
    <!-- Importaciones -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <style>
        label.error { color: rgb(245, 71, 71); }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 250px;
        }
        .sidebar a { color: white; text-decoration: none; }
        .sidebar a:hover { background-color: #3e6a97; color: white; font-size: 15px; }
        .content { margin-left: 250px; padding: 20px; }
        .invalido { border: 2px solid red !important; background-color: #ffe6e6; }
    </style>
</head>
<body>
<div class="sidebar p-2">
    <h2><Center>Festival Management</Center></h2>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url()?>/home/index"><i class="fa-solid fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
        <li><a href="<?php echo site_url()?>/MusicalGroups/index" class="nav-link"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;&nbsp;Music Bands</a></li>
        <li><a href="<?php echo site_url()?>/staff/index"  class="nav-link"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Personnel</a></li>
        <li><a href="<?php echo site_url()?>/home/index"  class="nav-link"><i class="fa-solid fa-icons"></i>&nbsp;&nbsp;&nbsp;Activities</a></li>
		<li><a href="<?php echo site_url()?>/home/index" class="nav-link"><i class="fa-solid fa-clipboard"></i>&nbsp;&nbsp;&nbsp;Inscriptions</a></li>
        <li><a href="<?php echo site_url()?>/home/index" class="nav-link"><i class="fa-solid fa-champagne-glasses"></i>&nbsp;&nbsp;&nbsp;Festivals</a></li>
    </ul>
</div>

<div class="content">
