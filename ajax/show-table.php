<?php
include_once '../db/connect.php';
$place =  $_POST['place'];

$table = '';
$table .= '<thead>';
$table .= '<tr>';
$table .= '<th class="text-center">ชื่ออ่าง</th>';
$table .= '<th class="text-center">ความจุเก็บกัก (nhvol)</th>';
$table .= '<th class="text-center">วันที่ล่าสุดที่เก็บข้อมูล</th>';
$table .= '<th class="text-center">ความจุวันล่าสุด</th>';
$table .= '<th class="text-center">ร้อยละของความจุ</th>';
$table .= '</tr>';
$table .= '</thead>';
echo $table;

$output = '';
$date = date('Y-m-d');
$sql = "SELECT reservoir_info.res_name,reservoir_info.nhvol,reservoir_data.date,reservoir_data.volume FROM reservoir_info INNER JOIN reservoir_data ON reservoir_info.res_code = reservoir_data.res_code WHERE reservoir_info.res_code = '$place' AND reservoir_data.res_code = '$place' AND date = (SELECT MAX(date) FROM reservoir_data) ORDER BY reservoir_info.no ASC";
$query = $conn->query($sql);
while ($row = $query->fetch_array()) {
    $sum = ($row['volume'] * 100) / $row['nhvol'];
    $output .=     '<tr>';
    $output .=     '<td class="text-center">' . $row['res_name'] . '</td>';
    $output .=     '<td class="text-center">' . $row['nhvol'] . '</td>';
    $output .=     '<td class="text-center">' . $row['date'] . '</td>';
    $output .=     '<td class="text-center">' . $row['volume'] . '</td>';
    $output .=     '<td class="text-center">' . number_format($sum, 2, '.', '') . '</td>';
    $output .=     '</tr>';
}
echo $output;
