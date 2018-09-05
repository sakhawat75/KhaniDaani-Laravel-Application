<script type="text/template" class="template" id="message_preview_template">

  <% 
    var unread_msg = 0;
    var last_msg;
    var last_created;
    _.each(notify.mb, function(m_body) {
        
        if({{ auth()->id() }} != m_body.sender_id) {
          if(m_body.read_at == null) {
            unread_msg++;
          }
        }
        last_msg = m_body.body;
        last_created = m_body.created_at;
    });
  %>

  <div class="messages <% if(unread_msg > 0) { %>
          unread_notification
      <% } %>">
      <a href="#" class="message recent">
          <div class="message__actions_avatar">
              <div class="avatar"> <img src="{{ asset('/images/notification_head4.png')}}" alt="sender image" id="msg_pi_<%= notify.id %>">
                  
                      <%
                        $(document).ready(function () {


                          function getImageURL(id) {
                            $.ajax({
                            url: "{{ route('home')}}/api/user/" + id + "/profile_image",
                            type: "GET",
                            dataType: "json",
                          }).done( function (json) {
                            var selector = "#msg_pi_" + notify.id;
                              {{-- console.log("Selector: " + selector); --}}
                              $(selector).attr('src', '{{ URL::to('/') }}/storage/images/profile_image/'+json);
                             
                          });
                          }
                          
                          var img_id = notify.recipient_id;
                          var user_name = notify.recipient.name;
                          if({{ auth()->id() }} == notify.recipient_id) { 
                            img_id = notify.sender_id;
                            user_name = notify.sender.name;
                          }

                          getImageURL(img_id);
                        
                        });
                        

                      %>

              </div>
          </div>

          <div class="message_data">
              <div class="name_time">
                  <div class="name">
                      <p><%= notify.sender.name %></p> <span class="lnr lnr-envelope"></span>
                      <span class="msg_unread_count">
                          
                          <% if(unread_msg != 0) { %>
                              <%= unread_msg %>
                          <% } %>
                      </span> </div> <span class="time"><%= moment.utc(last_created).fromNow() %></span>
                  <p><%= last_msg %></p>
              </div>
          </div>
      </a>
  </div>

</script>