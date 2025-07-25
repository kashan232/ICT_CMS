<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author    " />

    <link rel="shortcut icon" href="{{ env('APP_URL') }}public/assets/images/Ict_logo.png">

    <link href="{{ env('APP_URL') }}public/assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
    <link href="{{ env('APP_URL') }}public/assets/vendor/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css">
    <script src="{{ env('APP_URL') }}public/assets/js/hyper-config.js"></script>

    <link href="{{ env('APP_URL') }}public/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ env('APP_URL') }}public/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ env('APP_URL') }}public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="{{ env('APP_URL') }}public/assets/css/datatables.bootstrap5.css" /> -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}public/assets/css/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}public/assets/css/datatables.checkboxes.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<style>
    .dataTables_wrapper .dataTables_filter input {
        margin-bottom:10px 
    }
</style>
<!-- loader css  -->
 <style>
    body {
      margin: 0;
      height: 100vh;
      font-family: Arial, sans-serif;
      /* overflow: hidden; Prevent scroll while loading */
    }

    /* LOADER STYLES */
    #loader-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(63, 73, 63, 0.85);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      transition: opacity 0.5s ease-out; /* ✅ Fixed here */
      opacity: 1;
    }


    .loader-container {
      position: relative;
      width: 150px;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loader-ring {
      position: absolute;
      border-radius: 50%;
      border: 4px solid transparent;
      box-sizing: border-box;
      animation: rotate-clockwise 2s linear infinite;
    }

    .loader-ring:nth-child(1) {
      width: 60px;
      height: 60px;
      border-top: 4px solid #ffffff;
      animation-duration: 1.5s;
    }

    .loader-ring:nth-child(2) {
      width: 80px;
      height: 80px;
      border-top: 4px solid #00aaff;
      border-left: 4px solid #00ffcc;
      animation: rotate-counter-clockwise 2s linear infinite;
    }

    .loader-ring:nth-child(3) {
      width: 100px;
      height: 100px;
      border-top: 4px solid #00cc66;
      border-right: 4px solid #006699;
      animation-duration: 2.5s;
    }

    .loader-ring:nth-child(4) {
      width: 120px;
      height: 120px;
      border-top: 4px solid #ffff00;
      border-bottom: 4px solid #66ff33;
      animation: rotate-counter-clockwise 3s linear infinite;
    }

    @keyframes rotate-clockwise {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @keyframes rotate-counter-clockwise {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(-360deg); }
    }

    /* MAIN CONTENT */
    #main-content {
      display: none;
      padding: 20px;
      background-color: #f0f0f0;
      min-height: 100vh;
    }
  </style>
  <!-- end loader css -->
<body class="loading">
<!-- <body > -->

  <!-- Loader -->
  <div id="loader-overlay">
    <div class="loader-container">
      <div class="loader-ring"></div>
      <div class="loader-ring"></div>
      <div class="loader-ring"></div>
      <div class="loader-ring"></div>
    </div>
  </div>
