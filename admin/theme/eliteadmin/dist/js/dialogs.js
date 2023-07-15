jQuery(document).ready(function($) {
    $('.sweet-button').click(function(event) {
        var type = $(this).data('type');
        if (type === 'delete') {
            var id = $(this).data('id');
            var controller = $(this).data('controller');
            var url = $(this).data('url');
            showDeleteMessage(url);
        }
    }); 

    $(document).on('pjax:success', '#table', function(event) {
        $('.sweet-button').click(function(event) {
            var type = $(this).data('type');
            if (type === 'delete') {
                var id = $(this).data('id');
                var controller = $(this).data('controller');
                var url = $(this).data('url');
                showDeleteMessage(url);
            }
        }); 
    });
});

function showDeleteMessage(url) {
    swal({
      // button: "Aww yiss!",
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url, 
                type: 'POST',
            })
            .done(function(res) {
                if(res == "success"){
                    swal("Deleted!", {
                        icon: "success",
                     });
                    $.pjax.reload({
                        container:"#table",
                        timeout: 5000
                    });
                    return false;
                }else{
                    swal("Deleted!", "False.", "error");
                }
            });
            
        }
    });
}