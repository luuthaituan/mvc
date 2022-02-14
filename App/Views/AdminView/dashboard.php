<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>News Admin</title>
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
                <h1 class="mt-4">Posts</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Review your posts</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        List of your posts
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Summary</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Summary</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Options</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <?php foreach ($posts as $value) {?>
                            <tr>
                                <td><?= $value["id"]; ?></td>
                                <td><?= $value["name"]; ?></td>
                                <td><?= $value["summary"]?></td>
                                <td><?= $value["image"] ?></td>
                                <td><?= $value["content"] ?></td>
                                <td>
                                    <a href="#" class="btn btn-info" role="button">Edit</a>
                                    <a href="/dashboard/<?= $value['id'] ?>"><button class="btn btn-info" onclick="return confirm('Are you sure to delete this post?')" title="Delete">Delete</button></a>
                                </td>
                            </tr>
                            <?php }?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
