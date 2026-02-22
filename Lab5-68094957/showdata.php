<?php
require('dbconnect.php');
$q_id = isset($_GET['query']) ? $_GET['query'] : 1;

$questions = [
    1 => "1. จงเขียนคำสั่งเพื่อดึงข้อมูลทุกคอลัมน์จากตาราง city",
    2 => "2. จงแสดงรายชื่อเมือง (Name) และเขตการปกครอง (District) ของทุกเมือง",
    3 => "3. จงหาชื่อเมืองที่อยู่ในรหัสประเทศ (CountryCode) เป็น 'THA'",
    4 => "4. จงหาเมืองที่มีจำนวนประชากร (Population) มากกว่า 1,000,000 คน",
    5 => "5. จงหาเมืองในรหัสประเทศ (CountryCode) เป็น 'BEL' และที่มีจำนวนประชากร (Population) มากกว่า 2,000,000 คน",
    6 => "6. จงแสดงชื่อประเทศ (Name) และทวีป (Continent) ของทุกประเทศ",
    7 => "7. จงหาข้อมูลของประเทศที่ตั้งอยู่ในทวีป 'Asia'",
    8 => "8. จงหาชื่อประเทศที่อยู่ในภูมิภาค (Region) 'Southeast Asia' และมีประชากรมากกว่า 50 ล้านคน",
    9 => "9. จงหาชื่อประเทศที่มีอายุขัยเฉลี่ย (LifeExpectancy) สูงกว่า 80 ปี",
    10 => "10. จงหาชื่อประเทศที่ไม่มีข้อมูลปีที่ได้รับเอกราช (IndepYear เป็น NULL)",
    11 => "11. จงหาชื่อประเทศที่มีค่า GNP ในปัจจุบัน มากกว่าค่า GNP เก่า (GNPOld)",
    12 => "12. จงแสดงภาษา (Language) ทั้งหมดที่ใช้ในรหัสประเทศ 'USA'",
    13 => "13. จงหาภาษาที่เป็นภาษาทางการ (IsOfficial = 'T')",
    14 => "14. จงหาภาษาที่มีสัดส่วนการใช้ (Percentage) มากกว่า 50% ขึ้นไป",
    15 => "15. จงหาภาษาที่ไม่ใช่ภาษาทางการ (IsOfficial = 'F') แต่มีสัดส่วนการใช้มากกว่า 30%"
];


switch($q_id) {
    case 1: $sql = "SELECT * FROM city"; break;
    case 2: $sql = "SELECT Name, District FROM city"; break;
    case 3: $sql = "SELECT Name FROM city WHERE CountryCode = 'THA'"; break;
    case 4: $sql = "SELECT * FROM city WHERE Population > 1000000"; break;
    case 5: $sql = "SELECT * FROM city WHERE CountryCode = 'BEL' AND Population > 2000000"; break;
    case 6: $sql = "SELECT Name, Continent FROM country"; break;
    case 7: $sql = "SELECT * FROM country WHERE Continent = 'Asia'"; break;
    case 8: $sql = "SELECT Name FROM country WHERE Region = 'Southeast Asia' AND Population > 50000000"; break;
    case 9: $sql = "SELECT Name FROM country WHERE LifeExpectancy > 80"; break;
    case 10: $sql = "SELECT Name FROM country WHERE IndepYear IS NULL"; break;
    case 11: $sql = "SELECT Name FROM country WHERE GNP > GNPOld"; break;
    case 12: $sql = "SELECT Language FROM countrylanguage WHERE CountryCode = 'USA'"; break;
    case 13: $sql = "SELECT Language FROM countrylanguage WHERE IsOfficial = 'T'"; break;
    case 14: $sql = "SELECT Language FROM countrylanguage WHERE Percentage > 50"; break;
    case 15: $sql = "SELECT Language FROM countrylanguage WHERE IsOfficial = 'F' AND Percentage > 30"; break;
    default: $sql = "SELECT * FROM city";
}

$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <title>Result - ข้อที่ <?php echo $q_id; ?></title>
    <style>
        body { font-family: 'Kanit', sans-serif; background: #f8f9fa; }
        .table { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .query-box { background: #212529; color: #0dcaf0; padding: 15px; border-radius: 8px; font-family: 'Courier New', monospace; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">เมนูหลัก</a></li>
            <li class="breadcrumb-item active">ข้อที่ <?php echo $q_id; ?></li>
          </ol>
        </nav>

        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <h3 class="text-primary border-start border-4 border-primary ps-3">โจทย์ข้อที่ <?php echo $q_id; ?></h3>
                <p class="lead text-muted"><?php echo $questions[$q_id]; ?></p>
                <div class="query-box">
                    <small class="text-secondary d-block mb-1 text-uppercase">SQL Query:</small>
                    <?php echo $sql; ?>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <?php 
                        if($result) {
                            $fields = mysqli_fetch_fields($result);
                            foreach($fields as $field) {
                                if(strtoupper($field->name) != 'ID') echo "<th>{$field->name}</th>";
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if($count > 0): $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td class="fw-bold text-muted"><?php echo $i++; ?></td>
                            <?php foreach($row as $key => $val): if(strtoupper($key) != 'ID'): ?>
                                <td><?php echo $val; ?></td>
                            <?php endif; endforeach; ?>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="10" class="text-center py-4">ไม่พบข้อมูลที่ค้นหา</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <p class="text-end text-muted">พบข้อมูลทั้งหมด <strong><?php echo $count; ?></strong> รายการ</p>
    </div>
</body>
</html>