<!DOCTYPE html>
<html >
<head>
    <!-- Site made with Mobirise Website Builder v4.8.1, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.8.1, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/123123123-122x97.png" type="image/x-icon">
    <meta name="description" content="">
    <title>69.com</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<style>
        .cid-r4IWN053Sc {
      padding-top: 120px;
      padding-bottom: 0px;
      padding-left: 40%;
      background-image: url("star1234.png");
      -webkit-transition-property: background-image;
      -webkit-transition-duration: 0.3s;
      -webkit-transition-timing-function: ease-out;
        }

        .cid-r4IWN053Sc:hover {
      background-image: url("flower1235.png");
        }
    </style>
</head>
<body>
<?php include 'sparkjs.php';?>
<section class="menu cid-r4INLFisah" once="menu" id="menu2-6">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="assets/images/123123123-122x97.png" alt="Mobirise" title="" style="height: 5.3rem;">
                    </a>
                </span>

    

                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="index.php">.com</a></span>

              </div>

            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown open">
                    <a class="nav-link link text-black display-7"><span class="mbri-upload mbr-iconfont mbr-iconfont-btn" id="myBtn"></span></a>
                </li></ul>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload your Meme</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <!--<input type="file" name="fileToUpload" id="fileToUpload"></br></br>-->
                                <pre><font face="helvetica">Text       : <textarea style="resize:none" name="text" cols="42" rows="10" required></textarea></pre>
                                <pre>Title	    : <input type="text" name="title" required></pre>
                                <pre>Author	    : <input type="text" name="author" required></pre>
                                <pre>Category   : <select id="category" name="category" required>
                                    <option value="0" disabled>--Select Category--</option>
                                    <option value="1">NSFW</option>
                                    <option value="2">Funny</option>
                                    <option value="3">Random</option>
                                </font></select></pre>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="SubmitButton" value="Send some memes boiz">
                                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>-->
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    $("#myBtn").click(function(){
                        $("#myModal").modal({backdrop: false});
                    });
                });
            </script>
        </div>
    </nav>
</section>

<section class="engine"></section><section class="mbr-gallery mbr-slider-carousel cid-r4IWN053Sc" id="gallery3-f">

    <div class="container-fluid">

        <div class="card-columns">

            <?php
            // CREATE
            if(isset($_POST['SubmitButton'])) {
                sparkjs_insert(uuid(), $_POST['title'], $_POST['author'], $_POST['text'], date("Y-m-d"), $_POST['category']);
            }

            ?>

            <?php
            // TODO:UPSERT
            if(isset($_POST['updateLikes'])) {
                $_POST['likes'] = $_POST['likes'] + 1;
				sparkjs_update_likes($_POST['id'], $_POST['title'], $_POST['author'], $_POST['file'], $_POST['time'], $_POST['likes'], $_POST['category']);
            }

            ?>

            <?php
            // TODO: DELETE
            if(isset($_POST['Delete']))
            {
                sparkjs_delete($_POST['category'],$_POST['title'],$_POST['id']);
            }

            ?>



            <?php
            // RETRIEVE
			sleep(1);
            $result = sparkjs_read();

			if(empty($array)){
				
				foreach ($result as $row) { // results and rows implement Iterator, Countable and ArrayAccess
                echo "<div class=\"card text-center\" style=\"width: 23rem; margin:0 auto;\">";
                    echo "<div class=\"card-header\">".$row['id']."</div>";
                    echo "<div class=\"card-header\">".$row['title']." by ".$row['author']."</div>";
                    echo "<div class=\"card-body\">";
                        echo "<p class=\"card-text\">".$row['file']."</p>";
                        echo "<p class=\"card-text\">Created/Updated on : ".$row["time"]."</p>";
                    echo "</div>";
                    echo "<div class=\"card-footer\">";

                        echo "<form action=\"\" method=\"POST\">";
                        echo "<input type=\"hidden\" value=\"";
                            echo $row['id'];
                        echo "\" name=\"id\">";
						echo "<input type=\"hidden\" value=\"";
                            echo $row['time'];
                        echo "\" name=\"time\">";
                        echo "<input type=\"hidden\" value=\"";
                            echo $row['author'];
                        echo "\" name=\"author\">";
						echo "<input type=\"hidden\" value=\"";
                            echo $row['file'];
                        echo "\" name=\"file\">";
                        echo "<input type=\"hidden\" value=\"";
                            echo $row['category'];
                        echo "\" name=\"category\">";
                        echo "<input type=\"hidden\" value=\"";
                            echo $row['title'];
                        echo "\" name=\"title\">";
                        echo "<input type=\"hidden\" value=\"";
                            echo $row['time'];
                        echo "\" name=\"time\">";
                        echo "<input type=\"hidden\" value=\"";
                            echo $row['likes'];
                        echo "\" name=\"likes\">";
                        echo "<input type=\"submit\" value=\"";
                            echo $row['likes'];
                        echo " Likes\" name=\"updateLikes\">";
                        echo "</form>";


                        echo "<form action=\"\" method=\"POST\">";
                        echo "<input type=\"hidden\" value=\"";
                        echo $row['id'];
                        echo "\" name=\"id\">";
                        echo "<input type=\"hidden\" value=\"";
                        echo $row['title'];
                        echo "\" name=\"title\">";
                        echo "<input type=\"hidden\" value=\"";
                        echo $row['category'];
                        echo "\" name=\"category\">";
                        echo"<input type=\"submit\" value=\"Delete\" name=\"Delete\">";
                        echo "</form>";
                    echo "</div>";
                echo "</div>";
            }
			
			}
            ?>
        </div>
    </div>

</section>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="assets/masonry/masonry.pkgd.min.js"></script>
<script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
<script src="assets/smoothscroll/smooth-scroll.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/slidervideo/script.js"></script>
<script src="assets/gallery/player.min.js"></script>
<script src="assets/gallery/script.js"></script>
<script src="assets/formoid/formoid.min.js"></script>


</body>
<footer>
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="index.php"> 69.com</a>
    </div>
</footer>

</html>