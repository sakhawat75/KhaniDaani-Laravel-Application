<script type="text/template" class="template" id="notify_order_template">

  <a href="{{ route('home') }}/order/status/<%= notify.data.order.id %>" class="noti_box"> 
  	<div class="notifications_module">
      <div class="notification  <% if(notify.read_at == null) { %>
          unread_notification
      <% } %>" data-notification="<%= notify.id %>">
        <div class="notification__info">
          <div class="info_avatar">
          	<img src="{{ asset('/images/notification_head4.png')}}" alt="" class="noti_pi_<%= notify.id %> img_test">

          	<%
          		$(document).ready(function () {


          			function getImageURL(id) {
          				$.ajax({
			            url: "{{ route('home')}}/api/user/" + id + "/profile_image",
			            type: "GET",
			            dataType: "json",
				        }).done( function (json) {
				        	var selector = ".noti_pi_" + notify.id;
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
            		<span>Great! You have recieved an order!</a></span>
            	<% } %>

            	<% if(notify.data.noti_type == 'user') { %>
            	<span>Your order is placed successfully.</span>
            	<% } %>

            	<% if(notify.data.noti_type == 'dsp') { %>

            		<span><%= notify.data.order.buyer_fullname %> Has choosen you as deliverer!</span>
            	<% } %>



              </a></p>
            </p>
            <p class="time">
              <%= moment.utc(notify.data.order.created_at).fromNow() %>
            	
            </p>
          </div>
        </div>
      </div>
      
    </div>
  </a>


</script>