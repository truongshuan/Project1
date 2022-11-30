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
            pdo_get_connection();
            $list = loai_select_all();
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
                    <a href="index.php?btn_edit&id_ct=<?= $item['ma_loai'] ?>" class="btn btn-light active txt-dark"
                        type="button">Edit</a>
                    <a href="index.php?id=<?= $item['ma_loai'] ?>" class="btn btn-danger active"
                        type="button">Delete</a>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>