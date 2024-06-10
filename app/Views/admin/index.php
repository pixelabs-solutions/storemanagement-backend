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

    .dropdown_logout {
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
    <div class="d-flex w-100 g-5 mx-3  align-items-center">
      <div class="w-100 justify-content-start d-flex gap-1 align-items-center ">
        <svg width="180" viewBox="0 0 260 124" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <rect width="260" height="124" fill="url(#pattern0_137_4)" />
          <defs>
            <pattern id="pattern0_137_4" patternContentUnits="objectBoundingBox" width="1" height="1">
              <use xlink:href="#image0_137_4" transform="matrix(0.002 0 0 0.00419355 0 -0.483871)" />
            </pattern>
            <image id="image0_137_4" width="500" height="500" xlink:href="data:image/png;base64,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" />
          </defs>
        </svg>
        <p class="h3 pt-5">Admin Page</p>
      </div>
      <div class="nav-item  text-end w-100 justify-content-end text-end">
        <!-- <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="" aria-label="Open user menu"> -->
        <button onclick="LogoutDisconecting()" class="btn btn-primry">logout</button>
        <!-- <a href="#" class="dropdown-item" onclick="LogoutDisconecting()">Logout</a> -->
        <!-- </a> -->
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
                    <image id="image0_272_50" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAABflJREFUWIXtVm1sHFcVPWdm/ZGPRXidgh0+FKqURlCBVLVAFUjSgFQ1aRKapEaqlCZOFIztzJu4JbUEBeYHH3Uhu96ZXUd2AJeSlrJRUVPRCAohCUloaZWIj7YUlNIWIXkD8hbVqe21Pe/wx4uM8TYOAgmk3l+jd++559x7R/c94E37X7bBwcH6fD6/+L/JwWqOIAgSqVTqxwCutNZu2rt372/mmzQIAqexsfGAtbamubl5d0tLS1wt1qnmaGxsTAO4SPJux3GeCMNw83zIJbGxsfGApOUk31EsFh/q7++vuSwBURTtkvRxANs8zzsM4CYA38hms5+/FHkURaGk9wO4M5lMbgKwqFwuF4IgqJ2XgCiKVkr6suu6m4wxrwGAMebXJCOS2yVVHVsYhncBuLGurm49gIcuXrxoSqXSZgBIpVI/GBwcrH9DAfl8/l0Avu84zh2dnZ3nK+e5XO4GSfdYa7eSVDUBJE8DeFu5XF4Vx/EnAOxYsmTJ6rq6uhYAr4+MjBxJp9ML/glT+Uin0wsSicQpkg96npepnPf29n7AcZwfAagn+SSAp0nm9uzZMzzdsRWS2gFcB0DTOa8jebukH5ZKpckgCGyhUHCLxeJ3ACwtl8sb9u3b9/o/BEhiGIaHHMeZrK2t3T06Orqoq6vrb9lstpNkN8n9kp6UtIjkbQBaAPgAGgB8AUDWWvsTkpbkx0h+VtLbJW3zff/hSjGFQsEdGho6SPIqAOuNMa9xenbdJG9dvHjxmpGRkW8DeJHkaUm5OI5XdXV1Dc1sWxRFayT9FMCzkjb6vv+nmf5MJtOcSCSOSXovgJ3GmAcqviAInFQq1Qfgg3Ec38woim6SdJDkR6y1t5DsALAKwFlJrb7vn55FvlTSowCeSyaT7Tt27ChHUeRJOuP7/tkZcVsk3Q3gnZK+5Pv+N2d2olgsPkey35GUBFAr6X0knyG5juTNAM7PJu/v76+RdFxSwRjTOjo6mgjD8DCAu0g+FkXR0kqstXYhgOettWtJ3htFUUdl3BcuXOiT9Ozw8HBUGcFqAA9L+qq19nHXdZ+W9Dnf9wdmVb9C0hPGmHdnMpllruseAfDS2NjYtvr6+ntIriW5F8AVkrIAPmWMeSoMw4MAdgG4E8B7ACyrq6vb2tbWNukAgDHmZBzHN5Dc5bruWQBvIfkrzLLa2toXAbwahuEp13XPSTpSKpU2d3d3j/i+303ysKSTAHKSdhpjnpqGvgDgEQBtAK4C0NLW1jYJzNgDXV1dL5fL5ZUA7pgGTM4W0NbWNjk2NvZRkr3W2jW+738xCAJb8Xuedx+AGyXFJD85Y/EskPTHqampa5uamjYYY8oVzJxbLQzDY5L2+75/dC7/payvr69hampqAMDVkm4neZ+k+33fL8yOTcyVgOQvJa0GcDSbzd5KcgDA+Zqamk3t7e1/uZSAjo6OVwHcFobhbpInAExMTEw8PldstdvweyR3ZrPZbSS/JWk7gFcmJibunc/7IJfLNUqiMeYgyU4Aw5XN9y/FVksShmEBwDpr7TrHcX4H4GcAJgDUJpPJ61tbW8ffAPuApKZEIrErjuNxAC8bYxbNFVv1PQDg9wCyNTU1fwBwHMChUql0PYDkyMjIgTAMr5gNyGaz1+Tz+eVNTU2tJE/EcXxWUlrSmWokVQXEcfwIgNY4jl8AUCiVSl9vaGgYAPBnSeMADs3GuK67LI7jXxSLxXbP875GMiC5wXXdrmo8VUcAAD09PcmFCxf+XFJW0iqSy13XXWet3SjpuwDOANgiyXMc55zneY9mMpkrXde9X5JIrgCw1Rhz6t8SAABhGH4IQB+AZtd1r7bWrpU0QHKLpE9LeonkUQAPAjgtaT/JfQBWktzueV7V9s9LAACk0+lUIpF4HsBjADZKWu84zpCkEwDOkTwh6RoAnwHwV5KD4+PjX6n251+2AADI5XLXWmuzJE9OTU3lXdc9LukZkhMARiW94jjOb4eHh48FQTA137zzFgAAvb29H3Yc5+g0rscY03M5+P+IZTKZt868dt+0/3v7O4Iz4EjJ7vnKAAAAAElFTkSuQmCC" />
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
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                      </svg>
                    </span>
                    <input type="text" id="sms_transaction_w_search_input" value="" class="form-control border-0 " placeholder="Order search" aria-label="Search in website">
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
                  <th class="sms_mu_td" data-i18n="transction_page.transaction_th.order_date">Registered Since</th>
                  <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">X Code</th>
                  <th class="sms_mu_td" data-i18n="transction_page.transaction_th.sum">Actions</th>
                  <th></th>
                </tr>

                <?php
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
                    <td><?php foreach ($customer_data['business_name'] as $business_name) {
                          if ($business_name['user_id'] == $customer['id']) {
                            echo $business_name['meta_value'];
                          }
                        } ?></td>

                    <?php foreach ($customer_data['users_x_code'] as $users_x_code) {
                      if ($users_x_code['user_id'] == $customer['id']) {
                        $user_x_code = $users_x_code['meta_value'];
                      }
                    } ?>


                    <td>

                      <svg fill="none" id="<?php echo $user_x_code; ?>" onclick="copyId(this.id)" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <clipPath id="clip0_17_17330">
                          <path d="m0 0h24v24h-24z" />
                        </clipPath>
                        <g clip-path="url(#clip0_17_17330)">
                          <path d="m15 1h-11c-1.1 0-2 .9-2 2v13c0 .55.45 1 1 1s1-.45 1-1v-12c0-.55.45-1 1-1h10c.55 0 1-.45 1-1s-.45-1-1-1zm4 4h-11c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2v-14c0-1.1-.9-2-2-2zm-1 16h-9c-.55 0-1-.45-1-1v-12c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1z" fill="#000" />
                        </g>
                      </svg>


                    </td>
                    <td>

                      <svg width="28" height="32" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.45 1.10625C8.7875 0.425 9.48125 0 10.2375 0H17.7625C18.5188 0 19.2125 0.425 19.55 1.10625L20 2H26C27.1063 2 28 2.89375 28 4C28 5.10625 27.1063 6 26 6H2C0.89375 6 0 5.10625 0 4C0 2.89375 0.89375 2 2 2H8L8.45 1.10625ZM2 8H26V28C26 30.2062 24.2062 32 22 32H6C3.79375 32 2 30.2062 2 28V8ZM8 12C7.45 12 7 12.45 7 13V27C7 27.55 7.45 28 8 28C8.55 28 9 27.55 9 27V13C9 12.45 8.55 12 8 12ZM14 12C13.45 12 13 12.45 13 13V27C13 27.55 13.45 28 14 28C14.55 28 15 27.55 15 27V13C15 12.45 14.55 12 14 12ZM20 12C19.45 12 19 12.45 19 13V27C19 27.55 19.45 28 20 28C20.55 28 21 27.55 21 27V13C21 12.45 20.55 12 20 12Z" fill="#A30505" />
                      </svg>



                    </td>
                  </tr>
                  <!-- <tr class="sms_mu_spacing_div"></tr> -->

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
        <?php include('signup.php'); ?>
        <button type="button" id="sign_up_btn_close" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
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
    document.getElementById('sign-up-btn').addEventListener('click', function() {
      document.getElementById('edit-modal-full-width').style.display = "block"
    });
    document.getElementById('sign_up_btn_close').addEventListener('click', function() {
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