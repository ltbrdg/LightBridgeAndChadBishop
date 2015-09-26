$(function  () {
  
  var successSORT,$filterList;
  
  successSORT = '<div class="alert alert-success alert-dismissable">';
  successSORT +=  '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
  successSORT +=  'Updated the sort order successfully</div>';
  
  $filterList = $("ul.pages-list.filter");
      
  $filterList.sortable({
      nested:false,
      onDrop: function($item, container, _super, event) {
        var $siblings, idArray = [];
        $item.removeClass("dragged").removeAttr("style");
        $("body").removeClass("dragging");
        
        $siblings = $("ul.pages-list.filter li");
        
        $siblings.each(function(){
            idArray.push(parseInt($(this).attr('data-id')));
        });
        
        $.ajax({
            url:'/admin/page_order',
            type: 'POST',
            data: {'data':idArray, 'filter': $filterList.attr('data-filter') },
            success: function(data){
                $('#alerts-here').prepend(successSORT);
            }
        });
      }
  });
  
});