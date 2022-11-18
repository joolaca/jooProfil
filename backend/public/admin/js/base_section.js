$( function() {
    $( "#sortable" ).sortable({
        update: function (event, ui) {
            $.ajax({
                url : "/section/setOrder",
                type: "POST",
                data : {
                    'order': $( "#sortable" ).sortable("toArray"),
                },
                success: function(data)
                {
                    console.log('<DEBUG>  data', data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    console.log('<DEBUG>  error', jqXHR);
                }
            });
        }
    });
});




