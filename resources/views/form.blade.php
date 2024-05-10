<html>
    <head>
        <title>Test Form</title>
    </head>

    <form action="/form" method="post">
        <label for="name"></label>
        <input type="text" name="name">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <input type="submit" value="Say hello!">
    </form>
</html>