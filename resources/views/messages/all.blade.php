@extends ('layouts.master') @section ('title', 'See Messages') @section ('content')

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
                <h1 class="page-title">Messages</h1>
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
                                <span class="msg" id="all_unread_count">3</span>
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

                            <a href="{{route('messages.compose')}}" class="btn btn--round btn--sm">
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

                        <div class="messages" id="all_msg_dynamic">
                           {{--  <div class="message">
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
                                        <span class="time">Just now</span>
                                        <p>Hello John, wlecome to khanidaani.....</p>
                                    </div>
                                </div>
                                <!-- end /.message_data -->
                            </div>
                            <!-- end /.message -->

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
                                            <p>KhaniDaani</p>
                                            <span class="lnr lnr-envelope"></span>
                                        </div>

                                        <span class="time">Just now</span>
                                        <p>Hello John, wlecome to khanidaani.....</p>
                                    </div>
                                </div>
                                <!-- end /.message_data -->
                            </div> --}}
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
                        <h3>Message with
                            <span class="name">KhaniDaani 2</span>
                        </h3>
                        <div class="message_toolbar">
                            <a href="#">
                                <span class="lnr lnr-flag"></span>
                            </a>
                            <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <img src="{{asset('/images/menu_icon.png')}}" class="dropdown-trigger" alt="Menu icon">
                            </a>

                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop1">
                                <li>
                                    <a href="#">Mark as unread</a>
                                </li>
                            </ul>
                            <!-- end /.dropdown -->
                        </div>
                        <!-- end /.message_toolbar -->
                    </div>
                    <!-- end /.chat_area--title -->

                    <div class="chat_area--conversation">
                        <div class="text-center">
                            <h2 class="my-5">Click on left pane to view conversation</h2>
                        </div>
                        {{-- <div class="conversation">
                            <div class="head">
                                <div class="chat_avatar">
                                    <img src="{{ asset('/images/notification_head4.png')}}" alt="Notification avatar">
                                </div>

                                <div class="name_time">
                                    <div>
                                        <h4>User</h4>
                                        <p>Mar 2, 2017 at 2:14 pm</p>
                                    </div>
                                </div>
                                <!-- end /.name_time -->
                            </div>
                            <!-- end /.head -->

                            <div class="body">
                                <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec
                                    vitae leo at sem lobortis porttitor eu conse quat risus. Mauris sed congue orci.
                                    Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue.</p>
                            </div>
                            <!-- end /.body -->
                        </div>
                        <!-- end /.conversation --> --}}

                        {{-- <div class="conversation">
                            <div class="head">
                                <div class="chat_avatar">
                                    <img src="{{ asset('/images/notification_head4.png')}}" alt="Notification avatar">
                                </div>

                                <div class="name_time">
                                    <div>
                                        <h4>KhaniDaani</h4>
                                        <p>Mar 2, 2017 at 2:14 pm</p>
                                    </div>
                                    <span class="email">Me</span>
                                </div>
                                <!-- end /.name_time -->
                            </div>
                            <!-- end /.head -->
                            <div class="body">
                                <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec
                                    vitae leo at sem lobortis porttitor eu conse quat risus. Mauris sed congue orci.
                                    Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue.</p>
                            </div>
                            <!-- end /.body -->
                        </div>
                        <!-- end /.conversation --> --}}

                        {{-- <div class="conversation">
                            <div class="head">
                                <div class="chat_avatar">
                                    <img src="{{ asset('/images/notification_head4.png')}}" alt="Notification avatar">
                                </div>
                                <div class="name_time">
                                    <div>
                                        <h4>User</h4>
                                        <p>Mar 2, 2017 at 2:14 pm</p>
                                    </div>
                                </div>
                                <!-- end /.name_time -->
                            </div>
                            <!-- end /.head -->

                            <div class="body">
                                <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec
                                    vitae leo at sem lobortis porttitor.</p>
                                <div class="attachments">
                                    <div class="attachment_head">
                                        <p>
                                            <span class="lnr lnr-paperclip"></span> 2 Attachments</p>
                                        <a href="#">
                                            <span class="lnr lnr-download"></span> Download</a>
                                    </div>
                                    <div class="attachment">
                                        <ul>
                                            <li>
                                                <a href="images/att_av.jpg" class="venobox">
                                                    <img src="{{ asset('/images/notification_head4.png')}}" alt="image attachment">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="images/att_av2.jpg" class="venobox">
                                                    <img src="{{ asset('/images/notification_head4.png')}}" alt="image attachment">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.body -->
                        </div>
                        <!-- end /.conversation --> --}}
                    </div>
                    <!-- end /.chat_area--conversation -->

                    <div class="message_composer d-none">
                        <div class="composer_field" id="trumbowyg-demo"></div>
                        <!-- end /.trumbowyg-demo -->
                        <div class="attached"></div>

                        <div class="btns">
                            <button class="btn send btn--sm btn--round" id="reply_msg">Reply</button>
                            {{-- <label for="att">
                                <input type="file" class="attachment_field" id="att" multiple>
                                <span class="lnr lnr-paperclip"></span>Attachment</label> --}}
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

