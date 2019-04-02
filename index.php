<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori / Alt Kategori İşlemleri</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   
</head>
<body>
<?php
/******************SQL İŞLEMLERİ*********************/
require_once "lib/config.php"; 
require_once "lib/functions.php";
$category_list = $db->query(" SELECT * FROM category ",PDO::FETCH_OBJ)->fetchAll();

?>
    <div class="container">
        <h3 class="text-center">Kategori / Alt Kategori İşlemleri</h3>
        <div class="row">
            <div class="col-md-6 well">
                <h4 class="text-center">Kategori Ekleme</h4>
                <hr>
                <form action="lib/category_db.php" method="post">
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Varsa Üst Kategori</label>
                        <select name="parent_id"  class="form-control">
                        <?php foreach ($category_list as $category) { ?>
                                <option selected value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                    <button type="reset" class="btn btn-danger btn-sm">İptal</button>
                </form>
            </div>
            <div class="col-md-6 ">
                <div class="col-md-11 well">
                    <h4 class="text-center">Kategori Hiyerarşisi</h4>
                    <hr>
                    
                   <?php drawElements(buildTree($category_list)); ?>
                  
                </div>
            </div>
        </div>
    </div>
</body>
</html>