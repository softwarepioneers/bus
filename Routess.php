<?php

function connect()
{
    $conn = new mysqli("localhost", "root", "", "otrsphp");
    if (!$conn) die("Database is being upgrade!");
    return $conn;
}
$conn = connect();
if (!$conn) die("Under Construction!");
?>
<!DOCTYPE html>
<?php
include 'constants.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo @$title; ?></title>
    
    <!-- [ FONT-AWESOME ICON ] 
        
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">


<!-- [ PLUGIN STYLESHEET ]
    
=========================================================================================================================-->

<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">

<link rel="stylesheet" type="text/css" href="css/animate.css">

<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="css/owl.theme.css">

<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

<!-- [ Boot STYLESHEET ]
    
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">

<!-- [ DEFAULT STYLESHEET ] 
    
=========================================================================================================================-->

<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/responsive.css">

<link rel="stylesheet" type="text/css" href="css/color/themecolor.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="preloader">

<div class="theme_background_color">

    <span></span>
    </div>
    <div class="wrapper">


     <!-- Navigation
    ==========================================-->

    <nav class=" nim-menu navbar navbar-default navbar-fixed-top">

<div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

        </button>

        <a class="navbar-brand" href="index.php"><?php echo $title[0]; ?><span class="themecolor">
                <?php echo $title[1]; ?></span><?php for ($i = 2; $i < strlen($title); $i++) echo $title[$i]; ?></a>

    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">

            <li><a href="index.php" class="page-scroll">
                    <h3>Home</h3>
                </a></li>
                <li><a href="Bus.php" class="page-scroll">
                    <h3>Bus</h3>
                </a></li>
                <li><a href="Routess.php" class="page-scroll">
                                <h3>Routes</h3>
                            </a></li>

            <li><a href="index.php#two" class="page-scroll">
                    <h3>About</h3>
                </a></li>

                <li><a href="map.html" class="page-scroll">
                                <h3>Map</h3>
                            </a></li>

            <li><a href="pro/signin.php" class="page-scroll">
                    <h3>Passenger Portal</h3>
                </a></li>

            <li><a href="pro/adminsignin.php" class="page-scroll">
                    <h3>Admin</h3>
                </a></li>
        </ul>

    </div>
    <!-- /.navbar-collapse -->

</div><!-- /.container-fluid -->

</nav>



<!-- [/NAV]

============================================================================================================================-->
<section class="mt-[5%]  w-[80%] m-auto" id="">

    <div class="text-header items-center ">
        <h1>Bus Stations </h1>
    </div>

    <section class="container px-4 mx-auto text-black">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Bus</h2>

                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">240 cars</span>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">List Buss availbale to day.</p>
        </div>

        
    </div>

    <div class="mt-6 md:flex md:items-center md:justify-between">
        <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                View all
            </button>
        </div>

        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input type="text" placeholder="Search" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
        </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>#</span>

                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                        </svg>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                FROM
                                </th>
                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                TO
                                </th>


                               
                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        <?php
                                    $row = $conn->query("SELECT * FROM route");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>
                        <tr>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <h2 class="font-medium text-gray-800 dark:text-white "></h2>
                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">#<?php echo ++$sn; ?></p>
                                    </div>
                                </td>
                                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                    <?php echo $fetch['start']; ?>
                                    </div>
                                </td>
                                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                    <?php  $fetch['stop'];

echo $fullname = $fetch['start'] . " to " . $fetch['stop']; ?>
                                    </div>
                                </td>
                                
                            </tr>
                        </tbody>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span> 
        </div>

        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
            <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>

                <span>
                    previous
                </span>
            </a>

            <a href="#" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                <span>
                    Next
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

    </div>

</section>


<footer class="site-footer section-spacing text-center " id="eight">


<div class="container">

    <div class="row">

        <div class="col-md-4">

            <p class="footer-links"><a href="#">Terms of Use</a> <a href="#">Privacy Policy</a></p>

        </div>

        <div class="col-md-4"> <small>&copy; <?php echo date('Y'); ?>, Developed By <?php echo $developer_name; ?> </small></div>

        <div class="col-md-4">

            <!--social-->

            <!-- 
<ul class="social">

  <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter "></i></a></li>

  <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>

  <li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>

</ul> -->


            <!--social end-->


        </div>

    </div>

</div>

</footer>




<!-- [/FOOTER]

============================================================================================================================-->




</div>


<!-- [ /WRAPPER ]

=============================================================================================================================-->


<!-- [ DEFAULT SCRIPT ] -->

<!-- <script src="library/modernizr.custom.97074.js"></script>

<script src="library/jquery-1.11.3.min.js"></script>

<script src="library/bootstrap/js/bootstrap.js"></script>

<script type="text/javascript" src="js/jquery.easing.1.3.js"></script> -->

<!-- [ PLUGIN SCRIPT ] -->

<!-- <script src="library/vegas/vegas.min.js"></script> -->

<!-- <script src="js/plugins.js"></script> -->

<!-- [ TYPING SCRIPT ] -->

<script src="js/typed.js"></script>

<!-- [ COUNT SCRIPT ] -->

<script src="js/fappear.js"></script>

<script src="js/jquery.countTo.js"></script>

<!-- [ SLIDER SCRIPT ] -->

<script src="js/owl.carousel.js"></script>

<!-- <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script> -->

<script type="text/javascript" src="js/SmoothScroll.js"></script>


<!-- [ COMMON SCRIPT ] -->
<script src="js/common.js"></script>

</body>


</html>
    
</body>
</html>