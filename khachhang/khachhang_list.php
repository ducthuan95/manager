<?php
    require_once "includes/connect.php";
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
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Khách Hàng</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Khách Hàng</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Khách Hàng</th>
                                                <th>Địa Chỉ</th>
                                                <th>Số Điện Thoại</th>
                                                <th>Email</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            
                                            $sql = "SELECT * FROM khachhang";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result)>0) {
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $i;?></td>
                                                        <td><?= $row['TenKh'];?></td>
                                                        <td><?= $row['DiaChi'];?></td>
                                                        <td><?= $row['SDT'];?></td>
                                                        <td><?= $row['Email'];?></td>
                                                        <td><i class="fa fa-pencil fa-fw"></i><a href="khachhang_edit.php?id=<?=$row['id']?>">Sửa</a></td>
                                                        <td><i class="fa fa-trash-o fa-fw"></i><a href="khachhang_dell.php?id=<?=$row['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa!');">Xóa</a></td>                                                        
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }                                                
                                            }
                                        ?>                                                                                    
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
           
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <?php include 'includes/script.php'; ?>
    <?php include 'includes/script2.php'; ?>
    <script>
        function myFunction() {
            confirm("Press a button!");
        }
    </script>

</body>

</html>