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
    // Came from show page based on id parameter
    $note = $noteRepo->getNoteById($_POST['id']);
     ?>
     <h1>Edit Note</h1>
        <form method="post" action="edit.php">
            <input type="hidden" name="noteId" value="<?php print $_POST['id']; ?>">
            <label>Note Subject<input type="text" name="subject" value="<?php print $note->getSubject(); ?>"></label><br>
            <label>Note Author < name="author">
                    <?php
                    $noteAuthor = $note->getAuthor();
                    if (!empty($noteAuthor)) {




                    } else {


                    }
                    ?>
                </label><br>
            <input type="submit" value="Save Note">
        </form>

<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?>

    <?php
    // Process edit form
    //Shortend Post variable names if set
    $noteTitle = isset($_POST['title']) ? trim($_POST['title']) : '';
    $noteRating = isset($_POST['rating']) ? $_POST['rating'] : '';

    //Validate form fields
    $formIsValid = true;
    $titleErr = '';
    $ratingErr = '';
    if (empty($noteTitle)){
        $formIsValid = false;
        $titleErr = '<span style="color: #f00;">Title is required!</span>';
    }
    if (empty($noteRating)){
        $formIsValid = false;
        $ratingErr = '<span style="color: #f00;">Title is required!</span>';
    }
    ?>
    <?php if ($formIsValid): ?>
        <?php
        //Process valid data and save note update
        $aNote = $noteRepo->getNoteById($_POST['noteId']);
        $aNote->setTitle($noteTitle);
        $aNote->setRating($noteRating);
        $noteRepo->saveNote($aNote);
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Update Note</title>
        </head>
        <body>
        <h1>Note Updated</h1>
        <p><a href="index.php">Back to Note List</a></p>
        </body>
        </html>
    <?php else: ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Update Note</title>
        </head>
        <body>
        <h1>Edit Note</h1>
        <form method="post" action="edit.php">
            <input type="hidden" name="noteId" value="<?php print $_POST['noteId']; ?>">
            <label>Note Title: <input type="text" name="title" value="<?php print $noteTitle; ?>"></label><?php print $titleErr; ?><br>
            <label>Note Rating: <select name="rating">
                    <?php
                    if (!empty($noteRating)) {
                        for($i = 1; $i <= 5; $i++){
                            $selected = '';
                            if ($noteRating == $i) {
                                $selected = 'selected';
                            }
                            print "<option $selected>$i</option>";
                        }
                    } else {
                        for($i = 1; $i <= 5; $i++){
                            print "<option>$i</option>";
                        }
                    }
                    ?>
                </select></label><?php print $ratingErr; ?><br>
            <input type="submit" value="Save Note">
        </form>
        </body>
        </html>
    <?php endif; ?>

<?php else: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Document</title>
    </head>
    <body>
      <h1>No Note Selected for Editing</h1>
      <p><a href="index.php">Back to Note List</a></p>
    </body>
    </html>
<?php endif;?>