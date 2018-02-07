jQuery(($) => {
    var $DOM = {
        title : $('#title'),
        content : $('#content'),
        send : $('#send'),
    }

    $DOM.send.on('click', writePost);

    async function writePost(){
        disableWrite()
        showLoading()
        var {error, message} = await sendPost()
        if(error){
            showError(message)
            return
        }
        goList()
    }

    function disableWrite() {

    }

    function showLoading() {

    }

    function showError(message) {
        alert(message);
    }

    async function sendPost(){
        var title = $DOM.title.val()
        var content = $DOM.content.val()

        // @TODO client 필터링

        var {error, message} = await $.post('../action/post.php', { title, content })

        return {error, message}
    }

    function goList(){
        window.location.href = "./posts.php"
    }
})