<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link href="https://unpkg.com/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

</head>
<style>


</style>

<body class=" text-gray-900 bg-gray-100" style="background: #304352;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #d7d2cc, #304352);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #d7d2cc, #304352); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

overflow-x:hidden;">

    <nav id="header" class="fixed w-full z-30 top-0 text-white">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                    href="<?php echo URLROOT ?>">

                    <img class="w-10" src="<?= URLROOT ?>/img/logo.png" alt="">
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-black hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>

            <div class=" w-full gap-3 flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Active</a>
                    </li>
                </ul>
                <?php
            if (isset($_SESSION['role'])){

           ?>

                <a id="navAction1" href="<?php echo URLROOT ?>/Users/logout"
                    class=" mx-auto cursor-pointer lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    logout

                </a>
                <a href="<?php echo URLROOT ?>/AuthorController/dash">
                    <button class="bg-gray-800 text-black rounded-full mr-5  py-2transition bg-white">

                        <svg id="theme-toggle-dark-icon" class="w-5 h-6 hidden" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="w-5 h-6 hidden" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16" fill="none">
                            <g clip-path="url(#clip0_13_2)">
                                <path
                                    d="M16 7.992C16 3.58 12.416 0 8 0C3.584 0 0 3.58 0 7.992C0 10.422 1.104 12.612 2.832 14.082C2.848 14.098 2.864 14.098 2.864 14.114C3.008 14.226 3.152 14.338 3.312 14.45C3.392 14.498 3.456 14.561 3.536 14.625C4.85807 15.5214 6.41871 16.0004 8.016 16C9.61329 16.0004 11.1739 15.5214 12.496 14.625C12.576 14.577 12.64 14.514 12.72 14.465C12.864 14.354 13.024 14.242 13.168 14.13C13.184 14.114 13.2 14.114 13.2 14.098C14.896 12.611 16 10.422 16 7.992ZM8 14.993C6.496 14.993 5.12 14.513 3.984 13.714C4 13.586 4.032 13.459 4.064 13.331C4.15934 12.9841 4.29917 12.651 4.48 12.34C4.656 12.036 4.864 11.764 5.12 11.524C5.36 11.284 5.648 11.061 5.936 10.885C6.24 10.709 6.56 10.581 6.912 10.485C7.26674 10.3894 7.6326 10.3413 8 10.342C9.09065 10.3343 10.1412 10.7526 10.928 11.508C11.296 11.876 11.584 12.308 11.792 12.803C11.904 13.091 11.984 13.395 12.032 13.714C10.8512 14.5442 9.44343 14.9907 8 14.993ZM5.552 7.593C5.41102 7.27022 5.34013 6.9212 5.344 6.569C5.344 6.218 5.408 5.866 5.552 5.546C5.696 5.226 5.888 4.939 6.128 4.699C6.368 4.459 6.656 4.268 6.976 4.124C7.296 3.98 7.648 3.916 8 3.916C8.368 3.916 8.704 3.98 9.024 4.124C9.344 4.268 9.632 4.46 9.872 4.699C10.112 4.939 10.304 5.227 10.448 5.546C10.592 5.866 10.656 6.218 10.656 6.569C10.656 6.937 10.592 7.273 10.448 7.592C10.309 7.90727 10.1138 8.19461 9.872 8.44C9.62653 8.68149 9.33919 8.87633 9.024 9.015C8.36283 9.28671 7.62117 9.28671 6.96 9.015C6.64481 8.87633 6.35747 8.68149 6.112 8.44C5.86981 8.19819 5.67929 7.91068 5.552 7.593ZM12.976 12.899C12.976 12.867 12.96 12.851 12.96 12.819C12.8026 12.3184 12.5707 11.8444 12.272 11.413C11.973 10.9784 11.6056 10.5951 11.184 10.278C10.862 10.0358 10.513 9.83175 10.144 9.67C10.3119 9.55925 10.4674 9.43085 10.608 9.287C10.8465 9.0515 11.056 8.7883 11.232 8.503C11.5864 7.92081 11.7694 7.25049 11.76 6.569C11.7649 6.06451 11.667 5.56432 11.472 5.099C11.2795 4.65064 11.0025 4.24356 10.656 3.9C10.31 3.56003 9.90288 3.28859 9.456 3.1C8.98991 2.90539 8.48906 2.80774 7.984 2.813C7.47887 2.80806 6.97802 2.90605 6.512 3.101C6.06125 3.28919 5.65311 3.56638 5.312 3.916C4.97204 4.26159 4.70059 4.66842 4.512 5.115C4.31705 5.58032 4.21905 6.08051 4.224 6.585C4.224 6.937 4.272 7.273 4.368 7.592C4.464 7.928 4.592 8.232 4.768 8.519C4.928 8.807 5.152 9.063 5.392 9.303C5.536 9.447 5.696 9.574 5.872 9.686C5.50184 9.85206 5.15272 10.0615 4.832 10.31C4.416 10.63 4.048 11.013 3.744 11.429C3.44226 11.8586 3.21008 12.3331 3.056 12.835C3.04 12.867 3.04 12.899 3.04 12.915C1.776 11.636 0.992 9.91 0.992 7.992C0.992 4.14 4.144 0.991 8 0.991C11.856 0.991 15.008 4.14 15.008 7.992C15.0059 9.83196 14.2753 11.5962 12.976 12.899Z"
                                    fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_13_2">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </a>




                <?php 
            }else{
            ?>




                    <a id="navAction" href="<?php echo URLROOT ?>/pages/login"
                    class="  mx-auto cursor-pointer lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    login
                </a>
                <a id="navAction1" href="<?php echo URLROOT ?>/pages/register"
                    class=" mx-auto cursor-pointer lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    register

                </a>


                <?php }
            
            ?>
            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    <img class="absolute w-2/4 right-0 z-0 opacity-50 animate-spin-slow " src="<?= URLROOT ?>/img/wikipidia.png">
    <section class="dark:bg-gray-800 dark:text-gray-100">
        <div
            class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                <h1 class="text-3xl font-bold leading-tight w-max sm:text-5xl animate__animated animate__fadeInUp">
                    Knowledge <br>
                    <span class="text-white">thrives</span> <br>
                    when shared effortlessly
                </h1>





                <p class="mt-6 mb-8 text-lg sm:mb-12 animate__animated animate__fadeInUp">Wiki necessitates an efficient
                    content management system
                    complemented by a user-centric front-end to provide an exceptional user experience.
                    <br class="hidden md:inline lg:hidden">turpis pulvinar, est scelerisque ligula sem
                </p>
                <!-- <div
                    class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                    <a rel="noopener noreferrer" href="#"
                        class="px-8 py-3 text-lg font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Suspendisse</a>
                    <a rel="noopener noreferrer" href="#"
                        class="px-8 py-3 text-lg font-semibold border rounded dark:border-gray-100">Malesuada</a>
                </div> -->
            </div>
            <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                <img src="assets/svg/Business_SVG.svg" alt=""
                    class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
            </div>
        </div>
    </section>


    <section class=" relative flex flex-col justify-center max-w-6xl min-h-screen px-4 py-10 mx-auto sm:px-6">



        <div class='max-w-md mx-auto'>
            <h2 class="m-auto text-4xl  font-bold leading-none md:text-2xl">
                search by title of wiki or category
            </h2>
            <div
                class="relative flex mt-3 items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" id="search"
                    placeholder="Search something.." />
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between mb-8">
            <h2 class="mr-10 text-4xl font-bold leading-none md:text-5xl">
                Our Wikis
            </h2>
        </div>

        <div class="flex flex-wrap -mx-4">
            <div class="w-full max-w-full mb-8 sm:w-1/2 px-4 lg:w-1/3 flex flex-col">
                <img src="https://source.unsplash.com/Lki74Jj7H-U/400x300" alt="Card img"
                    class="object-cover object-center w-full h-48" />
                <div class="flex flex-grow">
                    <div class="triangle"></div>
                    <div class="flex flex-col justify-between px-4 py-6 bg-white border border-gray-400 text">
                        <div>
                            <a href="#"
                                class="inline-block mb-4 text-xs font-bold capitalize border-b-2 border-blue-600 hover:text-blue-600">Reliable
                                Schemas</a>
                            <a href="#"
                                class="block mb-4 text-2xl font-black leading-tight hover:underline hover:text-blue-600">
                                What Zombies Can Teach You About Food
                            </a>
                            <p class="mb-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla delectus corporis
                                commodi aperiam, amet cupiditate?
                            </p>
                        </div>
                        <div>
                            <a href="#"
                                class="inline-block pb-1 mt-2 text-base font-black text-blue-600 uppercase border-b border-transparent hover:border-blue-600">Read
                                More -></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full mb-8 sm:w-1/2 px-4 lg:w-1/3 flex flex-col">
                <img src="https://source.unsplash.com/L9_6GOv40_E/400x300" alt="Card img"
                    class="object-cover object-center w-full h-48" />
                <div class="flex flex-grow">
                    <div class="triangle"></div>
                    <div class="flex flex-col justify-between px-4 py-6 bg-white border border-gray-400">
                        <div>
                            <a href="#"
                                class="inline-block mb-4 text-xs font-bold capitalize border-b-2 border-blue-600 hover:text-blue-600">Client-based
                                Adoption</a>
                            <a href="#"
                                class="block mb-4 text-2xl font-black leading-tight hover:underline hover:text-blue-600">
                                Old School Art
                            </a>
                            <p class="mb-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla delectus.
                            </p>
                        </div>
                        <div>
                            <a href="#"
                                class="inline-block pb-1 mt-2 text-base font-black text-blue-600 uppercase border-b border-transparent hover:border-blue-600">Read
                                More -></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full mb-8 sm:w-1/2 px-4 lg:w-1/3 flex flex-col">
                <img src="https://source.unsplash.com/7JX0-bfiuxQ/400x300" alt="Card img"
                    class="object-cover object-center w-full h-48" />
                <div class="flex flex-grow">
                    <div class="triangle"></div>
                    <div class="flex flex-col justify-between px-4 py-6 bg-white border border-gray-400">
                        <div>
                            <a href="#"
                                class="inline-block mb-4 text-xs font-bold capitalize border-b-2 border-blue-600 hover:text-blue-600">Intellectual
                                Capital</a>
                            <a href="#"
                                class="block mb-4 text-2xl font-black leading-tight hover:underline hover:text-blue-600">
                                5 Things To Do About Rain
                            </a>
                            <p class="mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, neque. Eius, ea
                                possimus.
                            </p>
                        </div>
                        <div>
                            <a href="#"
                                class="inline-block pb-1 mt-2 text-base font-black text-blue-600 uppercase border-b border-transparent hover:border-blue-600">Read
                                More -></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var navaction1 = document.getElementById("navAction1");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function () {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                navaction.classList.remove("bg-black");
                navaction.classList.add("gradient");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-white");
                navaction1.classList.remove("bg-black");
                navaction1.classList.add("gradient");
                navaction1.classList.remove("text-white");
                navaction1.classList.add("text-white");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-gray-800");
                    toToggle[i].classList.remove("text-white");
                }
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                navaction.classList.remove("gradient");
                navaction.classList.add("bg-white");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-gray-800");
                navaction1.classList.remove("gradient");
                navaction1.classList.add("bg-white");
                navaction1.classList.remove("text-white");
                navaction1.classList.add("text-gray-800");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-white");
                    toToggle[i].classList.remove("text-gray-800");
                }

                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");
            }
        });
    </script>
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
</body>

</html>