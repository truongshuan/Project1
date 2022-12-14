<div class="card-block row">
    <div class="col-sm-12 col-lg-12 col-xl-12">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Id bill</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Id product</th>
                        <th scope="col">Quality</th>
                        <th scope="col">Total</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $list_bill = hoa_don_select_all();
                    foreach ($list_bill as $item) :
                    ?>
                    <tr>
                        <th scope="row"><?= $item['ma_hd'] ?></th>
                        <td><?= $item['ma_kh'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['sdt'] ?></td>
                        <td><?= $item['dia_chi'] ?></td>
                        <td><?= $item['ma_hh'] ?></td>
                        <td><?= $item['so_luong'] ?></td>
                        <td><?= number_format($item['tong_tien'], 2) ?>$</td>
                        <?php
                            if ($item['trang_thai'] == 0) {
                                echo '<td style="color: red; font-weight: bold;">Padding</td>';
                            } else if ($item['trang_thai'] == 1) {
                                echo '<td style="color: #24695C; font-weight: bold;">Accept</td>';
                            } else {
                                echo '<td style="color: #24695C; font-weight: bold;">Paymented</td>';
                            }
                            ?>
                        <td>
                            <a href="index.php?btn_edit&id_bill=<?= $item['ma_hd'] ?>" class="btn btn-primary active"
                                type="button"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>