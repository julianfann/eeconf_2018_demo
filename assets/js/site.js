$(document).ready(function(){

    $('.blog_article__comments__form form').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var data = form.serialize();

        $.post(url, data, null, 'json')
            .done(function(data, textStatus, jqXHR){
                window.location = window.location;
            })
            .fail(function(jqXHR, textStatus, errorThrown){
                console.log([jqXHR, textStatus, errorThrown]);
            });
    });

});