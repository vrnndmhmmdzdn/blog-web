<?php
require_once __DIR__ . "/../DB/Connection.php";
session_start();

abstract class Model extends Connection
{
    public function CreateModel($datas, $table)
    {
        $key = array_keys($datas);
        $value = array_values($datas);
        $key = implode(',', $key);
        $value = implode("','", $value);

        $query = "INSERT INTO $table ($key) VALUES ('$value')";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $datas;
        } else {
            return false;
        }
        return $result;
    }
    public function GetDataModel($table, $start = null, $limit = null)
    {
        $query = "SELECT * FROM $table";
        if ($start !== null && $limit !== null) {
            $query .= " LIMIT $start , $limit";
        }
        $result = mysqli_query($this->db, $query);
        return $this->Convert($result);
    }
    public function SelectModel($table, $column, $id)
    {
        $query = "SELECT * FROM $table WHERE $column = $id ";
        $result = mysqli_query($this->db, $query);
        $data = $this->Convert($result);
        return $data;
    }
    public function DeleteModel($table, $column, $id)
    {
        $query = "DELETE FROM $table WHERE $column = $id";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $id;
        } else {
            return false;
        }
        return $result;
    }
    public function UpdateModel($id, $column, $datas, $table)
    {
        $key = array_keys($datas);
        $value = array_values($datas);
        $query = "UPDATE $table SET ";
        for ($i = 0; $i < count($key); $i++) {
            $query .= $key[$i] . " = '" . $value[$i] . "' ";
            if ($i != count($key) - 1) {
                $query .= ", ";
            }
        }
        $query .=  " WHERE $column = $id";
        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $datas;
        } else {
            return false;
        }
        return $result;
    }
    public function LiveSearchModel($sqlKeyword, $column, $table)
    {
        $query = "SELECT * FROM $table WHERE $column $sqlKeyword";
        $result = mysqli_query($this->db, $query);
        return $this->Convert($result);
    }
    public function LiveSearchPost($sqlKeyword, $column, $table)
    {
        $query = "SELECT posts.post_id, posts.post_title, posts.img_1, posts.post_watched, posts.post_like, users.user_name FROM $table JOIN users ON posts.post_author = users.user_id WHERE $column $sqlKeyword";
        $result = mysqli_query($this->db, $query);
        return $this->Convert($result);
    }
    public function Convert($datas)
    {
        $data = [];
        while ($row = mysqli_fetch_assoc($datas)) {
            $data[] = $row;
        }
        return $data;
    }
}
