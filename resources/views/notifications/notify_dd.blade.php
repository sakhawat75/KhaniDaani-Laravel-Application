<script type="text/template" class="template" id="notify_dd">

    <a href="{{ route('home') }}/order/status/<%= notify.data.order.id %>" class="noti_box">
  	<div class="notifications_module">
      <div class="notification  <% if(notify.read_at == null) { %>
          unread_notification
      <% } %>" data-notification="<%= notify.id %>">
        <div class="notification__info">
          <div class="info_avatar">
            <% var rand = Math.floor((Math.random() * 9999999999) + 1); %>
          	<img src="{{ asset('/images/notification_head4.png')}}" alt="" class="noti_pi_<%= rand %> img_test">

          	<%
          		$(document).ready(function () {


          			function getImageURL(id) {
          				$.ajax({
			            url: "{{ route('home')}}/api/user/" + id + "/profile_image",
			            type: "GET",
			            dataType: "json",
				        }).done( function (json) {
				        	var selector = ".noti_pi_" + rand;
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
            <p>
            	<% if(notify.data.noti_type == 'chef') { %>
            		<span><a href="{{ route('home') }}/profile/<%= notify.data.order.buyer_user_id %>" id="temp_name">DSP</a> delviered the dish to the foodies.</span>
            	<% } %>

            	<% if(notify.data.noti_type == 'user') { %>
            		<span>
                  You have recived the order, confirm it.
                </span>
            	<% } %>

            	<% if(notify.data.noti_type == 'dsp') { %>
            		<span>Wait for foodies confirmation</span>
            	<% } %>

            	<p><a href="{{ route('home') }}/dishes/<%= notify.data.order.dish_id %>">Dish Name:
                <%= notify.data.order.dish_name %>
              </a></p>
            </p>
            <p class="time">
              <%= moment.utc(notify.data.order.created_at).fromNow() %>

            </p>
          </div>
        </div>
      </div>
      <!-- end /.notificationsController -->
    </div>
  </a>


</script>