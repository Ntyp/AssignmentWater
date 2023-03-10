<?php
include_once './db/connect.php';
// error_reporting(0);
$sql = "SELECT * FROM reservoir_info ORDER BY `no`";
$query = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <title>Water</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <h3 class="text-center mb-5 mt-3">Assignment ทดลองใช้งานฐานข้อมูล และเรียนรู้ข้อมูล
        ให้สรุปว่า แต่ละอ่างเก็บน้ำ มี Volume คิดเป็นร้อยละเท่าไร ของความจุทั้งหมด
      </h3>
      <select class="form-control mb-3" name="place" id="place" aria-placeholder="โปรดระบุอ่างเก็บน้ำ">
        <option value="">โปรดระบุอ่างเก็บน้ำ</option>
        <?php
        while ($row = $query->fetch_assoc()) { ?>
          <option value="<?php echo $row['res_code'] ?>"><?php echo $row['res_name'] ?></option>
        <?php } ?>
      </select>
      <table class="table table-bordered mt-3" id="show_data" cellspacing="0">
        <tr></tr>
      </table>
    </div>
  </div>
</body>

<script>
  $(document).ready(function() {
    $('#place').change(function() {
      let place = $(this).val();
      $.ajax({
        url: "./ajax/show-table.php",
        method: "POST",
        data: {
          place: place,
        },
        success: function(data) {
          $('#show_data').html(data);
        }
      });
    });
  });
</script>

</html>