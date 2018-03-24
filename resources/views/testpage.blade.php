<html>
<head>

</head>
<body>
<h1>Hello there!!!</h1>
<form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="/addUsersBetOnCup">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class=""></label>
        <div class="">
            <input type="text" name="first_team">
            <input type="text" name="second_team">
            <input type="text" name="third_team">
            <input type="text" name="fourth_team">
            <input type="text" name="fifth_team">
            <input type="number" name="profit_made" placeholder="profit">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>

</form>
</body>
</html>