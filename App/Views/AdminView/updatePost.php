<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update the Post</title>
    <link href="/adminCSS/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="/ckeditor/ckeditor.js"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Update a Post</h3></div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                            <a for="inputFirstName">
                                                    Title
                                                </a>
                                                <textarea name="name" rows="2" cols="37">
                                                <?= $posts['name']; ?>
                                                </textarea>

                                            </div>
                                        </div>
                                        <div class= "col-md-6">
                                            <div class="form-floating">
                                            <a for="inputLastName">
                                                    Summary
                                                </a>
                                                <textarea name="summary" rows="2" cols="37">
                                                <?= $posts['summary']; ?>
                                                </textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <a for="inputEmail"> Image Link</a>
                                        <textarea name="link" rows="2" cols="80">
                                                <?= $posts['image']; ?>
                                                </textarea>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <a for="inputEmail">Content </a>
                                        <textarea name="post_content" id="post_content" rows="9" cols="79"><?= $posts['content']; ?></textarea>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><button class="btn btn-primary btn-block" href="#" type="submit" name="submit">Update post</button></div>
                                    </div>
                                </form>
                                <script>
                                    CKEDITOR.replace( 'post_content' );
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/adminCSS/js/scripts.js"></script>
</body>
</html>