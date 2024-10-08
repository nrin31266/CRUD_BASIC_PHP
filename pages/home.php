<?php
$students = $service->getAllRows();
?>

<div class="container mt-5">
    <h1 class="mb-4">Danh sách sinh viên</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Thêm
    </button>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>ID Sinh viên</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Date of birth</th>
                    <th>Email</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) : ?>
                    <tr>
                        <td><?= $student['id'] ?></td>
                        <td><?= $student['id_student'] ?></td>
                        <td><?= $student['firstname'] ?></td>
                        <td><?= $student['lastname'] ?></td>
                        <td><?= formatDateForInput($student['dob'])  ?></td>
                        <td><?= $student['email'] ?></td>
                        <td>
                            <button class="btn btn-info">
                            <a class="text-black" href="index.php?action=edit&id=<?= $student['id'] ?>">Edit</a>
                            </button>
                            <button class="btn btn-danger">
                                <a class="text-black" href="index.php?action=delete&id=<?= $student['id'] ?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                            </button>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include('modal/add_modal.php') ?>
</div>