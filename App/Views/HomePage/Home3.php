<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News Mock DEMO</title>
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
<script>
    var source = "http://localhost:8080/api/dashboard";
    function run(){
        getCourses(function(courses){
            renderCourse(courses);
        });
    }
    run();
    function getCourses(callback){
        fetch(source).then(function(response){
            return response.json();
        }).then(callback)
    }
    function renderCourse(courses){
        var listCourse = document.querySelector('#demo');
        var htmls = courses.map(function(course){
            return `
                                <div class="row pb-4" >
                        <div class="col-md-5" >
                            <div class="fh5co_hover_news_img" >
                                <div class="fh5co_news_img" ><img src="${course.image}">
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box" id="demo">
                            <a href="/${course.id}" class="fh5co_magna py-2"> ${course.name}</a>
                            <div class="fh5co_consectetur" >
${course.summary}
                            </div>
                        </div>
                    </div>
            `
        })
        console.log(htmls);
        listCourse.innerHTML = htmls.join('')
    }
</script>

<div class="container-fluid pb-4 pt-4 paddding"  >
    <div class="container paddding">
        <div class="row mx-0" >
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                <div id="demo">

                </div>
            </div>
            </div>
        </div>
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><em class="fa fa-long-arrow-left"></em>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <em class="fa fa-long-arrow-right"></em>&nbsp;&nbsp; </a>
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
<!-- Main -->
<script src="../homeCSS/js/main.js"></script>
</body>
</html>