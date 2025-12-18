<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body style="font-family:Arial">

    <h3>Pendaftar Baru</h3>

    <table cellpadding="5" border="1">
        <tr>
            <td>Event</td>
            <td><?= html_escape($event->title) ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= html_escape($name) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= html_escape($email) ?></td>
        </tr>
        <tr>
            <td>No HP</td>
            <td><?= html_escape($phone) ?></td>
        </tr>
    </table>

</body>

</html>