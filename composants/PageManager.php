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
            // Vous pouvez maintenant extraire les données dans des variables distinctes
            $title = $page_data['Title'];
            $content = $page_data['editeur'];
            $image = $page_data['image'];
    
            // Retournez les données sous forme de tableau associatif
            return array('title' => $title, 'content' => $content, 'image' => $image);
        }
    
        return false; // Ou retournez un message d'erreur approprié si la page n'est pas trouvée
    }


    public function updatePage($page_id, $title, $content, $image) {
        $query = "UPDATE Page SET Title = :new_title, editeur = :new_content, image = :new_image WHERE Id = :page_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':new_title', $title);
        $stmt->bindParam(':new_content', $content);
        $stmt->bindParam(':new_image', $image);
        $stmt->bindParam(':page_id', $page_id, PDO::PARAM_INT);
        return $stmt->execute();
        echo('cest bon');
    }
}
?>