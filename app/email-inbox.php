<?php require_once("../backend/Conexion.php");
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header("Location: ../index.html");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("estructura/head.php"); ?>
</head>

<body class="fix-header fix-sidebar">
    <?php include("estructura/header.php"); ?>

    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <!-- Left sidebar -->
                            <div class="inbox-leftbar">
                                <a class="btn btn-danger btn-block waves-effect waves-light" href="email-compose.html">Compose</a>

                                <div class="mail-list mt-4">
                                    <a class="list-group-item border-0 text-danger" href="#"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span
                                            class="label label-danger float-right ml-2">8</span></a>
                                    <a class="list-group-item border-0" href="#"><i class="mdi mdi-star font-18 align-middle mr-2"></i>Starred</a>
                                    <a class="list-group-item border-0" href="#"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft<span
                                            class="label label-info float-right ml-2">32</span></a>
                                    <a class="list-group-item border-0" href="#"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent
                                        Mail</a>
                                    <a class="list-group-item border-0" href="#"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Trash</a>
                                </div>

                                <h6 class="mt-5 m-b-15">Labels</h6>

                                <div class="list-group b-0 mail-list">
                                    <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-info mr-2"></span>Web
                                        App</a>
                                    <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-warning mr-2"></span>Project
                                        1</a>
                                    <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-purple mr-2"></span>Project
                                        2</a>
                                    <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-pink mr-2"></span>Friends</a>
                                    <a class="list-group-item border-0" href="#"><span class="fa fa-circle text-success mr-2"></span>Family</a>
                                </div>

                            </div>
                            <!-- End Left sidebar -->

                            <div class="inbox-rightbar">

                                <div role="toolbar" class="">
                                    <div class="btn-group">
                                        <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-archive font-18 vertical-middle"></i></button>
                                        <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-alert-octagon font-18 vertical-middle"></i></button>
                                        <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-delete-variant font-18 vertical-middle"></i></button>
                                    </div>
                                    <div class="btn-group">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect"
                                            type="button">
                                            <i class="mdi mdi-folder font-18 vertical-middle"></i>
                                            <b class="caret m-l-5"></b>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Move to</span>
                                            <a href="javascript: void(0);" class="dropdown-item">Social</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Updates</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Forums</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect"
                                            type="button">
                                            <i class="mdi mdi-label font-18 vertical-middle"></i>
                                            <b class="caret m-l-5"></b>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Label as:</span>
                                            <a href="javascript: void(0);" class="dropdown-item">Updates</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Social</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Forums</a>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect"
                                            type="button">
                                            More
                                            <span class="caret m-l-5"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">More Option :</span>
                                            <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Add Star</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Mute</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="mt-4">
                                        <div class="">
                                            <ul class="message-list">
                                                <li class="unread">
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk1">
                                                                <label class="toggle" for="chk1"></label>
                                                            </div>
                                                            <p class="title">Lucas Kriebel (via Twitter)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Lucas Kriebel (@LucasKriebel)
                                                                has sent you a direct message on Twitter!
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">@LucasKriebel - Very cool
                                                                    :) Nicklas, You have a new direct message.</span>
                                                            </div>
                                                            <div class="date">11:49 am</div>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk3">
                                                                <label class="toggle" for="chk3"></label>
                                                            </div>
                                                            <p class="title">Randy, me (5)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Last pic over my village
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Yeah i'd like that! Do you
                                                                    remember the video you showed me of your
                                                                    train ride between Colombo and Kandy? The
                                                                    one with the mountain view? I would love to
                                                                    see that one again!</span>
                                                            </div>
                                                            <div class="date">5:01 am</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk4">
                                                                <label class="toggle" for="chk4"></label>
                                                            </div>
                                                            <p class="title">Andrew Zimmer</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Mochila Beta: Subscription
                                                                Confirmed &nbsp;&ndash;&nbsp; <span class="teaser">You've
                                                                    been confirmed! Welcome to the ruling class
                                                                    of the inbox. For your records, here is a
                                                                    copy of the information you submitted to
                                                                    us...</span>
                                                            </div>
                                                            <div class="date">Mar 8</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="unread">
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk5">
                                                                <label class="toggle" for="chk5"></label>
                                                            </div>
                                                            <p class="title">Infinity HR</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Sveriges Hetaste sommarjobb
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Hej Nicklas Sandell! Vi
                                                                    vill bjuda in dig till "First tour 2014",
                                                                    ett rekryteringsevent som erbjuder jobb på
                                                                    16 semesterorter iSverige.</span>
                                                            </div>
                                                            <div class="date">Mar 8</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk6">
                                                                <label class="toggle" for="chk6"></label>
                                                            </div>
                                                            <p class="title">Web Support Dennis</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Re: New mail settings
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Will you answer him asap?</span>
                                                            </div>
                                                            <div class="date">Mar 7</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk7">
                                                                <label class="toggle" for="chk7"></label>
                                                            </div>
                                                            <p class="title">me, Peter (2)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Off on Thursday
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Eff that place, you might
                                                                    as well stay here with us instead! Sent
                                                                    from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span>
                                                            </div>
                                                            <div class="date">Mar 4</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk8">
                                                                <label class="toggle" for="chk8"></label>
                                                            </div>
                                                            <p class="title">Medium</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">This Week's Top Stories
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Our top pick for you on
                                                                    Medium this week The Man Who Destroyed
                                                                    America’s Ego</span>
                                                            </div>
                                                            <div class="date">Feb 28</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk9">
                                                                <label class="toggle" for="chk9"></label>
                                                            </div>
                                                            <p class="title">Death to Stock</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Montly High-Res Photos
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">To create this month's
                                                                    pack, we hosted a party with local musician
                                                                    Jared Mahone here in Columbus, Ohio.</span>
                                                            </div>
                                                            <div class="date">Feb 28</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk10">
                                                                <label class="toggle" for="chk10"></label>
                                                            </div>
                                                            <p class="title">Revibe</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Weekend on Revibe
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Today's Friday and we
                                                                    thought maybe you want some music
                                                                    inspiration for the weekend. Here are some
                                                                    trending tracks and playlists we think you
                                                                    should give a listen!</span>
                                                            </div>
                                                            <div class="date">Feb 27</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk11">
                                                                <label class="toggle" for="chk11"></label>
                                                            </div>
                                                            <p class="title">Erik, me (5)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Regarding our meeting
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">That's great, see you on
                                                                    Thursday!</span>
                                                            </div>
                                                            <div class="date">Feb 24</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk12">
                                                                <label class="toggle" for="chk12"></label>
                                                            </div>
                                                            <p class="title">KanbanFlow</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Task assigned: Clone ARP's
                                                                website &nbsp;&ndash;&nbsp; <span class="teaser">You
                                                                    have been assigned a task by Alex@Work on
                                                                    the board Web.</span>
                                                            </div>
                                                            <div class="date">Feb 24</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk13">
                                                                <label class="toggle" for="chk13"></label>
                                                            </div>
                                                            <p class="title">Tobias Berggren</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Let's go fishing!
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Hey, You wanna join me and
                                                                    Fred at the lake tomorrow? It'll be
                                                                    awesome.</span>
                                                            </div>
                                                            <div class="date">Feb 23</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk14">
                                                                <label class="toggle" for="chk14"></label>
                                                            </div>
                                                            <p class="title">Charukaw, me (7)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Hey man &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Nah man sorry i don't.
                                                                    Should i get it?</span>
                                                            </div>
                                                            <div class="date">Feb 23</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="unread">
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk15">
                                                                <label class="toggle" for="chk15"></label>
                                                            </div>
                                                            <p class="title">me, Peter (5)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Home again!
                                                                &nbsp;&ndash;&nbsp; <span class="teaser">That's
                                                                    just perfect! See you tomorrow.</span>
                                                            </div>
                                                            <div class="date">Feb 21</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk16">
                                                                <label class="toggle" for="chk16"></label>
                                                            </div>
                                                            <p class="title">Stack Exchange</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">1 new items in your
                                                                Stackexchange inbox &nbsp;&ndash;&nbsp; <span class="teaser">The
                                                                    following items were
                                                                    added to your Stack Exchange global inbox
                                                                    since you last checked it.</span>
                                                            </div>
                                                            <div class="date">Feb 21</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk17">
                                                                <label class="toggle" for="chk17"></label>
                                                            </div>
                                                            <p class="title">Google Drive Team</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">You can now use your storage
                                                                in Google Drive &nbsp;&ndash;&nbsp; <span class="teaser">Hey
                                                                    Nicklas Sandell! Thank you for purchasing
                                                                    extra storage space in Google Drive.</span>
                                                            </div>
                                                            <div class="date">Feb 20</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="unread">
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk18">
                                                                <label class="toggle" for="chk18"></label>
                                                            </div>
                                                            <p class="title">me, Susanna (11)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Train/Bus &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Yes ok, great! I'm not
                                                                    stuck in Stockholm anymore, we're making
                                                                    progress.</span>
                                                            </div>
                                                            <div class="date">Feb 19</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk19">
                                                                <label class="toggle" for="chk19"></label>
                                                            </div>
                                                            <p class="title">Peter, me (3)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Hello &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Trip home from Colombo has
                                                                    been arranged, then Jenna will come get me
                                                                    from Stockholm. :)</span>
                                                            </div>
                                                            <div class="date">Mar. 6</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="email-read.html">
                                                        <div class="col-mail col-mail-1">
                                                            <div class="checkbox-wrapper-mail">
                                                                <input type="checkbox" id="chk20">
                                                                <label class="toggle" for="chk20"></label>
                                                            </div>
                                                            <p class="title">me, Susanna (7)</p><span class="star-toggle fa fa-star-o"></span>
                                                        </div>
                                                        <div class="col-mail col-mail-2">
                                                            <div class="subject">Since you asked... and i'm
                                                                inconceivably bored at the train station
                                                                &nbsp;&ndash;&nbsp;
                                                                <span class="teaser">Alright thanks. I'll have
                                                                    to re-book that somehow, i'll get back to
                                                                    you.</span>
                                                            </div>
                                                            <div class="date">Mar. 6</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <!-- panel body -->
                                </div>
                                <!-- panel -->

                                <div class="row">
                                    <div class="col-7">
                                        Showing 1 - 20 of 289
                                    </div>
                                    <div class="col-5">
                                        <div class="btn-group float-right">
                                            <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-left"></i></button>
                                            <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <?php include("estructura/footer.php"); ?>

</body>

</html>