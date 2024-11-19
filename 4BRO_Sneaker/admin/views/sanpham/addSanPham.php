<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lí sản phẩm</h1>
                </div>

            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">



        <div class="card">
            <!-- <div class="card-header">
                <a href="?act=form-them-san-pham"><button class="btn btn-success">Thêm sản phẩm</button></a>
            </div> -->
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                        <div class="row card-body ">

                            <div class="form-group col-6">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                <?php if (isset($_SESSION['error']['ten_san_pham'])) {  ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="form-group col-6">
                                <label>Giá sản phẩm</label>
                                <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>

                                    <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group col-6">
                                <label>Giá khuyễn mãi</label>
                                <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi sản phẩm">
                                <?php
                                if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>

                                    <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="form-group col-6">
                                <label>Số lượng</label>
                                <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng sản phẩm">
                                <?php
                                if (isset($_SESSION['error']['so_luong'])) { ?>

                                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- <div class="form-group col-6">
                                <label>Album ảnh</label>
                                <input type="file" class="form-control" name="img_array[]" multiple >
                               
                            </div> -->
                            <div class="form-group col-6">
                                <label>Ngày nhập</label>
                                <input type="date" class="form-control" name="ngay_nhap">
                                <?php
                                if (isset($_SESSION['error']['ngay_nhap'])) { ?>

                                    <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="form-group col-6">
                                <label>Danh mục sản phẩm</label>
                                <select name="danh_muc_id" class="form-control">
                                    <option selected disabled>Chọn danh mục sản phẩm</option>
                                    <?php foreach ($listDanhMuc as $danhmuc) { ?>

                                        <option value="<?= $danhmuc['id'] ?>"> <?= $danhmuc['ten_danh_muc'] ?></option>

                                    <?php } ?>

                                </select>
                                <?php
                                if (isset($_SESSION['error']['danh_muc_id'])) { ?>

                                    <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group col-6">
                                <label>Hình ảnh</label>
                                <input type="file" name="hinh_anh" class="form-control">
                                <?php
                                if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                    <p class="text-danger"> <?= $_SESSION['error']['hinh_anh'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        
                            <div class="form-group col-6">
                                <label>Trạng thái</label>
                                <select class="form-control" name="trang_thai">
                                    <option selected disabled>Chọn trạng thái sản phẩm</option>
                                    <option value="1">Còn hàng</option>
                                    <option value="2">Hết hàng</option>
                                </select>
                                <?php
                                if (isset($_SESSION['error']['trang_thai'])) { ?>

                                    <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                         
                            <div class="form-group col-12">
                                <label>Mô tả</label>
                                <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"></textarea>
                            </div>

                            <div class="card-footer col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php include './views/layout/footer.php' ?>;

<!-- end footer -->


<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>

</html>