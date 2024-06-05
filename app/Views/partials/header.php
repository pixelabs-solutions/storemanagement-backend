<!doctype html>



<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
   <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   <title>Store Managment System</title>
   <!-- CSS files -->
   <link rel="stylesheet" type="text/css" href="assets/dist/css/tabler.min.css" />
   <link href="assets/dist/css/tabler-flags.min.css?1695847769" rel="stylesheet"/>
   <link href="assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
   <link href="assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
   <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
   <!-- for select -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

   <!-- old css links  -->

   <!-- <link href="./dist/css/tabler.min.css?1684106062" rel="stylesheet" />
   <link href="./dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
   <link href="./dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
   <link href="./dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
   <link href="./dist/css/demo.min.css?1684106062" rel="stylesheet" /> -->

   <style>
      @import url('https://rsms.me/inter/inter.css');

      .sms_mu_overDropdown .navbar .navbar-nav .nav-link {
         display: none !important;
      }

      .choices__list--multiple .choices__item {
         background: #b7adad !important;
         /* color: black; */
         border: none !important;
      }

      .choices[data-type*=select-multiple] .choices__inner,
      .choices[data-type*=text] .choices__inner {
         cursor: text;
         overflow: auto;
         height: 100%;
      }


      .span_div {
         /* background-color: transparent; */
         right: 4% !important;
         position: absolute;
         top: 30%;
         /* display: none; */
      }

      .choices {
         position: relative;
         margin-bottom: 0px !important;
         font-size: 16px;
         height: 100% !important;
      }

      .choices__inner {
         padding: 11px 30px;
         background-color: transparent !important;
         border-radius: 12px;
         height: 100% !important;
         scrollbar-color: transparent transparent !important;

      }

      :root {
         --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }

      body {
         background-color: #F2F2F2;
         font-feature-settings: "cv03", "cv04", "cv11";
      }

      .rtl {
         direction: rtl;
      }

      * {
         scrollbar-color: #4987D8 #DEDEDE;
         scrollbar-width: thin;


         /* For WebKit browsers (Chrome, Safari, etc.) */
         /* Adjust the width and other styles as needed */
         ::-webkit-scrollbar {
            width: 1px;
            border-radius: 20px;
            /* Adjust border radius as needed */
         }

         /* Adjust scrollbar thumb style */
         ::-webkit-scrollbar-thumb {
            background-color: #4987D8;
            border-radius: 20px;
            /* Adjust border radius as needed */
         }
      }

      .rtl .avatar {
         margin-left: 10px;
      }

      .choices__input {
         background-color: transparent !important;
      }

      .nav-item {
         border-left: 4px solid transparent;
         border-radius: 20px;
         padding: 5px;
         margin-left: 4px;
      }


      .nav-link-title {
         color: #4987D8;
      }

      #sms_w_dropdown_title {
         border-left: 4px solid transparent;
         border-radius: 20px;
         padding: 10px;
         padding-left: 14px !important;

      }
      .dropdown_logout{
         position: absolute;
        top: 49px;
        margin-left: 15px;
    }


      .dropdown-item {
         /* border-left: 4px solid transparent; */
         border-radius: 20px;
         /* padding: 10px; */
         padding-left: 14px !important;
         margin-left: 4px;
         width: auto;
         /* color: rgba(73, 135, 216, 0.4) !important; */

      }

      .dropdown-menu-column {
         display: flex;
         flex-direction: column;
         margin-top: 16px;
         gap: 4px;
         align-items: flex-start;
         /* padding: 2px !important; */
      }

      .dropdown-menu-column a {
         /* padding: 1px; */
         width: auto !important;

      }

      .sms_e_active_item {
         border-left: 4px solid #4987D8 !important;
         background-color: #F1F4FF;
      }

      .dropdown-menu-column .sms_e_active_item {
         border-left: 4px solid transparent !important;
         color: white !important;
         background-color: #4987D8;
      }

      .rtl {
         direction: rtl;
      }

      .rtl .avatar {
         margin-left: 10px;
      }


      .rtl aside {
         right: 0 !important;
      }


      .rtl .navbar-vertical.navbar-expand-lg .navbar-collapse .navbar-nav .nav-link {
         gap: 10px;
      }

      /* css for rtl */
      .rtl .sms_mu_for_rtl {
         gap: 46% !important;
      }

      .rtl .sms_mu_for_rtl_row_cards {
         flex-direction: row-reverse !important;
         text-align: center !important;
         align-items: center !important;
      }

      .rtl td {
         border-radius: 0px !important;
      }

      .rtl .sms_mu_margin {
         gap: 253px !important;
      }

      .lang_select {
         height: 30px;
         border: 1px solid lightgray;
         border-radius: 15px;
      }

      @media screen and (max-width:990px) {
         .rtl .sms_mu_margin {
            gap: 0px !important;
         }

      }

      .rtl td:first-child {
         /* border-left-style: solid; */
         border-top-right-radius: 20px !important;
         border-bottom-right-radius: 20px !important;
         text-align: center;
      }

      .rtl td:last-child {
         border-bottom-left-radius: 20px !important;
         border-top-left-radius: 20px !important;
      }

      .rtl th:first-child {
         /* border-left-style: solid; */
         border-top-right-radius: 20px !important;
         border-bottom-right-radius: 20px !important;
         border-bottom-left-radius: 0px !important;
         border-top-left-radius: 0px !important;
      }

      .rtl th:last-child {
         /* border-right-style: solid; */
         border-bottom-left-radius: 20px !important;
         border-top-left-radius: 20px !important;
         border-top-right-radius: 0px !important;
         border-bottom-right-radius: 0px !important;
      }

      .sms_mu_table_product td:first-child {
         text-align: center !important;
      }

      .sms_mu_table_product td:last-child {
         text-align: center !important;
      }

      .sms_mu_table_product th:first-child {
         text-align: center !important;
      }

      .sms_mu_table_product th:last-child {
         text-align: center !important;
      }

      .rtl .sms_mu_for_rtl {
         gap: 46% !important;
      }

      .rtl .sms_mu_for_rtl_row_cards {
         flex-direction: row-reverse !important;
         text-align: end !important;
         align-items: center !important;
      }

      .rtl .sms_mu_for_rtl_demo {
         flex-direction: row-reverse;
      }

      .rtl td {
         border-radius: 0px !important;
      }

      .rtl .sms_mu_margin {
         gap: 200px !important;
      }

      @media screen and (max-width:990px) {
         .rtl .sms_mu_margin {
            gap: 0px !important;
         }

      }

      .sms_ma_index_to_order_button {
         background-color: #4987D8 !important;
         color: white;
         font-weight: 900;
         border-radius: 20px;
         padding: 8px !important;
         height: 80%;
      }

      .sms_w_date_active {
         background-color: #A8C3E7;
      }

      .rtl .page-wrapper {
         margin-left: 0rem !important;
         margin-right: 15rem !important;
      }

      .page-wrapper {
         margin-left: 15rem !important;
         margin-right: 0 !important;
      }

      .rtl header {
         margin-left: 0 !important;
      }

      @media screen and (max-width:990px) {

         .rtl .navbar-expand-lg.navbar-vertical~.navbar,
         .navbar-expand-lg.navbar-vertical~.page-wrapper {
            margin-left: 0rem !important;
            margin-right: 0rem !important;
         }

         .navbar-expand-lg.navbar-vertical~.navbar,
         .navbar-expand-lg.navbar-vertical~.page-wrapper {
            margin-left: 0 !important;
         }
      }

      .abc .Sms_mu_for_Eng {
         display: block;
      }

      .abc .Sms_mu_for_hebrew {
         display: none;
      }

      .my_div {
         background-color: #afacac;
         opacity: 0.5;
         width: 100%;
         position: absolute;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         display: none;
      }

      .rtl .Sms_mu_for_Eng {
         display: none;
      }

      .rtl .Sms_mu_for_hebrew {
         display: block;
      }

      .rtl .sms_mu_show {
         left: 0 !important;
         right: -452px !important;
      }

      .rtl .dropdown-menu-arrow.dropdown-menu-end:before {
         right: 28.75rem;
         left: auto;
      }

      .rtl .sms_mu_header {
         margin-right: 17%;
      }

      .abc #sms_mu_desktop_heb,
      .abc #sms_mu_desktop_heb1,
      .abc #sms_mu_desktop_heb2,
      .abc #sms_mu_desktop_heb3,
      .abc #sms_mu_desktop_heb4,
      .abc #sms_mu_desktop_heb5,
      .abc #sms_mu_desktop_heb6,
      .abc #sms_mu_desktop_heb_set,
      .abc #sms_mu_desktop_heb_sp,
      .abc #sms_mu_desktop_heb_btn,
      .abc #product-heb,
      .abc #inventory-heb,
      .abc #coupons-heb,
      .abc #support {
         display: none !important;
      }

      .abc #sms_mu_desktop_eng,
      .abc #sms_mu_desktop_eng1,
      .abc #sms_mu_desktop_eng2,
      .abc #sms_mu_desktop_eng3,
      .abc #sms_mu_desktop_eng4,
      .abc #sms_mu_desktop_eng5,
      .abc #sms_mu_desktop_eng6,
      .abc #sms_mu_desktop_eng_set,
      .abc #sms_mu_desktop_eng_sp,
      .abc #sms_mu_desktop_eng_btn,
      .abc #product,
      .abc #inventory,
      .abc #coupons,
      .abc #support {
         display: block !important;
      }

      .rtl #sms_mu_desktop_heb,
      .rtl #sms_mu_desktop_heb1,
      .rtl #sms_mu_desktop_heb2,
      .rtl #sms_mu_desktop_heb3,
      .rtl #sms_mu_desktop_heb4,
      .rtl #sms_mu_desktop_heb5,
      .rtl #sms_mu_desktop_heb6,
      .rtl #sms_mu_desktop_heb_set,
      .rtl #sms_mu_desktop_heb_sp,
      .rtl #sms_mu_desktop_heb_btn,
      .rtl #product-heb,
      .rtl #inventory-heb,
      .rtl #coupons-heb,
      .rtl #support {
         display: block !important;
      }

      .rtl #sms_mu_desktop_eng,
      .rtl #sms_mu_desktop_eng1,
      .rtl #sms_mu_desktop_eng2,
      .rtl #sms_mu_desktop_eng3,
      .rtl #sms_mu_desktop_eng4,
      .rtl #sms_mu_desktop_eng5,
      .rtl #sms_mu_desktop_eng6,
      .rtl #sms_mu_desktop_eng_set,
      .rtl #sms_mu_desktop_eng_sp,
      .rtl #sms_mu_desktop_eng_btn,
      .rtl #product,
      .rtl #inventory,
      .rtl #coupons,
      .rtl #support {
         display: none !important;
      }

      .sms_a_add_category_pop {
         box-shadow: 100vh 100vh 100vh 300vh #00000059 !important;
      }

      #sms_delete_notification_ctg.show {
         display: block;
         animation: slideIn 0.5s forwards, fadeOut 2s 1s forwards;
      }

      #sms_delete_notification_ctg {
         position: fixed;
         top: 20px;
         right: 20px;
         padding: 20px 20px;
         background-color: #4CAF50;
         color: white;
         border-radius: 5px;
         display: none;
      }
   </style>
