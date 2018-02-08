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
    <script src="post.js"></script>
    <title>포스트</title>
</head>
<body>
  <?php include('./nav.php') ?>
  <h1>게시물</h1>
  <h1 id="title"></h1>
  <div id="content"></div>
  <div id="comments"></div>
  <textarea id="comment" cols="30" rows="10"></textarea>
  <input type="button" id="send" value="댓글 작성">
</body>
</html>