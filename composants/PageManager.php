<?php
require '../sql/ConnectionSQL.php';
class PageManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getPageById($page_id)
{
    $query = "SELECT * FROM Page WHERE Id = :page_id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':page_id', $page_id, PDO::PARAM_INT);
    $stmt->execute();
    $page_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($page_data) {
        // You can now extract the data into separate variables
        $title = $page_data['Title'];
        $content = $page_data['editeur'];
        $current_image = $page_data['image']; // Assign the image name
        return array('title' => $title, 'content' => $content, 'image' => $current_image);
    }

    return false; // Or return an appropriate error message if the page is not found
}


public function updatePage($page_id, $title, $content, $image) {
    try {
        $query = "UPDATE Page SET Title = :new_title, editeur = :new_content, image = :new_image WHERE Id = :page_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':new_title', $title);
        $stmt->bindParam(':new_content', $content);
        $stmt->bindParam(':new_image', $image);
        $stmt->bindParam(':page_id', $page_id, PDO::PARAM_INT);

        // Execute the query
        $result = $stmt->execute();

        if ($result) {
            return true; // Return true to indicate success
        } else {
            return false; // Return false to indicate failure
        }
    } catch (PDOException $e) {
        return false; // Return false in case of an exception
    }
}
}
?>