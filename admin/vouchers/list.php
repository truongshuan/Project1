<?php
// Pagination
$voucher = mysqli_query($con, "SELECT * FROM khuyen_mai");
$total = mysqli_num_rows($voucher);
$limit = 4;
$page = ceil($total / $limit);
$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
$start = ($cr_page - 1) * $limit;
?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Table Vouchers</h5>
        </div>
        <div>
            <a href="index.php?btn_new" class="btn btn-primary active" style="margin: 10px 15px;" type="button">New</a>
        </div>
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name voucher</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Description</th>
                                <th scope="col">Code</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_GET['keyword'])) {
                                $keyword = $_GET['keyword'];
                                $list_voucher = voucher_select_by_name_or_code($keyword);
                                foreach ($list_voucher as $item) :
                            ?>
                            <tr>
                                <th scope="row"><?= $item['ma_km'] ?></th>
                                <td><?= $item['ten_km'] ?></td>
                                <td><?= $item['ngay_bat_dau'] ?></td>
                                <td><?= $item['ngay_het_han'] ?></td>
                                <td><?= $item['mo_ta'] ?></td>
                                <td><?= $item['giam_gia'] ?>%</td>
                                <td><?= $item['code'] ?></td>
                                <td>
                                    <a href="index.php?btn_edit&id_coup=<?= $item['ma_km'] ?>"
                                        class="btn btn-outline-success-2x" type="button">Edit</a>
                                    <a href="index.php?id_cp=<?= $item['ma_km'] ?>" class="btn btn-outline-danger-2x"
                                        type="button">Delete</a>
                                </td>
                            </tr>
                            <?php
                                endforeach;
                            } else {
                                $list_voucher = voucher_select_all($start, $limit);
                                foreach ($list_voucher as $item) :
                                ?>
                            <tr>
                                <th scope="row"><?= $item['ma_km'] ?></th>
                                <td><?= $item['ten_km'] ?></td>
                                <td><?= $item['ngay_bat_dau'] ?></td>
                                <td><?= $item['ngay_het_han'] ?></td>
                                <td><?= $item['mo_ta'] ?></td>
                                <td><?= $item['giam_gia'] ?>%</td>
                                <td><?= $item['code'] ?></td>
                                <td>
                                    <?php
                                            $today =  date_format(date_create(), 'Y-m-d');
                                            if ($today <= $item['ngay_het_han']) {
                                                echo '<p style="color:#24695C; font-weight: bold;"> Enable </p>';
                                            } else {
                                                echo '<p style="color: red; font-weight: bold;"> Out of date </p>';
                                            }
                                            ?>
                                </td>
                                <td>
                                    <a href="index.php?btn_edit&id_coup=<?= $item['ma_km'] ?>"
                                        class="btn btn-outline-success-2x" type="button">Edit</a>
                                    <a href="index.php?id_cp=<?= $item['ma_km'] ?>" class="btn btn-outline-danger-2x"
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
    </div>
    <nav aria-label="Page navigation example">
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
            <li class="page-item"><a style="color: #24695C;" class="page-link"
                    href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
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
</div>