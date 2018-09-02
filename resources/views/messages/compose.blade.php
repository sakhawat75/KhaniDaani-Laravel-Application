@extends ('layouts.master') @section ('title', 'Compose') @section ('content')

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Message</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Compose messages.</h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="message_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="cardify messaging_sidebar">
                        <div class="messaging__header">
                            <div class="messaging_menu">
                                <a href="#" id="drop2" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-inbox"></span>Inbox
                                    <span class="msg">3</span>
                                    <span class="lnr lnr-chevron-down"></span>
                                </a>

                                <ul class="custom_dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-inbox"></span>Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-dice"></span>Sent</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.messaging_menu -->

                            <div class="messaging_action">
                                <span class="lnr lnr-sync"></span>

                                <a href="message-compose.html" class="btn btn--round btn--sm">
                                    <span class="lnr lnr-pencil"></span>
                                    <span class="text">Compose</span>
                                </a>
                            </div>
                            <!-- end /.messaging_action -->
                        </div>
                        <!-- end /.messaging__header -->

                        <div class="messaging__contents">
                            <div class="message_search">
                                <input type="text" placeholder="Search messages...">
                                <span class="lnr lnr-magnifier"></span>
                            </div>

                            <div class="messages">
                                <div class="message active">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="{{ asset('/images/notification_head4.png')}}" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>KhaniDaani 2</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->
                                
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="{{ asset('/images/notification_head4.png')}}" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>KhaniDaani</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John, wlecome to khanidaani.....</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="avatar">
                                            <img src="{{ asset('/images/notification_head4.png')}}" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>KhaniDaani</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John, wlecome to khanidaani.....</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                            </div>
                            <!-- end /.messages -->
                        </div>
                        <!-- end /.messaging__contents -->
                    </div>
                    <!-- end /.cardify -->
                </div>
                <!-- end /.col-md-5 -->

                <div class="col-lg-7">
                    <div class="chat_area cardify">
                        <div class="chat_area--title">
                            <h3>Compose New Message</h3>
                        </div>
                        <!-- end /.chat_area--title -->


                        <div class="message_composer composing">
                            <input type="text" class="recipient_field" placeholder="KhaniDaani 2">
                            <div class="composer_field" id="trumbowyg-demo"></div>
                            <!-- end /.trumbowyg-demo -->

                            <div class="attached"></div>

                            <div class="btns">
                                <button class="btn send btn--sm btn--round">Send</button>
                                <label for="att">
                                    <input type="file" class="attachment_field" id="att" multiple>
                                    <span class="lnr lnr-paperclip"></span>Attachment</label>

                                <button class="btn btn--round btn--sm cancel_btn">Cancel</button>
                            </div>
                            <!-- end /.message_composer -->
                        </div>
                        <!-- end /.message_composer -->
                    </div>
                    <!-- end /.chat_area -->
                </div>
                <!-- end /.col-md-7 -->
            </div>
            <!-- end /.row -->
        </div>
    </section>

@endsection