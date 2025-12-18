<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body style="font-family:Arial">

    <h2>Registrasi Berhasil 🎉</h2>

    <p>Halo <strong><?= html_escape($name) ?></strong>,</p>

    <p>
        Terima kasih telah mendaftar pada event:
    </p>

    <table cellpadding="5">
        <tr>
            <td><strong>Event</strong></td>
            <td><?= html_escape($event->title) ?></td>
        </tr>
        <tr>
            <td><strong>Tanggal</strong></td>
            <td>
                <?= date('d M Y', strtotime($event->event_date)) ?>
                <?php if ($event->end_date): ?>
                    - <?= date('d M Y', strtotime($event->end_date)) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td><strong>Lokasi</strong></td>
            <td><?= html_escape($event->location) ?></td>
        </tr>
    </table>

    <p>
        Silakan simpan email ini sebagai bukti pendaftaran.
    </p>

    <p>
        Salam,<br>
        <strong>Event Organizer</strong>
    </p>

</body>

</html>