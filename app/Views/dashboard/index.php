<?php
// include ('../app/Views/partials/header.php');
require_once __DIR__ . '/../partials/header.php';
?>
 <!-- Leaflet CSS -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<style>
    .sms_ma_index_to_order_button{
      background-color: #4987D8 !important;
      color: white;
      font-weight: 900;
      border-radius: 20px;
      padding: 8px !important;
      height: 80%;
    }
    .sms_w_date_active{
        background-color:#A8C3E7;
    }
</style>
<!-- Map Css -->
<style>
  /* CSS for the map container */
  #map {
    height: 300px;
    width: 100%;
  }

  /* CSS for the tooltip */
.tooltip {
      position: absolute;
      background-color: white;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      pointer-events: none;
      display: none;
}
</style>
<!-- Map Css End -->
        <!-- Header Start -->

            <div class="row g-2 mt-5 mb-5 align-items-center">
                <!-- Stats header Buttons -->
                <div class="col-auto btn-list">
                    <a href="" class="btn btn-pill btn-light tab-pane sms_w_date_active sms_w_date"> 24 Hours</a>
                    <a href="" class="btn btn-pill btn-light tab-pane sms_w_date"> Last Week </a>
                    <a href="" class="btn btn-pill btn-light tab-pane sms_w_date"> Last Month </a>
                    <a href="" class="btn btn-pill btn-light tab-pane sms_w_date"> Last Year </a>
                </div>
                <!-- Date Range Button  Start-->
                <div class="col-auto ms-auto d-print-none d-none d-sm-inline">
                        <a
                        class="card text-center  rounded-4 p-2">
                        <p class="p-0 mb-0 d-2 ">Filter by dates</p>
                        <p class="p-0 mb-0">10/02/24-10/03/2024</p>
                        </a>
                </div>
                <!-- Date Range Button End -->
            </div>

        <!-- Header End -->

        <!-- Card Start -->

        <div class="row g-2 mb-5">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card pt-2 h-100 " style="border-radius:20px;">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-8">
                               <h3 class="text-muted"> New Products </h3>  
                            </div>
                            <div class="col-auto ms-auto">
                                <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g filter="url(#filter0_d_272_20)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_20)" shape-rendering="crispEdges"/>
                                    <circle cx="29" cy="25" r="25" fill="#F51975" fill-opacity="0.29" shape-rendering="crispEdges"/>
                                    </g>
                                    <defs>
                                    <filter id="filter0_d_272_20" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_20"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_20" result="shape"/>
                                    </filter>
                                    <pattern id="pattern0_272_20" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_272_20" transform="scale(0.03125)"/>
                                    </pattern>
                                    <image id="image0_272_20" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAe9JREFUWIXtlrFuE0EQhr85Ow6yBOEspUuBeAGQ0pqOB0B+AipT7XGu0lBYokljGeFz43dIHVFAgZSSFlIFJYIO2VFoLNu7Q3FnyYV15zs7pvEvbbP6Z/ebmd29g512+s+SooHGmEPgBUClUvna6XT+FFnHKxIUBMFbEbkWkTMROZtOpzdBEJitABhjGsAH4LNzru6cq4vIF+BjGIav7h1ARE6A7+PxuBFF0UUURRe+7zeAS+fcyb0DAM+AT4PBYDqfaLfbE+AceL4NgH3gbsn8HfAg72KZt8AYc+R53jtVnXubwLdkLOo4GQMAEVHP8953u93faeuXMwlFjlX1DfALmABXgA+8XGK/SuYrqnpkrT0H1gMAagDW2nq/379ewU8Yhk+ccz9V1c/yZp4BEakBeJ43WmVzAGvtcDF2LYAki1mv1/u7KkDinYnI+hUg7vctoKsCJN7bjbSA+AwMc2w+12iTLVi5/4sAmzqERQGGxO1bD0BVC7VAREYkV3gtgKIVUNURG6iAAAdJNrkkIkPgMRnPfSpAs9l8BJSTbHIpiSkbYx6m+VKf4mq16jvnUNW9Vqv1NA/AbDbbExFKpVKN5V/PbADiEiIip9ba0zwAInHlrbUHab5UAGvtDxF5TfwPkFuqOgEui8TutNPW9A9LS7Dauv/KAgAAAABJRU5ErkJggg=="/>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6">
                               <h3> 647 </h3>  
                            </div>
                            <div class="col-auto ms-auto">
                               <span style="color:#40A826"> 10 % </span>
                                <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826"/>
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
                        <div class="row g-2">
                            <div class="col-8">
                               <h3 class="text-muted"> New Arivals </h3>  
                            </div>
                            <div class="col-auto ms-auto">
                                <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g filter="url(#filter0_d_272_30)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_30)" shape-rendering="crispEdges"/>
                                    <circle cx="29" cy="25" r="25" fill="#D9D9D9" fill-opacity="0.08" shape-rendering="crispEdges"/>
                                    </g>
                                    <defs>
                                    <filter id="filter0_d_272_30" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_30"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_30" result="shape"/>
                                    </filter>
                                    <pattern id="pattern0_272_30" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_272_30" transform="scale(0.03125)"/>
                                    </pattern>
                                    <image id="image0_272_30" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAA05JREFUWIW9lk9oJFUQh7/3uo1ZMOAOgv8FFfWgIGvMzYOuisriwYviIoJkMXuYns4cJCt4aFjiKijDzEvUBCEKC95lES8romtcUU9eRE+CrLqHzBriJhPz+ufBJHbGyfRLNKnTdNWrel9XVVeNYZ/EOfegpFngGuCNWq32KoDdLwDgNHAHcBCYbDabw/sGkGXZgKRrizpr7Y37CbAq6eOC6vuVlZWzAPF+ALRarUPAQ8BxYHF5efnMxMTEHwAmJECWZbZSqZwAnpD09eDg4CtjY2OXQ3ynp6ev8t5/I+n9NE1PdduDMlCpVEaBSQBjzAOrq6seeCnE13vvgJ/b7fbrveyhJRgpPki6P8Sp1Wo9Cxzx3t+bZVne60xoE/7W9Xz31NTUo/0cGo3GbcDbwAv1ev2X7c6V9oBz7jlJbwEngZuMMV9JGgCakt5Z74c/iz4zMzNXdDqdc8B8rVar94vftwTOuaOSpiU9labp2aKt0Wh8GkXRB51OZ77ZbB5N0/THDVun0zkJHBgaGnq57AW3zUCz2TxmjHkzz/Mnx8fHP+t1JsuygUqlcgoYBWaBR4DfgfustSPVavWHXQE4545Les0YcyRJki/KgjjnRiW9W1D9lCTJrcYYlfnGAHNzc4NLS0u1PM/vtNa2JR0DHk+S5HxZAABJF7tUN8/Ozh4ASmdFDLC4uDhljBk1xiAJSc+naRp0OYD3/vMoii4AN6yrPgwdVBbAGLPlk7LWXh96OUC9Xr9kjBkBTgAvLiwsPBPqu/EVnAduWf+tPM/ndwIAkCTJBaDntANwzr0n6Z6CarFWqx2OAbz3Y1EU/QrcLul0mqbndgpQJpLuAoYLqjasZ6Ber18C0v/70jKmTYAyaTQaV1trny7qoij6rlqtfrnTCwtiggHiOL5O0kxR571vAJsAzrnDkjZ3i6R2mqbflsYOAegl3UNG0kfAlQX7J8DDfUIIAreh9750ovHvFAfZgwDiOA4B2JXEAM65xyRNFg3W2qxarZ6BvzNgzNa1Ial7j3T/4Siz/wOQ5/lBY8zwltN5XulHHrBogrK2UYKedBsSWIJdlckCWGv7Ou95E0rasyYrk41tuOcZ2O4lgzKw5z1QBrC2tvafAbbL8l9Ss2eLdNsaugAAAABJRU5ErkJggg=="/>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6">
                               <h3> 1457 </h3>  
                            </div>
                            <div class="col-auto ms-auto">
                               <span style="color:#40A826"> 10 % </span>
                                <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826"/>
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
                        <div class="row g-2">
                            <div class="col-8">
                               <h3 class="text-muted"> New Customers </h3>  
                            </div>
                            <div class="col-auto ms-auto">
                                <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g filter="url(#filter0_d_272_40)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_40)" shape-rendering="crispEdges"/>
                                    <circle cx="29" cy="25" r="25" fill="#56AEEE" fill-opacity="0.2" shape-rendering="crispEdges"/>
                                    </g>
                                    <defs>
                                    <filter id="filter0_d_272_40" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_40"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_40" result="shape"/>
                                    </filter>
                                    <pattern id="pattern0_272_40" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_272_40" transform="scale(0.03125)"/>
                                    </pattern>
                                    <image id="image0_272_40" width="32" height="32" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAGjAAABowFXcvtNAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAABSRJREFUWIW1l22IXFcZx3//c++6SZsE9sWF2kKU1MbGYkISMAURbKl9oZaCaEvF1n5oCiZzbiadpsFWM5EWUwuZnTPjQjCSD1WKa/IhGj/kQynJBwttYhtLXyDal2gkzctu0inUXWfO44e9i7OTrLtrdx+4zDnP+T/3+d1nzj3nHtFhIYQNwHPAGklnzWzfyMjIrnK53OzUzoe59k6lUrkGOAhUgf4Y4x1mdltfX9/WhUgOkLZ3kiS5Fzjkvd+fu06GELaY2a+Bny8EwJQKSLpW0vvtvlar9R5w3UIkvwwgxngqxnhDB9RKYArUggGY2UFJdw4ODq4EKJfLzjm3XdILCwWgTkcI4UHgWWA/sBqIwO3e+7EFAwghLDOz+yXdliddAXwCXA2MACeAY8BvvPcn5hPAhRBWA39xzn1D0v4kSe4aGRnp9t4v8d4L+JKkpyU1gEPVarU8nwAKIbxsZkNZlj0/k7her/fFGI/FGL+7ZcuWV+cDwAHrR0dHfzsb8ebNmy8Ah51z6yd9+/btWzSd/n+NtQOk5XJ5fDYAuY0BXeVyOQ0hvNhoNEaq1er3O0UhBN9oNC6GEA6Y2WWTvR1gMmBVrVb79pVE9Xq9r1ar/bDd19PT8yhgkrY65+7qjDGzu83sB8DyEMJ9MwIA683sniuJzOwLZvbwZF9Sj6QfS9puZqUY497LbuzcLyVtizFulfTsnj17rpoJYNZmZt7MDpjZrcAbWZa92KkpFAq/M7OGc26lpD+Nj48/Pm8AgJIkGQJKZrZtOlGMMQN+KulpM9tcr9eXzwfATWa2I8ZYMrO9WZadnE5YLBZfB/4QY3xYUt3Mdn0qgFqtdo+ka8zsFeB2ST+bKaarq+sp4MFms3nQzDYMDg5+vX1cIYSzSZJ8pdVqfRO41Xv/ULugUqmsSZLkO8D3gH8DLwM3Av80sz/OBlzSfUACXABWmNkQgHPuaAq80Gq1fiHpqJlNCQwhdAMvAfslHW4b+nN+43WzAQD+2tY+L2ldjLHLzHamS5cufaLRaDxnZs8AB9qjms3m1WmaRu/9I7NMNCcLIfx3hcq34Sl/wfDwcHLmzJl3mShdnOf8XYDS6UYrlcqN586d+3ur1VrtnPuWpL0xxq9J+lQgzjmZ2VHgziRJjk/7FqRp+kyM8ZZisXjRzN4BPmNmH2dZdlzSckk7JH0yOjr6mqRHJW1btmzZmzHGv0na4Zy7P9cmQFlST5Zlx2OMl4APvfdHNm3a9PG0APkGMmU8TdPJSbfVzBYBvre393PAvcD1jUbjq0mS3AIsNbPC7t27FwOPS1oEFPIKrCWfxHQmmMnMbF3++4GkD4Avd3d3N/LqvAd8VtJA3laxWPwXEwvXpB4m9pxjcwJIksQAAyYr8FZeoVUbN278CLgK+MjMemOMPZIMuLhz584uYLmkLjN7O4df65ybWwVarZaAk8Ca4eHhRNLbkvqBWK1WB4CLAM65Xudcr5lJ0oX+/v4vAqeY+MachF47NjZ2/P+pwCXgw9OnT99gZm/k1WikaXotcJaJFW6xmS2WdH2M8ZyZXQeMA6vGx8ffHBoaWgFcKpVK5+cEkJuAV9M03ZBl2UlJNUkHBgYGTjjntgOnzOxXkurAPyT9ZMmSJUeAI8CTpVLpfLPZvBmY8i057TpwRQLpeTOr1mq1Y4VCof2seCi/Ju2BtnYBoFqt3iTpSeCxzqcCoF6v3x1j/D1XOKzkdth7f0cI4RHgR8Dn5wLPxPFul/d+T7vzP0SLQX5uXo/WAAAAAElFTkSuQmCC"/>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6">
                               <h3> 127 </h3>  
                            </div>
                            <div class="col-auto ms-auto">
                               <span style="color:#B50E0E"> 10 % </span>
                               <svg width="18" height="18" viewBox="0 0 34 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.34266 26.723C3.52496 26.8559 2.75435 26.3008 2.62146 25.4831L0.455822 12.1579C0.322929 11.3402 0.878071 10.5696 1.69577 10.4367C2.51347 10.3038 3.28408 10.8589 3.41697 11.6766L5.34198 23.5212L17.1866 21.5962C18.0043 21.4633 18.7749 22.0185 18.9078 22.8362C19.0407 23.6539 18.4855 24.4245 17.6678 24.5574L4.34266 26.723ZM33.5894 3.37936C24.9245 7.08173 19.9574 8.70925 17.0673 9.48379C15.6143 9.87318 14.6967 10.0441 14.1286 10.1517C13.8205 10.21 13.7145 10.2328 13.6656 10.2475C13.6281 10.2588 13.8847 10.1945 14.1074 9.92073C14.306 9.67649 14.326 9.44074 14.3054 9.55321C14.298 9.59317 14.2904 9.64396 14.2745 9.7502C14.2599 9.84685 14.2411 9.97026 14.2157 10.1136C14.11 10.7095 13.9065 11.5538 13.4025 12.7997C12.4079 15.2583 10.2371 19.2924 5.3191 26.1192L2.88496 24.3657C7.74014 17.6261 9.75583 13.8143 10.6215 11.6746C11.0476 10.6212 11.1929 9.9782 11.2618 9.58951C11.2801 9.48673 11.2941 9.39542 11.3078 9.30394C11.3201 9.22206 11.3364 9.1113 11.3547 9.01149C11.3854 8.84441 11.4641 8.41616 11.78 8.02782C12.1198 7.60993 12.552 7.44991 12.7995 7.37529C13.0356 7.30411 13.3239 7.25074 13.5704 7.20405C14.1115 7.10157 14.9444 6.94686 16.2907 6.58605C18.9992 5.86016 23.8259 4.28874 32.4106 0.620639L33.5894 3.37936Z" fill="#B50E0E"/>
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
                        <div class="row g-2">
                            <div class="col-8">
                               <h3 class="text-muted"> Total Transiction </h3>  
                            </div>
                            <div class="col-auto ms-auto">
                                <svg width="40" height="40" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g filter="url(#filter0_d_272_50)">
                                    <circle cx="29" cy="25" r="25" fill="url(#pattern0_272_50)" shape-rendering="crispEdges"/>
                                    <circle cx="29" cy="25" r="25" fill="#EE5656" fill-opacity="0.2" shape-rendering="crispEdges"/>
                                    </g>
                                    <defs>
                                    <filter id="filter0_d_272_50" x="0" y="0" width="58" height="58" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_272_50"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_272_50" result="shape"/>
                                    </filter>
                                    <pattern id="pattern0_272_50" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_272_50" transform="scale(0.03125)"/>
                                    </pattern>
                                    <image id="image0_272_50" width="32" height="32" xlink:href="data:image/png;base64,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"/>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6">
                            <h3> 12,500 NIS</h3>  
                            </div>
                            <div class="col-auto ms-auto">
                            <span style="color:#40A826"> 10 % </span>
                                <svg width="18" height="18" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.35621 0.521719C3.53976 0.38134 2.7641 0.929399 2.62372 1.74585L0.336094 15.0506C0.195717 15.8671 0.743774 16.6427 1.56022 16.7831C2.37667 16.9235 3.15233 16.3754 3.29271 15.559L5.32616 3.73252L17.1526 5.76596C17.9691 5.90634 18.7447 5.35828 18.8851 4.54183C19.0255 3.72539 18.4774 2.94973 17.661 2.80935L4.35621 0.521719ZM33.5991 24.3221C24.9338 20.5471 19.9658 18.8874 17.0744 18.0973C15.6206 17.7001 14.7023 17.5257 14.1339 17.4159C13.8253 17.3564 13.7208 17.3334 13.6734 17.3188C13.6399 17.3085 13.8963 17.3753 14.1163 17.6511C14.3093 17.8931 14.3274 18.124 14.3063 18.0066C14.2987 17.9647 14.291 17.9118 14.2751 17.804C14.2606 17.7055 14.2418 17.5803 14.2165 17.4349C14.1115 16.8312 13.9091 15.9738 13.4063 14.7066C12.4134 12.2045 10.2447 8.09426 5.32708 1.13444L2.87698 2.86561C7.73256 9.73765 9.75025 13.6268 10.6178 15.8131C11.0451 16.89 11.1913 17.5491 11.261 17.9492C11.2793 18.0548 11.2934 18.1485 11.3072 18.2418C11.3196 18.3258 11.3356 18.4376 11.3538 18.5382C11.3839 18.7059 11.4608 19.133 11.771 19.5219C12.1083 19.9446 12.5402 20.109 12.7918 20.1863C13.0293 20.2594 13.319 20.314 13.5651 20.3615C14.106 20.466 14.9382 20.6236 16.2836 20.9912C18.9908 21.7309 23.8165 23.3327 32.4009 27.0724L33.5991 24.3221Z" fill="#40A826"/>
                                </svg>
                                <p style="font-size:10px;">last 7 days </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card End -->
        
        <!-- Graph and Map Start -->
        <div class="row mb-5">
            <!-- Graph Start -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                <div class="card h-100" style="border-radius:20px;">
                    <div class="">
                        <div class="row card-body d-flex justify-content-end">
                            <div class="col-2 d-flex flex-column justify-content-center">
                            <p class="bg-primary p-3"></p>
                            <h6 class="text-center" >Website</h6>
                            <p class="bg-info p-3"> </p>
                            <h6 class="text-center text-nowrap " >Application</h6>
                            </div>
                            <div class="col-10"> <div id="chart-completion-tasks-8"></div></div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- Graph End -->
            <!-- Map Start -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                <div class="card h-100" style="border-radius:20px;">
                    <div class="card-body">
                         <!-- Start header -->
                         <div class="row g-2 align-items-center">
                            <div class="col-auto">
                                <h4 class="text-primary">Customer Location</h4>
                            </div>
                            <div class="col-auto ms-auto">
                                <div class="mb-3">
                                    <select type="text" class="form-select dropdown-tom-select-style with-input" placeholder="Filter by city" multiple>
                                        <option value="Beit_Shemesh">Beit Shemesh</option>
                                        <option value="Jerusalem">Jerusalem</option>
                                        <option value="Bnei_Brak">Bnei Brak</option>
                                        <option value="Hod_Hasharon">Hod Hasharon</option>
                                        <option value="Afula">Afula</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->
                        <!-- Map and City Data Start -->
                        <div class="row g-2 align-items-center">
                             <!-- Map Data Start -->
                             <div class="col-lg-8 col-md-9 col-sm-12">
                                <div id="map" style="border-radius:20px;"></div>
                                <div id="tooltip" class="tooltip"></div>
                            </div>
                            <!-- Map Data End -->
                            <!-- Filter City Data Start  -->
                            <div class="col-lg-4 col-md-3 col-sm-12">
                                <!-- City name with progress bar start -->
                                <div class="row g-2">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <p class="text-end">Beit Shemesh</p>
                                        <div class="progress mb-2" style="height:15px; border-radius:10px; margin-top:-10px;">
                                            <div class="progress-bar" style="width: 25%; border-radius:10px;" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <br>
                                        <h3>25%</h3>
                                    </div>
                                </div>
                                <!-- City name with progress bar end -->
                                <!-- City name with progress bar start -->
                                <div class="row g-2">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <p class="text-end">Jerusalem</p>
                                        <div class="progress mb-2" style="height:15px; border-radius:10px; margin-top:-10px;">
                                            <div class="progress-bar" style="width: 50%; border-radius:10px;" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <br>
                                        <h3>50%</h3>
                                    </div>
                                </div>
                                <!-- City name with progress bar end -->
                                <!-- City name with progress bar start -->
                                <div class="row g-2">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <p class="text-end">Bnei Brak</p>
                                        <div class="progress mb-2" style="height:15px; border-radius:10px; margin-top:-10px;">
                                            <div class="progress-bar" style="width: 15%; border-radius:10px;" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <br>
                                        <h3>15%</h3>
                                    </div>
                                </div>
                                <!-- City name with progress bar end -->
                                <!-- City name with progress bar start -->
                                <div class="row g-2">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <p class="text-end">Hod Hasharon</p>
                                        <div class="progress mb-2" style="height:15px; border-radius:10px; margin-top:-10px;">
                                            <div class="progress-bar" style="width: 18%; border-radius:10px;" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <br>
                                        <h3>18%</h3>
                                    </div>
                                </div>
                                <!-- City name with progress bar end -->
                                <!-- City name with progress bar start -->
                                <div class="row g-2">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <p class="text-end">Afula</p>
                                        <div class="progress mb-2" style="height:15px; border-radius:10px; margin-top:-10px;">
                                            <div class="progress-bar" style="width: 3%; border-radius:10px;" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <br>
                                        <h3>3%</h3>
                                    </div>
                                </div>
                                <!-- City name with progress bar end -->
                            </div>
                            <!-- Filter City Data End -->
                           
                        </div>
                        <!-- Map and City Data End -->
                    </div>
                </div>
            </div>
            <!-- Map End -->
        </div>
        <!-- Graph and Map End -->

            <!-- Card Start -->
            <div class="row mb-5">
                <div class="col-lg-3 col-md-3 col-sm-12 mb-2">
                    <div class="card h-100" style="border-radius:20px; background: rgb(48,61,129); background: linear-gradient(270deg, rgba(48,61,129,1) 0%, rgba(46,148,176,1) 53%);">
                        <div class="card-body p-5 mb-4 mt-4">
                            <h1 class="text-start text-light">Tell us what additional data you would like to have on your desktop</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                    <div class="card h-100" style="border-radius:20px;">
                        <div class="card-body">
                            <!-- Stats header -->
                            <div class="row g-2 align-items-center">
                                <div class="col-5">
                                    <h4 class="text-primary">For All Products</h4>
                                </div>
                                <div class="col-7 ms-auto text-end">
                                    <h4 class="text-muted">The best selling products</h4>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Images Start -->
                            <div class="row g-2 align-items-center">
                                <div class="col-4">
                                    <img src="../../../assets/dist/img/payments/Rectangle 30.png" >
                                </div>
                                <div class="col-4">
                                    <img src="../../../assets/dist/img/payments/Rectangle 31.png" >
                                </div>
                                <div class="col-4">
                                    <img src="../../../assets/dist/img/payments/Rectangle 32.png" >
                                </div>
                            </div>
                            <!-- End Images -->
                        </div>
                    </div>
                </div>
                <!-- Table Start -->
                <div class="col-lg-5 col-md-5 col-sm-12 mb-2">
                    <div class="card h-100" style="border-radius:20px;">
                        <div class="card-body">
                            <!-- Start header -->
                            <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <h4 class="text-primary">For All Orders</h4>
                                </div>
                                <div class="col-auto ms-auto">
                                    <h4 class="text-muted">Last Orders</h4>
                                </div>
                            </div>
                            <!-- End Header -->
                            <!-- Table Start -->
                            <div class="card-table table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                        <th>order no</th>
                                        <th>client</th>
                                        <th>date</th>
                                        <th colspan="2">sum</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="text-muted">24452#</td>

                                        <td class="text-muted">Simcha</td>
                                        <td class="text-muted">12/06/23</td>
                                        <td>
                                        NIS
                                        <a href="#" class="ms-1"
                                            aria-label="Open website">
                                        </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">72.65%</td>
                                        <td class="text-muted">2,865</td>
                                        <td class="text-muted">3,256</td>
                                        <td>
                                            <span  class="sms_ma_index_to_order_button text-nowrap btn-sm btn"> 
                                            to order

                                            </span>
                                        <a href="#" class="ms-1"
                                            aria-label="Open website">
                                        </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">24452# </td>
                                        <td class="text-muted">Cohen</td>
                                        <td class="text-muted">12/06/23</td>
                                        <td>
                                        149,50
                                        </td>

                                    </tr>
                                
                                </table>
                                <!-- <button class="sms_ma_index_to_order_button">click</button> -->
                            </div>
                            <!-- Table End -->
                        </div>
                    </div>
                </div>
                <!-- Table End -->
            </div>
        <!-- Card End -->

        <script>
  // Initialize the map
  var map = L.map('map').setView([31.0461, 34.8516], 7); // Set center to Israel

  // Add OpenStreetMap tile layer
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  // Add a marker with a tooltip to the map
  var marker = L.marker([31.7683, 35.2137]) // Example location in Jerusalem
    .addTo(map)
    .bindTooltip("Jerusalem")
    .openTooltip();

  // Add event listener for showing tooltip on hover
  marker.on('mouseover', function (e) {
    var tooltip = document.getElementById('tooltip');
    tooltip.innerHTML = "Jerusalem";
    tooltip.style.left = (e.originalEvent.pageX + 10) + 'px';
    tooltip.style.top = (e.originalEvent.pageY + 10) + 'px';
    tooltip.style.display = 'block';
  });

  // Add event listener for hiding tooltip on mouseout
  marker.on('mouseout', function () {
    document.getElementById('tooltip').style.display = 'none';
  });

