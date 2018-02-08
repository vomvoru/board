<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="write_post.js"></script>
    <title>글쓰기</title>
</head>
<body>
    <?php include('./nav.php') ?> 
    <h1>글쓰기</h1>
    <input type="text" id="title" placeholder="제목">
    <textarea id="content" cols="30" rows="10"></textarea>
    <input type="button" id="send" value="글쓰기">
</body>
</html>

