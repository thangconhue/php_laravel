<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <header>header</header>
        <nav>
            <li><a href="{{ url('trangchu') }}">trangchu</a></li>
            <li><a href="{{ url('gioithieu') }}">gioithieu</a></li>
        </nav>
        <content>
            <aside><h1>Left</h1></aside>
            <article>
                @yield("do du lieu tu view vao day")
            </article>
        </content>
        <footer>Footer</footer>
    </div>
    <style type="text/css">
        .wrapper{width: 1000px; margin: auto;}
        body,h1{padding: 0px; margin: 0px;}
        ul{padding: 0px; margin: 0px; list-style: none; line-height: 35px; background: black;}
        li{display: inline;}
        a{text-decoration: none; padding: 15px; color: red;}
        content{display: inline;}
        aside{background: yellow; width: 250px;}
        article{width: 750px; height: 400px;}
        header,footer{background: green;}
    </style>
</body>
</html>
