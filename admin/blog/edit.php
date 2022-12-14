<?php
if (isset($_GET['id_blog'])) {
    $ma_bv = $_GET['id_blog'];
    $result = mysqli_query($con, "SELECT * FROM bai_viet WHERE ma_bv = '$ma_bv'");
    $item = mysqli_fetch_assoc($result);
}
?>

<div class="card-body">
    <form class="theme-form mega-form" method="POST" action="index.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="col-form-label">Tittle</label>
            <input class="form-control" name="tieu_de" value="<?= $item['tieu_de'] ?>" type="text"
                placeholder="Enter tittle blog" required>
        </div>
        <div class="mb-3">
            <label class="col-form-label">Description</label>
            <textarea class="form-control" name="noi_dung_bv" type="text" placeholder="Enter desc"
                required><?= $item['noi_dung_bv'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="col-form-lable">Banner</label>
            <input class="form-control" name="anh_bv" type="file" aria-label="file example">
        </div>
        <div class="mb-3">
            <input type="hidden" name="ma_bv" value="<?= $ma_bv ?>">
            <button class="btn btn-primary" name="edit_blog" type="submit">Submit</button>
        </div>
    </form>
</div>