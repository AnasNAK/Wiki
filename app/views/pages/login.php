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

<body class="" style="background: rgb(0,0,0);
background: radial-gradient(circle, rgba(0,0,0,1) 0%, rgba(250,246,246,1) 45%, rgba(102,102,102,1) 100%);">

    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-b from-black to-grey-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-7 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">Welcome Back! You Can Login Here</h1>
                    </div>
                    <form action="<?php echo URLROOT ?>/Users/login" method="post">
                        <div class="divide-y divide-gray-400">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
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
                                    <button
                                        class="bg-gray-800 text-white rounded-md px-2 py-1 w-fit duration-300 hover:scale-x-125 hover:scale-y-110 duration-300 hover:bg-grey-600 hover:font-bold">Submit</button>
                                    <a class="text-end font-bold duration-500 hover:text-grey-600"
                                        href="<?= URLROOT . '/pages/index' ?>">Back to home</a>
                                    <p class="text-sm">If you don't have an account! You can <a
                                            class="text-end font-bold duration-500 hover:text-green-600"
                                            href="<?= URLROOT . '/pages/register' ?>">register Here</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
