<?php 
    include ("server.php");
    $id = $_GET["id"];

    $query = "SELECT * FROM news WHERE id= $id";
    
    $result = mysqli_query($db, $query);
     $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS SITE</title>
     <!-- <link rel="stylesheet" href="blog.css">  -->

    <style>
        * {
            padding: 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: 0;
        }
        body {
            /* background-color: #eea47eFF; */
        }

        .container {
            /* padding: 0 10rem; */
            /* justify-content: center;
            align-items: center; */
        }

        nav {
            display: flex;
            background-color: darkblue;
            justify-content: space-around;
            /* padding-left: 5px;
            padding-right: 5px; */
            /* height: 5rem; */
            text-align: center;
        }

        .blog {
            color: white;
            font-size: 30px;
            /* padding: 2rem 0;  */
            /* text-align: center; */
            justify-item: space 
        }

        .blog:hover {
            color: orange;
            transition: all ease-in 300ms;
        }

        .link {
             display: flex;
             gap: 3rem;
             align-items: center;
             padding-right: 5px;
        }

        a:hover {
            transition: all ease 400ms;
            color: orange;
        }

        a {
            text-decoration: none;
            color: white;
            font-size: 20px;
        }

        .text {
            background-color: lightgray;
            padding: 2rem;
            /* justify-content: space-around;
            gap: 2rem; */
        }

        .code {
            font-size: 30px;
            text-align: center;
           padding-right: 7rem;
           padding-left: 7rem;
        }

        .line {
            margin-top: 1rem;
            border: 1px solid black;
        }

        .right {
            display: flex;
            align-items: center;
             /* justify-content: space-around;  */
             padding-left: 10rem;
        } 

        .right>p {
            padding-right: 25rem;
        }

        img {
            padding-right: 1rem;
        }

        .btn {
            display: flex;
            justify-content: space-between;
            margin: .5rem 5rem;
            align-items: center;
        }

        button {
            display: flex;
            height: 2%; 
            padding: 1rem;
            background-color: darkblue;
            border: 0;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            width: 10rem;
        }

        .prev {
            display: flex;
            height: 2%; 
            padding: 1rem;
            background-color: darkblue;
            border: 0;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            width: 12rem;
            /* text-align: center; */
        }

        button:hover {
            color: white;
            background-color: orange;
            transition: all ease 300ms;
            box-shadow: 2px 2px 2px grey; 
        }
    </style>
</head>
<body>
<?php 
         include "./include/nav-bar.php";
      ?>


  <div class="container">
      
            <?php foreach($data as $row):?>  
          <!-- <div class="friends"> -->
            <div class="text">
               <p class="code">
                  <hr>
                <h2><?php echo $row["title"]?></h2>
                </p>
                  <hr>
             <div class="right">
                 <img src="assets/img/ayoola.png" alt="" width="40">
                 <p>By Raheem Halimat</p>
                 </div>
                 <p><em>Posted on:<?php echo $row["timestamp"]?></em></p>
             
              
             </div>
             
    <div class="main">
    <img src="./media/featured_image/<?php echo $row["image"] ?>" alt="" class="image">
        <div class="content">
        <?php echo $row["content"]?>
        </div>
                    
             <div class="btn">
                <?php 
                $previousPost = "SELECT * FROM news WHERE id<$id ORDER BY id DESC ";
                $nextPost = "SELECT * FROM news WHERE id>$id ORDER BY id ASC";

                $prevPost = mysqli_query($db, $previousPost);
                        if($row= mysqli_fetch_array($prevPost)){
                            echo '<a href="blog.php?id='.$row['id'].'"> <button class="prev"><<< Previous Post</button></a>';
                        }

                        $nxtPost = mysqli_query($db, $nextPost);
                        if($row = mysqli_fetch_array($nxtPost)){
                            echo '<a href="blog.php?id='.$row['id'].'"><button>Next Post >>></button></a>'; 
                        }
                ?>
             </div>
            
    </div>

         <?php 
            include "./include/author.php"
        ?> 
        
                <?php endforeach ?>
</div>
</body>
</html>