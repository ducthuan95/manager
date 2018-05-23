<?php
    require_once "includes/connect.php";
    $parent = '';
    $err = '';
    $name = '';
    if (isset($_POST['submit'])) {
        $name   = $_POST['cate_name'];
        $parent = $_POST['cate_parent'];

        $sql = "SELECT * FROM danhmuc WHERE TenDanhMuc = '$name'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $err = "Tên Danh Mục Đã Tồn Tại";
        } else {
            $query = "INSERT INTO danhmuc (TenDanhMuc, parent_id) VALUES ('$name', '$parent')";
            $row = mysqli_query($conn, $query);
            header('Location:category_list.php');
        }

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body class="fix-header fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include 'includes/header.php'; ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include 'includes/slide.php'; ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
           <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Danh Mục</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Danh Mục</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="category_add.php" method="post">
                                        <p style = "color: red"><?=$err?></p>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Danh Mục Cha <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="cate_parent">
                                                    <option value="0">-- Chọn Danh Mục --</option>
                                                    <?php 
                                                        $sql = "SELECT * FROM danhmuc WHERE parent_id = 0";
                                                        $result = mysqli_query($conn, $sql);
                                                        if (mysqli_num_rows($result)>0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                ?>
                                                                    <option <?php if($parent == $row['id']){echo 'selected'; } ?> value="<?= $row['id'] ?>"><?= $row['TenDanhMuc']?></option>
                                                                <?php
                                                            }
                                                        }
                                                    ?>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Tên Danh Mục <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$name?>" id="val-username" name="cate_name" placeholder="Tên Danh Mục" required="require">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="submit" class="btn btn-primary">Thêm Mới</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <?php include 'includes/script.php'; ?>

</body>

</html>