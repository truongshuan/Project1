<div class="col-sm-12">
    <div class="card">
        <div class="card-header" style="display: flex; align-items: center; justify-content: space-between;">
            <h5>Table Main Products</h5>
            <form action="index.php" method="POST" enctype="multipart/form-data" style="display: flex;">
                <select class="form-select" aria-label="Default select example" style="width: 50%;" name="filter"
                    id="filter">
                    <option selected disabled>--Filter--</option>
                    <option value="low">Price: L to H</option>
                    <option value="high">Price: H to L</option>
                    <option value="new">Newest</option>
                    <option value="last">Lastest</option>
                </select>
                <input style="margin: 0px 10px;" type="submit" name="loc" value="Filter" class="btn btn-primary active">
            </form>
        </div>
        <div>
            <a href="new.php" class="btn btn-primary active" style="margin: 10px 15px;" type="button">New</a>
        </div>
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <?php
                require '../connection.php';
                $product = mysqli_query($con, "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai");
                $total = mysqli_num_rows($product);
                $limit = 4;
                $page = ceil($total / $limit);
                $cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
                // start
                $start = ($cr_page - 1) * $limit;
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Views</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_GET['keyword'])) {
                                $key = $_GET['keyword'];
                                $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE ten_hh LIKE '%$key%' ORDER BY ma_hh ASC LIMIT $start,$limit";
                                $result = mysqli_query($con, $sql);
                                while ($item_key = mysqli_fetch_assoc($result)) :
                            ?>
                            <tr>
                                <th scope="row"><?= $item_key['ma_hh'] ?></th>
                                <td>
                                    <img src="../../uploads/<?= $item_key['hinh'] ?>" width="100px">
                                </td>
                                <td><?= $item_key['ten_hh'] ?></td>
                                <td><?= $item_key['don_gia'] ?> $</td>
                                <td><?= $item_key['ngay_nhap'] ?></td>
                                <td><?= $item_key['luot_xem'] ?><i class="fa-solid fa-eye"></i></td>
                                <td><?= $item_key['ten_loai'] ?></td>
                                <td><?= $item_key['mo_ta'] ?></td>
                                <td>
                                    <a href="index.php?btn_edit&id_pd=<?= $item_key['ma_hh'] ?>"
                                        class="btn btn-primary active" type="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="index.php?id=<?= $item_key['ma_hh'] ?>" class="btn btn-danger active"
                                        type="button"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                endwhile;
                            } else if (isset($_POST['loc'])) {
                                $filter = $_POST['filter'];
                                if ($filter == 'low') {
                                    $filter_price = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai  ORDER BY don_gia ASC LIMIT $start,$limit";
                                    $filter_query = mysqli_query($con, $filter_price);
                                    while ($filter_item = mysqli_fetch_assoc($filter_query)) :
                                    ?>
                            <tr>
                                <th scope="row"><?= $filter_item['ma_hh'] ?></th>
                                <td>
                                    <img src="../../uploads/<?= $filter_item['hinh'] ?>" width="100px">
                                </td>
                                <td><?= $filter_item['ten_hh'] ?></td>
                                <td><?= $filter_item['don_gia'] ?> $</td>
                                <td><?= $filter_item['ngay_nhap'] ?></td>
                                <td><?= $filter_item['luot_xem'] ?><i class="fa-solid fa-eye"></i></td>
                                <td><?= $filter_item['ten_loai'] ?></td>
                                <td><?= $filter_item['mo_ta'] ?></td>
                                <td>
                                    <a href="index.php?btn_edit&id_pd=<?= $filter_item['ma_hh'] ?>"
                                        class="btn btn-primary active" type="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="index.php?id=<?= $filter_item['ma_hh'] ?>" class="btn btn-danger active"
                                        type="button"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                    endwhile;
                                } else if ($filter == 'high') {
                                    $filter_price = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai  ORDER BY don_gia DESC LIMIT $start,$limit";
                                    $filter_query = mysqli_query($con, $filter_price);
                                    while ($filter_item = mysqli_fetch_assoc($filter_query)) :
                                    ?>
                            <tr>
                                <th scope="row"><?= $filter_item['ma_hh'] ?></th>
                                <td>
                                    <img src="../../uploads/<?= $filter_item['hinh'] ?>" width="100px">
                                </td>
                                <td><?= $filter_item['ten_hh'] ?></td>
                                <td><?= $filter_item['don_gia'] ?> $</td>
                                <td><?= $filter_item['ngay_nhap'] ?></td>
                                <td><?= $filter_item['luot_xem'] ?><i class="fa-solid fa-eye"></i></td>
                                <td><?= $filter_item['ten_loai'] ?></td>
                                <td><?= $filter_item['mo_ta'] ?></td>
                                <td>
                                    <a href="index.php?btn_edit&id_pd=<?= $filter_item['ma_hh'] ?>"
                                        class="btn btn-primary active" type="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="index.php?id=<?= $filter_item['ma_hh'] ?>" class="btn btn-danger active"
                                        type="button"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                    endwhile;
                                } else if ($filter == 'new') {
                                    $filter_price = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai  ORDER BY ngay_nhap DESC LIMIT $start,$limit";
                                    $filter_query = mysqli_query($con, $filter_price);
                                    while ($filter_item = mysqli_fetch_assoc($filter_query)) :
                                    ?>
                            <tr>
                                <th scope="row"><?= $filter_item['ma_hh'] ?></th>
                                <td>
                                    <img src="../../uploads/<?= $filter_item['hinh'] ?>" width="100px">
                                </td>
                                <td><?= $filter_item['ten_hh'] ?></td>
                                <td><?= $filter_item['don_gia'] ?> $</td>
                                <td><?= $filter_item['ngay_nhap'] ?></td>
                                <td><?= $filter_item['luot_xem'] ?><i class="fa-solid fa-eye"></i></td>
                                <td><?= $filter_item['ten_loai'] ?></td>
                                <td><?= $filter_item['mo_ta'] ?></td>
                                <td>
                                    <a href="index.php?btn_edit&id_pd=<?= $filter_item['ma_hh'] ?>"
                                        class="btn btn-primary active" type="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="index.php?id=<?= $filter_item['ma_hh'] ?>" class="btn btn-danger active"
                                        type="button"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                    endwhile;
                                }
                            } else {
                                $list = hang_hoa_select_all($start, $limit);
                                foreach ($list as $item) :
                                    ?>
                            <tr>
                                <th scope="row"><?= $item['ma_hh'] ?></th>
                                <td>
                                    <img src="../../uploads/<?= $item['hinh'] ?>" width="100px">
                                </td>
                                <td><?= $item['ten_hh'] ?></td>
                                <td><?= $item['don_gia'] ?> $</td>
                                <td><?= $item['ngay_nhap'] ?></td>
                                <td><?= $item['luot_xem'] ?><i class="fa-solid fa-eye"></i></td>
                                <td><?= $item['ten_loai'] ?></td>
                                <td><?= $item['mo_ta'] ?></td>
                                <td>
                                    <a href="index.php?btn_edit&id_pd=<?= $item['ma_hh'] ?>"
                                        class="btn btn-primary active" type="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="index.php?id=<?= $item['ma_hh'] ?>" class="btn btn-danger active"
                                        type="button"><i class="fa-solid fa-trash"></i></a>
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