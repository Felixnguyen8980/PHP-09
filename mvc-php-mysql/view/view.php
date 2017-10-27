<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php print $user->name; ?></title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
    </head>
    <body>
        <h1><?php print $user->name; ?></h1>
        <div>
            <span class="label">Phone:</span>
            <?php print $user->phone; ?>
        </div>
        <div>
            <span class="label">Email:</span>
            <?php print $user->email; ?>
        </div>
        <div>
            <span class="label">Address:</span>
            <?php print $user->address; ?>
        </div>
    </body>
</html>
