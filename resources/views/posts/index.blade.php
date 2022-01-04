<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href=“https://fonts.googleapis.com/css?family=Nunito” rel=“stylesheet”>
    </head>
    <body>
        <h1>Blog Name</h1>
        [<a href='/posts/create'>create</a>]
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                     @csrf
                     @method('DELETE')
                    </form>
                    <button type="submit">delete</button> 
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(e){
                'use strict';
                if(confilm('消去すると復元できません。\n 本当に消去しますか？')){
                    document.getElementByid('form_delete').submit();
                }
            }
        </script>
    </body>
</html>