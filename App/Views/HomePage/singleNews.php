<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php
        echo $posts['name'];
        ?>
    </title>
    <link href="../homeCSS/css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="../homeCSS/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="../homeCSS/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="../homeCSS/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="../homeCSS/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="../homeCSS/css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="../homeCSS/js/modernizr-3.5.0.min.js"></script>
</head>
<body>
<?php
include ("container.php");
?>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <h1 class="tieude"></h1>
                <h3 class="tomtat"></h3>
                <p class="noidung">
                    <?php echo html_entity_decode($posts['content']); ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
include ("footer.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../homeCSS/js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="../homeCSS/js/jquery.waypoints.min.js"></script>
<!-- Parallax -->
<script src="../homeCSS/js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="../homeCSS/js/main.js"></script>
<script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>
<script src="../node_modules/he/he.js"></script>
</body>
<script>

    var url = window.location.href;
    var arrayId = url.split('/');
    var id = arrayId[3];
    console.log(id);
    var apiSingle = 'http://localhost:8080/api/dashboard' + '/' + id;
    $.ajax({
       type: "GET", 
       url: apiSingle, 
       data: [],
       success: function(response){
           $('.tieude').text(response['name']),
           $('.tomtat').text(response['summary'])
       }
    })

</script>
</html>