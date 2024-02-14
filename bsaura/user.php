<?php
session_start();

include_once("connection.php");
include_once("function.php");

$user_data = check_login($connection); 
$personnel_data = check_personnel($connection);
$vet_data = check_vet($connection);

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>USER TABLE</title>
  <!--style-->
      <link rel="icon" href="wimg/CA.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net\npm/remixicon@12.3.1/fonts/remixicon.css">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
  <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com//libs/fajaxont-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
.layout {
    z-index: 1;
    flex-direction: column;
    min-height: 100vh;
  }
  .layout .header {
    display: flex;
    align-items: center;
    padding: 20px;
  }
  .layout .content {
    padding: 12px 50px;
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 20px;
  }
  /*para sa menu icon*/
  .ri-menu-line {
    position: absolute;
    top: 10px; /* Adjust the value to position the icon properly */
    left: -65px; /* Adjust the value to position the icon properly */
    z-index: 9999; /* Adjust the value as needed */
  }
  .layout .footer {
    text-align: center;
    margin-top: auto;
    margin-bottom: 20px;
    padding: 10px;
  }
  .layout .footer small a:hover {
    text-decoration: underline; /* Add underline on hover */
    }
  /*para sa mga font sa sidebar*/
  .sidebar {
    color: #7d84ab;
    overflow-x: hidden !important;
    position: relative;
  }
  .sidebar::-webkit-scrollbar-thumb {
    border-radius: 4px;
  }
  .sidebar:hover::-webkit-scrollbar-thumb {
    background-color: #1a4173;
  }
  .sidebar::-webkit-scrollbar {
    width: 6px;
    background-color: #0c1e35;
  }
  .sidebar .image-wrapper {
    overflow: hidden;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1;
    display: none;
  }
  .sidebar .image-wrapper > img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }
  .sidebar.has-bg-image .image-wrapper {
    display: block;
  }
  /*para sa layout sa side bar*/
  .sidebar .sidebar-layout {
    height: auto;
    min-height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    background-color: #0c1e35;
    z-index: 2;
  }
  .sidebar .sidebar-layout .sidebar-header {
    height: 100px;
    min-height: 100px;
    display: flex;
    align-items: center;
    padding: 0 20px;
  }
  .sidebar .sidebar-layout .sidebar-header > span {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  .sidebar .sidebar-layout .sidebar-content {
    flex-grow: 1;
    padding: 10px 0;
  }
  .sidebar .sidebar-layout .sidebar-footer {
    height: 230px;
    min-height: 230px;
    display: flex;
    align-items: center;
    padding: 0 20px;
  }
  .sidebar .sidebar-layout .sidebar-footer > span {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  
  @keyframes swing {
    0%, 30%, 50%, 70%, 100% {
      transform: rotate(0deg);
    }
    10% {
      transform: rotate(10deg);
    }
    40% {
      transform: rotate(-10deg);
    }
    60% {
      transform: rotate(5deg);
    }
    80% {
      transform: rotate(-5deg);
    }
  }
  .layout .sidebar .menu ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }
  .layout .sidebar .menu .menu-header {
    font-weight: 600;
    padding: 1px 25px;
    font-size: 0.8em;
    letter-spacing: 2px;
    transition: opacity 0.3s;
    opacity: 0.5;
  }
  .layout .sidebar .menu .menu-item a {
    display: flex;
    align-items: center;
    height: 50px;
    padding: 0 20px;
    color: #7d84ab;
  }
  .layout .sidebar .menu .menu-item a .menu-icon {
    font-size: 1.2rem;
    width: 35px;
    min-width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    display: inline-block;
    margin-right: 10px;
    border-radius: 2px;
    transition: color 0.3s;
    color: #7d84ab;
  }
  .layout .sidebar .menu .menu-item a .menu-icon i {
    display: inline-block;
    color: #7d84ab;
  }
  .layout .sidebar .menu .menu-item a .menu-icon img {
    display: inline-block;
    color: #7d84ab;
    
  }
  .layout .sidebar .menu .menu-item a .menu-title {
    font-size: 0.9em;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    flex-grow: 1;
    transition: color 0.3s;
    color: #7d84ab;
  }
  .layout .sidebar .menu .menu-item a .menu-prefix,
  .layout .sidebar .menu .menu-item a .menu-suffix {
    display: inline-block;
    padding: 5px;
    opacity: 1;
    transition: opacity 0.3s;
  }
  .layout .sidebar .menu .menu-item a:hover .menu-title {
    color: #dee2ec;
  }
  .layout .sidebar .menu .menu-item a:hover .menu-icon {
    color: #dee2ec;
  }
  .layout .sidebar .menu .menu-item a:hover .menu-icon i {
    animation: swing ease-in-out 0.5s 1 alternate;
  }
  .layout .sidebar .menu .menu-item a:hover .menu-icon img {
    animation: swing ease-in-out 0.5s 1 alternate;
  }
  .layout .sidebar .menu .menu-item a:hover::after {
    border-color: #dee2ec !important;
  }
  .layout .sidebar .menu .menu-item.sub-menu {
    position: relative;
  }
  .layout .sidebar .menu .menu-item.sub-menu > a::after {
    content: "";
    transition: transform 0.3s;
    border-right: 2px solid currentcolor;
    border-bottom: 2px solid currentcolor;
    width: 5px;
    height: 5px;
    transform: rotate(-45deg);
  }
  .layout .sidebar .menu .menu-item.sub-menu > .sub-menu-list {
    padding-left: 20px;
    display: none;
    overflow: hidden;
    z-index: 999;
  }
  .layout .sidebar .menu .menu-item.sub-menu.open > a {
    color: #dee2ec;
  }
  .layout .sidebar .menu .menu-item.sub-menu.open > a::after {
    transform: rotate(45deg);
  }
  .layout .sidebar .menu .menu-item.active > a .menu-title {
    color: #dee2ec;
  }
  .layout .sidebar .menu .menu-item.active > a::after {
    border-color: #dee2ec;
  }
  .layout .sidebar .menu .menu-item.active > a .menu-icon {
    color: #dee2ec;
  }
  .layout .sidebar .menu > ul > .sub-menu > .sub-menu-list {
    background-color: #0b1a2c;
  }
  .layout .sidebar .menu.icon-shape-circle .menu-item a .menu-icon, .layout .sidebar .menu.icon-shape-rounded .menu-item a .menu-icon, .layout .sidebar .menu.icon-shape-square .menu-item a .menu-icon {
    background-color: #0b1a2c;
  }
  .layout .sidebar .menu.icon-shape-circle .menu-item a .menu-icon {
    border-radius: 50%;
  }
  .layout .sidebar .menu.icon-shape-rounded .menu-item a .menu-icon {
    border-radius: 4px;
  }
  .layout .sidebar .menu.icon-shape-square .menu-item a .menu-icon {
    border-radius: 0;
  }
  .layout .sidebar:not(.collapsed) .menu > ul > .menu-item.sub-menu > .sub-menu-list {
    visibility: visible !important;
    position: static !important;
    transform: translate(0, 0) !important;
  }
  .layout .sidebar.collapsed .menu > ul > .menu-header {
    opacity: 0;
  }
  .layout .sidebar.collapsed .menu > ul > .menu-item > a .menu-prefix,
  .layout .sidebar.collapsed .menu > ul > .menu-item > a .menu-suffix {
    opacity: 0;
  }
  .layout .sidebar.collapsed .menu > ul > .menu-item.sub-menu > a::after {
    content: "";
    width: 5px;
    height: 5px;
    background-color: currentcolor;
    border-radius: 50%;
    display: inline-block;
    position: absolute;
    right: 10px;
    top: 50%;
    border: none;
    transform: translateY(-50%);
  }
  .layout .sidebar.collapsed .menu > ul > .menu-item.sub-menu > a:hover::after {
    background-color: #dee2ec;
  }
  .layout .sidebar.collapsed .menu > ul > .menu-item.sub-menu > .sub-menu-list {
    transition: none !important;
    width: 200px;
    margin-left: 3px !important;
    border-radius: 4px;
    display: block !important;
  }
  .layout .sidebar.collapsed .menu > ul > .menu-item.active > a::after {
    background-color: #dee2ec;
  }
  .layout .sidebar.has-bg-image .menu.icon-shape-circle .menu-item a .menu-icon, .layout .sidebar.has-bg-image .menu.icon-shape-rounded .menu-item a .menu-icon, .layout .sidebar.has-bg-image .menu.icon-shape-square .menu-item a .menu-icon {
    background-color: rgba(11, 26, 44, 0.6);
  }
  .layout .sidebar.has-bg-image:not(.collapsed) .menu > ul > .sub-menu > .sub-menu-list {
    background-color: rgba(11, 26, 44, 0.6);
  }
  .layout.rtl .sidebar .menu .menu-item a .menu-icon {
    margin-left: 10px;
    margin-right: 0;
    color: #7d84ab;
  }
  .layout.rtl .sidebar .menu .menu-item.sub-menu > a::after {
    transform: rotate(135deg);
  }
  .layout.rtl .sidebar .menu .menu-item.sub-menu > .sub-menu-list {
    padding-left: 0;
    padding-right: 20px;
  }
  .layout.rtl .sidebar .menu .menu-item.sub-menu.open > a::after {
    transform: rotate(45deg);
  }
  .layout.rtl .sidebar.collapsed .menu > ul > .menu-item.sub-menu a::after {
    right: auto;
    left: 10px;
  }
  .layout.rtl .sidebar.collapsed .menu > ul > .menu-item.sub-menu > .sub-menu-list {
    margin-left: -3px !important;
  }
  
  * {
    box-sizing: border-box;
  }
  
  body {
    margin: 0;
    height: 100vh;
    font-family: "Poppins", sans-serif;
    color: #3f4750;
    font-size: 0.9rem;
  }
  
  a {
    text-decoration: none;
  }
  
  @media (max-width: 576px) {
    #btn-collapse {
      display: none;
    }
  }
  .layout .sidebar .pro-sidebar-logo {
    display: flex;
    align-items: center;
  }
  /*para sa may logo*/
  .layout .sidebar .pro-sidebar-logo > div {
    width: 0px;
    min-width: 0px;
    height: 0px;
    min-height: 0px;
    display: flex;
    align-items: center;
    justify-content: inherit;
    text-align: center;
    color: white;
    font-size: 1px;
    font-weight: 500;
    background-color: #0c1e35;
  }
  .layout .sidebar .pro-sidebar-logo >div{
    display: flex;
    flex-direction: row;
    font-size: 6.5px;
    white-space: nowrap;
  }
  /* Style the h4 and h5 elements */
  .layout .sidebar .pro-sidebar-logo > h4{
    margin-left: 1px;
    letter-spacing: 3px;
    font-family: sans-serif;
    font-size: 9px;
    white-space: nowrap;
    text-align: center;
  }
  .layout .sidebar .pro-sidebar-logo > h5 {
    display: flex;
    font-size: 18px;
    font-family: strain;
    white-space: nowrap;
    margin-top: 35px;
    text-align: center;
    margin-left: -200px;
  }
  .layout .sidebar .footer-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 0.8em;
    padding: 20px 0;
    border-radius: 8px;
    width: 180px;
    min-width: 190px;
    margin: 0 auto;
    background-color: #162d4a;
  }
  .layout .sidebar .logo {
    width: 50px;
    height: 50%;
    margin-right: 5px;
  }
  .layout .sidebar .footer-box img.react-logo {
    width: 40px;
    height: 40px;
    margin-bottom: 10px;
  }
  .layout .sidebar .footer-box a {
    color: #fff;
    font-weight: 600;
    margin-bottom: 10px;
  }
  .layout .sidebar .sidebar-collapser {
    transition: left, right, 0.3s;
    position: fixed;
    left: 260px;
    top: 40px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #00829f;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    justify-content: center;
    font-size: 1.2em;
    transform: translateX(50%);
    z-index: 111;
    cursor: pointer;
    color: white;
    box-shadow: 1px 1px 4px #0c1e35;
  }
  .layout .sidebar.collapsed .pro-sidebar-logo > h5 {
    opacity: 0;
  }
  .layout .sidebar.collapsed .footer-box {
    display: none;
  }
  .layout .sidebar.collapsed .sidebar-collapser {
    left: 60px;
  }
  .layout .sidebar.collapsed .sidebar-collapser i {
    transform: rotate(180deg);
  }
  
  .badge {
    display: inline-block;
    padding: 0.25em 0.4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
    color: #fff;
    background-color: #6c757d;
  }
  .badge.primary {
    background-color: #ab2dff;
  }
  .badge.secondary {
    background-color: #079b0b;
  }
  
  .sidebar-toggler {
    position: fixed;
    right: 20px;
    top: 20px;
  }
  
  .social-links a {
    margin: 0 10px;
    color: #3f4750;
  }
  .container{
    margin-top: 100px;
    justify-content: center;
    gap: 20px;
    
  }
  .container1{
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
  }
  a{
    text-decoration: none;
    color: white;
    opacity: 1;
  }


  p {
    color: rgb(209, 209, 209);
    margin-left: -50px;
    text-decoration: inherit;
    white-space: nowrap;
  }
  .footer > a{
    white-space: nowrap;
    opacity: 1;

  }
  .container {
    margin-top: 30px;
  }
  h2 {
    text-align: center;
    margin-bottom: 20px;
    text-shadow: 5px 5px 5px 8  px gray;
  }
  table{
    justify-content: center;
    text-align: center;
    box-shadow: 0 0 4px rgba(0, 0, 0, 20); 
  }
  
    </style>
