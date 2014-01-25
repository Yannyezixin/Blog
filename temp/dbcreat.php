<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

try
{
   $sql = 'CREATE TABLE yp_content(
   	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   	title VARCHAR(50) NOT NULL,
   	articaltext TEXT NOT NULL,
      see INT NOT NULL,
   	post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   	)DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_catagory(
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         catagory VARCHAR(50) NOT NULL
         )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_tag(
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         tag VARCHAR(50) NOT NULL
         )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_cata_cont(
         contentid INT NOT NULL,
         catagoryid INT NOT NULL,
         PRIMARY KEY(contentid, catagoryid) 
         )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_tag_cont(
         contentid INT NOT NULL,
         tagid INT NOT NULL,
         PRIMARY KEY(contentid,tagid)
         )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_user(
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(50) NOT NULL,
         password VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL
         )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_user_cont(
         contentid INT NOT NULL,
         userid INT NOT NULL,
         PRIMARY KEY(contentid,userid)
         )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_comment(
         id INT NOT NULL AUTO_INCREMENT,
         comment TEXT NOT NULL,
         contentid INT NOT NULL,
         PRIMARY KEY(id,contentid)
         )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
      CREATE TABLE yp_comment_user(
        id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        useremail VARCHAR(255) NOT NULL,
        PRIMARY KEY(id,username)
        )DEFAULT CHARACTER SET utf8 ENGINE = InnoDB';   
      
   $result = $pdo->query($sql);
}
catch(PDOException $e)
{
   $output = 'error to create  table into your database'.$e->getMessage();
   include $_SERVER['DOCUMENT_ROOT'].'/includes/html.inc.php';
   exit();
}