</head>

<body id="myDiv" class="abc">

   <script src="assets/dist/js/demo-theme.min.js?1684106062"></script>
   <div class="page">
      <!-- Sidebar -->

      <aside class="navbar navbar-vertical navbar-expand-lg " data-bs-theme="light">
         <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
               <a href=".">
                  <img src="assets/static/logo_image.svg" width="260" height="110" alt="store management system">
               </a>
            </h1>

            <div class="collapse navbar-collapse" id="sidebar-menu">
               <ul class="navbar-nav pt-lg-3 gap-3">
                  <li class="nav-item" id="index">
                     <a class="nav-link" href="/index">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_272_247)">
                                 <path d="M0 16C0 11.7565 1.68571 7.68687 4.68629 4.68629C7.68687 1.68571 11.7565 0 16 0C20.2435 0 24.3131 1.68571 27.3137 4.68629C30.3143 7.68687 32 11.7565 32 16C32 20.2435 30.3143 24.3131 27.3137 27.3137C24.3131 30.3143 20.2435 32 16 32C11.7565 32 7.68687 30.3143 4.68629 27.3137C1.68571 24.3131 0 20.2435 0 16ZM20 22C20 20.3188 18.9688 18.8813 17.5 18.2938V5.5C17.5 4.66875 16.8312 4 16 4C15.1687 4 14.5 4.66875 14.5 5.5V18.2938C13.0312 18.8875 12 20.325 12 22C12 24.2062 13.7937 26 16 26C18.2062 26 20 24.2062 20 22ZM9 11C9.53043 11 10.0391 10.7893 10.4142 10.4142C10.7893 10.0391 11 9.53043 11 9C11 8.46957 10.7893 7.96086 10.4142 7.58579C10.0391 7.21071 9.53043 7 9 7C8.46957 7 7.96086 7.21071 7.58579 7.58579C7.21071 7.96086 7 8.46957 7 9C7 9.53043 7.21071 10.0391 7.58579 10.4142C7.96086 10.7893 8.46957 11 9 11ZM8 16C8 15.4696 7.78929 14.9609 7.41421 14.5858C7.03914 14.2107 6.53043 14 6 14C5.46957 14 4.96086 14.2107 4.58579 14.5858C4.21071 14.9609 4 15.4696 4 16C4 16.5304 4.21071 17.0391 4.58579 17.4142C4.96086 17.7893 5.46957 18 6 18C6.53043 18 7.03914 17.7893 7.41421 17.4142C7.78929 17.0391 8 16.5304 8 16ZM26 18C26.5304 18 27.0391 17.7893 27.4142 17.4142C27.7893 17.0391 28 16.5304 28 16C28 15.4696 27.7893 14.9609 27.4142 14.5858C27.0391 14.2107 26.5304 14 26 14C25.4696 14 24.9609 14.2107 24.5858 14.5858C24.2107 14.9609 24 15.4696 24 16C24 16.5304 24.2107 17.0391 24.5858 17.4142C24.9609 17.7893 25.4696 18 26 18ZM25 9C25 8.46957 24.7893 7.96086 24.4142 7.58579C24.0391 7.21071 23.5304 7 23 7C22.4696 7 21.9609 7.21071 21.5858 7.58579C21.2107 7.96086 21 8.46957 21 9C21 9.53043 21.2107 10.0391 21.5858 10.4142C21.9609 10.7893 22.4696 11 23 11C23.5304 11 24.0391 10.7893 24.4142 10.4142C24.7893 10.0391 25 9.53043 25 9Z" fill="#4987D8" />
                              </g>
                              <defs>
                                 <clipPath id="clip0_272_247">
                                    <rect width="32" height="32" fill="white" />
                                 </clipPath>
                              </defs>
                           </svg>
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_eng">
                           Desktop
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb">
                           שולחן עבודה
                        </span>
                     </a>
                  </li>

                  <li class="nav-item  dropdown m-0">
                     <a class="nav-link dropdown-toggle " id="sms_w_dropdown_title" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="true">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">

                           <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_272_244)">
                                 <path d="M0 3.1111C0 2.37222 0.594444 1.77777 1.33333 1.77777H3.86111C5.08333 1.77777 6.16667 2.48888 6.67222 3.55555H29.5056C30.9667 3.55555 32.0333 4.94444 31.65 6.35555L29.3722 14.8167C28.9 16.5611 27.3167 17.7778 25.5111 17.7778H9.48333L9.78333 19.3611C9.90556 19.9889 10.4556 20.4444 11.0944 20.4444H27.1111C27.85 20.4444 28.4444 21.0389 28.4444 21.7778C28.4444 22.5167 27.85 23.1111 27.1111 23.1111H11.0944C9.17222 23.1111 7.52222 21.7444 7.16667 19.8611L4.3 4.80555C4.26111 4.59444 4.07778 4.44444 3.86111 4.44444H1.33333C0.594444 4.44444 0 3.84999 0 3.1111ZM7.11111 27.5555C7.11111 27.2054 7.18009 26.8586 7.3141 26.5351C7.44811 26.2115 7.64454 25.9176 7.89216 25.6699C8.13978 25.4223 8.43375 25.2259 8.75729 25.0919C9.08082 24.9579 9.42759 24.8889 9.77778 24.8889C10.128 24.8889 10.4747 24.9579 10.7983 25.0919C11.1218 25.2259 11.4158 25.4223 11.6634 25.6699C11.911 25.9176 12.1074 26.2115 12.2415 26.5351C12.3755 26.8586 12.4444 27.2054 12.4444 27.5555C12.4444 27.9057 12.3755 28.2525 12.2415 28.576C12.1074 28.8996 11.911 29.1935 11.6634 29.4412C11.4158 29.6888 11.1218 29.8852 10.7983 30.0192C10.4747 30.1532 10.128 30.2222 9.77778 30.2222C9.42759 30.2222 9.08082 30.1532 8.75729 30.0192C8.43375 29.8852 8.13978 29.6888 7.89216 29.4412C7.64454 29.1935 7.44811 28.8996 7.3141 28.576C7.18009 28.2525 7.11111 27.9057 7.11111 27.5555ZM25.7778 24.8889C26.485 24.8889 27.1633 25.1698 27.6634 25.6699C28.1635 26.17 28.4444 26.8483 28.4444 27.5555C28.4444 28.2628 28.1635 28.9411 27.6634 29.4412C27.1633 29.9413 26.485 30.2222 25.7778 30.2222C25.0705 30.2222 24.3923 29.9413 23.8922 29.4412C23.3921 28.9411 23.1111 28.2628 23.1111 27.5555C23.1111 26.8483 23.3921 26.17 23.8922 25.6699C24.3923 25.1698 25.0705 24.8889 25.7778 24.8889Z" fill="#4987D8" />
                              </g>
                              <defs>
                                 <clipPath id="clip0_272_244">
                                    <rect width="32" height="32" fill="white" />
                                 </clipPath>
                              </defs>
                           </svg>
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_eng1">
                           Product
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb1">
                           מוצר
                        </span>
                     </a>
                     <div class="dropdown-menu  " id="dropdown-menu">
                        <div class="dropdown-menu-columns">
                           <div class="dropdown-menu-column">
                              <a href="/product" class="dropdown-item " id="product">Product Management</a>
                              <a href="/product" class="dropdown-item " id="product-heb">ניהול מוצר</a>
                              <a href="/inventory" class="dropdown-item" id="inventory">Inventory
                                 settings </a>
                              <a href="/inventory" class="dropdown-item" id="inventory-heb">הגדרות מלאי</a>
                              <a href="/coupons" class="dropdown-item" id="coupons">Coupons and benefits</a>
                              <a href="/coupons" class="dropdown-item" id="coupons-heb">קופונים והטבות</a>
                           </div>
                        </div>
                     </div>
                  </li>

                  <li class="nav-item" id="customers">
                     <a class="nav-link" href="/customers">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M16.17 1.46L11.33 5.38C10.525 6.03 10.37 7.2 10.98 8.035C11.625 8.925 12.88 9.1 13.745 8.425L18.71 4.565C19.06 4.295 19.56 4.355 19.835 4.705C20.11 5.055 20.045 5.555 19.695 5.83L18.65 6.64L25.6 13.04V3.6H25.565L25.37 3.475L21.74 1.15C20.975 0.660002 20.08 0.400002 19.17 0.400002C18.08 0.400002 17.02 0.775001 16.17 1.46ZM17.31 7.68L14.725 9.69C13.15 10.92 10.865 10.6 9.685 8.98C8.575 7.455 8.855 5.325 10.32 4.14L14.48 0.775002C13.9 0.530002 13.275 0.405001 12.64 0.405001C11.7 0.400001 10.785 0.680002 10 1.2L6.4 3.6V14.8H7.81L12.38 18.97C13.36 19.865 14.875 19.795 15.77 18.815C16.045 18.51 16.23 18.155 16.325 17.785L17.175 18.565C18.15 19.46 19.67 19.395 20.565 18.42C20.79 18.175 20.955 17.89 21.06 17.595C22.03 18.245 23.35 18.11 24.165 17.22C25.06 16.245 24.995 14.725 24.02 13.83L17.31 7.68ZM0.8 3.6C0.36 3.6 0 3.96 0 4.4V14.8C0 15.685 0.715 16.4 1.6 16.4H3.2C4.085 16.4 4.8 15.685 4.8 14.8V3.6H0.8ZM2.4 13.2C2.61217 13.2 2.81566 13.2843 2.96569 13.4343C3.11571 13.5843 3.2 13.7878 3.2 14C3.2 14.2122 3.11571 14.4157 2.96569 14.5657C2.81566 14.7157 2.61217 14.8 2.4 14.8C2.18783 14.8 1.98434 14.7157 1.83431 14.5657C1.68429 14.4157 1.6 14.2122 1.6 14C1.6 13.7878 1.68429 13.5843 1.83431 13.4343C1.98434 13.2843 2.18783 13.2 2.4 13.2ZM27.2 3.6V14.8C27.2 15.685 27.915 16.4 28.8 16.4H30.4C31.285 16.4 32 15.685 32 14.8V4.4C32 3.96 31.64 3.6 31.2 3.6H27.2ZM28.8 14C28.8 13.7878 28.8843 13.5843 29.0343 13.4343C29.1843 13.2843 29.3878 13.2 29.6 13.2C29.8122 13.2 30.0157 13.2843 30.1657 13.4343C30.3157 13.5843 30.4 13.7878 30.4 14C30.4 14.2122 30.3157 14.4157 30.1657 14.5657C30.0157 14.7157 29.8122 14.8 29.6 14.8C29.3878 14.8 29.1843 14.7157 29.0343 14.5657C28.8843 14.4157 28.8 14.2122 28.8 14Z" fill="#4987D8" />
                           </svg>

                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_eng2">
                           Customer
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb2">
                           צרכן
                        </span>
                     </a>
                  </li>
                  <li class="nav-item" id="transactions">
                     <a class="nav-link" href="transactions">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M26.75 2.25C26.28 1.78 26.28 1.02 26.75 0.555C27.22 0.0899999 27.98 0.0849999 28.445 0.555L31.645 3.755C31.87 3.98 31.995 4.285 31.995 4.605C31.995 4.925 31.87 5.23 31.645 5.455L28.445 8.655C27.975 9.125 27.215 9.125 26.75 8.655C26.285 8.185 26.28 7.425 26.75 6.96L27.9 5.81L19.2 5.8C18.535 5.8 18 5.265 18 4.6C18 3.935 18.535 3.4 19.2 3.4H27.905L26.75 2.25ZM5.25 19.05L4.1 20.2H12.8C13.465 20.2 14 20.735 14 21.4C14 22.065 13.465 22.6 12.8 22.6H4.095L5.245 23.75C5.715 24.22 5.715 24.98 5.245 25.445C4.775 25.91 4.015 25.915 3.55 25.445L0.35 22.25C0.125 22.025 0 21.72 0 21.4C0 21.08 0.125 20.775 0.35 20.55L3.55 17.35C4.02 16.88 4.78 16.88 5.245 17.35C5.71 17.82 5.715 18.58 5.245 19.045L5.25 19.05ZM4.8 3.4H16.895C16.71 3.76 16.6 4.165 16.6 4.6C16.6 6.035 17.765 7.2 19.2 7.2H25.07C24.87 8.05 25.1 8.975 25.76 9.64C26.775 10.655 28.42 10.655 29.435 9.64L30.4 8.675V19.4C30.4 21.165 28.965 22.6 27.2 22.6H15.105C15.29 22.24 15.4 21.835 15.4 21.4C15.4 19.965 14.235 18.8 12.8 18.8H6.93C7.13 17.95 6.9 17.025 6.24 16.36C5.225 15.345 3.58 15.345 2.565 16.36L1.6 17.325V6.6C1.6 4.835 3.035 3.4 4.8 3.4ZM8 6.6H4.8V9.8C6.565 9.8 8 8.365 8 6.6ZM27.2 16.2C25.435 16.2 24 17.635 24 19.4H27.2V16.2ZM16 17.8C17.273 17.8 18.4939 17.2943 19.3941 16.3941C20.2943 15.4939 20.8 14.273 20.8 13C20.8 11.727 20.2943 10.5061 19.3941 9.60589C18.4939 8.70571 17.273 8.2 16 8.2C14.727 8.2 13.5061 8.70571 12.6059 9.60589C11.7057 10.5061 11.2 11.727 11.2 13C11.2 14.273 11.7057 15.4939 12.6059 16.3941C13.5061 17.2943 14.727 17.8 16 17.8Z" fill="#4987D8" />
                           </svg>

                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_eng3">
                           Transcaction
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb3">
                           עִסקָה
                        </span>
                     </a>
                  </li>
                  <li class="nav-item" id="statistics">
                     <a class="nav-link" href="/statistics">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1.9998 4C1.9998 2.89375 2.89355 2 3.9998 2H27.9998C29.1061 2 29.9998 2.89375 29.9998 4C29.9998 5.10625 29.1061 6 27.9998 6H3.9998C2.89355 6 1.9998 5.10625 1.9998 4ZM13.9998 12C13.9998 10.8938 14.8936 10 15.9998 10H27.9998C29.1061 10 29.9998 10.8938 29.9998 12C29.9998 13.1062 29.1061 14 27.9998 14H15.9998C14.8936 14 13.9998 13.1062 13.9998 12ZM15.9998 18H27.9998C29.1061 18 29.9998 18.8937 29.9998 20C29.9998 21.1063 29.1061 22 27.9998 22H15.9998C14.8936 22 13.9998 21.1063 13.9998 20C13.9998 18.8937 14.8936 18 15.9998 18ZM1.9998 28C1.9998 26.8937 2.89355 26 3.9998 26H27.9998C29.1061 26 29.9998 26.8937 29.9998 28C29.9998 29.1063 29.1061 30 27.9998 30H3.9998C2.89355 30 1.9998 29.1063 1.9998 28ZM2.0123 16.7875C1.4998 16.3875 1.4998 15.6062 2.0123 15.2063L8.38105 10.25C9.0373 9.7375 9.99356 10.2063 9.99356 11.0375V20.9562C9.99356 21.7875 9.0373 22.2563 8.38105 21.7437L2.0123 16.7875Z" fill="#4987D8" />
                           </svg>

                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_eng4">
                           Statictis
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb4">
                           סטָטִיסטִיקָה
                        </span>
                     </a>
                  </li>
                  <li class="nav-item" id="goals">
                     <a class="nav-link" href="/goals">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0 7.255C0 3.25 3.25 0 7.255 0C9.18 0 11.025 0.765 12.385 2.125L16 5.735L19.61 2.125C20.975 0.765 22.82 0 24.745 0C28.75 0 32 3.25 32 7.255V8.74C32 12.75 28.75 16 24.745 16C22.82 16 20.975 15.235 19.615 13.875L16 10.265L12.39 13.875C11.025 15.235 9.18 16 7.255 16C3.25 16 0 12.75 0 8.745V7.255ZM13.735 8L10.125 4.39C9.365 3.63 8.33 3.2 7.255 3.2C5.015 3.2 3.2 5.015 3.2 7.255V8.74C3.2 10.98 5.015 12.795 7.255 12.795C8.33 12.795 9.365 12.37 10.125 11.605L13.735 8ZM18.26 8L21.87 11.61C22.63 12.37 23.665 12.8 24.74 12.8C26.98 12.8 28.795 10.985 28.795 8.745V7.255C28.795 5.015 26.98 3.2 24.74 3.2C23.665 3.2 22.63 3.625 21.87 4.39L18.265 8H18.26Z" fill="#4987D8" />
                           </svg>
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_eng5">
                           Objectives
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb5">
                           יעדים
                        </span>
                     </a>
                  </li>
                  <li class="nav-item" id="optimization">
                     <a class="nav-link" href="./optimization.php">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0 14C0 15.1062 0.89375 16 2 16C3.10625 16 4 15.1062 4 14C4 10.6875 6.6875 8 10 8H20V10C20 10.8062 20.4875 11.5375 21.2375 11.85C21.9875 12.1625 22.8438 11.9875 23.4188 11.4187L27.4188 7.41875C28.2 6.6375 28.2 5.36875 27.4188 4.5875L23.4188 0.5875C22.8438 0.0124996 21.9875 -0.15625 21.2375 0.15625C20.4875 0.46875 20 1.19375 20 2V4H10C4.475 4 0 8.475 0 14ZM32 18C32 16.8937 31.1063 16 30 16C28.8937 16 28 16.8937 28 18C28 21.3125 25.3125 24 22 24H12V22C12 21.1938 11.5125 20.4625 10.7625 20.15C10.0125 19.8375 9.15625 20.0125 8.58125 20.5812L4.58125 24.5812C3.8 25.3625 3.8 26.6313 4.58125 27.4125L8.58125 31.4125C9.15625 31.9875 10.0125 32.1562 10.7625 31.8438C11.5125 31.5312 12 30.8062 12 29.9937V28H22C27.525 28 32 23.525 32 18Z" fill="#4987D8" />
                           </svg>
                        </span>

                        <span class="nav-link-title" id="sms_mu_desktop_eng6">
                           Optimization
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb6">
                           אופטימיזציה
                        </span>
                     </a>


                  </li>
                  <span style="display: block; height: 2px; background-color: rgba(73, 135, 216, 0.4); width:90%; margin:auto"></span>

                  <h4 class="m-0 px-3" id="support">Support</h4>
                  <li class="nav-item" id="setting">
                     <a class="nav-link" href="./setting.php">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M26.0812 22.5063L21.6063 22.2062C21.2812 22.1875 20.9625 22.275 20.7 22.4688C20.4375 22.6625 20.25 22.9312 20.175 23.25L19.075 27.6C18.0938 27.8625 17.0625 28 16 28C14.9375 28 13.9062 27.8625 12.925 27.6L11.825 23.25C11.7437 22.9375 11.5563 22.6625 11.3 22.4688C11.0437 22.275 10.7188 22.1875 10.3938 22.2062L5.91875 22.5063C4.81875 20.8062 4.1375 18.8062 4.01875 16.6562L7.8125 14.2688C8.0875 14.0938 8.2875 13.8312 8.3875 13.525C8.4875 13.2188 8.475 12.8875 8.35625 12.5875L6.6875 8.425C8 6.825 9.70625 5.5625 11.6687 4.80625L15.1187 7.68125C15.3687 7.8875 15.6812 8 16 8C16.3188 8 16.6375 7.8875 16.8813 7.68125L20.3312 4.80625C22.2875 5.5625 24 6.825 25.3062 8.425L23.6375 12.5875C23.5188 12.8875 23.5063 13.2188 23.6063 13.525C23.7063 13.8312 23.9125 14.0938 24.1812 14.2688L27.975 16.6562C27.8563 18.8062 27.175 20.8062 26.075 22.5063H26.0812ZM16 32C20.2435 32 24.3131 30.3143 27.3137 27.3137C30.3143 24.3131 32 20.2435 32 16C32 11.7565 30.3143 7.68687 27.3137 4.68629C24.3131 1.68571 20.2435 0 16 0C11.7565 0 7.68687 1.68571 4.68629 4.68629C1.68571 7.68687 0 11.7565 0 16C0 20.2435 1.68571 24.3131 4.68629 27.3137C7.68687 30.3143 11.7565 32 16 32ZM16.8813 11.6438C16.3563 11.2625 15.6437 11.2625 15.1187 11.6438L12.125 13.8125C11.6 14.1938 11.3813 14.8688 11.5813 15.4875L12.725 19.0063C12.925 19.625 13.5 20.0438 14.15 20.0438H17.85C18.5 20.0438 19.075 19.625 19.275 19.0063L20.4188 15.4875C20.6188 14.8688 20.4 14.1938 19.875 13.8125L16.8813 11.6375V11.6438Z" fill="#4987D8" />
                           </svg>

                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_eng_set">
                           Setting
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb_set">
                           הגדרה
                        </span>
                     </a>
                  </li>


                  <li class="nav-item" id="optimization">
                     <a class="nav-link" href="./help.php">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M16 32C20.2435 32 24.3131 30.3143 27.3137 27.3137C30.3143 24.3131 32 20.2435 32 16C32 11.7565 30.3143 7.68687 27.3137 4.68629C24.3131 1.68571 20.2435 0 16 0C11.7565 0 7.68687 1.68571 4.68629 4.68629C1.68571 7.68687 0 11.7565 0 16C0 20.2435 1.68571 24.3131 4.68629 27.3137C7.68687 30.3143 11.7565 32 16 32ZM10.6125 10.3313C11.1062 8.9375 12.4313 8 13.9125 8H17.5562C19.7375 8 21.5 9.76875 21.5 11.9438C21.5 13.3563 20.7437 14.6625 19.5187 15.3687L17.5 16.525C17.4875 17.3375 16.8188 18 16 18C15.1687 18 14.5 17.3312 14.5 16.5V15.6562C14.5 15.1187 14.7875 14.625 15.2563 14.3562L18.025 12.7688C18.3188 12.6 18.5 12.2875 18.5 11.95C18.5 11.425 18.075 11.0063 17.5562 11.0063H13.9125C13.7 11.0063 13.5125 11.1375 13.4438 11.3375L13.4187 11.4125C13.1438 12.1938 12.2812 12.6 11.5063 12.325C10.7313 12.05 10.3188 11.1875 10.5938 10.4125L10.6187 10.3375L10.6125 10.3313ZM14 22C14 21.4696 14.2107 20.9609 14.5858 20.5858C14.9609 20.2107 15.4696 20 16 20C16.5304 20 17.0391 20.2107 17.4142 20.5858C17.7893 20.9609 18 21.4696 18 22C18 22.5304 17.7893 23.0391 17.4142 23.4142C17.0391 23.7893 16.5304 24 16 24C15.4696 24 14.9609 23.7893 14.5858 23.4142C14.2107 23.0391 14 22.5304 14 22Z" fill="#4987D8" />
                           </svg>

                        </span>

                        <span class="nav-link-title" id="sms_mu_desktop_eng_sp">
                           Help and support
                        </span>
                        <span class="nav-link-title" id="sms_mu_desktop_heb_sp">
                           עזרה ותמיכה
                        </span>
                     </a>
                  </li>

                  <li class="nav-item" id="">
                     <button onclick="LogoutDisconecting()" id="sms_mu_filter_button_inventory" class="rounded-4 border-0 p-2" style="background-color:#4987D870; color:white">
                        Disconnecting from the system

                        <svg width="24" height="24" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M22 4H26C27.1063 4 28 4.89375 28 6V22C28 23.1063 27.1063 24 26 24H22C20.8937 24 20 24.8937 20 26C20 27.1063 20.8937 28 22 28H26C29.3125 28 32 25.3125 32 22V6C32 2.6875 29.3125 0 26 0H22C20.8937 0 20 0.89375 20 2C20 3.10625 20.8937 4 22 4ZM21.4125 15.4125C22.1938 14.6313 22.1938 13.3625 21.4125 12.5813L13.4125 4.58125C12.6313 3.8 11.3625 3.8 10.5813 4.58125C9.8 5.3625 9.8 6.63125 10.5813 7.4125L15.1687 12H2C0.89375 12 0 12.8938 0 14C0 15.1062 0.89375 16 2 16H15.1687L10.5813 20.5875C9.8 21.3687 9.8 22.6375 10.5813 23.4188C11.3625 24.2 12.6313 24.2 13.4125 23.4188L21.4125 15.4188V15.4125Z" fill="white" />
                        </svg>

                     </button>
                  </li>
               </ul>
            </div>
         </div>
      </aside>
      <!-- Navbar -->
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

               <div class="navbar-nav flex-row order-md-last">
                  <div class=" d-flex align-items-center">
                     <a href="?theme=dark" class="nav-link px-0 hide-theme-dark d-none" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                     </a>
                     <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                           <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                     </a>
                     <div class="nav-item dropdown d-none d-md-flex me-3  ">
                        <a href="#" class="nav-link px-0 bg-light rounded-pill" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                              <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                           </svg>
                           <span class="badge text-red bg-transparent">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card sms_mu_show">
                           <div class="card">
                              <div class="card-header">
                                 <h3 class="card-title">Last updates</h3>
                              </div>
                              <div class="list-group list-group-flush list-group-hoverable">
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 1</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             Change deprecated html tags to text decoration classes (#29604)
                                          </div>
                                       </div>
                                       <div class="col-auto">
                                          <a href="#" class="list-group-item-actions">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 2</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             justify-content:between ⇒ justify-content:space-between (#29734)
                                          </div>
                                       </div>
                                       <div class="col-auto">
                                          <a href="#" class="list-group-item-actions show">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 3</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             Update change-version.js (#29736)
                                          </div>
                                       </div>
                                       <div class="col-auto">
                                          <a href="#" class="list-group-item-actions">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 4</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             Regenerate package-lock.json (#29730)
                                          </div>
                                       </div>
                                       <div class="col-auto">
                                          <a href="#" class="list-group-item-actions">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
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
                  <div class="d-none  ps-2 ">
                     <div>Paweł Kuna</div>
                     <div class="mt-1 small text-muted">UI Designer</div>
                  </div>
                  </a>
                  <div id="PopoupLogout" class="dropdown-menu dropdown-menu-end dropdown-menu-arrow dropdown_logout" bis_skin_checked="1" style="display: none ;">
                        <a href="#" class="dropdown-item" onclick="LogoutDisconecting()">Logout</a>
                     </div>
                     <!-- <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" class="dropdown-item">Status</a>
                        <a href="./profile.html" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Feedback</a>
                        <div class="dropdown-divider"></div>
                        <a href="./settings.html" class="dropdown-item">Settings</a>
                        <a href="./sign-in.html" class="dropdown-item">Logout</a>
                     </div> -->
               </div>
               <div class="collapse navbar-collapse" id="navbar-menu">
                  <div>
                     <form action="./" method="get" autocomplete="off" novalidate>
                        <div class="input-icon border-bottom" style="background-color: #F2F2F2;">
                           <span class="input-icon-addon">
                              <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                 <path d="M21 21l-6 -6" />
                              </svg>
                           </span>
                           <input type="text" value="" class="form-control border-0 " style="background-color: #F2F2F2;" placeholder="Search…" aria-label="Search in website">
                        </div>
                     </form>
                  </div>
               </div>
            </div>

         </div>
      </header>
      <div class="page-wrapper px-4" id="content">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <!-- <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script> -->
         <script>
            // JavaScript for switching language
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
            document.getElementById('lang-select').addEventListener('change', function() {
               var selectedLang = this.value;

               switchLanguage(selectedLang);
               console.log(selectedLang)
               document.cookie = "current_lang=" + selectedLang + "; path=/";
            });
         </script>
         <script>
            // JavaScript code to handle the dropdown functionality
            document.addEventListener("DOMContentLoaded", function() {
               var dropdownMenuButton = document.getElementById("dropdownMenuButton");
               var dropdownMenu = dropdownMenuButton.nextElementSibling;

               dropdownMenuButton.addEventListener("click", function() {
                  if (dropdownMenu.classList.contains("show")) {
                     dropdownMenu.classList.remove("show");
                  } else {
                     dropdownMenu.classList.add("show");
                  }
               });

               document.addEventListener("click", function(e) {
                  if (!dropdownMenuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                     dropdownMenu.classList.remove("show");
                  }
               });
            });

            var selectedOption = ""; // Variable to store the selected option value

            function selectOption(option, value) {
               // Store the selected option value
               selectedOption = value;

               // Close the dropdown after selecting an option
               var dropdownMenu = option.parentElement;
               dropdownMenu.classList.remove("show");

               // Use the selectedOption variable as needed
               console.log("Selected option:", selectedOption);
            }
         </script>
         <script>
            window.addEventListener('load', function() {
               setPageName();
            });

            function setPageName() {
               const currentURL = window.location.href;
               const domainName = 'storemanagement-frontend';
               const pathname = new URL(currentURL).pathname;
               const currentSlug = pathname.split('/').filter(Boolean).pop().replace('.php', '') || 'index';

               // Define page names for English and Hebrew
               const pageNames = {
                  'index': {
                     en: 'Dashboard',
                     he: 'לוח מחוונים'
                  },
                  'product': {
                     en: 'Product Management',
                     he: 'ניהול מוצרים'
                  },
                  'inventory': {
                     en: 'Inventory Setting',
                     he: 'הגדרת מלאי'
                  },
                  'coupons': {
                     en: 'Coupons And Benefits',
                     he: 'קופונים והטבות'
                  },
                  'customers': {
                     en: 'Customer',
                     he: 'לקוח'
                  },
                  'transactions': {
                     en: 'Transaction',
                     he: 'עסקאות'
                  },
                  'statistics': {
                     en: 'Statistics',
                     he: 'סטטיסטיקות'
                  },
                  'goals': {
                     en: 'Objectives',
                     he: 'יעדים'
                  },
                  'optimization': {
                     en: 'Optimization',
                     he: 'אופטימיזציה'
                  },
                  'setting': {
                     en: 'Setting',
                     he: 'הגדרות'
                  },
                  'help': {
                     en: 'Help And Support',
                     he: 'עזרה ותמיכה'
                  }
               };

               // Determine if the page is in RTL mode
               const bodyElement = document.getElementById('myDiv');
               const isRtl = bodyElement && bodyElement.classList.contains('rtl');
               console.log(isRtl.value)

               // Get the name based on the current slug and language
               const name = pageNames[currentSlug] ? (isRtl ? pageNames[currentSlug].he : pageNames[currentSlug].en) : 'Unknown';

               // Update the page name element
               const headerPageNameElement = document.getElementById('sms_header_page_name');
               if (headerPageNameElement) {
                  headerPageNameElement.innerText = name;
               }

               // Handle special cases for dropdown menu
               const specialCases = ['product', 'inventory', 'coupons'];
               if (specialCases.includes(currentSlug)) {
                  const dropdownMenu = document.getElementById('dropdown-menu');
                  const dropdownTitle = document.getElementById('sms_w_dropdown_title');
                  if (dropdownMenu && dropdownTitle) {
                     dropdownMenu.classList.add('show');
                     dropdownTitle.classList.add('sms_e_active_item');
                  }
               }

               // Set active class on navigation item
               const navItem = document.getElementById(currentSlug);
               if (navItem) {
                  document.querySelectorAll('.nav-item').forEach(item => {
                     item.classList.remove('sms_e_active_item');
                  });
                  navItem.classList.add('sms_e_active_item');
               }
            }
         </script>
         <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
         <script>
            $(document).ready(function() {

               var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                  removeItemButton: true,
               });


            });

            $(document).ready(function() {

               var multipleCancelButton = new Choices('#IOP', {
                  removeItemButton: true,
               });


            });

            //             $(document).ready(function () {

            // var multipleCancelButton = new Choices('#sms_w_parent_ctg', {
            //    removeItemButton: true,
            //    maxItemCount: 5,
            //    searchResultLimit: 5,
            //    renderChoiceLimit: 5
            // });


            // });
            $(document).ready(function() {

               var multipleCancelButton = new Choices('#category_in_product', {
                  removeItemButton: true,
               });


            });
            $(document).ready(function() {

var multipleCancelButton = new Choices('#category_in_product_normal_product', {
   removeItemButton: true,
});


});
            $(document).ready(function() {

               var multipleCancelButton = new Choices('#sms_mu_select_category', {
                  removeItemButton: true,
               });


            });
            // $(document).ready(function () {

            //    var multipleCancelButton = new Choices('#sms_mu_parent_ctg', {
            //       removeItemButton: true,
            //       maxItemCount: 5,
            //       searchResultLimit: 5,
            //       renderChoiceLimit: 5
            //    });


            // });
         </script>