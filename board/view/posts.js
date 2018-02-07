jQuery(($) => {
    var $DOM = {
        posts : $('#posts'),
    }

    getPosts()

    async function getPosts(){
        var { error, message, data: posts } = await $.getJSON('../action/posts.php')
        console.log(error, message, posts);
        if(error){
            alert(message)
            return
        }
        console.log(posts.map(getPostTemplate))
        $DOM.posts.html(posts.map(getPostTemplate))
    }

    function getPostTemplate(post){
        return `
        <li>
            <a href="./post.php?id=${post.id}">${post.title}</a>
        </li>`
    }
})