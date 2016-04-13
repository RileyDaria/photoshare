<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 10/18/2015
 * Time: 2:28 AM
 */
require_once 'Note.php';
require_once 'NoteRepository.php';

$noteRepo = new \mtorre12\As2\NoteRepository();

?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>
<?php
$noteRepo->deleteNote($_POST['id']);
 ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Note</title>
    </head>
    <body>
    <h1>Note Deleted</h1>
    <p>Should have a confirmation page!!!</p>
    <p><a href="index.php">Back to Note List</a></p>
    </body>
    </html>
<?php else: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Document</title>
    </head>
    <body>
      <h1>No Note Selected for deletion</h1>
      <p><a href="index.php">Back to Note List</a></p>
    </body>
    </html>
<?php endif; ?>

