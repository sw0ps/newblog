<h1>Home</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
<?php
//var_dump($users);
foreach ($users as ["name" => $name, "id" => $id]) : ?>
    <tr>
        <td><?= $id ?></td>
        <td><?= $name ?></td>
    </tr>
<?php endforeach; ?>
</table>