<?php
$list_data_cmt =  thong_ke_binh_luan();
foreach ($list_data_cmt as $item) :
?>
<tr>
    <th scope="row"><?= $item['ma_hh'] ?></th>
    <td><?= $item['ten_hh'] ?></td>
    <td><?= $item['so_luong'] ?></td>
    <td><?= $item['moi_nhat'] ?></td>
    <td><?= $item['cu_nhat'] ?></td>
    <td>
        <a href="detail.php?id_product=<?= $item['ma_hh'] ?>" class="btn btn-light active txt-dark"
            type="button">Detail</a>
    </td>
</tr>
<?php
endforeach;
?>