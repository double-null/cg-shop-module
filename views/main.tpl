<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                Header
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="categories">
                    {foreach $categories as $category}
                        <li><a href="/shop/?category={$category['id']}">{$category['name']}</a></li>
                    {/foreach}
                </ul>
            </div>
            <div class="col-md-8">
                {$content}
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12">
                Footer
            </div>
        </div>
    </div>
</body>
</html>