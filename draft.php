<?php
// Include the data.php file
include('data.php');

// Filter the invoices to only show draft ones
$draft_invoices = array_filter($invoices, function ($invoice) {
    return strtolower(trim($invoice['status'])) === 'draft';
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draft Invoices</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Draft Invoices</h1>

        <!-- Filter buttons to navigate to other invoice statuses -->
        <div class="filter-buttons">
            <a href="index.php" class="btn">All Invoices</a>
            <a href="pending.php" class="btn">Pending</a>
            <a href="paid.php" class="btn">Paid</a>
        </div>

        <!-- Display Draft invoices -->
        <div class="invoice-list">
            <?php if (count($draft_invoices) > 0): ?>
                <?php foreach ($draft_invoices as $invoice): ?>
                    <div class="invoice-card">
                        <h2>Invoice Number: <?php echo htmlspecialchars($invoice['number']); ?></h2>
                        <p><strong>Client:</strong> <?php echo htmlspecialchars($invoice['client']); ?></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($invoice['email']); ?>"><?php echo htmlspecialchars($invoice['email']); ?></a></p>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($invoice['status']); ?></p>
                        <p><strong>Amount:</strong> $<?php echo number_format($invoice['amount'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No draft invoices found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
