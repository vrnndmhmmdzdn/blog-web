<?php
require_once __DIR__ . "/Model.php";

class Home extends Model
{

    // public function LiveSearch($keyword, $start = null, $limit = 0)
    // {
    //     $limitQuery = "";
    //     if ($start !== null && $limit !== null) {
    //         $limitQuery = " LIMIT $start,$limit";
    //     }
    //     $sqlKeyword = " LIKE '%$keyword%' $limitQuery";
    //     //return parent::LiveSearchModel($sqlKeyword, $this->nameColumn, $this->table);
    // }
    // public function GetOrder($table, $order, $limit)
    // {
    //     $query = "SELECT * FROM $table ORDER BY $order DESC LIMIT $limit";
    //     $result = mysqli_query($this->db, $query);
    //     return parent::Convert($result);
    // }
    public function Select($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function LastWeek($table, $column)
    {
        $query = "SELECT * FROM $table WHERE $column BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW();";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function HeaderShow()
    {
        $query = "SELECT post_title FROM posts ORDER BY post_created_at DESC LIMIT 10"; // Mengambil 10 judul artikel
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    public function GetIndex($table, $start, $limit)
    {
        //return parent::GetDataModel($this->table, $start, $limit);
        $query = "SELECT posts.post_id, posts.post_title, posts.img_1, posts.post_created_at, posts.content_1, posts.post_category_id, categories.category_name FROM $table JOIN categories ON posts.post_category_id = categories.category_id";
        if ($start !== null && $limit !== null) {
            $query .= " LIMIT $start , $limit";
        }
        $result = mysqli_query($this->db, $query);
        return $this->Convert($result);
    }
    public function GetCategory($id)
    {
        $query = "SELECT * FROM categories WHERE category_id = $id LIMIT 1";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_assoc($result);
    }
    public function PostIndex($id, $limit)
    {
        $query = "SELECT posts.*, users.user_name FROM posts JOIN users ON posts.post_author = users.user_id WHERE post_category_id = $id LIMIT $limit";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function RecentNews()
    {
        $query = "SELECT posts.*, categories.category_id,categories.category_name,users.user_id,users.user_name FROM posts JOIN categories ON posts.post_category_id = categories.category_id JOIN users ON users.user_id = post_author ORDER BY post_created_at DESC LIMIT 5";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function HotNews()
    {
        $query = "SELECT posts.*, categories.category_id,categories.category_name FROM posts JOIN categories ON posts.post_category_id = categories.category_id ORDER BY posts.post_watched DESC LIMIT 5";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    function TimeAgo($timestamp)
    {
        $timeAgo = strtotime($timestamp);
        $currentTime = time();
        $timeDifference = $currentTime - $timeAgo;

        $seconds = $timeDifference;
        $minutes = round($seconds / 60);
        $hours = round($seconds / 3600);
        $days = round($seconds / 86400);
        $weeks = round($seconds / 604800);
        $months = round($seconds / 2629440);
        $years = round($seconds / 31553280);

        if ($seconds < 60) {
            return "Just Now";
        } elseif ($minutes < 60) {
            return "$minutes minutes ago";
        } elseif ($hours < 24) {
            return "$hours hours ago";
        } elseif ($days < 7) {
            return "$days days ago";
        } elseif ($weeks < 4) {
            return "$weeks weeks ago";
        } elseif ($months < 12) {
            return "$months months ago";
        } else {
            return "$years years ago";
        }
    }
    public function ViewerAdd($id)
    {
        $query = "SELECT post_watched FROM posts WHERE post_id = $id";
        $result = mysqli_query($this->db, $query);
        if ($result && mysqli_num_rows($result) < 1) {
            return "Data is not founded";
        }
        $row = mysqli_fetch_assoc($result);
        $watched = (int) $row['post_watched'];
        $newWatched = $watched + 1;
        $update = "UPDATE posts SET post_watched = '$newWatched' WHERE post_id = '$id'";
        $newResult = mysqli_query($this->db, $update);
        if ($newResult == false) {
            return "Failed";
        }
        $affected = mysqli_affected_rows($this->db);
        if ($affected < 1) {
            return "Failed to update";
        }
        return $newWatched;
    }
    public function SelectPost($id)
    {
        $query = "SELECT posts.*,users.user_name,categories.category_name FROM posts JOIN users ON users.user_id = posts.post_author JOIN categories ON categories.category_id = posts.post_category_id WHERE post_id = $id ";
        $result = mysqli_query($this->db, $query);
        $data = $this->Convert($result);
        return $data;
    }
    public function GetTag($id)
    {
        $query = "SELECT pivot_post.*,tags.* FROM pivot_post JOIN tags ON tags.tag_id = pivot_post.pivot_tag_id WHERE pivot_post_id = $id";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function RelatedNews($category)
    {
        $query = "SELECT * FROM posts WHERE post_category_id = $category LIMIT 3";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function TagHome($id)
    {
        // DISTINCT = untuk menghindari duplikasi
        $query = "SELECT posts.*,tags.*,users.user_name,users.user_id FROM posts JOIN pivot_post ON posts.post_id = pivot_post.pivot_post_id JOIN tags ON pivot_post.pivot_tag_id = tags.tag_id JOIN users ON users.user_id = posts.post_author WHERE tags.tag_id = $id";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function CategoryHome($id)
    {
        // DISTINCT = untuk menghindari duplikasi
        $query = "SELECT posts.*,categories.category_id,categories.category_name,users.user_name,users.user_id FROM posts JOIN users ON users.user_id = posts.post_author JOIN categories ON posts.post_category_id = categories.category_id  WHERE posts.post_category_id = $id";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function Tag($id)
    {
        $query = "SELECT * FROM tags WHERE tag_id = $id";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function Category($id)
    {
        $query = "SELECT posts.post_category_id, categories.category_id, categories.category_name FROM posts JOIN categories ON posts.post_category_id = categories.category_id WHERE posts.post_category_id = $id;";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }

    public function GetAuthorCountForTag($id)
    {
        // Menyiapkan query SQL untuk menghitung jumlah author unik dengan tag tertentu
        $query = "SELECT COUNT(DISTINCT users.user_name) AS total_authors FROM posts JOIN pivot_post ON posts.post_id = pivot_post.pivot_post_id JOIN tags ON pivot_post.pivot_tag_id = tags.tag_id JOIN users ON posts.post_author = users.user_name WHERE tags.tag_id = '$id'";

        $result = mysqli_query($this->db, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_authors']; // Mengembalikan jumlah author yang unik
        } else {
            return 0; // Mengembalikan 0 jika tidak ada author yang menulis dengan tag tersebut
        }
    }
    public function LikeWatchTotal($column, $id)
    {
        $query = "SELECT SUM($column) AS total, posts.post_id, pivot_post.*, tags.* FROM posts JOIN pivot_post ON posts.post_id = pivot_post.pivot_post_id JOIN tags ON pivot_post.pivot_tag_id = tags.tag_id WHERE tags.tag_id = $id;";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function LikeWatch($column, $id)
    {
        $query = "SELECT SUM($column) AS total FROM posts WHERE post_category_id = $id;";
        $result = mysqli_query($this->db, $query);
        return parent::Convert($result);
    }
    public function Check($table, $column, $id)
    {
        $query = "SELECT * FROM $table WHERE $column = $id";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) < 1) {
            return true;
        }
        return false;
    }
    public function WatchTotal($table, $column, $lastWeek = false)
    {
        $query = "SELECT SUM($column) AS total FROM $table";
        if ($lastWeek) {
            $query .= " WHERE post_created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()";
        }
        $result = mysqli_query($this->db, $query);
        $total = mysqli_fetch_assoc($result);
        return $total['total'];
    }
}
