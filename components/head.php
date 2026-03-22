<?php require_once
    'webadmin/classes/functions.php';
    $display_settings = $settings->getSettings(1, 1);
?>

<!doctype html>
<html lang="en">
<meta
    http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php echo $title ?? '' ?> | Dbandzee LTD.</title>
    <link href="assets/images/favicon.ico" rel="icon" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="assets/css/tooltipster.min.css" />
    <link rel="stylesheet" href="assets/css/cubeportfolio.min.css" />
    <link rel="stylesheet" href="assets/css/revolution/navigation.css" />
    <link rel="stylesheet" href="assets/css/revolution/settings.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <!--PreLoader Ends-->