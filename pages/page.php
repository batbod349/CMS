<?php
require '../includes/header.php';
require '../sql/ConnectionSQL.php';
require '../composants/PageManager.php';
$pageManager=new PageManager($db);
$page_data = $pageManager->getPageById($_GET['p']);
$title = '';
$content = '';

if (!empty($page_data)) {
    $title = isset($page_data['title']) ? htmlspecialchars($page_data['title']) : '';
    $content = isset($page_data['content']) ? htmlspecialchars($page_data['content']) : '';
    $img = isset($page_data['image']) ? htmlspecialchars($page_data['image']) : '';
    // Autres données à initialiser si nécessaire

} else {
    echo "Page non trouvée.";
}

?>
<body>
    <div id="page">
        <h1 style="text-align: center; margin: 0 auto;"><?php echo $title ?></h1>
        <div><?php echo html_entity_decode($content) ?></div>
    </div>
</body>

<?php require '../includes/footer.php'; ?>