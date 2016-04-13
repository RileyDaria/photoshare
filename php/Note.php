<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 10/17/2015
 * Time: 7:15 PM
 */

namespace mtorre12\As2;


class Note
{
    private $id;
    private $subject = '';
    private $author = '';
    private $created = '';
    private $delete = '';
    private $count = '';
    private $content = '';

    public function __construct()
    {
        $this->id = uniqid();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */

    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }
    /**
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param string $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param string $delete
     */
    public function setDelete($delete)
    {
        $this->count = $delete;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $delete
     */
    public function setContent($content)
    {
        $this->count = $content;
    }
}



