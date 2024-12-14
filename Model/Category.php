<?php
require_once __DIR__ . "/Model.php";

class Category extends Model
{
    protected $table = 'categories';
    protected $idColumn = 'category_id';
    protected $nameColumn = 'category_name';

    public function Create($datas)
    {
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
        $datas = [
            "category_name" => $datas["post"]["category_name"],
            "icon" => $file_name
        ];
        return parent::CreateModel($datas, $this->table);
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
        return parent::GetDataModel($this->table, $start, $limit);
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
