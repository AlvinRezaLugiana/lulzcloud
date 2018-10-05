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



</head>
<body>
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
                <form class="example" action="#">
                <input type="text" placeholder="Search.." name="search">
                 <button type="submit"><i class="fa fa-search"></i></button>
               </form>
              </div>

            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown open">
                    <a class="nav-link link text-black display-7"><span class="mbri-upload mbr-iconfont mbr-iconfont-btn" id="myBtn"></span>Upload</a>
                </li></ul>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload your Meme</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
                                <pre>Title	: <input type="text" name="usrname"></pre>
                                <pre>Author	: <input type="text" name="author"></pre>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
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
    <div>
        <div>
			<!-- Filter -->
			<div class="mbr-gallery-filter container gallery-filter-active">
				<ul buttons="0">
				<li class="mbr-gallery-filter-all">
				<a class="btn btn-md btn-primary-outline active display-7" href="">All</a>
				</li>
				</ul>
			</div>
			<!-- Gallery -->
			<div class="mbr-gallery-row">
				<div class="mbr-gallery-layout-default">
				<div>
					<div>
						<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="Hot">
							<div href="#lb-gallery3-f" data-slide-to="0" data-toggle="modal">
							<img src="assets/images/gallery00.jpg" alt="" title="">
							<span class="icon-focus"></span>
							</div>
							</br><button class="btn-secondary like-review" onclick="AddClick1()">
								<i class="fa fa-heart" aria-hidden="true"></i> Only Like
							</button>
							<span id="CountedClicks1"></span>
							<script>
							$(function(){
								$(document).one('click', '.like-review', function(e) {
									$(this).html('<i class="fa fa-heart" aria-hidden="true"></i> You liked this');
									$(this).children('.fa-heart').addClass('animate-like');
								});
							});
							</script>
							<script>
							var Clicks = 0 ;
							function AddClick1(){
							Clicks = Clicks + 1;
							document.getElementById('CountedClicks1').innerHTML = Clicks + ' Likes';
							}
							</script>
						</div>
					<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="Fresh">
						<div href="#lb-gallery3-f" data-slide-to="1" data-toggle="modal">
							<img src="assets/images/gallery01.jpg" alt="" title="">
							<span class="icon-focus"></span>
						</div>
						</br><button class="btn-secondary like-review" onclick="AddClick2()">
								<i class="fa fa-heart" aria-hidden="true"></i> Only Like
							</button>
							<span id="CountedClicks2"></span>
							<script>
							$(function(){
								$(document).one('click', '.like-review', function(e) {
									$(this).html('<i class="fa fa-heart" aria-hidden="true"></i> You liked this');
									$(this).children('.fa-heart').addClass('animate-like');
								});
							});
							</script>
							<script>
							var Clicks = 0 ;
							function AddClick2(){
							Clicks = Clicks + 1;
							document.getElementById('CountedClicks2').innerHTML = Clicks + ' Likes';
							}
							</script>
					</div>
					<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="NSFW">
						<div href="#lb-gallery3-f" data-slide-to="2" data-toggle="modal">
							<img src="assets/images/gallery02.jpg" alt="" title="">
							<span class="icon-focus"></span>
						</div>
						</br><button class="btn-secondary like-review" onclick="AddClick3()">
								<i class="fa fa-heart" aria-hidden="true"></i> Only Like
							</button>
							<span id="CountedClicks3"></span>
							<script>
							$(function(){
								$(document).one('click', '.like-review', function(e) {
									$(this).html('<i class="fa fa-heart" aria-hidden="true"></i> You liked this');
									$(this).children('.fa-heart').addClass('animate-like');
								});
							});
							</script>
							<script>
							var Clicks = 0 ;
							function AddClick3(){
							Clicks = Clicks + 1;
							document.getElementById('CountedClicks3').innerHTML = Clicks + ' Likes';
							}
							</script>
					</div>
					<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="All Time Fav">
						<div href="#lb-gallery3-f" data-slide-to="3" data-toggle="modal">
							<img src="assets/images/gallery03.jpg" alt="" title="">
							<span class="icon-focus"></span>
						</div>
					</div>
					<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="Hot">
						<div href="#lb-gallery3-f" data-slide-to="4" data-toggle="modal">
							<img src="assets/images/gallery04.jpg" alt="" title="">
							<span class="icon-focus"></span>
						</div>
					</div>
					<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="Hot">
						<div href="#lb-gallery3-f" data-slide-to="5" data-toggle="modal">
							<img src="assets/images/gallery05.jpg" alt="" title="">
							<span class="icon-focus"></span>
						</div>
					</div>
					<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="Fresh">
						<div href="#lb-gallery3-f" data-slide-to="6" data-toggle="modal">
							<img src="assets/images/gallery06.jpg" alt="" title="">
							<span class="icon-focus"></span>
						</div>
					</div>
					<div class="mbr-gallery-item mbr-gallery-item--p3" data-video-url="false" data-tags="All Time Fav">
						<div href="#lb-gallery3-f" data-slide-to="7" data-toggle="modal">
							<img src="assets/images/gallery07.jpg" alt="" title="">
							<span class="icon-focus"></span>
						</div>
					</div>
					</div>
				</div>
			<div class="clearfix">
			</div>
			</div>
			</div>
			<!-- Lightbox -->
			<div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery3-f">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="assets/images/gallery00.jpg" alt="" title="">
								</div>
								<div class="carousel-item">
									<img src="assets/images/gallery01.jpg" alt="" title="">
								</div>
								<div class="carousel-item">
									<img src="assets/images/gallery02.jpg" alt="" title="">
								</div>
								<div class="carousel-item">
									<img src="assets/images/gallery03.jpg" alt="" title="">
								</div>
								<div class="carousel-item">
									<img src="assets/images/gallery04.jpg" alt="" title="">
								</div>
								<div class="carousel-item">
									<img src="assets/images/gallery05.jpg" alt="" title="">
								</div>
								<div class="carousel-item">
									<img src="assets/images/gallery06.jpg" alt="" title="">
								</div>
								<div class="carousel-item">
									<img src="assets/images/gallery07.jpg" alt="" title="">
								</div>
							</div>
						<a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery3-f">
						<span class="mbri-left mbr-iconfont" aria-hidden="true"></span>
						<span class="sr-only">Previous</span></a>
						<a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery3-f">
						<span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
						<span class="sr-only">Next</span></a>
						<a class="close" href="#" role="button" data-dismiss="modal">
						<span class="sr-only">Close</span></a>
						</div>
					</div>
				</div>
			</div>
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
