<div class="card-header">
    <h5>Table Users</h5>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="border-bottom-primary">
                <th scope="col">ID</th>
                <th scope="col">Avatar</th>
                <th scope="col">Userna me</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Desc</th>
                <th scope="col">ON/OFF</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $list_user = khach_hang_select_all();
            $i = 1;
            foreach ($list_user as $item) :
            ?>
            <tr class="border-bottom-secondary">
                <th scope="row"><?= $i++  ?></th>
                <td>
                    <img src="../../uploads/<?= $item['avatar'] ?>" alt="" class="rounded-circle mr-3" width="70px">
                </td>
                <td><?= $item['ma_kh'] ?></td>
                <td><?= $item['ten_kh'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['trang_thai'] ?></td>
                <td>
                    <?php if ($item['hoat_dong'] == 1) {
                            echo '<p style="color: #24695C; font-weight: bold;">Enable</p>';
                        } else {
                            echo '<p style="color: red; font-weight: bold;">Disable</p>';
                        }
                        ?>
                </td>
                <td>
                    <a href="index.php?btn_edit&id_user=<?= $item['ma_kh'] ?>" class="btn btn-primary active"
                        type="button"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>