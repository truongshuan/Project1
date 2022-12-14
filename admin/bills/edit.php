<?php
if (isset($_GET['id_bill'])) {
    $ma_hd = $_GET['id_bill'];
    $infor_bill = hoa_don_select_id($ma_hd);
}
?>
<div class="card-body">
    <form class="theme-form mega-form" method="POST" action="index.php">
        <div class="mb-3">
            <label class="col-form-label">Id Bill</label>
            <input class="form-control" type="text" name="ma_hd" placeholder="Enter name category"
                value="<?= $infor_bill['ma_hd'] ?>" disabled>
            <input type="hidden" name="ma_hd" value="<?= $infor_bill['ma_hd'] ?>">
        </div>
        <div class="mb-3">
            <label class="col-form-label">Desc</label>
            <br>
            <select class="form-select" name="trang_thai" required>
                <?php
                if ($infor_bill['trang_thai'] == 0) {
                ?>
                <option value="0" selected>Disable</option>
                <option value="1">Accept</option>
                <option value="2">Payment</option>
                <?php
                } else if ($infor_bill['trang_thai'] == 1) {
                ?>
                <option value="0">Disable</option>
                <option value="1" selected>Accept</option>
                <option value="2">Payment</option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" name="change" class="btn btn-primary">Submit</button>
        </div>
</div>