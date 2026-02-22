<?php require('dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Assignment 5 - Dashboard</title>
    <style>
        body { font-family: 'Kanit', sans-serif; background: #f0f2f5; }
        .hero-section { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 40px 0; margin-bottom: 30px; border-bottom: 5px solid #ffc107; }
        .list-group-item { border: none; margin-bottom: 8px; border-radius: 10px !important; transition: 0.3s; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .list-group-item:hover { transform: translateX(10px); background: #fff; color: #0d6efd; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .category-label { font-weight: 500; color: #6c757d; margin: 20px 0 10px 5px; text-transform: uppercase; letter-spacing: 1px; }
    </style>
</head>
<body>
    <div class="hero-section text-center">
        <div class="container">
            <h1>โจทย์ : Assignment 5</h1>
            <p class="lead">68094957 Wasuthon Songsawatwong</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0 text-dark">เลือกรายการโจทย์เพื่อดูผลลัพธ์</h4>
                    <a href="insertform.php" class="btn btn-warning fw-bold shadow-sm">+ เพิ่มข้อมูลเมือง</a>
                </div>

                <div class="category-label"><span class="badge bg-primary">City Queries</span></div>
                <div class="list-group">
    <a href="showdata.php?query=1" class="list-group-item list-group-item-action">1. จงเขียนคำสั่งเพื่อดึงข้อมูลทุกคอลัมน์จากตาราง city</a>
    <a href="showdata.php?query=2" class="list-group-item list-group-item-action">2. จงแสดงรายชื่อเมือง (Name) และเขตการปกครอง (District) ของทุกเมือง</a>
    <a href="showdata.php?query=3" class="list-group-item list-group-item-action">3. จงหาชื่อเมืองที่อยู่ในรหัสประเทศ (CountryCode) เป็น 'THA'</a>
    <a href="showdata.php?query=4" class="list-group-item list-group-item-action">4. จงหาเมืองที่มีจำนวนประชากร (Population) มากกว่า 1,000,000 คน</a>
    <a href="showdata.php?query=5" class="list-group-item list-group-item-action">5. จงหาเมืองในรหัสประเทศ (CountryCode) เป็น 'BEL' และที่มีจำนวนประชากร (Population) มากกว่า 2,000,000 คน</a>
    <a href="showdata.php?query=6" class="list-group-item list-group-item-action">6. จงแสดงชื่อประเทศ (Name) และทวีป (Continent) ของทุกประเทศ</a>
    <a href="showdata.php?query=7" class="list-group-item list-group-item-action">7. จงหาข้อมูลของประเทศที่ตั้งอยู่ในทวีป 'Asia'</a>
    <a href="showdata.php?query=8" class="list-group-item list-group-item-action">8. จงหาชื่อประเทศที่อยู่ในภูมิภาค (Region) 'Southeast Asia' และมีประชากรมากกว่า 50 ล้านคน</a>
    <a href="showdata.php?query=9" class="list-group-item list-group-item-action">9. จงหาชื่อประเทศที่มีอายุขัยเฉลี่ย (LifeExpectancy) สูงกว่า 80 ปี</a>
    <a href="showdata.php?query=10" class="list-group-item list-group-item-action">10. จงหาชื่อประเทศที่ไม่มีข้อมูลปีที่ได้รับเอกราช (IndepYear เป็น NULL)</a>
    <a href="showdata.php?query=11" class="list-group-item list-group-item-action">11. จงหาชื่อประเทศที่มีค่า GNP ในปัจจุบัน มากกว่าค่า GNP เก่า (GNPOld)</a>
    <a href="showdata.php?query=12" class="list-group-item list-group-item-action">12. จงแสดงภาษา (Language) ทั้งหมดที่ใช้ในรหัสประเทศ 'USA'</a>
    <a href="showdata.php?query=13" class="list-group-item list-group-item-action">13. จงหาภาษาที่เป็นภาษาทางการ (IsOfficial = 'T')</a>
    <a href="showdata.php?query=14" class="list-group-item list-group-item-action">14. จงหาภาษาที่มีสัดส่วนการใช้ (Percentage) มากกว่า 50% ขึ้นไป</a>
    <a href="showdata.php?query=15" class="list-group-item list-group-item-action">15. จงหาภาษาที่ไม่ใช่ภาษาทางการ (IsOfficial = 'F') แต่มีสัดส่วนการใช้มากกว่า 30%</a>
</div>
</body>
</html>