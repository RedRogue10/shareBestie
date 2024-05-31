function fill(value){
$('#searchBox').val(value);
$('#searchResults').hide();
}



$(document).ready(function(){
    $("#searchBox").keyup(function(){
        var name = $('#searchBox').val();
        if (name == "") {
            $('#searchResults').html("");
        } else {
            $.ajax({
                type: "POST", 
                url: "courseSearchResults.php", 
                data: { search: name },
                success: function(html){
                    $('#searchResults').html(html).show();
                }
            });
        }
    });
});
