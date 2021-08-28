$(document).ready(function(){

    $(document).on('click', '.load_more', function(){

        var targetContainer = $('.news-list'),
            url =  $('.load_more').attr('data-url');

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){
                    $('.load_more').remove();
                    var elements = $(data).find('.news-item'),
                        pagination = $(data).find('.load_more');
                    targetContainer.append(elements);
                    targetContainer.append(pagination);

                }
            })
        }

    });

});