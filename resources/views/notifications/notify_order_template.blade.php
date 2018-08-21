<script type="text/template" class="template" id="notify_order_template">

  <a href="{{ route('home') }}/order/status/<%= notify.data.order.id %>"> 
  	<div class="notifications_module">
      <div class="notification">
        <div class="notification__info">
          <div class="info_avatar">
            <img src="{{ asset('/images/notification_head4.png')}}" alt="">
          </div>
          <div class="info">
            <p>
            	<% if(notify.data.noti_type == 'chef') { %>
            	<a href="#" id="temp_name"><%= notify.data.order.buyer_fullname %></a>
            		<span>Has Ordered your dish</Span>
            	<% } %>

            	<% if(notify.data.noti_type == 'user') { %>
            	<a href="#" id="temp_name">You</a>
            		<span>Have Ordered a dish</Span>
            	<% } %>

            	<% if(notify.data.noti_type == 'dsp') { %>
            	<a href="#" id="temp_name"><%= notify.data.order.buyer_fullname %></a>
            		<span>Has Choosen you as deliverer for</span>
            	<% } %>

            	<p><a href="{{ route('home') }}/dishes/<%= notify.data.order.dish_id %>">Indian Butter chiken</a></p>
            </p>
            <p class="time">
            	<%= moment(notify.data.created_at).fromNow() %>
            </p>
          </div>
        </div>
      </div>
      <!-- end /.notificationsController -->
    </div>
  </a>


</script>