<?php
ob_start();
include('./config/db_connection.php');
include('./service/service.php');
include('./utils/date_time.php');

$service = new Service($connection, 'student');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function router()
{
    global $service;
    $action = $_POST['action'] ?? $_GET['action'] ?? 'home';

    switch ($action) {
        case 'home':
            include 'pages/home.php'; // Trang hiển thị danh sách sinh viên
            break;

        case 'add': // Trang thêm sinh viên
            $id_student = $_POST['id_student'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];

            // Thêm sinh viên vào cơ sở dữ liệu
            $data = [
                'id_student' => $id_student,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'dob' => $dob,
                'email' => $email
            ];
            

            $service->insertRow($data);
            header("Location: index.php?action=home");
            break;

        case 'edit': // Trang chỉnh sửa sinh viên
            include 'pages/edit.php';
            break;

        case 'delete': // Xử lý xóa sinh viên
            $id = $_GET['id'] ?? null;
            if ($id) {
                $service->deleteRow($id);
                header("Location: index.php?action=home");
            }
            break;

        default:
            echo "<h1>404 - Not Found</h1>";
            break;
    }
}

include './header.php';
router();
include './footer.php';
ob_end_flush();
