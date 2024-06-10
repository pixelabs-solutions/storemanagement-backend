<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign in - Store Management System</title>
  <!-- CSS files -->
  <link href="../assets/dist/css/tabler.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-flags.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-payments.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-vendors.min.css?1695847769" rel="stylesheet" />
  <link href="../assets/dist/css/demo.min.css?1695847769" rel="stylesheet" />

  <style>
     @import url('https://rsms.me/inter/inter.css');

:root {
  --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
}

body {
  font-feature-settings: "cv03", "cv04", "cv11";
}
  @media only screen and (max-width:1000px) {
    .sms_mu_table {
      width: 900px !important;
      border: 0 !important;
    }
  }
  .dropdown_logout{
         position: absolute;
        top: 49px;
        margin-left: 15px;
    }

  /* .s {
    background-color: #F2F2F2 !important;
  } */
  .sms_transaction_w_status.sms_transaction_w_cancelled {
    background-color: #B50E0E;
    border-radius: 25px;
    color: white;
    padding: 15px;
  }

  .overflow_div {
    height: 100vh;
    overflow: scroll;
  }

  .Sms_mu_popoup_admin {
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    width: 100%;
    z-index: 2000;
    background-color: white !important;
  }

  .sms_transaction_w_status.sms_transaction_w_approved {

    background-color: #4987D8;
    border-radius: 25px;
    color: white;
    padding: 15px;

  }

  .sms_mu_table {
    border-spacing: 0 50px !important;
    width: 100%;
    /* margin: 0 2% !important; */
  }

  .sms_m_form_select {
    border: none;
    border-radius: 0.8rem;
    background-color: #F0F0F0;
    min-width: 250px !important;
  }

  .sms_mu_thead,
  .sms_mu_tr,
  .sms_mu_td {
    text-align: center;
  }

  .sms_mu_tr {
    background-color: white !important;
    height: 70px;
    border-radius: 20px !important;
    overflow: hidden;
    margin: 0 20px;
    /* border-bottom: 10px solid #F2F2F2 !important; */
  }

  .sms_mu_spacing_div {
    height: 10px;
    background-color: #F2F2F2;
    width: inherit;
  }

  svg {
    cursor: pointer;
  }

  .sms_mu_th {
    background-color: #a8c3e7 !important;
    height: 50px;
  }

  td:first-child {
    /* border-left-style: solid; */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  td:last-child {
    /* border-right-style: solid; */
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
  }

  th:first-child {
    /* border-left-style: solid; */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  th:last-child {
    /* border-right-style: solid; */
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
  }

  .table-spacing {
    border-spacing: 5px;
  }

  .notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 14px;
    background: green;
    /* Gradient background */
    color: #fff;
    display: none;
    z-index: 9999;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    /* Adding shadow for depth */
  }

  .notification.error {
    background-color: #c0392b;
    /* Red color for error */
  }
</style>
</head>

<body class="sms_mu_testing ">
<header class="navbar navbar-expand-md sticky-top d-lg-flex d-print-none sms_mu_header" style="background-color: #F2F2F2;">
         <div class="d-flex flex-row w-100 justify-content-between align-items-center px-3">
            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sms_header_page_name" id="sms_header_page_name"></div>
            <div class="d-flex gap-4">
               <!-- <button class="rounded-pill border-0" style="background-color:#4987D870; " id="sms_mu_desktop_eng_btn">Login to the mailing system
                  →</button>
               <button class="rounded-pill border-0" style="background-color:#4987D870; " id="sms_mu_desktop_heb_btn">כניסה למערכת הדיוור
                  →</button> -->

               <div class="navbar-nav flex-row order-md-last gap-2">
                  <div class=" d-flex align-items-center">
                
                     <!-- <button id="switchBtn" class="border-0 rounded-circle" onclick="switchLanguage()">

                        <img id="languageIcon" src="/assets/dist/img/israel.png" alt="English Flag" height="24px" width="24px" class="rounded-circle">

                     </button> -->
                     <select id="lang-select" style="padding: 5px; font-size: 14px;" class="lang_select">
                        <option value="en">
                      <span class="flag flag-country-us"> English</span>
                           
                        </option>
                        <option value="he">
                        <span class="flag flag-country-il"></span>
                           עברית
                        </option>
                     </select>
                  </div>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="" aria-label="Open user menu">
                        <span class="avatar rounded-circle avatar-sm" style="background-image: url(./static/avatars/000m.jpg)">
                           <img onclick="FunLogoutProfile()" src="/assets/dist/img/profile.png" height="100%" width="100%" alt="">
                        </span>
                  </div>
            
                  </a>
                  <div id="PopoupLogout" class="dropdown-menu dropdown-menu-end dropdown-menu-arrow dropdown_logout" bis_skin_checked="1" style="display: none ;">
                        <a href="#" class="dropdown-item" onclick="LogoutDisconecting()">Logout</a>
                     </div>
                   
               </div>
            
            </div>

         </div>
      </header>
<div class="p-3">


      <div class="row g-2 mb-5 flex-row-reverse sms_mu_for_rtl_row_cards mt-3">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100 " style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2  sms_mu_for_rtl_row_cards">
                        <div class=" col-8 ">
                            <h3 class=" text-muted" data-i18n="dashboard.card_product.card_title"> New Products </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_20)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_20)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#F51975" fill-opacity="0.29" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_20" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_20" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_20" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_20" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_20" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_20" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAe9JREFUWIXtlrFuE0EQhr85Ow6yBOEspUuBeAGQ0pqOB0B+AipT7XGu0lBYokljGeFz43dIHVFAgZSSFlIFJYIO2VFoLNu7Q3FnyYV15zs7pvEvbbP6Z/ebmd29g512+s+SooHGmEPgBUClUvna6XT+FFnHKxIUBMFbEbkWkTMROZtOpzdBEJitABhjGsAH4LNzru6cq4vIF+BjGIav7h1ARE6A7+PxuBFF0UUURRe+7zeAS+fcyb0DAM+AT4PBYDqfaLfbE+AceL4NgH3gbsn8HfAg72KZt8AYc+R53jtVnXubwLdkLOo4GQMAEVHP8953u93faeuXMwlFjlX1DfALmABXgA+8XGK/SuYrqnpkrT0H1gMAagDW2nq/379ewU8Yhk+ccz9V1c/yZp4BEakBeJ43WmVzAGvtcDF2LYAki1mv1/u7KkDinYnI+hUg7vctoKsCJN7bjbSA+AwMc2w+12iTLVi5/4sAmzqERQGGxO1bD0BVC7VAREYkV3gtgKIVUNURG6iAAAdJNrkkIkPgMRnPfSpAs9l8BJSTbHIpiSkbYx6m+VKf4mq16jvnUNW9Vqv1NA/AbDbbExFKpVKN5V/PbADiEiIip9ba0zwAInHlrbUHab5UAGvtDxF5TfwPkFuqOgEui8TutNPW9A9LS7Dauv/KAgAAAABJRU5ErkJggg==" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2  sms_mu_for_rtl_row_cards mt-2">
                        <div class=" col-8 ">
                            <h3> 500</h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <!-- <svg width="40" height="40" viewBox="0 0 58 58" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_20)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_20)"
                                        shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#F51975" fill-opacity="0.29"
                                        shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_20" x="0" y="0" width="58" height="58"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_272_20" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_20"
                                            result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_20" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_272_20" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_20" width="32" height="32"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAe9JREFUWIXtlrFuE0EQhr85Ow6yBOEspUuBeAGQ0pqOB0B+AipT7XGu0lBYokljGeFz43dIHVFAgZSSFlIFJYIO2VFoLNu7Q3FnyYV15zs7pvEvbbP6Z/ebmd29g512+s+SooHGmEPgBUClUvna6XT+FFnHKxIUBMFbEbkWkTMROZtOpzdBEJitABhjGsAH4LNzru6cq4vIF+BjGIav7h1ARE6A7+PxuBFF0UUURRe+7zeAS+fcyb0DAM+AT4PBYDqfaLfbE+AceL4NgH3gbsn8HfAg72KZt8AYc+R53jtVnXubwLdkLOo4GQMAEVHP8953u93faeuXMwlFjlX1DfALmABXgA+8XGK/SuYrqnpkrT0H1gMAagDW2nq/379ewU8Yhk+ccz9V1c/yZp4BEakBeJ43WmVzAGvtcDF2LYAki1mv1/u7KkDinYnI+hUg7vctoKsCJN7bjbSA+AwMc2w+12iTLVi5/4sAmzqERQGGxO1bD0BVC7VAREYkV3gtgKIVUNURG6iAAAdJNrkkIkPgMRnPfSpAs9l8BJSTbHIpiSkbYx6m+VKf4mq16jvnUNW9Vqv1NA/AbDbbExFKpVKN5V/PbADiEiIip9ba0zwAInHlrbUHab5UAGvtDxF5TfwPkFuqOgEui8TutNPW9A9LS7Dauv/KAgAAAABJRU5ErkJggg==" />
                                </defs>
                            </svg> -->
                            <span style="color:#40A826"> 10% </span>
                            <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                    <!-- <div class="row g-2 mt-2">
                        <div class="col-6">
                          
                        </div>
                        <div class="col-auto ms-auto">
                           
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2 sms_mu_for_rtl_row_cards">
                        <div class="col-8">
                            <h3 class="text-muted" data-i18n="dashboard.card_arrivals.card_title"> New Arivals </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_30)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_30)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#D9D9D9" fill-opacity="0.08" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_30" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_30" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_30" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_30" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_30" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_30" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAA05JREFUWIW9lk9oJFUQh7/3uo1ZMOAOgv8FFfWgIGvMzYOuisriwYviIoJkMXuYns4cJCt4aFjiKijDzEvUBCEKC95lES8romtcUU9eRE+CrLqHzBriJhPz+ufBJHbGyfRLNKnTdNWrel9XVVeNYZ/EOfegpFngGuCNWq32KoDdLwDgNHAHcBCYbDabw/sGkGXZgKRrizpr7Y37CbAq6eOC6vuVlZWzAPF+ALRarUPAQ8BxYHF5efnMxMTEHwAmJECWZbZSqZwAnpD09eDg4CtjY2OXQ3ynp6ev8t5/I+n9NE1PdduDMlCpVEaBSQBjzAOrq6seeCnE13vvgJ/b7fbrveyhJRgpPki6P8Sp1Wo9Cxzx3t+bZVne60xoE/7W9Xz31NTUo/0cGo3GbcDbwAv1ev2X7c6V9oBz7jlJbwEngZuMMV9JGgCakt5Z74c/iz4zMzNXdDqdc8B8rVar94vftwTOuaOSpiU9labp2aKt0Wh8GkXRB51OZ77ZbB5N0/THDVun0zkJHBgaGnq57AW3zUCz2TxmjHkzz/Mnx8fHP+t1JsuygUqlcgoYBWaBR4DfgfustSPVavWHXQE4545Les0YcyRJki/KgjjnRiW9W1D9lCTJrcYYlfnGAHNzc4NLS0u1PM/vtNa2JR0DHk+S5HxZAABJF7tUN8/Ozh4ASmdFDLC4uDhljBk1xiAJSc+naRp0OYD3/vMoii4AN6yrPgwdVBbAGLPlk7LWXh96OUC9Xr9kjBkBTgAvLiwsPBPqu/EVnAduWf+tPM/ndwIAkCTJBaDntANwzr0n6Z6CarFWqx2OAbz3Y1EU/QrcLul0mqbndgpQJpLuAoYLqjasZ6Ber18C0v/70jKmTYAyaTQaV1trny7qoij6rlqtfrnTCwtiggHiOL5O0kxR571vAJsAzrnDkjZ3i6R2mqbflsYOAegl3UNG0kfAlQX7J8DDfUIIAreh9750ovHvFAfZgwDiOA4B2JXEAM65xyRNFg3W2qxarZ6BvzNgzNa1Ial7j3T/4Siz/wOQ5/lBY8zwltN5XulHHrBogrK2UYKedBsSWIJdlckCWGv7Ou95E0rasyYrk41tuOcZ2O4lgzKw5z1QBrC2tvafAbbL8l9Ss2eLdNsaugAAAABJRU5ErkJggg==" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2 sms_mu_for_rtl_row_cards mt-2">
                        <div class="col-8">
                            <h3> 1457 </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <span style="color:#40A826"> 10 % </span>
                            <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2 sms_mu_for_rtl_row_cards ">
                        <div class="col-8 ">
                            <h3 class="text-muted" data-i18n="dashboard.card_customers.card_title">New Customers </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_40)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_40)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#56AEEE" fill-opacity="0.2" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_40" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_40" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_40" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_40" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_40" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_40" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAABSRJREFUWIW1l22IXFcZx3//c++6SZsE9sWF2kKU1MbGYkISMAURbKl9oZaCaEvF1n5oCiZzbiadpsFWM5EWUwuZnTPjQjCSD1WKa/IhGj/kQynJBwttYhtLXyDal2gkzctu0inUXWfO44e9i7OTrLtrdx+4zDnP+T/3+d1nzj3nHtFhIYQNwHPAGklnzWzfyMjIrnK53OzUzoe59k6lUrkGOAhUgf4Y4x1mdltfX9/WhUgOkLZ3kiS5Fzjkvd+fu06GELaY2a+Bny8EwJQKSLpW0vvtvlar9R5w3UIkvwwgxngqxnhDB9RKYArUggGY2UFJdw4ODq4EKJfLzjm3XdILCwWgTkcI4UHgWWA/sBqIwO3e+7EFAwghLDOz+yXdliddAXwCXA2MACeAY8BvvPcn5hPAhRBWA39xzn1D0v4kSe4aGRnp9t4v8d4L+JKkpyU1gEPVarU8nwAKIbxsZkNZlj0/k7her/fFGI/FGL+7ZcuWV+cDwAHrR0dHfzsb8ebNmy8Ah51z6yd9+/btWzSd/n+NtQOk5XJ5fDYAuY0BXeVyOQ0hvNhoNEaq1er3O0UhBN9oNC6GEA6Y2WWTvR1gMmBVrVb79pVE9Xq9r1ar/bDd19PT8yhgkrY65+7qjDGzu83sB8DyEMJ9MwIA683sniuJzOwLZvbwZF9Sj6QfS9puZqUY497LbuzcLyVtizFulfTsnj17rpoJYNZmZt7MDpjZrcAbWZa92KkpFAq/M7OGc26lpD+Nj48/Pm8AgJIkGQJKZrZtOlGMMQN+KulpM9tcr9eXzwfATWa2I8ZYMrO9WZadnE5YLBZfB/4QY3xYUt3Mdn0qgFqtdo+ka8zsFeB2ST+bKaarq+sp4MFms3nQzDYMDg5+vX1cIYSzSZJ8pdVqfRO41Xv/ULugUqmsSZLkO8D3gH8DLwM3Av80sz/OBlzSfUACXABWmNkQgHPuaAq80Gq1fiHpqJlNCQwhdAMvAfslHW4b+nN+43WzAQD+2tY+L2ldjLHLzHamS5cufaLRaDxnZs8AB9qjms3m1WmaRu/9I7NMNCcLIfx3hcq34Sl/wfDwcHLmzJl3mShdnOf8XYDS6UYrlcqN586d+3ur1VrtnPuWpL0xxq9J+lQgzjmZ2VHgziRJjk/7FqRp+kyM8ZZisXjRzN4BPmNmH2dZdlzSckk7JH0yOjr6mqRHJW1btmzZmzHGv0na4Zy7P9cmQFlST5Zlx2OMl4APvfdHNm3a9PG0APkGMmU8TdPJSbfVzBYBvre393PAvcD1jUbjq0mS3AIsNbPC7t27FwOPS1oEFPIKrCWfxHQmmMnMbF3++4GkD4Avd3d3N/LqvAd8VtJA3laxWPwXEwvXpB4m9pxjcwJIksQAAyYr8FZeoVUbN278CLgK+MjMemOMPZIMuLhz584uYLmkLjN7O4df65ybWwVarZaAk8Ca4eHhRNLbkvqBWK1WB4CLAM65Xudcr5lJ0oX+/v4vAqeY+MachF47NjZ2/P+pwCXgw9OnT99gZm/k1WikaXotcJaJFW6xmS2WdH2M8ZyZXQeMA6vGx8ffHBoaWgFcKpVK5+cEkJuAV9M03ZBl2UlJNUkHBgYGTjjntgOnzOxXkurAPyT9ZMmSJUeAI8CTpVLpfLPZvBmY8i057TpwRQLpeTOr1mq1Y4VCof2seCi/Ju2BtnYBoFqt3iTpSeCxzqcCoF6v3x1j/D1XOKzkdth7f0cI4RHgR8Dn5wLPxPFul/d+T7vzP0SLQX5uXo/WAAAAAElFTkSuQmCC" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2 sms_mu_for_rtl_row_cards mt-2">
                        <div class="col-8">
                            <h3> 300</h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <span style="color:#B50E0E"> 10% </span>
                            <svg width="18" height="18" viewBox="0 0 34 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.34266 26.723C3.52496 26.8559 2.75435 26.3008 2.62146 25.4831L0.455822 12.1579C0.322929 11.3402 0.878071 10.5696 1.69577 10.4367C2.51347 10.3038 3.28408 10.8589 3.41697 11.6766L5.34198 23.5212L17.1866 21.5962C18.0043 21.4633 18.7749 22.0185 18.9078 22.8362C19.0407 23.6539 18.4855 24.4245 17.6678 24.5574L4.34266 26.723ZM33.5894 3.37936C24.9245 7.08173 19.9574 8.70925 17.0673 9.48379C15.6143 9.87318 14.6967 10.0441 14.1286 10.1517C13.8205 10.21 13.7145 10.2328 13.6656 10.2475C13.6281 10.2588 13.8847 10.1945 14.1074 9.92073C14.306 9.67649 14.326 9.44074 14.3054 9.55321C14.298 9.59317 14.2904 9.64396 14.2745 9.7502C14.2599 9.84685 14.2411 9.97026 14.2157 10.1136C14.11 10.7095 13.9065 11.5538 13.4025 12.7997C12.4079 15.2583 10.2371 19.2924 5.3191 26.1192L2.88496 24.3657C7.74014 17.6261 9.75583 13.8143 10.6215 11.6746C11.0476 10.6212 11.1929 9.9782 11.2618 9.58951C11.2801 9.48673 11.2941 9.39542 11.3078 9.30394C11.3201 9.22206 11.3364 9.1113 11.3547 9.01149C11.3854 8.84441 11.4641 8.41616 11.78 8.02782C12.1198 7.60993 12.552 7.44991 12.7995 7.37529C13.0356 7.30411 13.3239 7.25074 13.5704 7.20405C14.1115 7.10157 14.9444 6.94686 16.2907 6.58605C18.9992 5.86016 23.8259 4.28874 32.4106 0.620639L33.5894 3.37936Z" fill="#B50E0E" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card pt-2 h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row g-2 sms_mu_for_rtl_row_cards">
                        <div class="col-8 ">
                            <h3 class="text-muted" data-i18n="dashboard.card_transaction.card_title"> Total Transiction
                            </h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g filter="url(#filter0_d_272_50)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_50)" shape-rendering="crispEdges" />
                                    <circle cx="29" cy="25" r="25" fill="#EE5656" fill-opacity="0.2" shape-rendering="crispEdges" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_272_50" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_50" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_50" result="shape" />
                                    </filter>
                                    <pattern id="pattern0_272_50" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_272_50" transform="scale(0.03125)" />
                                    </pattern>
                                    <image id="image0_272_50" width="32" height="32" xlink:href="data:image/png;base64,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" />
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="row g-2 sms_mu_for_rtl_row_cards mt-2">
                        <div class="col-8">
                            <h3>100</h3>
                        </div>
                        <div class="col-auto ms-auto">
                            <span style="color:#40A826"> 10 % </span>
                            <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826" />
                            </svg>
                            <p style="font-size:10px;">last 7 days </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="sms_transaction_w  p-0">
  <div id="notification" class="notification"></div>
  <div class=" col-12 mt-5">
    <div class="row row-cards justify-content-sm-between gap-sm-3 gap-2 gap-lg-0 bg-white p-3 m-0 rounded-3">
      <div class="col-sm-5 col-lg-12 m-0 d-flex flex-column flex-sm-row justify-content-between ">
        <div class="card-body-rounded sms_m_search_input mb-3 mb-sm-0">
          <div>
            <form id="sms_customers_w_search_form" action="./" method="get" autocomplete="off" novalidate>
              <div class="input-icon border-bottom border-black">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                  </svg>
                </span>
                <input type="text" id="sms_transaction_w_search_input" value="" class="form-control border-0 "
                  placeholder="Order search" aria-label="Search in website">
              </div>
            </form>
          </div>
        </div>

        <div class="d-flex">
          <label for="statusSelect" class="form-label"></label>
          <button class="btn" id="sign-up-btn">Add User</button>
        </div>
      </div>

    </div>
    <div class="card-x mt-3">
      <div style="overflow-x: auto">
        <div class="table-responsive">
          <table class="sms_mu_table" id='sms_transaction_w_transaction_table'>
            <tr class="sms_mu_th">
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_no">Name</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.customer_name">Email</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.status">Phone</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_date">Business Name</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_date">Status</th>
              <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">X Code</th>
              <th></th>
            </tr>

            <?php
            // var_dump($customer_data);
            foreach ($customer_data['data'] as $customer) {
              ?>
              <tr class="sms_mu_spacing_div"></tr>

              <tr class="sms_mu_tr">
                <td><?php echo $customer['name']; ?></td>

                <td><?php echo $customer['email']; ?></td>

                <td><?php foreach ($customer_data['users_phone'] as $customer_phone) {
                  if ($customer_phone['user_id'] == $customer['id']) {
                    echo $customer_phone['meta_value'];
                  }
                } ?></td>

                <td><?php foreach ($customer_data['business_name'] as $business_name) {
                  if ($business_name['user_id'] == $customer['id']) {
                    echo $business_name['meta_value'];
                  }
                } ?></td>

             <td><?php foreach ($customer_data['users_configuration_status'] as $users_configuration_status) {
              // echo json_encode($customer['id']); 
                  if ($customer['id'] == $users_configuration_status['user_id']) {
                    echo "API Connected";
                  } 
                } ?></td>

                <?php foreach ($customer_data['users_x_code'] as $users_x_code) {
                  if ($users_x_code['user_id'] == $customer['id']) {
                    $user_x_code = $users_x_code['meta_value'];
                  }
                } ?>


                <td>

                  <svg fill="none" id="<?php echo $user_x_code; ?>" onclick="copyId(this.id)" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <clipPath id="clip0_17_17330">
                      <path d="m0 0h24v24h-24z" />
                    </clipPath>
                    <g clip-path="url(#clip0_17_17330)">
                      <path
                        d="m15 1h-11c-1.1 0-2 .9-2 2v13c0 .55.45 1 1 1s1-.45 1-1v-12c0-.55.45-1 1-1h10c.55 0 1-.45 1-1s-.45-1-1-1zm4 4h-11c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-14c0-1.1-.9-2-2-2zm-1 16h-9c-.55 0-1-.45-1-1v-12c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1z"
                        fill="#000" />
                    </g>
                  </svg>

                  
                </td>
              </tr>
              <tr class="sms_mu_spacing_div"></tr>

              <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div>

  <script>
    function copyId(id) {
      // Create a temporary input element
      var tempInput = document.createElement("input");
      // Set the input value to the id
      tempInput.value = id;
      // Append the input to the body
      document.body.appendChild(tempInput);
      // Select the input value
      tempInput.select();
      // Copy the selected text to clipboard
      document.execCommand("copy");
      // Remove the input from the body
      document.body.removeChild(tempInput);
      // Alert the copied id (optional)
      alert("Copied ID: " + id);
    }
  </script>
  <div id="edit-modal-full-width" class="Sms_mu_popoup_admin">
    <div class="overflow_div">
      <?php include ('signup.php'); ?>
      <button type="button" id="sign_up_btn_close" class="btn-close position-absolute top-0 end-0 m-3"
        data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
  </div>
</div>
<script>
        function FunLogoutProfile() {
               var div = document.getElementById('PopoupLogout');
               if (div.style.display === "none") {
                  div.style.display = 'block';
                  console.log("Display set to block");
               } else {
                  div.style.display = 'none';
                  console.log("Display set to none");
               }
            }
  document.getElementById('sign-up-btn').addEventListener('click', function () {
    document.getElementById('edit-modal-full-width').style.display = "block"
  });
  document.getElementById('sign_up_btn_close').addEventListener('click', function () {
    document.getElementById('edit-modal-full-width').style.display = "none"
  });
  function LogoutDisconecting() {
               fetch('/authentication/logout', {
                     method: 'GET',
                     headers: {
                        'Content-Type': 'application/json'
                     },
                     credentials: 'same-origin' // Include cookies in the request
                  })
                  .then(response => {
                     if (response.ok) {
                        // Handle successful logout, e.g., redirect to login page
                        window.location.href = '/authentication/login'; // Change this to your login page
                     } else {
                        // Handle errors
                        console.error('Logout failed:', response.statusText);
                     }
                  })
                  .catch(error => {
                     console.error('Error:', error);
                  });
            }
</script>
	

		<!-- Tabler Core -->
		<script src="../../../assets/dist/js/tabler.min.js?1684106062" defer></script>
		<script src="../../../assets/dist/js/demo.min.js?1684106062" defer></script>
<script src="../../../assets/dist/js/translation.js"></script>
</body>

</html>