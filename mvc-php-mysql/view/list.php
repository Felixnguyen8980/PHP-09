<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Users</title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
    </head>
    <body>
        <div><a href="index.php?op=new">Add new user</a></div>
        <table class="users" >
            <thead>
                <tr>
                    <th><a href="?orderby=name">Name</a></th>
                    <th><a href="?orderby=phone">Phone</a></th>
                    <th><a href="?orderby=email">Email</a></th>
                    <th><a href="?orderby=address">Address</a></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><a href="index.php?op=show&id=<?php print $user->id; ?>"><?php print htmlentities($user->name); ?></a></td>
                    <td><?php print htmlentities($user->phone); ?></td>
                    <td><?php print htmlentities($user->email); ?></td>
                    <td><?php print htmlentities($user->address); ?></td>
                    <td><a href="index.php?op=delete&id=<?php print $user->id; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