</script>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    // Get all buttons within the div with class 'col-auto btn-list'
    var buttons = document.querySelectorAll('.sms_w_date');

    // Loop through each button
    buttons.forEach(function(button) {
        // Attach onclick event handler
        button.addEventListener('click', function(event) {
            // Prevent default action of the anchor tag
            event.preventDefault();

            // Remove active class from all buttons
            buttons.forEach(function(btn) {
                btn.classList.remove('sms_w_date_active');
            });

            // Add active class to the clicked button
            this.classList.add('sms_w_date_active');
        });
    });
});

</script>


        <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-8'), {
      		chart: {
      			type: "bar",
      			fontFamily: 'inherit',
      			height: 370,
      			parentHeightOffset: 0,
      			toolbar: {
      				show: false,
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		plotOptions: {
      			bar: {
      				columnWidth: '50%',
      			}
      		},
      		dataLabels: {
      			enabled: false,
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [{
      			name: "Website",
      			data: [155, 65, 465, 265, 225, 325, 80]
      		},{
      			name: "Application",
      			data: [113, 42, 65, 54, 76, 65, 35]
      		}],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			padding: {
      				top: -20,
      				right: 0,
      				left: -4,
      				bottom: -4
      			},
      			strokeDashArray: 4,
      		},
      		xaxis: {
      			labels: {
      				padding: 0,
      			},
      			tooltip: {
      				enabled: false
      			},
      			axisBorder: {
      				show: false,
      			},
      			type: 'text',
      		},
      		yaxis: {
      			labels: {
      				padding: 4
      			},
      		},
      		labels: [
      			'First', 'Second', 'Third', 'Fourth', 'Fifth', 'sixth', 'Seventh'
      		],
      		colors: [tabler.getColor("primary"), tabler.getColor("info")],
      		legend: {
      			show: false,
      		},
      	})).render();
      });
      // @formatter:on
    </script>
    <!-- Include the Google Maps JavaScript API -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4g53Qe1VW1Aq3rLeMZq79ltsBR6YExaE
