<?php

// Simple file to upload a file to the web server directory UPLOAD

// Note that I've added that this project is now stored in GIT

// Yet another Comment, this time to see what the diffs are

// THIS TIME IN RELEASE VERSION!!!

if ($_FILES["file"]["error"] > 0)
  {
     echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
    echo "\n";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
        echo $_FILES["file"]["name"] . " already exists. ";
    }
    else
    {
        $uploaddir = '/Users/rpataro/Sites/FileUp/upload/';
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        echo "Upload to $uploadfile";
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile)) {
            echo "\n Upload to: $target";   
        }
        else
        {
            echo "Unable to upload file";
        } 
    }
  }
?>