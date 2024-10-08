<?php
$id = $_GET['id'] ?? null;
if(!$id){
    return;
}
$student = $service->getRowById($id);
$dob_format = isset($student['dob']) ? formatDateForInput($student['dob']) : '';

if (!$student) {
    echo "<h1>Sinh viên không tồn tại</h1>";
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id_student' => $_POST['id_student'],
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'dob' => $_POST['dob'],
        'email' => $_POST['email']
    ];
    $service->updateRow($id, $data);
    header("Location: index.php?action=home");
}
?>

<div class="container mt-5">
    <h1 class="mb-4">Sửa thông tin sinh viên</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="id_student" class="form-label">ID Sinh viên</label>
            <input type="text" class="form-control" id="id_student" name="id_student" value="<?= $student['id_student'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Họ</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $student['firstname'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Tên</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $student['lastname'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($dob_format) ? $dob_format : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $student['email'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php?action=home" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
