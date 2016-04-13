<?php

require_once 'NoteRepository.php';
require_once 'Note.php';

$noteRepo = new \mtorre12\As2\NoteRepository();

$noteList = $noteRepo->getAllNotes();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Note</title>




    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="index.css">


</head>
<body>

<h1> Note-Taking Application </h1>

<h2> Keep yourself organized and on top of daily tasks. </h2>

<p><a href="create.php" class="myButton">Create a Note</a></p>




<div class = "container-fluid">
    <table class="table table-hover">
        <div class = "row">
           <tr>
             <div class="col-lg-8" <th>Subject</th></div>
             <div class="col-lg-1" <th>Created</th></div>
             <div class="col-lg-1" <th>Author</th></div>
             <div class="col-lg-1" <th>Count</th></div>
             <div class="col-lg-1" <th>Delete</th></div>
           </tr>
        </div>
    </table>
</div>

<?php
   foreach($noteList as $note) {
        print '<tr>';
        print '<td>' . $note->getId() . '</td>';
        print '<td><a href="show.php?id='. $note->getId() .'">' . $note->getSubject() .'</a></td>';
        print '<td>' . $note->getAuthor() . '</td>';
        print '<td>' . $note->getCreated() . '</td>';
        print '<td>' . $note->getCount() . '</td>';
//        print '<td>' . $note->getRating() . '</td>';
//        print '<td>' . $note->getRating() . '</td>';
        print '</tr>';
    }
    ?>


<?php //print_r($noteList); ?>

<?php
 if(8>=7 && "Tom" == "Rose"){
     echo "Hello World";
 }

?>


</body>
</html>
