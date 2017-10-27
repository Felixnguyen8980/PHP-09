<table class="users" border="0" cellpadding="0" cellspacing="0">
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
    <?php foreach ($listUsers as $user): ?>
        <tr>
            <td><a href="index.php?op=show&id=<?php echo $user->id; ?>"><?php echo $user->name; ?></a></td>
            <td><?php echo $user->phone; ?></td>
            <td><?php echo $user->email; ?></td>
            <td><?php echo $user->address; ?></td>
            <td><a href="index.php?op=delete&id=<?php echo $user->id; ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>