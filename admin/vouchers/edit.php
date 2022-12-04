<?php
if (!empty($_GET['id_coup'])) {
    $ma_km = $_GET['id_coup'];
    $result = voucher_select_by_id($ma_km);
}

?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit-Vouchers</h5>
        </div>
        <div class="card-body">
            <form class="theme-form mega-form" method="POST" action="index.php" enctype="multipart/form-data">
                <?php
                if (isset($_SESSION['error_date_voucher'])) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error_date_voucher']; ?>
                </div>
                <?php
                }
                ?>
                <div class="mb-3">
                    <input type="hidden" value="<?= $result['ma_km'] ?>" name="ma_km">
                    <label class="col-form-label">Name Voucher</label>
                    <input name="ten_km" value="<?= $result['ten_km'] ?>" class="form-control" type="text"
                        placeholder="Enter Name Voucher" required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Code</label>
                    <input name="code" value="<?= $result['code'] ?>" class="form-control" type="text"
                        placeholder="Enter Code" required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Date Start</label>
                    <input name="ngay_bat_dau" value="<?= $result['ngay_bat_dau'] ?>" class="form-control" type="date"
                        placeholder="Date" required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Date End</label>
                    <input name="ngay_ket_thuc" value="<?= $result['ngay_het_han'] ?>" class="form-control" type="date"
                        placeholder="Date" required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Description</label>
                    <textarea name="mo_ta" class="form-control" type="text" placeholder="Enter desc"
                        required><?= $result['mo_ta'] ?></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="edit_voucher">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['error_date_voucher'])) {
    unset($_SESSION['error_date_voucher']);
}
?>