@include ('messages.all_message_preview_template')
@include ('messages.msg_single_box_template')
@endsection

@push('scripts-footer-bottom-2')

<script type="text/javascript">
    
    $(document).ready( function() {
        //messaging
        _.templateSettings.variable = "notify";
        var loaded_msg;
        var user_name;
        var recipient_id
        var sender_id
        var your_pic = "{{ URL::to('/') }}/storage/images/profile_image/{{ auth()->user()->profile->profile_image }}";
        var else_pic;

        var all_msg_template = _.template(
            $('#all_message_preview_template').html()
        );

        var renderAllMessages = function(notifis) {
          var unread_count_msg = 0;
            _.each(notifis.data, function(notify) {

              $('#all_msg_dynamic').append(all_msg_template(notify));

              _.each(notify.mb, function (m_body) {
                if({{ auth()->id() }} != m_body.sender_id) {
                  if(m_body.read_at == null) {
                    unread_count_msg++;
                  }
                }
                

              });
                
            });
            $("#all_unread_count").text(unread_count_msg);
        };


        var loadAllMessages = function () {
            
                $.ajax({
                    url: "{{ route('messages.getAllMessages') }}",
                    cached: false
                }).done( function (res) {
                    loaded_msg = res;
                    $('#all_msg_dynamic').html(' ');
                    // console.log('msg: ' + res.data[0].mb[0].body);
                     renderAllMessages(res);
                    /*$.each( res.data, function( key, value ) {
                      console.log('msg_id: ' + value.id);
                      //console.log('msg_body: ' + value.mb[0].body);
                      $.each(value.mb, function(index, m_body) {
                          console.log('msg_body: ' + m_body.body);
                      });
                    });*/
                });
        }

        loadAllMessages();


        var msg_single_box_template = _.template(
            $('#msg_single_box_template').html()
        );

        var renderSingleMessage = function (res) {

            _.each(res, function(notify) {

              $('.chat_area--conversation').append(msg_single_box_template({
                    notify: notify, 
                    user_name: user_name,
                    else_pic: else_pic,
                    your_pic: your_pic,
                    }
                ));
                
            });


        }

        var loadSingleMsg = function(message_id, sender_id, recipient_id) {
            $.ajax({
                url: "{{ route('messages.getSingleMessages') }}",
                data: {
                    message_id: message_id,
                    sender_id: sender_id,
                    recipient_id: recipient_id,
                },
                cached: false
            }).done( function (res) {                    
                 renderSingleMessage(res);
            });
        };

        $(document).on('click', '.message', function (e) {
            //e.preventDefault();
            var msg_id = $(this).data('message_id');
            sender_id = $(this).data('sender_id');
            recipient_id = $(this).data('recipient_id');

            user_name = $(this).data('user_name');
            else_pic = $('#all_msg_pi_'+msg_id).attr('src');
            console.log(your_pic);

            $('.chat_area--title h3 .name').text(user_name);
            $('.chat_area--conversation').html('');
            $('.message_composer').removeClass('d-none');
            $('.message').removeClass('active');
            $(this).addClass('active');

            loadSingleMsg(msg_id, sender_id, recipient_id);
        
        } );

        $("#reply_msg").click(function (e) {
            e.preventDefault();
            var body = $('#trumbowyg-demo').html();
            $('#trumbowyg-demo').html('');
            console.log(body);
            var r_id = recipient_id;
            if(r_id == {{auth()->id()}}) {
                r_id = sender_id;
            }
            $.ajax({
              url: '{{ route('messages.store') }}',
              method: "POST",
              data: {
                '_token': '{{ csrf_token() }}',
                'sender_id': {{ auth()->id() }},
                'recipient_id': r_id,
                'body': body,
              },
            }).done( function(data) {
                console.log("data: " + data);
                // snackbar('Message Sent Successfully');

                $('.chat_area--conversation').append(msg_single_box_template({
                    notify: data, 
                    user_name: user_name,
                    else_pic: else_pic,
                    your_pic: your_pic,
                    }
                ));

                loadAllMessages();

            });

        });
    });

</script>

@endpush