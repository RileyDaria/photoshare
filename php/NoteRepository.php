<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 10/17/2015
 * Time: 10:07 PM
 */



namespace mtorre12\As2;

require_once 'Note.php';
require_once 'INoteRepository.php';


class NoteRepository implements INoteRepository
{
    private $fileName = 'data.txt';


    public function saveNote($note)
    {
        $dataArray = $this->getAllNotes();
        $dataArray[$note->getId()] = $note;
        $serialData = serialize($dataArray);
        file_put_contents($this->fileName, $serialData);
    }

    public function getAllNotes()
    {
        $data = file_get_contents($this->fileName);
        if ($data) {
            $dataArray = unserialize($data);
            return $dataArray;
        } else {
            return array();
        }
    }

    public function getNoteById($id)
    {
        $noteList = $this->getAllNotes();
        if (array_key_exists($id, $noteList)) {
            return $noteList[$id];
        }
    }

    public function deleteNote($noteId)
    {
        $noteList = $this->getAllNotes();
        if (array_key_exists($noteId, $noteList)) {
            unset($noteList[$noteId]);
            $serialData = serialize($noteId);
            file_put_contents($this->fileName, $serialData);
        }
    }
}