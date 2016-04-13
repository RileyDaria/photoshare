<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 10/18/2015
 * Time: 2:22 AM
 */

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once 'NoteRepository.php';
require_once 'Note.php';



$noteRepo = new \mtorre12\As2\NoteRepository();

//Shortend Get variable names if set
$noteId = isset($_GET['id']) ? $_GET['id'] : '';

$note = $noteRepo->getAllNotes($noteId);

?>

<?php if ($note): ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Note <?php print $note->getSubject(); ?></title>
</head>
<body>
<p>Subject <?php print $note->getSubject();?></p>
<p>Author <?php print $note->getAuthor();?></p>
<p>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php print $note->getId();?>">
        <input type="submit" value="Edit Note">
    </form>
</p>
<p>
    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php print $note->getId();?>">
        <input type="submit" value="Delete Note">
    </form>
</p>
</body>
</html>
<?php else: ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>No Note To Show</title>
</head>
<body>
<h1>No Note Found</h1>
  <a href="index.php">Back to Note List</a>
</body>
</html>
<?php endif; ?>
