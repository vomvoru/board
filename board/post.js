jQuery(($) => {
    var $DOM = {
        title : $('#title'),
        content : $('#content'),
        comments : $('#comments'),
        comment: $('#comment'),
        send: $('#send'),
    }
    var id = (new URL(window.location.href)).searchParams.get('id')

    run(id);

    $DOM.send.on('click', async () => {
        var content = $DOM.comment.val()
        await $.post('./action/comment.php', { content, relatedPostID: id })
        location.reload();
    })

    async function run(id){
        var { error, message, data: post } = await $.getJSON('./action/post.php', { id })
        console.log(error, message, post);
        if(error){
            alert(message)
            return
        }
        $DOM.content.text(post.content)
        $DOM.title.text(post.title)

        var { error, message, data: comments } = await $.getJSON('./action/comments.php', { relatedPostID: id })
        console.log(error, message, comments);
        if(error){
            alert(message)
            return
        }
        $DOM.comments.html(comments.map(getCommentTemplate))
    }

    function getCommentTemplate(comment){
        return `
        <li>
            ${comment.content}
        </li>`
    }
})