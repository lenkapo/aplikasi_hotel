<h2>Invoice Booking Hotel</h2>

<p>Halo <strong><?= $invoice->full_name ?></strong>,</p>

<p>Terima kasih telah melakukan booking. Berikut detail invoice Anda:</p>

<hr>

<p>
    <strong>Invoice:</strong> <?= $invoice->invoice_number ?><br>
    <strong>Kamar:</strong> <?= $invoice->room_name ?><br>
    <strong>Check-in:</strong> <?= $invoice->arrival_date ?><br>
    <strong>Check-out:</strong> <?= $invoice->departure_date ?><br>
    <strong>Jumlah malam:</strong> <?= $invoice->nights ?>
</p>

<p>
    <strong>Total Bayar:</strong><br>
    Rp <?= number_format($invoice->total_price) ?>
</p>

<p>Status: <strong><?= strtoupper($invoice->status) ?></strong></p>

<hr>

<p>
    Silakan lakukan pembayaran sesuai instruksi.<br>
    Invoice online dapat diakses di:
    <br>
    <a href="<?= base_url('invoice/' . $invoice->invoice_number) ?>">
        Lihat Invoice
    </a>
</p>

<p>
    Terima kasih,<br>
    <strong>Hotel Management</strong>
</p>