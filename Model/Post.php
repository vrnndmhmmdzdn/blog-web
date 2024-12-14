<?php
require_once __DIR__ . "/Model.php";

class Post extends Model
{
    protected $table = 'posts';
    protected $idColumn = 'post_id';
    protected $nameColumn = 'post_title';

    public function Create($datas_in)
    {
        $file_name = $datas_in["files"]["img_1"]["name"];
        $tmp_name = $datas_in["files"]["img_1"]["tmp_name"];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_extension = ["jpg", "JPG", "jpeg", "JPEG", "png"];
        if (!in_array($extension, $allowed_extension)) {
            return "File extension does not match";
        }
        if ($datas_in["files"]["img_1"]["size"] > 10000000) {
            return "file size is too large";
        }
        $file_name = random_int(1000, 9999) . "." . $extension;
        move_uploaded_file($tmp_name, "../public/img/" . $file_name);
        $datas = [
            "post_title" => $_POST['post_title'],
            "post_author" => $_SESSION['user_id'],
            "img_1" => $file_name,
            "head_1" => $_POST['head_1'],
            "content_1" => $_POST['content_1'],
            "head_2" => $_POST['head_2'],
            "content_2" => $_POST['content_2'],
            "head_3" => $_POST['head_3'],
            "content_3" => $_POST['content_3'],
            "post_category_id" => $_POST['category'],
        ];
        $query = parent::CreateModel($datas, $this->table);
        if ($query == false) {
            return "Failed to add";
        }
        $post_id = $this->db->insert_id;
        $tags = $datas_in["post"]["tag"];
        foreach ($tags as $tag) {
            $tagCategory = [
                "pivot_post_id" => $post_id,
                "pivot_tag_id" => $tag,
            ];
            parent::CreateModel($tagCategory, "pivot_post");
        }
        // if (gettype($result) == "string") {
        //     return "Failed to add";
        // }
        return true;
    }
    public function Select($id)
    {
        return parent::SelectModel($this->table, $this->idColumn, $id, "", "");
    }
    public function GetData()
    {
        return parent::GetDataModel($this->table);
    }
    public function Paginate($start, $limit)
    {
        $query = "SELECT posts.post_id, posts.post_title, posts.img_1, posts.post_watched, posts.post_like, users.user_name FROM {$this->table} JOIN users ON posts.post_author = users.user_id";
        if ($start !== null && $limit !== null) {
            $query .= " LIMIT $start , $limit";
        }
        $result = mysqli_query($this->db, $query);
        return $this->Convert($result);
    }
    public function Delete($id)
    {
        return parent::DeleteModel($this->table, $this->idColumn, $id);
    }
    public function Update($id, $datas)
    {
        $icon = '';
        if ($datas['files']['icon']['name'] !== '') {
            $file_name = $datas["files"]["icon"]["name"];
            $tmp_name = $datas["files"]["icon"]["tmp_name"];
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $allowed_extension = ["jpg", "JPG", "jpeg", "JPEG", "png"];
            if (!in_array($extension, $allowed_extension)) {
                return "File extension does not match";
            }
            if ($datas["files"]["icon"]["size"] > 10000000) {
                return "file size is too large";
            }
            $file_name = random_int(1000, 9999) . "." . $extension;
            move_uploaded_file($tmp_name, "../public/img/" . $file_name);
            $icon = $file_name;
        }
        $datas = [
            "category_name" => $datas["post"]["category_name"]
        ];
        if ($icon !== '') {
            $datas['icon'] = $icon;
        }
        return parent::UpdateModel($id, $this->idColumn, $datas, $this->table);
    }
    public function LiveSearch($keyword, $start = null, $limit = 0)
    {
        $limitQuery = "";
        if ($start !== null && $limit !== null) {
            $limitQuery = " LIMIT $start,$limit";
        }
        $sqlKeyword = " LIKE '%$keyword%' $limitQuery";
        return parent::LiveSearchModel($sqlKeyword, $this->nameColumn, $this->table);
    }
}
