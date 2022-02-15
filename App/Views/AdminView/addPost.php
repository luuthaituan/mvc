<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add a post</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../adminCSS/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php
include ("navbar.php");
?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add a Post</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Add new post</li>
                </ol>
                <!-- form here -->
                <div class="card-body">
                    <form method="post" action="/addpost">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <a for="name">Post title</a>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Post title" name="name" required />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <a for="summary">Summary</a>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Summary" name="summary" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <a for="image">Image link</a>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Image link" name="link" required />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <a for="content">Post content</a>
<!--                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Post content" name="content" required />-->
                                    <textarea name="content" rows="9" cols="66"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block"  type="submit" name="submit">Add a post </button>
                            </div>
                        </div>
                    </form>
                </div>
        </main>
        <?php
        include ("footer.php");
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../adminCSS/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../adminCSS/assets/demo/chart-area-demo.js"></script>
<script src="../adminCSS/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="../adminCSS/js/datatables-simple-demo.js"></script>
</body>
</html>
