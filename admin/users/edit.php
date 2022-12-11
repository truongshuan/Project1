<?php
if (isset($_GET['id_user'])) {
    $ma_kh = $_GET['id_user'];
    $result = khach_hang_select_by_id($ma_kh);
}
?>
<div class="card-header">
    <h5>Edit infor of user</h5>
</div>
<div class="card-body">
    <form class="theme-form mega-form" method="POST" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="ma_kh" value="<?= $result['ma_kh'] ?>">
        <div class="mb-3">
            <label class="col-form-label">Username</label>
            <input class="form-control" type="text" placeholder="Enter name category" value="<?= $result['ma_kh'] ?>"
                disabled>
        </div>
        <div class="mb-3">
            <label class="col-form-label">Fullname</label>
            <input class="form-control" type="text" placeholder="Enter name category" value="<?= $result['ten_kh'] ?>"
                disabled>
        </div>
        <div class="mb-3">
            <label class="col-form-label">Email</label>
            <input class="form-control" type="text" placeholder="Enter name category" value="<?= $result['email'] ?>"
                disabled>
        </div>
        <div class="mb-3">
            <label class="col-form-label">Action</label>
            <br>
            <select class="form-select" name="hoat_dong" required>
                <?php
                if ($result['hoat_dong'] == 1) {
                ?>
                <option value="1" selected>Enable</option>
                <option value="0">Disable</option>
                <?php
                } else {
                ?>
                <option value="1">Enable</option>
                <option value="0" selected>Disable</option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit" name="edit_user">Submit</button>
        </div>
</div>