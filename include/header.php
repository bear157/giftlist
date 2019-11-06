<!DOCTYPE html>
<html>
<head>
    <title><?= empty($page_title) ? "Gift List" : $page_title; ?></title>
    <meta charset="UTF-8">
    <!-- jquery -->
    <script type="text/javascript" src="/giftlist/scripts/jquery-3.4.1.min.js"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="/giftlist/fontawesome-5.11.2/css/all.min.css">
    <script type="text/javascript" src="/giftlist/fontawesome-5.11.2/js/all.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="/giftlist/bootstrap-4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="/giftlist/bootstrap-4.3.1/js/bootstrap.bundle.min.js"></script>
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="/giftlist/datatable/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="/giftlist/datatable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/giftlist/datatable/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/giftlist/datatable/fixedHeader.bootstrap4.min.css">
    <script type="text/javascript" src="/giftlist/datatable/dataTables.fixedHeader.min.js"></script>

    <!-- star rating -->
    <link rel="stylesheet" type="text/css" href="/giftlist/starrating/css/star-rating.min.css">
    <script type="text/javascript" src="/giftlist/starrating/js/star-rating.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/giftlist/starrating/themes/krajee-fas/theme.min.css">
    <script type="text/javascript" src="/giftlist/starrating/themes/krajee-fas/theme.min.js"></script>


    <link rel="stylesheet" type="text/css" href="/giftlist/styles/common.css?date=<?= date("YmdHis"); ?>">
    <script type="text/javascript" src="/giftlist/scripts/script.js?date=<?= date("YmdHis"); ?>"></script>
    
</head>
<body>