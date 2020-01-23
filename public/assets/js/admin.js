$(".delete-button").on("click", function() {
    var deleteID = $(this).data("id");
    var deleteName = $(this).data("name");
    var token = $(this).data("token");
    $("#dialog-delete-content").html(deleteName);
    $( "#dialog-delete-confirm" ).dialog({
	resizable: false,
	height: "auto",
	width: 400,
	modal: true,
	close: '<span class="ui-button-icon ui-icon ui-icon-closethick"></span>',
	buttons: {
	  "Удалить": function() {
                $.ajax({
                    url: '/admin/pages/'+deleteID,
                    type: 'DELETE',
                    data: {
                        "_token": token,
                    },
                    success: function(result) {
                        document.location.reload(true);
                    }
                });
		$( this ).dialog( "close" );
	  },
	  "Отмена": function() {
		$( this ).dialog( "close" );
	  }
	}
  });
} );