<body>
<!-- partial:index.partial.html -->
<div class="layout has-sidebar fixed-sidebar fixed-header">
      <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
        <!--sidebar arrow-->
        <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
        <div class="image-wrapper">
          <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" />
        </div>
        <div class="sidebar-layout">
          <div class="sidebar-header">
            <!--para sa kulay orange na box sa logo-->
            <div class="pro-sidebar-logo">
              <img src="dimg/basclogo.png" alt="Logo" class="logo">
              <!--para sa letter na nasa box na logo &emsp para sa tab(space)-->
              <div><br><br>&emsp;New Site Campus, Poblacion, San Ildefonso, Bulacan</div>
              <h4>Bulacan State Agricultural<br>University<br><br></h4>
             <!-- <h5><br><br><br>&emsp;Ruminants Animals.</h5>-->
            </div>
            <!--end ng logo-->
          </div>
          <div class="sidebar-content">
            <nav class="menu open-current-submenu">
              <ul>
                <li class="menu-header"><span> GENERAL </span></li>
                <li class="menu-item">
                  <a href="dashboard.php">
                    <span class="menu-icon">
                      <i class="ri-home-4-fill"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                    <span class="menu-suffix">
                     <!-- <span class="badge secondary">Beta</span>
                    </span>-->
                  </a>
                </li>
                <li class="menu-item sub-menu">
                  <a href="#">
                    <span class="menu-icon">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAADA0lEQVR4nJ1Wa4iMYRQeIpcIud9ShPyRouSPpfxDkR8kf5B1KZdtCTvnzJs551sUSi61Ekm7054zi7TuaZFflHJbUy5tKSS5sxSNzlx2Zr/5Zs3sW6dm3vd5z3POec/lC4V8C6LxJaFkskeohIUcX1YKrvAi6U/wpDr7P0yxSUgaM3F74xNz+7IRWP8619KrbBIgeYysSSC5Cqz7keUJkkRMgPQpkuxDlksZzMvuerLdFHQISWPuTBrzz4AVS1K6a2/9kAjJcohqFbJucJ5OB9LrSPoHWY9XHZR+Waxzp/sC6TE7A9JbjmVGKmxRrTIdpivYcpa2TpanrNfPuEdnO+d6oicVyLIpJZ5UpPZqZQ6wfim4x9JWjOSGHwyshCwLkfVFwRnpczsDFi+A5FogSQ03jUbWK8DajqwJJP1uXgDJs0IlmpWEeZPCsibsLpBcdk5GlZzCzskAYPlRjARY23fsvzDQsCUpDSB5v9uT4cD6tlC57HDuYn/wZIVzTeOQ9GO3SIDkbpjiCyIka5Hkax7JTYjKVGB5jV58PkTjk4G0uZieMMXnIusrVxubEuTJdiQ9kwFOsKo2kgjJaiA9kgnXtzDJ+sq6ut5BBGkDU+9liXKkAJCOtbyxenGufliHJ1GZCSz3fIV61vaA9XdaUr9P+jD3A11N14XeDJPOy4JrWGfZhS4yrojIg0ASC0OmRhIdj+7pKmQ5VDYJ6YGiCYCsrb4Lrc41jUCW26USAMkdK4fiJCS/Aqq92Vp7KWEDkoddj4FksgeSvgtwvcZqpIz3qPzf1FsMLJ/yCvHHrtpzQ/0N1WYKktalhPWVL7M+bD58uU+XRBZPZFmKLNvAk5VWpL72csr6lVlssttrGImkpzthorooVM4CT6rzPUgT5KwP2kPWLd0mQdI6q3pkfZQvEdJ1wHIi54lsLYskTLHxuXeSo6YwiMTOsm9io6QsElvWbpClxQrVurUvERLWimwW2QiHaGxa2QSdyFzDmJ37ZJBlXObzaI1z5web1LCMzQf/A+btjXmgoZ32AAAAAElFTkSuQmCC">
                    </span>
                    <span class="menu-title">CA Animals</span>
                  </a>
                  <div class="sub-menu-list">
                    <ul>
                      <li class="menu-item">
                        <a href="carabao.php">
                          <span class="menu-icon">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACC0lEQVR4nO2VP2gVQRDGD9RCFFRQRGxsFCOWdhaCaC3in8o6RRoV0Zh7M6zczJqgpBMhghaG+OCbCxaCiIUpohER0ojGTgXhgaKIf7DRKPvuAmLuOH3vIgjvg4Fb+PZ+s7Ozu1HUU0//k0hxmhUH/zmYFbMs9s157HBuajkl6dYjwLLSCQ3BXla8JMUXEnvFYo9YcYsFV1nsAgtGQpDiCqsZCe6R2FMWfGSx9yw4E/5DaqOs9oPUWqT2NXyzYLwUTGIv2qZOQzDfkHTfkMcGUntX4DlQUqIuoHmQYK5/bGwFi51bnJh9oKTZtyTgDG53We15SVUeFoJJ8KSuBErAj4tXLBYvHdQ+s8f+YrBPd9cJowSHS7s5g+JBMDo3sb4+MGajKlF25lrOYXWNpY2rwQmOs+KEO9/cVhfY+XR7JXhBrOgv6cb5dvw5+HL0NyLB/cImEdxxw80tpGiQ2AypfSr0qb0t7Nwqhcs93583rDYdjkCAxorNZXOcn9wZ7vccjEpIkX7J/FpUIVIbJG/HsnmYyitzuzuwt6OxTm5qv0hqNuRvbCz0ir3OwZcysM10B06afYMjWENq38M4VttV5j07PLGOFQP5iue6Ajt3c20+zi/79NDv3oWk2kfQY0++Ra1OwdPhB+Fpy8YYCI85Kfwir2A8NOPJUaw8dfH6KlZ7FrwdgXvqKapJPwFia3orGotdegAAAABJRU5ErkJggg==">
                    </span>
                          <span class="menu-title">Carabao</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="cattle.php">
                          <span class="menu-icon">
                      <i class="fa-solid fa-cow"></i>
                    </span>
                          <span class="menu-title">Cattle</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="goat.php">
                          <span class="menu-icon">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAACpUlEQVR4nN1WO2sUURSeRHwVgm8tFBtBkFj5Fg0q+hPstBPFQkRUTHbvySV77iQIJmilqZTARvnOrhGLFFpEQazERwS1ESyCiFWMihITV87M7GuyG2dxbTwwxT13vvvd853HjOf915Zm2WMchohlnFimiPGBWLLWz7fVw1g/3xZignenImyWerC7JoBYnHEyQ04K8SfwszivUGgpAQqFFuOE58LofpzkfK2XZz/oPzEwMN9a20osl5NgjI9zkVy5DcT4kYwouOkXYvnYwPvf03xrvWec9JY2WAZsDzae7cPiNGMvOTxKfCDjXsrJNmtvLLI+NhsnqDjXeeTwLHJIPG8qEzkMJyC6XpW/KIfkMBrtP9WIPgeLDLbqvmF5GPowqlF19GaXzS0t3luLBeTnDpSx8jZMCw5GEU14xuGbLi5curskLAxkyiErAfr/kIMZYkkZh58VMj7Ws4JLhkRfPcN4owt16qbmhxxeJM0N1SgWk8GmoMcslkf+1yrdoC60WYvydvpDawzL84aJWCZU7vIA0IJSctzUabA/uklfZS5PXx1ZaBxsA1U3oq1S1Z9OroRB5NojB4aJMdnpY9XsiYFJ6s5vp27ZOYugu+zXtqgaTTa/OpCRkatwZlcaxiudWXEiw3iXctiRcvldcaJU0c/4VSymEs7JbXIy1tFzZ0XVgRoNOTwwTi7GAIMJZHsZU6HDsNyvpVAUmW3tYhwjX/aVQD4OJ6g0KhdArt34clTP8hoxnQ7FXqv7ZMJm/2szLE/mKOnxhm9fz9KMk3Vly+CM1ywLhivLtCbd2vw6a7G2OIxNBlu8ZpqWeRTFmLZCJNu0tcNLm0qUZpyqUdbXvGabftCI5VNFEUzHp0HTLM25Q/q3E4wWh+P/hKRoR4B5+qFrFPgb/2B9zgkHzz4AAAAASUVORK5CYII=">
                    </span>
                          <span class="menu-title">Goat</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="horse.php">
                          <span class="menu-icon">
                      <i class="fa-solid fa-horse"></i>
                    </span>
                          <span class="menu-title">Horse</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="rabbit.php">
                          <span class="menu-icon">
                              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAABuElEQVR4nO1UPUskQRScyEDEVLnEQxMxMpYDBQ/ExC/8B15gIoiZzOvrY98bFMQ/IAiK4GK9SRQMBFNFEDPRUEWWzbxQ5ViVXleZGVadmTU6LBiGnq7q6nrT/Tzvv4bPOmACHcymCX+aAP2pBUZwaRgPhjGXjq/TRvSRWC/SmzDuqiLRihEdft8gHCLBP8d3utQmJPhbFT3v7sraneZ6PGvRQoLrF65hvUlvwjh5FYo++oyZ+ikwG+UZxnGGJLocEwtO65voWZRHgqXUJjZAT/XHRxawC8XvMc5C2JlI8WCDsDu1STUNYz+RZjw2X8BkYn7Pywqf8SOeBrtGdJsER+5dG9fKpBWftc/LA8NYje9W6z4kWPHywtqNVhItvW+gJcdrwGTzG4nef2By73i5TQzrespyreVMgfbkMTZvp6nMB5tt2VOIjkbuwJYV9MbujaCXRPFqVMBIDhOMR8rh+pMmdo9o36JCOJbZxMUn0dtEac5c6yDGecLwNle5HEjwK366cOBz2EGsh9HT9Zsx5TUCn4tdhrFIouVaO/9TW7zsvrse5n0WrEUTFXTCtRv3duNPW/wLXgRPUuvysIK0VfsAAAAASUVORK5CYII=">
                          </span>
                          <span class="menu-title">Rabbit</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="sheep.php">
                          <span class="menu-icon">
                      <i class="fa-solid fa-democrat"></i>
                    </span>
                          <span class="menu-title">Sheep</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="menu-item">
                  <a href="medical.php">
                    <span class="menu-icon">
                      <i class="fa fa-file-medical"></i>
                    </span>
                    <span class="menu-title">Medical Record</span>
                  </a>
                      </li>
                <li class="menu-item">
                  <a href="genealogical.php">
                    <span class="menu-icon">
                      <i class="fab fa-pagelines"></i>
                    </span>
                    <span class="menu-title">Genealogical Tree</span>
                  </a>
                      </li>
                <li class="menu-item">
                  <a href="dietchart.php">
                    <span class="menu-icon">
                      <i class="fa fa-pie-chart"></i>
                    </span>
                    <span class="menu-title">Diet Chart</span>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="table.php">
                    <span class="menu-icon">
                      <i class="fa fa-area-chart"></i>
                    </span>
                    <span class="menu-title">Statistics and Postmortem</span>
                  </a>
                </li>
                <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                <li class="menu-item">
                  <a href="report.php">
                    <span class="menu-icon">
                      <i class="ri-book-2-fill"></i>
                    </span>
                    <span class="menu-title">Reports</span>
                    <span class="menu-suffix">
                     <!-- <span class="badge secondary">Beta</span>
                    </span>-->
                  </a>
                </li>
                <li class="menu-item">
                  <a href="user.php">
                    <span class="menu-icon">
                      <i class="ri-user-fill"></i>
                    </span>
                    <span class="menu-title">User</span>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/bascruminant/index.php" onclick="return confirm('Do you want to log out?');">
                    <span class="menu-icon">
                      <i class="ri-logout-box-r-line"></i>
                    </span>
                    <span class="menu-title">Logout</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </aside>   
      <div id="overlay" class="overlay"></div>
      <div class="layout" style="background-color:#e6e6fa;">
        <main class="content">
        <div>
            <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
              <i class="ri-menu-line ri-xl"style="color: #0c1e35;"></i>
            </a>
    <div class="container">
        <h2>SYSTEM USERS</h2>
        <a class="btn btn-primary" href="cuser.php" role="button"><i class="fa-solid fa-user-plus"></i>&nbsp;New User</a>
        <br>
        <div style="position: fixed; top: 20%; left: 60%; z-index: -2; opacity: 0.2;">
                <img src="wimg/CA.png" alt="California Image" style="width: 200%; height: 200%;">
            </div> 
        <br> 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Type of User</th>
                    <th>Date Registered</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }
                $sql = 'SELECT * FROM user_tbl';
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[id_num]</td>
                        <td>$row[user_type]</td>
                        <td>$row[DATETIME]</td>
                    </tr> 
                    ";
                }

                ?>
            </tbody>
        </table>

    </div>
    <footer class="footer">
            <small style="margin-bottom: 20px; display: inline-block; margin-top: 10px;  " >
              © 2023 made with developers by -
              <a target="_blank" href="https://basc.edu.ph/"style="color: #708090;"> Bulacan State Agricultural University </a>
            </small>
            <br />
            <div class="social-links">
            <a href="https://www.facebook.com/bascofficeofthecollegeregistrar?mibextid=D4KYlr" target="_blank">
              <i class="fa-brands fa-facebook"></i>
              </a>
              <a href="https://basc.edu.ph/contact-us/" target="_blank">
              <i class="fa-solid fa-envelope"></i>
              </a>
              <a href="https://basc.edu.ph/contact-us/" target="_blank">
              <i class="fa-solid fa-phone"></i>
              </a>
            </div>
          </footer>
        </main>
        <div class="overlay"></div>
      </div>
    </div>
  <script src='https://unpkg.com/@popperjs/core@2'></script>
  <script src="template.js"></script>
</body>
</html>
