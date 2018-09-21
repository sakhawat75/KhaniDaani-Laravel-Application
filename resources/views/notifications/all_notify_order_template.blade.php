<script type="text/template" class="template" id="all_notify_order_template">

  <a href="{{ route('home') }}/order/status/<%= notify.data.order.id %>" class="noti_box">
    <div class="notification  <% if(notify.read_at == null) { %>
          unread_notification
      <% } %>" data-notification="<%= notify.id %>">
        <span class="line"></span>
        <div class="notification__info">
            <div class="info_avatar">
                <img src="{{ asset('/images/notification_head4.png')}}" alt="" class="all_noti_pi_<%= notify.id %> img_test">

            <%
              $(document).ready(function () {


                function getImageURL(id) {
                  $.ajax({
                  url: "{{ route('home')}}/api/user/" + id + "/profile_image",
                  type: "GET",
                  dataType: "json",
                }).done( function (json) {
                  var selector = ".all_noti_pi_" + notify.id;
                  //console.log("Selector: " + selector);
                    $(selector).attr('src', '{{ URL::to('/') }}/storage/images/profile_image/'+json);
                   
                });
                }

                if(notify.data.noti_type == 'chef') {
                  var id = notify.data.order.buyer_user_id;
                  getImageURL(id);
                }
                

                if(notify.data.noti_type == 'user') {
                  var id = notify.data.order.dish_user_id;
                  getImageURL(id);
                }

                if(notify.data.noti_type == 'dsp') { 
                  var id = notify.data.order.dish_user_id;
                  getImageURL(id);
                }

              
              });
              
            %>
            </div>
            <div class="info">
              <div>
                  <% if(notify.data.noti_type == 'chef') { %>
                  <span class="flaot-left">You have recieved an order.</a></span>
                  <% } %>

                  <% if(notify.data.noti_type == 'user') { %>
                    <span class="flaot-left">Your order is placed successfully</a></span>
                  <% } %>

                  <% if(notify.data.noti_type == 'dsp') { %>
                   <span class="flaot-left">You Are Chosen for delivery.</a></span>

                  <% } %>
                  

                  <!--<a href="{{ route('home') }}/dishes/<%= notify.data.order.dish_id %>">
                    <%= notify.data.order.dish_name %>
                  </a>-->


                </div>
                <p class="time"><%= moment.utc(notify.data.order.created_at).fromNow() %></p>
            </div>
        </div>
        <div class="notification__icons ">
            <span class="lnr lnr-cart loved noti_icon"></span>
        </div>
    </div>
  </a>

</script>