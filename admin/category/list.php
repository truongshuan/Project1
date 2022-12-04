<?php
require '../connection.php';
$category = mysqli_query($con, "SELECT * FROM loai");
$total = mysqli_num_rows($category);
$limit = 2;
$page = ceil($total / $limit);
$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
// start
$start = ($cr_page - 1) * $limit;
?>
<div class="table-responsive">
    <table class="table table-xl">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Desc</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($_GET['keyword'])) {
                $key = $_GET['keyword'];
                $sql = "SELECT * FROM loai WHERE ten_loai LIKE '%$key%' ORDER BY ma_loai ASC LIMIT $start,$limit";
                $result = mysqli_query($con, $sql);
                while ($item_search = mysqli_fetch_assoc($result)) :
            ?>
            <tr>
                <th scope="row"><?= $item_search['ma_loai'] ?></th>
                <td><?= $item_search['ten_loai'] ?></td>
                <td><?php if ($item_search['trang_thai'] == 1) {
                                echo 'New';
                            } else {
                                echo 'Sold out';
                            } ?></td>
                <td>
                    <a href="edit.php?id_ct=<?= $item_search['ma_loai'] ?>" class="btn btn-light active txt-dark"
                        type="button">Edit</a>
                    <a href="index.php?id=<?= $item_search['ma_loai'] ?>" class="btn btn-danger active"
                        type="button">Delete</a>
                </td>
            </tr>
            <?php
                endwhile;
            } else {
                $list = loai_select_all($start, $limit);
                foreach ($list as $item) :
                ?>
            <tr>
                <th scope="row"><?= $item['ma_loai'] ?></th>
                <td><?= $item['ten_loai'] ?></td>
                <td><?php if ($item['trang_thai'] == 1) {
                                echo 'New';
                            } else {
                                echo 'Sold out';
                            } ?></td>
                <td>
                    <a href="edit.php?&id_ct=<?= $item['ma_loai'] ?>" class="btn btn-light active txt-dark"
                        type="button">Edit</a>
                    <a href="index.php?id=<?= $item['ma_loai'] ?>" class="btn btn-danger active"
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