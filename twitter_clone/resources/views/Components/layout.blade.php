<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <link href="https://bootswatch.com/5/quartz/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <x-nav />
    <div class="container py-4">
        <div class="row">
            @auth
            @if (!Route::is('admin.dashboard'))
            <x-left-side-bar />
            @endif
            @endauth
            @auth
            <div class="col-6">
                {{$slot}}
            </div>
            @endauth
            @guest
            <div class="col-12">
                {{$slot}}
            </div>
            @endguest
            @auth
            @if (!Route::is('admin.dashboard'))
            <x-right-side-bar />
            @endif
            @endauth
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>