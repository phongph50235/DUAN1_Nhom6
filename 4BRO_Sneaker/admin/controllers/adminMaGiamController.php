<?php
class AdminMaGiamController
{
    public $modelMaGiam;

    public function __construct()
    {
        $this->modelMaGiam = new AdminMaGiam();
    }

    public function listMaGiamGia(){
        $listMaGiamGia = $this->modelMaGiam->listMaGiamGia();
        require_once './views/maGiamGia/listMaGiamGia.php';
    }    
    public function formAddMaGiamGia()
    {
        require_once './views/maGiamGia/addMaGiamGia.php';
        deleteSessionError();
    }
    public function addMaGiamGia()
    {
        // var_dump($_POST);
        //kiểm tra thêm dữ liệu có phải được submit ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy dữ liệu
            $ma = $_POST['ma'] ?? '';
            $gia_tri_giam = $_POST['gia_tri_giam'] ?? '';
            $ngay_tao = date("Y-m-d H:i:s");

            
            $error = [] ;
            if (empty($ma)) {
                $error['ma'] = "Tên code ma không được để trống";
            }
            if (empty($gia_tri_giam)) {
                $error['gia_tri_giam'] = "Tên gia trị của code không được để trống";
            }
           
            $_SESSION['error'] = $error;
            // debug($_SESSION['error'])  ;die();
            //nếu không có lỗi tiến hành thêm danh mục
            if (empty($error)) {
                $this->modelMaGiam->insertMaGiam($ma, $gia_tri_giam, $ngay_tao);
                header('location: ' . BASE_URL_ADMIN . '?act=list-ma-giam-gia');
            } else {

                // require_once './views/ThuongHieu/addThuongHieu.php';
                $_SESSION['flash'] = true;
                // debug($_SESSION['error']);                
                header('location: ' . BASE_URL_ADMIN . '?act=form-them-ma-giam-gia');
                exit();
            }
        }
    }
    public function formEditMaGiam()
    {
        $id = $_GET['id_ma_giam'];
        $maGiam = $this->modelMaGiam->getMaGiamById($id);
        // var_dump($maGiam);die();
        require_once './views/maGiamGia/editMaGiamGia.php';
    }
    public function editMaGiam()
    {
        // var_dump($_POST);
        //kiểm tra thêm dữ liệu có phải được submit ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lấy dữ liệu
            $id = $_GET['id_ma_giam'];

            $ma = $_POST['ma'] ?? '';
            $gia_tri_giam = $_POST['gia_tri_giam'] ?? '';
            $ngay_tao = date("Y-m-d H:i:s");

            
            $error = [] ;
            if (empty($ma)) {
                $error['ma'] = "Tên code ma không được để trống";
            }
            if (empty($gia_tri_giam)) {
                $error['gia_tri_giam'] = "Tên gia trị của code không được để trống";
            }
           
            $_SESSION['error'] = $error;
            //nếu không có lỗi tiến hành thêm danh mục
            if (empty($error)) {
                $this->modelMaGiam->updateMaGiam($id, $ma, $gia_tri_giam);
                header('location: ' . BASE_URL_ADMIN . '?act=list-ma-giam-gia');
            } else {

                // require_once './views/ThuongHieu/addThuongHieu.php';
                $_SESSION['flash'] = true;
                // debug($_SESSION['error']);                
                header('location: ' . BASE_URL_ADMIN . '?act=form-them-ma-giam-gia');
                exit();
            }
        }
    }
    public function deleteMaGiam()
    {
        $id = $_GET['id_ma_giam'];
        $this->modelMaGiam->deleteMaGiam($id);
        header('location: ' . BASE_URL_ADMIN . '?act=list-ma-giam-gia');
    }
}