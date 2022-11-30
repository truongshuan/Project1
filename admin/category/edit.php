<?php
if (isset($_GET['id_ct'])) {
    $ma_loai = $_GET['id_ct'];
    $item = loai_select_by_id($ma_loai);
}
?>
<!-- Container-fluid starts-->
<div class="card-body">
    <form class="theme-form mega-form" method="POST" action="index.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="col-form-label">Name</label>
            <input class="form-control" name="ten_loai" type="text" placeholder="Enter name category"
                value="<?= $item['ten_loai'] ?>">
            <input class="form-control" name="ma_loai" type="hidden" placeholder="Enter name category"
                value="<?= $item['ma_loai'] ?>">
        </div>
        <div class="mb-3">
            <label class="col-form-label">Description</label>
            <br>
            <select class="form-select" aria-label="Default select example" name="trang_thai">
                <option value="null" selected>--Select Desc--</option>
                <option value="1">New</option>
                <option value="2">Sold out</option>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit" name="update">Submit</button>
        </div>
</div>
<!-- Container-fluid Ends-->