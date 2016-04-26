<?php
    class Image {
        public $image_id;
        public $name;
        public $date;
        public $uid;
        public $file_type;

        function validateImage($fileArray) {
            $errors= array();
            $file_name =  $fileArray['name'];
            $file_size = $fileArray['size'];
            $file_tmp = $fileArray['tmp_name'];
            $file_type = $fileArray['type'];
            $file_ext = strtolower(end(explode('.',$fileArray['name'])));

            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152){
                $errors[]='File size must be excately 2 MB';
            }

            return $errors;
        }

        function create($fileArray) {
            global $db;
            $errors = $this->validateImage($fileArray);
            if(sizeof($errors) > 0) return $errors;
            $this->file_type = strtolower(end(explode('.',$fileArray['name'])));
            $this->date = date('l, F jS, Y - h:i:s A');

            $query = "INSERT INTO `images_table` (`name`,`date`,`uid`,`file_type`) VALUES ('".$this->name."','".$this->date."','".$this->uid."','".$this->file_type."')";
            $db->query($query);
            $this->image_id = $db->insert_id;

            $filename = $this->image_id.'.'.$this->file_type;
            move_uploaded_file($fileArray['tmp_name'],'images/'.$filename);

            return true;
        }

        function getFilename() {
            return $this->image_id.'.'.$this->file_type;
        }

        function addTag($category) {
//            #TODO DOESN'T WORK RIGHT NOW
            $tag = new Tag();
            $tag->image_id = $this->image_id;
            $tag->category = $category;
            $tag->create();
        }


    }

    class Tag {
        public $image_id;
        public $category;

        function create() {
            global $db;
            $query = "INSERT INTO `tags` (`image_ID`,`category`) VALUES (".$this->image_id.",".$this->category.")";
            $db->query($query);

        }
    }
?>