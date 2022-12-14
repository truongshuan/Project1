<?php
// Pagination
$blog = mysqli_query($con, "SELECT * FROM bai_viet");
$total = mysqli_num_rows($blog);
$limit = 3;
$page = ceil($total / $limit);
$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
$start = ($cr_page - 1) * $limit;
?>
<div class="card-block row">
    <div class="col-sm-12 col-lg-12 col-xl-12">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_GET['keyword'])) {
                        $keyword = $_GET['keyword'];
                        $list_blog = bai_viet_key($keyword, $start, $limit);
                        foreach ($list_blog as $item) :
                    ?>
                    <tr>
                        <th scope="row"><?= $item['ma_bv'] ?></th>
                        <td>
                            <img src="../../uploads/<?= $item['anh_bv'] ?>" width="100px">
                        </td>
                        <td><?= $item['tieu_de'] ?></td>
                        <td><?= $item['ngay_dang'] ?></td>
                        <td>
                            <?= $item['noi_dung_bv'] ?>
                        </td>
                        <td>
                            <a href="index.php?btn_edit&id_blog=<?= $item['ma_bv'] ?>"
                                class="btn btn-outline-success-2x" type="button">Edit</a>
                            <a href="index.php?id=<?= $item['ma_bv'] ?>" class="btn btn-outline-danger-2x"
                                type="button">Delete</a>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    } else {
                        $list_blog = bai_viet_select_all($start, $limit);
                        foreach ($list_blog as $item) :
                        ?>
                    <tr>
                        <th scope="row"><?= $item['ma_bv'] ?></th>
                        <td>
                            <img src="../../uploads/<?= $item['anh_bv'] ?>" width="100px">
                        </td>
                        <td><?= $item['tieu_de'] ?></td>
                        <td><?= $item['ngay_dang'] ?></td>
                        <td>
                            <?= $item['noi_dung_bv'] ?>
                        </td>
                        <td>
                            <a style="margin: 10px ;" href="index.php?btn_edit&id_blog=<?= $item['ma_bv'] ?>"
                                class="btn btn-outline-success-2x" type="button">Edit</a>
                            <a href="index.php?id=<?= $item['ma_bv'] ?>" class="btn btn-outline-danger-2x"
                                type="button">Delete</a>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="Page navigation example" style="margin: 20px;">
    <ul class="pagination">
        <?php
        if ($cr_page - 1 > 0) {
        ?>
        <li class="page-item"><a style="color: #24695C;" class="page-link"
                href="index.php?page=<?= $cr_page - 1 ?>">Previous</a></li>
        <?php
        }
        ?>
        <?php
        for ($i = 1; $i <= $page; $i++) :
        ?>
        <li class="page-item"><a style="color: #24695C;" class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php
        endfor;
        ?>
        <?php
        if ($cr_page + 1 <= $page) {
        ?>
        <li class="page-item"><a class="page-link" href="index.php?page=<?= $cr_page + 1 ?>"
                style="color: #24695C;">Next</a></li>
        <?php
        }
        ?>
    </ul>
</nav>