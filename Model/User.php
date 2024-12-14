<?php
require_once __DIR__ . "/Model.php";

class User extends Model
{
    protected $table = 'users';
    protected $idColumn = 'user_id';
    protected $email = 'user_email';
    public function Register($datas)
    {
        $username = $datas['post']['user_name'];
        $email = $datas['post']['user_email'];
        $password = $datas['post']['user_password'];
        $role = (isset($datas['post']['role'])) ? 'admin' : 'author';

        $emailQuery = "SELECT * FROM {$this->table} WHERE {$this->email} = '$email'";
        $result = mysqli_query($this->db, $emailQuery);
        if (mysqli_num_rows($result)) {
            return "Email has been registered";
        }

        $file_name = $datas["files"]["user_img"]["name"];
        $tmp_name = $datas["files"]["user_img"]["tmp_name"];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_extension = ["jpg", "JPG", "jpeg", "JPEG", "png", "PNG"];
        if (!in_array($extension, $allowed_extension)) {
            return "File extension does not match";
        }
        if ($datas["files"]["user_img"]["size"] > 10000000) {
            return "file size is too large";
        }
        $file_name = random_int(1000, 9999) . "." . $extension;
        move_uploaded_file($tmp_name, "../public/profile/" . $file_name);

        $basePassword = base64_encode($password);
        $registerQuery = "INSERT INTO {$this->table} (user_name,user_email,user_password,user_img,role) VALUES ('$username','$email','$basePassword','$file_name','$role')";
        $result = mysqli_query($this->db, $registerQuery);
        if ($result == false) {
            return "Failed to register";
        }
        $lastId = mysqli_insert_id($this->db);
        $idQuery = "SELECT * FROM {$this->table} WHERE {$this->idColumn} = $lastId";
        $idResult = mysqli_query($this->db, $idQuery);
        $user = mysqli_fetch_assoc($idResult);

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $username;
        $_SESSION['user_img'] = $file_name;
        $_SESSION['role'] = $role;

        $userProfile = [
            'user_name' => $username,
            'user_img' => $file_name,
            'role' => $role,
        ];
        return $userProfile;
    }

    public function Login($email, $password)
    {
        $emailQuery = "SELECT * FROM {$this->table} WHERE {$this->email} = '$email'";
        $emailResult = mysqli_query($this->db, $emailQuery);
        if (mysqli_num_rows($emailResult) == 0) {
            return "Email not found";
        }
        $user = mysqli_fetch_assoc($emailResult);
        if (base64_decode($user['user_password'], true) !== $password) {
            return "Incorrect password";
        }

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_img'] = $user['user_img'];
        $_SESSION['role'] = $user['role'];

        $userProfile = [
            'user_name' => $user['user_name'],
            'user_img' => $user['user_img'],
            'role' => $user['role'],
        ];
        return $userProfile;
    }
    public function Logout()
    {
        session_destroy();
        session_reset();
    }
}
