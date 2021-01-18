$(_ => {
    let articleId = $('#articleId').val();

    $('#submit').click(function (e) {
        e.preventDefault();
        $(this).addClass('disabled')
        let data = {
            subject: $('#subject').val(),
            text: $('#text').val(),
            articleId: articleId
        }
        $.ajax({
            type: 'POST',
            url: '/comments/add',
            data: data,
            success: response => {
                $('.comment-form').hide();
                $('.comment-success').show();
            }
        })
    });

    setTimeout(function () {
        $.get('/articles/'+articleId+'/view', function(r) {
            $('.viewsCount').empty().text(r)
        })
    }, 5000)

    $('#likeBtn').click(function(e) {
        $.get('/articles/'+articleId+'/like', function(r) {
            $('.likesCount').empty().text(r)
        })
    })
})
