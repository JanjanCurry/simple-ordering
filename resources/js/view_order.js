$(document).ready(function(){
  $(".view").click(function(){
        var request = $.ajax({
          url: "/get-by-order",
          method: "GET",
          data:  {order_id: $(this).attr("data-id")},
          dataType: "JSON",
        });
  
        request.done(function( all_datas ) {
            // console.log('ahskja');
            // console.log(all_datas);
            $('.per_order_table').remove();
            html = '';
            html += '<table class="table per_order_table">';


            html += '<thead>';
            html += '<tr>';
            html += '<th>'+all_datas.order.created_at+'</th>';
            html += '</tr>';
            html += '<tr>';
            html += '<th scope="col">Category</th>';
            html += '<th scope="col">Menu Name</th>';
            html += '<th scope="col">Quantity</th>';
            html += '<th scope="col">Price</th>';
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';
            html += '<tr>';
            for (var i = 0; i < all_datas.loop_count; i++) {
                
            html += '<th>'+all_datas.all_categories[i]+'</th>';
            html += '<th>'+all_datas.all_menu_lists[i]+'</th>';
            html += '<th>'+all_datas.all_quantity[i]+'</th>';
            html += '<th>'+all_datas.all_prices[i]+'</th>';
            html += '</tr>';
            }

            html += '<tr>';
            html += '<th>Total Price</th>';
            html += '<th></th>';
            html += '<th></th>';
            html += '<th>'+all_datas.total_sales+'</th>';
            html += '</tr>';
            html += '</tbody>';
            html += '</table>';
            $('#sales_per_order').append(html);

            $('#sales_per_order_button').click()

        });
    });
});
