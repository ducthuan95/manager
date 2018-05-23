<?php
    require_once "includes/connect.php";
    $adress = '';
    $err = '';
    $name = '';
    $Email = '';
    $telephone = '';
    if (isset($_POST['submit'])) {
        $name   = $_POST['cate_name'];
        $adress = $_POST['adress'];
        $telephone   = $_POST['telephone'];
        $Email = $_POST['Email'];

        $sql = "SELECT * FROM nhacungcap WHERE TenNCC = '$name'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $err = "Tên Nhà Cung Cấp Đã Tồn Tại";
        } else {
            $query = "INSERT INTO nhacungcap (TenNCC, DiaChi, SDT, Email) VALUES ('$name', '$adress', '$telephone', '$Email')";
            $row = mysqli_query($conn, $query);
            header('Location:nhacc_list.php');
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
                    <h3 class="text-primary">Nhà Cung Cấp</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Nhà Cung Cấp</li>
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
                                    <form class="form-valide" action="nhacc_add.php" method="post">
                                        <p style = "color: red"><?=$err?></p>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Tên Nhà Cung Cấp <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$name?>" id="val-username" name="cate_name" placeholder="Tên Nhà Cung Cấp" required="require">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Địa Chỉ <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$adress?>" id="val-username" name="adress" placeholder="Địa Chỉ" required="require">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Số Điện Thoại <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$telephone?>" id="val-username" name="telephone" placeholder="Số Điện Thoại" required="require">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$Email?>" id="val-username" name="Email" placeholder="Email" required="require">
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