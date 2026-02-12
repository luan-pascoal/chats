$(function() {

    $(document).on('submit', 'form', function(e) {
        e.preventDefault();

        const url = $(this).attr('action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false
        })
        .done(function(dados) {
            alert('Bem-vindo(a)!');
        })
    })
})