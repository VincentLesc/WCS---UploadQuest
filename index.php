<?php
require_once 'functions.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Laisse ton file</title>
</head>
<body>
    <div class="container">
        <?php
            if (isset($errors)) {
                foreach ($errors as $error){
                    ?>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="alert">
                                <?= $error ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
        <div class="row">
            <div class="col-sm-6 offset-3">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <input type="file" name="picture[]" class="form-control-file" multiple/>
                    </div>
                    <input type="submit" value="send" class="form-group" />
                </form>

            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <?php foreach ($pictures as $picture) {
            if ($picture != "." && $picture != "..") {
                ?>
                <div class="col-md-3">
                    <img src="dossier/<?= $picture ?>" alt="image" class="img-fluid">
                    <h6><?=$picture ?></h6>
                    <a href="index.php?delete=<?=$picture?>"><button>Delete</button></a>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
</body>
</html>
