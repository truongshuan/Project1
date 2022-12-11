<?php

require  "../vendor/autoload.php";
require 'connection.php';

use Dompdf\Css\Color;
use Dompdf\Dompdf;
use Dompdf\Options;


/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */
// $dompdf->setPaper("A4", "landscape");

/**
 * Load the HTML and replace placeholders with values from the form
 */

if (isset($_GET['id_bill'])) {
    $ma_hd = $_GET['id_bill'];
}
$sql = "SELECT * FROM hoa_don INNER JOIN chi_tiet_hoa_don ON hoa_don.ma_hd = chi_tiet_hoa_don.ma_hd INNER JOIN hang_hoa ON hang_hoa.ma_hh = chi_tiet_hoa_don.ma_hh WHERE hoa_don.ma_hd = '$ma_hd'";
$result = mysqli_query($con, $sql);
$sql = "SELECT * FROM hoa_don INNER JOIN khach_hang ON hoa_don.ma_kh = khach_hang.ma_kh WHERE ma_hd = $ma_hd";
$sta = mysqli_query($con, $sql);
$i = mysqli_fetch_assoc($sta);
$user = $i['ma_kh'];
$html = '</table>';
$html .= '<div style="height: auto;width: 100%;display: flex;justify-content: space-between;align-items: center;">';
$html .= '<img src="1.JPG" style="margin: 0px 150px 0px 0px;">';
$html .= '<img src="2.JPG" style="width: 250px;">';
$html .= '</div>';
$html .= '<br>';
$html .= '<h1 style="font-weight: bold; Color:#348E37; text-align: center;"> Bill Details PDF </h1>';
$html .= "<h3> Hi: $user </h3>";
$html .=  '<h1 style="font-weight: bold;color: #000;text-align: center;">Your bill</h1>';
$html .= '<style>
table {
    width: 600px;
}

td {
    padding: 10px;
    font-size: 18px;
}
thead{
    font-weight: bold;
    font-size: 17px;
}
</style>';
$html .= '<table border="1px">';
$html .= '<thead>
<tr>
    <td>
        Id bill
    </td>
    <td>
        Name product
    </td>
    <td>
        Quality
    </td>
    <td>
        Price
    </td>
    <td>
        Date
    </td>
    <td>
        Action
    </td>
</tr>
</thead>';
while ($item = mysqli_fetch_assoc($result)) :
    $total = $item['tong_tien'];
    if ($item['trang_thai'] == 0) {
        $action = "Disable";
    } else if ($item['trang_thai'] == 1) {
        $action = "Accept";
    } else {
        $action = "Paymented";
    }
    $html .= '<tr>
    <td> ' . $item['ma_hd'] . ' </td>
    <td>' . $item['ten_hh'] . ' </td>
    <td>' . $item['so_luong'] . '  </td>
    <td>' . $item['don_gia'] . ' $</td>
    <td>' . $item['ngay_dat'] . ' </td>
    <td>' . $action . ' </td>
    </tr>';
endwhile;
$html .= '<tr> <td>Total: </td> <td colspan="5">' . $total . ' $</td> </tr>';
$html .= '</table>';



// $html = str_replace(["{{ name }}", "{{ quantity }}"], [$name, $quantity], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "Bill User"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("yourbill.pdf", ["Attachment" => 0]);

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);