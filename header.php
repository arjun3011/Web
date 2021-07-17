<!DOCTYPE html>
<html >
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
        <a href="http://prototype1.local/" class = "logo" > My World</a>
        <ul class="header-ul" id="header-ul">
            
            <li><a href="http://prototype1.local/">Home</a></li>
            <li><a href="http://prototype1.local/events/">Events</a></li>
            <li><a href="http://prototype1.local/blog/">Blog</a></li>
            <li><a href="http://prototype1.local/wp-admin"> Login</a></li>
            <nav class="js-search-trigger site-header__search-trigger" ><i class="fa fa-search" ></i></span></i></nav>
            
            
          </ul>
          
        <div class="hamburger" id ="hamburger">
        <i class="fa fa-bars"></i>
        </div>
        </header>


        <script scr="scripts.js">
          window.addEventListener("scroll",function(){
         
            var header= document.querySelector("header");
           
            var box= document.querySelector(".hamburger");
            var search = document.querySelector(".site-header__search-trigger");
            header.classList.toggle("sticky",window.scrollY>0);
            box.classList.toggle("sticky",window.scrollY>0);
            search.classList.toggle("sticky",window.scrollY>0);
           
        
          });
          
        </script>
       
