<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 10/17/2015
 * Time: 10:02 PM
 */

namespace mtorre12\As2;


interface INoteRepository
{
    public function saveNote($note);
    public function getAllNotes();
    public function getNoteById($id);
    public function deleteNote($noteId);
}