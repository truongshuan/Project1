<?php
if (isset($_GET['id_pd'])) {
    $ma_hh = $_GET['id_pd'];
    $desc = hang_hoa_select_by_id($ma_hh);
}
?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit-Product</h5>
        </div>
        <div class="card-body">
            <form class="theme-form mega-form" method="POST" action="index.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="col-form-label">Name</label>
                    <input class="form-control" name="ten_hh" type="text" placeholder="Enter name product" required
                        value="<?= $desc['ten_hh'] ?>">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Price</label>
                    <input class="form-control" name="don_gia" type="text" placeholder="Enter price product" required
                        value="<?= $desc['don_gia'] ?>">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Categories</label>
                    <br>
                    <select class="form-select" aria-label="Default select example" required name="ma_loai">
                        <?php
                        // pdo_get_connection();
                        $list_categories = loai_query();
                        foreach ($list_categories as $item) :
                        ?>
                        <option value="<?= $item['ma_loai'] ?>"><?= $item['ten_loai'] ?>
                        </option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Special</label>
                    <br>
                    <select class="form-select" aria-label="Default select example" required name="dac_biet">
                        <option value="1">Normal</option>
                        <option value="2">Special</option>
                    </select>
                </div>
                <input type="hidden" name="luot_xem" value="0">
                <input type="hidden" name="ma_hh" value="<?= $desc['ma_hh'] ?>">
                <div class="mb-3">
                    <label class="col-form-label">Description</label>
                    <textarea class="form-control" name="mo_ta" type="text" placeholder="Enter desc"
                        required><?= $desc['mo_ta'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="col-form-lable">Upload images</label>
                    <input class="form-control" name="hinh" type="file" aria-label="file example" value="
                <?= $desc['hinh'] ?>">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="edit_product" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>