&callback=initMap">
</script>

<script>
		document.addEventListener("DOMContentLoaded", function () {
			var dropdowns = document.querySelectorAll('.dropdown-tom-select-style');
			dropdowns.forEach(function (el) {
				var withInput = el.classList.contains('with-input');
				if (window.TomSelect) {
					new TomSelect(el, {
						copyClassesToDropdown: false,
						dropdownParent: 'body',
						controlInput: withInput ? '<input>' : false,
						render: {
							item: function (data, escape) {
								if (data.customProperties) {
									return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
								}
								return '<div>' + escape(data.text) + '</div>';
							},
							option: function (data, escape) {
								if (data.customProperties) {
									return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
								}
								return '<div>' + escape(data.text) + '</div>';
							},
						},
					});
					if (!withInput) {
						el.style.width = '100%'; // Set width to 100% for dropdowns without the 'with-input' class
					}
					el.classList.add('dropdown-tom-select-style');
				}
			});
		});
	</script>
	<!-- Libs JS -->
    <script src="assets/dist/libs/nouislider/dist/nouislider.min.js?1695847769" defer></script>
		<script src="assets/dist/libs/litepicker/dist/litepicker.js?1695847769" defer></script>
		<script src="assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1695847769" defer></script>
<?php
require_once __DIR__ . '/../partials/footer.php';


?>