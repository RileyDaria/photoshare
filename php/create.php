<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 10/17/2015
 * Time: 8:53 PM
 */
require_once 'Note.php';
require_once 'NoteRepository.php';

//Shortend Post variable names if set
$noteSubject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$noteCreated = isset($_POST['created']) ? $_POST['created'] : '';
$noteAuthor = isset($_POST['author']) ? trim($_POST['author']) : '';
$noteCount = isset($_POST['count']) ? $_POST['count'] : '';
$noteDelete = isset($_POST['delete']) ? trim($_POST['delete']) : '';
$noteContent = isset($_POST['content'])? trim($_POST['content']): '';

//Validate form fields
$formIsValid = true;
$subjectErr = '';
$authorErr = '';
$noteContent = '';


if (empty($noteSubject)){
    $formIsValid = false;
    $subjectErr = '<span style="color: #f00;">Subject is required!</span>';
}
if (empty($noteAuthor)){
    $formIsValid = false;
    $authorErr = '<span style="color: #f00;">Author Name is required!</span>';
}
if (empty($noteContent)){
    $formIsValid = false;
    $contentErr = '<span style="color: #f00;">Content is required in this field!</span>';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Note</title>

    <link rel="stylesheet" href="notepage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <?php if ($formIsValid): ?>
        <?php
        $noteRepo = new \mtorre12\As2\NoteRepository();
        $note = new \mtorre12\As2\Note();
        $note->getId($noteId);
        $note->setSubject($noteSubject);
        $note->setCreated($noteCreated);
        $note->setAuthor($noteAuthor);
        $note->setCount($noteCount);
        $note->setDelete($noteDelete);
        $noteRepo->saveNote($note);
        ?>
        <h1>New Note Created: Confirmation Page</h1>
        <p>Subject <?php print $noteSubject; ?></p>
        <p>Created <?php $dateStamp = date("l, F jS, Y - h:i:s A"); print $dateStamp;?></p>
        <p>Author <?php print $noteAuthor; ?></p>
        <p>Count <?php $noteCount =iconv_strlen($note);print $noteCount; ?></p>

        <a href="index.php" class="myButton">Return to Main Page</a>

        <p> Note: <?php print $note; ?></p>
    <?php else: ?>
        <h1>Create New a Note TESTING</h1>
        <form method="post" action="create.php">
            <label> Subject <input type="text" name="subject" value="<?php print $noteSubject; ?>"></label><span class="error"><?php print $subjectErr; ?></span><br>
            <label>Created
                    <?php
                        $dateStamp = date("l, F jS, Y - h:i:s A");
                        echo $dateStamp;
                    ?>
            </label>
            <label> Author<input type="text" name="author" value="<?php print $noteAuthor; ?>"></label><span class = "error"><?php print $authorErr; ?></span><br>
            <label> Count <input type="text" name="count" value="<?php

                        print $noteCount; ?>"></label><?php print $authorErr; ?><br>
        </form>
    <?php endif; ?>
<?php else: ?>
    <h1>Create New Note 2nd TESTING</h1>
    <form method="post" action="create.php">
         <label> Subject <input type="text" name="subject" value="" </label><br>
          <label> Author<input type="text" name="author" value=" "></label><span class = "error"></span><br>
         <label> Created/Updated:

                    <?php

                        $dateStamp = date("l, F jS, Y - h:i:s A");
                        echo $dateStamp;

                    ?>
         </label> <br>

           <?php

              if (empty($note)){
                 $formIsValid = false;
               }
               $count= "";
               echo count_chars($count,5);

           ?>


        </form>

        <input type="submit" value="Save Note" class="myButton">

        <textarea class="form-control" rows="3">       </textarea>
        <textarea rows=" " cols="225" placeholder="Start writing your note here..." wrap="hard" > </textarea>
    </form>
<?php endif; ?>
</body>
</html>


