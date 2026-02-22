<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <title>เพิ่มข้อมูลเมืองใหม่</title>
    <style>
        body { font-family: 'Kanit', sans-serif; background: #eef2f7; }
        .card { border-radius: 20px; border: none; }
        .btn-save { background: #28a745; color: white; padding: 12px; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4 text-dark">เพิ่มข้อมูลเมืองใหม่</h2>
                        <form action="insertdata.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">ชื่อเมือง (Name)</label>
                                <input type="text" name="name" class="form-control" required placeholder="เช่น Bangkok">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">รหัสประเทศ (Code)</label>
                                    <input type="text" name="country_code" class="form-control" maxlength="3" required placeholder="THA">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">ประชากร (Population)</label>
                                    <input type="number" name="population" class="form-control" required placeholder="0">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">เขตการปกครอง (District)</label>
                                <input type="text" name="district" class="form-control" required placeholder="เช่น Central">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-save shadow-sm">บันทึกข้อมูลเข้าสู่ระบบ</button>
                                <a href="index.php" class="btn btn-light mt-2">ยกเลิกและกลับหน้าหลัก</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>