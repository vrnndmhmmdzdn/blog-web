<?php
require_once __DIR__ . "/Model.php";

class Tag extends Model
{
    protected $table = 'tags';
    protected $idColumn = 'tag_id';
    protected $nameColumn = 'tag_name';

    public function Create($datas)
    {
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
