<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Thay bằng thông tin server của bạn
$username = "root";        // Thay bằng username cơ sở dữ liệu
$password = "";            // Thay bằng mật khẩu cơ sở dữ liệu
$dbname = "btth01_cse485_ex"; // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Chuẩn bị câu truy vấn để lấy thông tin từ cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Nếu username và password hợp lệ
        echo "Đăng nhập thành công!";
        // Chuyển hướng đến trang chính hoặc dashboard của người dùng
        // header("Location: dashboard.php");
    } else {
        // Nếu không hợp lệ, hiển thị thông báo
        echo "<div class='alert alert-danger'>Tên đăng nhập hoặc mật khẩu không đúng!</div>";
    }
}
$conn->close();
?>
