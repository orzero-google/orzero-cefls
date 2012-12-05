<!doctype html public "-//w3c//dtd html 4.01 transitional//en" "http://www.w3.org/tr/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html charset=utf8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript" src="/cefls/js/jquery.js"></script>
    <script type="text/javascript" src="/cefls/js/script.js"></script>
    <script type="text/javascript" src="/cefls/js/coin-slider.min.js"></script>
    <script type="text/javascript" src="/cefls/js/jquery.fancybox.pack.js"></script>

    <link rel="stylesheet" type="text/css" href="/cefls/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/cefls/css/coin-slider-styles.css" />
    <link rel="stylesheet" href="/cefls/css/globle_cn.css" type="text/css" media="screen, project, print" />
</head>
<body>

<!-- the header -->
<?php echo get_header(); ?>

<div class="hackbox"></div>

<?php echo $content; ?>

<div class="hackbox"></div>


<?php echo get_footer(); ?>
</body>
</html>