

<script type="text/template" class="template" id="msg_single_box_template">


<%
	var replier;
	var pic_url;

	if({{auth()->id()}} == notify.notify.sender_id) {
		replier = "You";
		pic_url = notify.your_pic;
	} else {
		replier = notify.user_name;
		pic_url = notify.else_pic;
	}

%>


  <div class="conversation">
    <div class="head">
        <div class="chat_avatar">
        	<a href="{{route('home')}}/profile/<%= notify.notify.sender_id %>">
            	<img src="<%- pic_url %>" alt="Notification avatar">
            </a>
        </div>

        <div class="name_time">
            <div>
                <h4><%- replier %></h4>
                {{-- <p>Mar 2, 2017 at 2:14 pm</p> --}}
                <p><%= moment.utc(notify.notify.created_at).format('hh:mm A') %> &nbsp; <%= moment.utc(notify.notify.created_at).format('MMM DD, YY') %></p>
            </div>
            {{-- <span class="email">Me</span> --}}
        </div>
        
    </div>
    
    <div class="body">
        <p><%= notify.notify.body %></p>
    </div>
   
</div>
                        

</script>