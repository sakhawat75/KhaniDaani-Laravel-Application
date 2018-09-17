<script type="text/template" class="template" id="buyer_status_template">


<div class="status_template my-5">
    <% if(order.chef_order_approved == 0 && order.status == 1 && order.chef_is_dish_ready == 0) {
            start_chef_approval_timer();
    %>

    <% } else if (order.chef_order_approved == 1 && order.status == 1 && order.chef_is_dish_ready == 0) { %>
    <h4>
        <span class="os_span bold">Order Update: </span>
        <span class="os_update">
            Chef Accepted the order. Now the Chef is preparing the dish</span>
    </h4>
    <% } %>
</div>



</script>