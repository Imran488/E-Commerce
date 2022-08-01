<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>profile image changing</title>
</head>

<body>
    <h1>User Profile image</h1>
    <div class="view m-4">
        <div class="image">
            <img src="{{ asset('/uploads/users/'.$user->image ) }}" alt="" class="w-50 h-50">
        </div>
        <div class="image_desc">
            <form action="{{ route('user.update.profile.image',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" class="w-25 mt-2 form-control" required>
                <button type="submit" class="btn btn-primary mt-2">Change</button>
            </form>
        </div>
    </div>

</body>

</html>