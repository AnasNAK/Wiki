<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a4fc922de4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>
        <?php echo SITENAME ?>
    </title>
</head>

<body class="" style="background: #304352;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #d7d2cc, #304352);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #d7d2cc, #304352); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

overflow-x:hidden;">

    <div id="flash-message" class="hidden bg-red-500 text-white z-50 p-4 fixed top-0 left-0 right-0 text-center">

    </div>

    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-b from-black to-grey-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-7 bg-white shadow-lg sm:rounded-3xl sm:p-20">

                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">Welcome Back! You Can Register Here</h1>
                    </div>
                    <?php flash('register') ?>
                    <form action="<?php echo URLROOT ?>/Users/register" method="POST" id="myForm">
                        <div class="divide-y divide-gray-400">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input autocomplete="off" id="username" name="username" type="text"
                                        class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-black focus:outline-none focus:border-rose-600"
                                        placeholder="username" value="">
                                    <label for="username"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Username</label>
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="email" name="email" type="text"
                                        class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-black focus:outline-none focus:border-rose-600"
                                        placeholder="Email address" value="">
                                    <label for="email"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                        Address</label>
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="password" name="password" type="password"
                                        class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-black focus:outline-none focus:border-rose-600"
                                        placeholder="Password" value="">
                                    <label for="password"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                </div>
                                <div class="relative flex flex-col gap-3">
                                <button type="submit"
                                        class="bg-gray-800 text-white rounded-md px-2 py-1 w-fit duration-300 hover:scale-x-125 hover:scale-y-110 duration-300 hover:bg-grey-600 hover:font-bold">Submit</button>
                                    <a class="text-end font-bold duration-500 hover:text-grey-600"
                                        href="<?= URLROOT . '/pages/index' ?>">Back to home</a>
                                    <p class="text-sm">If you Already have an account! You can <a
                                            class="text-end font-bold duration-500 hover:text-green-600"
                                            href="<?= URLROOT . '/pages/login' ?>">Login Here</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/js/signup.js"></script>

</body>

</html>