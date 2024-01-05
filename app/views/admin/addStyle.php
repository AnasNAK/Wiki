<?php 

if($_SESSION['role'] != 2){
    header("location: ../pages/index.php");
   }


?>
<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= SITENAME?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a4fc922de4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="text-white font-[sitika]" style="background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(34,116,24,1) 100%); background-size: cover; background-repeat: no-repeat;
    height: 95vh;">
    <section class="max-w-4xl p-6 mx-auto bg-green-600 rounded-md shadow-md my-7">
        <h1 class="text-4xl font-bold capitalize">Add Style</h1>
        <form action="<?= URLROOT ?>/StyleController/addStyle" method="POST" id="form" >

            <div id="formInp">
                <div class="form-group mb-6">
                    <input type="text" name="name" class="form-control block w-full px-3 py-1.5 text-base font-normal text-black bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-black focus:bg-white focus:border-green-600 focus:outline-none" placeholder="Style Name">
                </div>
                <?php flash('addStyle') ?>
                <hr class="border-2 my-4">
            </div>

            <div class="flex justify-between mt-6">
                <div class="flex gap-6">
                    <button type="submit" class="px-6 py-2 leading-5 transform rounded-md focus:outline-none font-bold bg-[#FFF8ED] text-black transition hover:bg-green-900 hover:text-white">
                        Save
                    </button>
                    <a href="<?= URLROOT ?>/AdminController/dash">
                        <button type="button" class="px-6 py-2 leading-5 transform rounded-md focus:outline-none font-bold bg-[#FFF8ED] text-black transition hover:bg-green-900 hover:text-white">
                            Cancel
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </section>
</body>


</html>
