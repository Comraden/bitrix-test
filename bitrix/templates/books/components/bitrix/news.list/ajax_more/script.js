$(document).ready(function(){

    $(document).on('click', '.vote-for', function(){

        var blockId = $(this).attr("data-id");
        var url =  "/?op=vote-for&id="+blockId; 

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){
                    var value = parseInt($(".value-for"+blockId).text())+1;
                    $(".value-for"+blockId).text(value);
                }
            })
        }
    });
    $(document).on('click', '.vote-against', function(){

        var blockId = $(this).attr("data-id");
        var url =  "/?op=vote-against&id="+blockId; 

        console.log(url);

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){
                    var value = parseInt($(".value-against"+blockId).text())+1;
                    $(".value-against"+blockId).text(value);
                }
            })
        }
    });

});