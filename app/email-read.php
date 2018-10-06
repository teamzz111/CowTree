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

                                <a href="app-email-compose.html" class="btn btn-danger btn-block waves-effect waves-light">Compose</a>

                                <div class="mail-list mt-4">
                                    <a href="#" class="list-group-item border-0 text-danger"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><span
                                            class="label label-danger float-right ml-2">8</span></a>
                                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-star font-18 align-middle mr-2"></i>Starred</a>
                                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft<span
                                            class="label label-info float-right ml-2">32</span></a>
                                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-send font-18 align-middle mr-2"></i>Sent
                                        Mail</a>
                                    <a href="#" class="list-group-item border-0"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Trash</a>
                                </div>

                                <h6 class="mt-5 m-b-15">Labels</h6>

                                <div class="list-group b-0 mail-list">
                                    <a href="#" class="list-group-item border-0"><span class="fa fa-circle text-info mr-2"></span>Web
                                        App</a>
                                    <a href="#" class="list-group-item border-0"><span class="fa fa-circle text-warning mr-2"></span>Project
                                        1</a>
                                    <a href="#" class="list-group-item border-0"><span class="fa fa-circle text-purple mr-2"></span>Project
                                        2</a>
                                    <a href="#" class="list-group-item border-0"><span class="fa fa-circle text-pink mr-2"></span>Friends</a>
                                    <a href="#" class="list-group-item border-0"><span class="fa fa-circle text-success mr-2"></span>Family</a>
                                </div>

                            </div>
                            <!-- End Left sidebar -->
                            <div class="inbox-rightbar">

                                <div class="m-t-10 m-b-20" role="toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-archive font-18 vertical-middle"></i></button>
                                        <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-alert-octagon font-18 vertical-middle"></i></button>
                                        <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-delete-variant font-18 vertical-middle"></i></button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light dropdown-toggle waves-effect"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-folder font-18 vertical-middle"></i>
                                            <b class="caret m-l-5"></b>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Move to</span>
                                            <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light dropdown-toggle waves-effect"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-label font-18 vertical-middle"></i>
                                            <b class="caret m-l-5"></b>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Label as:</span>
                                            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light dropdown-toggle waves-effect"
                                            data-toggle="dropdown" aria-expanded="false">
                                            More
                                            <span class="caret m-l-5"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">More Option :</span>
                                            <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Add Star</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h5>Hi Bro, How are you?</h5>

                                    <hr />

                                    <div class="media mb-4 mt-1">
                                        <img class="d-flex mr-3 rounded-circle thumb-sm" src="images/users/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <span class="pull-right">07:23 AM</span>
                                            <h6 class="m-0">Jonathan Smith</h6>
                                            <small class="text-muted">From: jonathan@domain.com</small>
                                        </div>
                                    </div>

                                    <p><b>Hi Bro...</b></p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                        montes, nascetur ridiculus mus. Donec quam felis,
                                        ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                    <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,
                                        justo. Nullam dictum felis eu pede mollis pretium.
                                        Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>
                                    <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat
                                        vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat
                                        a, tellus. Phasellus viverra nulla ut metus varius
                                        laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.
                                        Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas
                                        tempus, tellus eget condimentum rhoncus, sem quam semper
                                        libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel,
                                        luctus pulvinar,</p>

                                    <hr />

                                    <h6> <i class="fa fa-paperclip mb-2"></i> Attachments <span>(3)</span> </h6>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="#"> <img src="images/attached-files/img-1.jpg" alt="attachment"
                                                    class="img-thumbnail img-responsive"> </a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#"> <img src="images/attached-files/img-2.jpg" alt="attachment"
                                                    class="img-thumbnail img-responsive"> </a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="#"> <img src="images/attached-files/img-3.jpg" alt="attachment"
                                                    class="img-thumbnail img-responsive"> </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- card-box -->

                                <div class="media mb-0 mt-5">
                                    <img class="d-flex mr-3 rounded-circle thumb-sm" src="images/users/avatar-7.jpg"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        <div class="card-box">
                                            <div class="summernote">
                                                <h6>This is an Air-mode editable area.</h6>
                                                <ul>
                                                    <li>
                                                        Select a text to reveal the toolbar.
                                                    </li>
                                                    <li>
                                                        Edit rich document on-the-fly, so elastic!
                                                    </li>
                                                </ul>
                                                <p>
                                                    End of air-mode area
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="button" class="btn btn-primary waves-effect waves-light w-md m-b-30">Send</button>
                                </div>

                            </div>
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