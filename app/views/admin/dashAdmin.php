<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITENAME ; ?></title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/admin.css">
    <link href="https://unpkg.com/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">




</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class=" ml-4 w-10" src="<?= URLROOT ?>/img/logo.png" alt="">

        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home Page</span>
                </a>
            </li>


        </ul>
        <ul class="side-menu">

            <li>
                <a href="<?= URLROOT ?>" class="logout">
                    <i class='bx bxs-log-out-circle'></i>

                    <span class="text">Back To Home</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">

            <li>
                <a href="<?= URLROOT ?>/AdminController/logout " class="logout">
                    <i class='bx bxs-log-out-circle'></i>

                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>

    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link"><?php echo $_SESSION['username'] ?></a>


        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Where your wiki
                        is everything</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                    </ul>
                </div>
            </div>


            <div class="flex gap-3 ">
                <div
                    class="flex bg-gray-300 justify-center text-center rounded-lg text-xl hover:bg-gray-700 transition duration-300 ease-in-out  hover:shadow-2xl hover:text-white  w-1/4">



                    <span class="font-bold">
                        <h3>Tags</h3>
                        <p><?= $data['tagsData'][0]['counter'] ; ?></p>
                    </span>
                </div>
                <div
                    class="flex bg-gray-300 justify-center text-center rounded-lg text-xl hover:bg-gray-700 transition duration-300 ease-in-out  hover:shadow-2xl hover:text-white w-1/4">



                    <span class="font-bold">
                        <h3>Categories</h3>
                        <p><?= $data['countcats'] ; ?></p>
                    </span>
                </div>
                <div
                    class="flex bg-gray-300 justify-center text-center rounded-lg text-xl hover:bg-gray-700 transition duration-300 ease-in-out  hover:shadow-2xl hover:text-white w-1/4">



                    <span class="font-bold">
                        <h3>Wikis</h3>
                        <p>66</p>
                    </span>
                </div>
                <div
                    class="flex bg-gray-300 justify-center text-center rounded-lg text-xl transition duration-300 ease-in-out  hover:shadow-2xl hover:bg-gray-700 hover:text-white w-1/4">



                    <span class="font-bold">
                        <h3>Users</h3>
                        <p><?= $data['countUsers'] ; ?></p>
                    </span>
                </div>
            </div>
            <ul class="box-info">
                <li id="addTag" class="cursor-pointer">
                    <a href="" style="display:flex; justify-content:center; align-items:center;">
                        <i class='bx  '>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">

                                <title />

                                <g id="Complete">

                                    <g data-name="add" id="add-2">

                                        <g>

                                            <line fill="none" stroke="#ffffff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                y2="5" />

                                            <line fill="none" stroke="#ffffff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                y2="12" />

                                        </g>

                                    </g>

                                </g>
                            </svg>
                        </i>

                        <span class="text">

                            <h3>Add tag</h3>
                        </span>
                    </a>
                </li>
                <li id="addCat">
                    <a href="" style="display:flex; justify-content:center; align-items:center;">
                        <i class='bx'><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                                viewBox="0 0 24 24">

                                <title />

                                <g id="Complete">

                                    <g data-name="add" id="add-2">

                                        <g>

                                            <line fill="none" stroke="#ffffff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                y2="5" />

                                            <line fill="none" stroke="#ffffff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                y2="12" />

                                        </g>

                                    </g>

                                </g>
                            </svg></i></a>


                    <span class="text">
                        <h3>Add Categorie</h3>
                    </span>
                </li>


            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Tags</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>tag Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['tagsData'] as $tagData): 
                                                  ?>
                            <tr>
                                <td>
                                    <p><?= $tagData['name']; ?></p>
                                </td>
                                <td>
                                    <button class="update-btn" data-tag-id="<?= $tagData['id']; ?>"
                                        data-tag-name="<?= $tagData['name']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                                <td>

                                    <button class="delete-btn" data-id="<?= $tagData['id']; ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>


                    </table>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Categories</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Categorie</th>
                                    <th>date of addition</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['catsData'] as $catData): 
                                                  ?>
                            <tr>
                                <td>
                                    <p><?= $catData['name']; ?></p>
                                </td>
                                <td>
                                    <p><?= $catData['date']; ?></p>
                                </td>
                                <td>
                                    <button class="update-btn-cat" data-cat-id="<?= $catData['id']; ?>"
                                        data-cat-name="<?= $catData['name']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                                <td>

                                    <button class="delete-btn-cat" data-cat-id="<?= $catData['id']; ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </main>
    </section>
    <?php

        echo '<script>';
        echo 'const urlRoot = ' . json_encode(URLROOT) . ';';
        echo '</script>';
?>
    <script src="<?php echo URLROOT;  ?> /js/admin.js"></script>
    <script src="<?php echo URLROOT ?>/js/dashAdmin.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php require APPROOT.'/views/includes/footer.php'; ?>