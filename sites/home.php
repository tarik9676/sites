<?php require_once 'header.php';?>

<link rel="stylesheet" href="css/home.css">

<!-- STARTING MAIN SECTION -->
<div class="container-fluid bg-light">
    <div class="t-row py-4" id="main">

        <!-- STARING LEFT SECTION -->
        <div class="t-col-3">
            <div id="my-profile">

                <!-- STARING BRIEF DETAILS ABOUT ME -->
                <div class="box-frame" id="about-me">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <h4><a class="text-dark" href="profile.php"><?php echo $_SESSION['first'] . " " . $_SESSION['last']; ?></a></h4><br />
                            <div class="d-flex justify-content-center align-items-center w-100">
                                <?php
                                    $pro_img = $_SESSION['profile_photo'];
                                    if (empty($pro_img))
                                    {
                                        echo "<img src='img/maleAvatar.png' alt='myProfile' >";
                                    }
                                    else
                                    {
                                        echo "<img src='$pro_img' alt='myProfile' />";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <ul>
                        <li><i class="material-icons">&#xe8f9;</i> <span>Skils</span></li>
                        <li><i class="fas fa-home"></i> <span>home</span></li>
                        <li><i class="fas fa-birthday-cake"></i> <span>birthday</span></li>
                    </ul>
                </div>
                <!-- END BRIEF DETAILS ABOUT ME -->

                <!-- STARTING SHORTCUTS -->
                <div class="mt-3" id="shortcuts">
                    <ul class="px-3">
                        <li><i class="material-icons">&#xe7ef;</i> My Groups</li>
                        <li><i class="material-icons">&#xe878;</i> My Events</li>
                        <li><i class="material-icons">&#xe413;</i> My Photos</li>
                    </ul>
                </div>
                <!-- END SHORTCUTS -->

                <!-- STARTING INTERESTS -->
                <div class="box-frame mt-3" id="interests">
                    <span>News</span>
                    <span>Labels</span>
                    <span>Games</span>
                    <span>Friends</span>
                    <span>Games</span>
                    <span>Friends</span>
                    <span>Food</span>
                    <span>Design</span>
                    <span>Art</span>
                    <span>Photos</span>
                </div>
                <!-- END INTERESTS -->


                <!-- STARTING FRIEND REQUEST -->
                <div class="box-frame mt-3" id="friend-requests">
                    <ul>
                        <div>Friend Requests</div>
                        <li>
                            <div>
                                <div><img src="img/maleAvatar.png"></div>
                                <div>Friend Name</div>
                            </div>
                            <div><button>Confirm</button><button>Delete</button></div>
                        </li>
                        <li>
                            <div>
                                <div><img src="img/maleAvatar.png"></div>
                                <div>Friend Name</div>
                            </div>
                            <div><button>Confirm</button><button>Delete</button></div>
                        </li>
                        <li>
                            <div>
                                <div><img src="img/maleAvatar.png"></div>
                                <div>Friend Name</div>
                            </div>
                            <div><button>Confirm</button><button>Delete</button></div>
                        </li>
                    </ul>
                </div>
                <!-- END INTERESTS -->

            </div>
        </div>
        <!-- END LEFT SECTION -->

        <!-- STARING MIDDLE SECTION -->
        <div class="t-col-7">
            <div id="news-feeds">

                <!-- STARTING MY STATUS SUBMIT -->
                <div class="box-frame" id="post">
                    <form action="home_action.php" method="post" enctype="multipart/form-data">
                        <textarea type="text" name="post_txt" placeholder="What's on your mind?"></textarea>
                        <br />
                        <input class="mt-2" type="file" name="post_img_1" id="" />
                        <br />
                        <input class="mt-2" type="file" name="post_img_2" id="" />
                        <br />
                        <button type="submit" class="btn btn-primary mt-4" name="status_share">Share</button>
                    </form>
                </div>
                <!-- END MY STATUS SUBMIT -->

                <!-- STARTING FRIENDS POST SECTION -->
                <div class="box-frame mt-3" id="friends-feeds">
                    <div class="d-flex justify-content-between" id="status-details">
                        <div id="person">
                            <img src="img/maleAvatar.png" alt="profile" />
                        </div>
                        <span>5 min ago</span>
                    </div>
                    <hr />
                    <div id="status">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="d-flex justify-content-between t-row" id="images">
                            <div class="d-flex justify-content-center t-col-6">
                                <img src="img/bikesride.jpg" />
                            </div>
                            <div class="d-flex justify-content-center t-col-6">
                                <img src="img/tour.jpg" />
                            </div>
                        </div>
                        <div class="mt-4 w-100">
                            <button class="btn btn-light">Like</button>
                            <button class="btn btn-light">Comment</button>
                            <button class="btn btn-light">Share</button>
                        </div>
                    </div>
                </div>
                <!-- END FRIENDS POST SECTION -->

                <!-- STARTING FRIENDS POST SECTION -->
                <div class="box-frame mt-3" id="friends-feeds">
                    <div class="d-flex justify-content-between" id="status-details">
                        <div id="person">
                            <img src="img/maleAvatar.png" alt="profile" />
                        </div>
                        <span>5 min ago</span>
                    </div>
                    <hr />
                    <div id="status">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="d-flex justify-content-between t-row" id="images">
                            <div class="d-flex justify-content-center t-col-6">
                                <img src="img/bikesride.jpg" />
                            </div>
                            <div class="d-flex justify-content-center t-col-6">
                                <img src="img/tour.jpg" />
                            </div>
                        </div>
                        <div class="mt-4 w-100">
                            <button class="btn btn-light">Like</button>
                            <button class="btn btn-light">Comment</button>
                            <button class="btn btn-light">Share</button>
                        </div>
                    </div>
                </div>
                <!-- END FRIENDS POST SECTION -->

            </div>
        </div>
        <!-- END MIDDLE SECTION -->

        <!-- STARING RIGHT SECTION -->
        <div class="t-col-2">
            <div class="box-frame" id="active-friends">
                <ul>
                    <li>
                        <a href="#">
                            <div><img src="img/maleAvatar.png" />
                                <div>active friends</div>
                            </div>
                            <i class="fas fa-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div><img src="img/maleAvatar.png" />
                                <div>active friends</div>
                            </div>
                            <i class="fas fa-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div><img src="img/maleAvatar.png" />
                                <div>active friends</div>
                            </div>
                            <i class="fas fa-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div><img src="img/maleAvatar.png" />
                                <div>active friends</div>
                            </div>
                            <i class="fas fa-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div><img src="img/maleAvatar.png" />
                                <div>active friends</div>
                            </div>
                            <i class="fas fa-circle"></i>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END MIDDLE SECTION -->

    </div>
</div>
<!-- END MAIN SECTION -->

<script src="js/home.js"></script>

<?php require_once 'footer.php';?>