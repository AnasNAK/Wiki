<?php 

if($_SESSION['role'] != 2){
    header("location: ../pages/index.php");
   }


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME ; ?></title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/admin.css">
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Paroly</span>
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
                <a href="<?php echo URLROOT ?>/AdminController/logout " class="logout">
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
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Where your music
                        is everything</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                    </ul>
                </div>
            </div>

            <ul class="box-info">
                <li>
                    <a href="<?= URLROOT ?>/AdminController/styleForm " style="display:flex; justify-content:center; align-items:center;">
                        <i class='bx'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">

                                <title />

                                <g id="Complete">

                                    <g data-name="add" id="add-2">

                                        <g>

                                            <line fill="none" stroke="#000000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                y2="5" />

                                            <line fill="none" stroke="#000000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                y2="12" />

                                        </g>

                                    </g>

                                </g>
                            </svg>
                        </i>

                        <span class="text">

                            <h3>Add style</h3>
                        </span>
                    </a>
                </li>
                <li>
                <a href="<?= URLROOT ?>/AdminController/PlaylistForm " style="display:flex; justify-content:center; align-items:center;">
                 <i class='bx'><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                            viewBox="0 0 24 24">

                            <title />

                            <g id="Complete">

                                <g data-name="add" id="add-2">

                                    <g>

                                        <line fill="none" stroke="#000000" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19" y2="5" />

                                        <line fill="none" stroke="#000000" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12" y2="12" />

                                    </g>

                                </g>

                            </g>
                        </svg></i></a>
                   

                    <span class="text">
                        <h3>Add playlist</h3>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Styles</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Style Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['styleNames'] as $styleName): ?>
                            <tr>
                                <td>
                                    <p><?= $styleName; ?></p>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>



                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Recent Albums</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Album</th>
                                    <th>date of addition</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="img/people.png">
                                        <p>John Doe</p>
                                    </td>
                                    <td>01-10-2021</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="img/people.png">
                                        <p>John Doe</p>
                                    </td>
                                    <td>01-10-2021</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="img/people.png">
                                        <p>John Doe</p>
                                    </td>
                                    <td>01-10-2021</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="img/people.png">
                                        <p>John Doe</p>
                                    </td>
                                    <td>01-10-2021</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="img/people.png">
                                        <p>John Doe</p>
                                    </td>
                                    <td>01-10-2021</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="<?php echo URLROOT;  ?> /js/admin.js"></script>
    <?php require APPROOT.'/views/includes/footer.php'; ?>