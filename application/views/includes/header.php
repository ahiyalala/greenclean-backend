<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="/greenclean-backend/front/img/GKlean House Icon Y.png">
   <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css')?>">
   <script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
   <title>User Dashboard</title>
   <style>
  
         @media (max-width: 576px) {
           nav .container {
             width: 100%;
           }
         }

         /* .row{
            border-style: solid;
            border-radius: 25px;
         } */

         .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl {

         }
         .rounded-circle {
            border:2px solid rgb(65, 221, 104);
         }
         
         .active {
            /* text-decoration: underline; !important; */
            padding-bottom: 3px;
            border-bottom: 1px solid green;
         }
         .display-5 {
         font-weight: 300;
         font-size: 2.5rem;
         line-height: 1.1;
         }
         .lead {
          font-size: 1.00rem;
          font-weight: 300;
        }
        .checked {
            color: orange;
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }

        .borderless {
            border: 0 none !important;
        }

        hr.style8 {
            border-top: 1px solid #8c8b8b;
            border-bottom: 1px solid #fff;
        }
        hr.style8:after {
            content: '';
            display: block;
            margin-top: 2px;
            border-top: 1px solid #8c8b8b;
            border-bottom: 1px solid #fff;
        }

       

        #wrapper {
            height:100%;
            width: 100%;
            margin: 0;
            padding: 0;
            border: 0;
        }
        #wrapper .tdboy {
            vertical-align: middle;
            text-align: center;
        }

        div.card-dash:hover {
            background-color:#FFEBCD;
        }

        .fixed-top2 {
            /* position: fixed; */
            /* top: 0; */
            right: 0;
            left: 0;
            z-index: 1030; 
            width: 100%;
        }

        nav {
            border-color: yellow;
            border-style: solid;
            border-width: 1px;
            background-color: white;
            font-size: 10px;
        }
        body  {
            background-color: #F2F3F5;
        }

        .white {
            background-color: white;
            padding: 0;
        }

        .pure-white {
            background-color: white;
        }

        .jumbotron {
            padding: 6rem 2rem;
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fefcea+0,f1da36+100;Gold+3D */
            background: #fefcea; /* Old browsers */
            background: -moz-linear-gradient(top, #fefcea 0%, #f1da36 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, #fefcea 0%,#f1da36 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, #fefcea 0%,#f1da36 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefcea', endColorstr='#f1da36',GradientType=0 ); /* IE6-9 */
        }

        .grey-bg {
            background-color: #F3F3F5;
        }

        .card-service{
            font-size: 10px;
        }

    
        



       
​


   </style>
</head>
<body>

