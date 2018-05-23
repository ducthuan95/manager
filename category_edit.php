<?php
    require_once "includes/connect.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM danhmuc WHERE id = '$id' ";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) >0 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cat_id = $row['id'];
                $name = $row['TenDanhMuc'];
                $parent = $row['parent_id'];
            }
        } else {
            header('Location:category_list.php');
        }
    } else {
        header('Location:categpory_list');
    }
    $error=" ";
    if(isset($_POST['submit']))
    {
    $name=$_POST['cate_name'];
    $parent=$_POST['cate_parent'];
    $sql1="SELECT TenDanhMuc FROM danhmuc WHERE TenDanhMuc='$name' AND id<>$id";
    $reslut2=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($reslut2)>0)
    {
        $error="Tên danh mục đã tồn tại";
    }else 
    {
        $sql3="UPDATE danhmuc SET TenDanhMuc='$name', parent_id = '$parent' WHERE id=$id";
    
        if(mysqli_query($conn,$sql3))
        {
        header('Location:category_list.php');
        }        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <?php include 'includes/header.php'; ?>
        <?php include 'includes/slide.php'; ?>
        <div class="page-wrapper">
           <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Sửa Danh Mục</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Sửa Danh Mục</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="category_edit.php?id=<?php echo $id; ?>" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Danh Mục Cha <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="cate_parent">
                                                    <option value="0">-- Chọn Danh Mục --</option>
                                                    <?php 
                                                        $sql2 = "SELECT id,TenDanhMuc FROM danhmuc WHERE parent_id = 0";
                                                        $reslut1 = mysqli_query($conn, $sql2);
                                                        $count = mysqli_num_rows($reslut1);
                                                        if(count($count)>0)
                                                        {
                                                            while ($row=mysqli_fetch_assoc($reslut1)) {
                                                            ?>
                                                            <option <?php if($cat_id == $row['id']){echo 'selected';} ?> value="<?= $row['id']; ?>"><?= $row['TenDanhMuc']; ?></option>
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
                                                <input type="text" class="form-control" id="val-username" value="<?=$name?>" name="cate_name" placeholder="Tên Danh Mục">
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
            </div>
        </div>
    </div>
    <?php include 'includes/script.php'; ?>

</body>

</html>