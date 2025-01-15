<?php
// Include the data.php file
include('data.php');

// Filter the invoices based on status
$pending_invoices = array_filter($invoices, function ($invoice) {
    return strtolower(trim($invoice['status'])) === 'pending';
});

$draft_invoices = array_filter($invoices, function ($invoice) {
    return strtolower(trim($invoice['status'])) === 'draft';
});

$paid_invoices = array_filter($invoices, function ($invoice) {
    return strtolower(trim($invoice['status'])) === 'paid';
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Invoice Manager</h1>

        <!-- Display filter buttons (All, Pending, Draft, Paid) -->
        <div class="filter-buttons">
            <button class="btn" onclick="showSection('all')">All Invoices</button>
            <button class="btn" onclick="showSection('pending')">Pending</button>
            <button class="btn" onclick="showSection('draft')">Draft</button>
            <button class="btn" onclick="showSection('paid')">Paid</button>
        </div>

        <!-- Display All invoices -->
        <div id="all" class="invoice-section">
            <h2>All Invoices</h2>
            <div class="invoice-list">
                <?php foreach ($invoices as $invoice): ?>
                    <div class="invoice-card">
                        <h2>Invoice Number: <?php echo htmlspecialchars($invoice['number']); ?></h2>
                        <p><strong>Client:</strong> <?php echo htmlspecialchars($invoice['client']); ?></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($invoice['email']); ?>"><?php echo htmlspecialchars($invoice['email']); ?></a></p>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($invoice['status']); ?></p>
                        <p><strong>Amount:</strong> $<?php echo number_format($invoice['amount'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Display Pending invoices -->
        <div id="pending" class="invoice-section" style="display: none;">
            <h2>Pending Invoices</h2>
            <div class="invoice-list">
                <?php foreach ($pending_invoices as $invoice): ?>
                    <div class="invoice-card">
                        <h2>Invoice Number: <?php echo htmlspecialchars($invoice['number']); ?></h2>
                        <p><strong>Client:</strong> <?php echo htmlspecialchars($invoice['client']); ?></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($invoice['email']); ?>"><?php echo htmlspecialchars($invoice['email']); ?></a></p>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($invoice['status']); ?></p>
                        <p><strong>Amount:</strong> $<?php echo number_format($invoice['amount'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Display Draft invoices -->
        <div id="draft" class="invoice-section" style="display: none;">
            <h2>Draft Invoices</h2>
            <div class="invoice-list">
                <?php foreach ($draft_invoices as $invoice): ?>
                    <div class="invoice-card">
                        <h2>Invoice Number: <?php echo htmlspecialchars($invoice['number']); ?></h2>
                        <p><strong>Client:</strong> <?php echo htmlspecialchars($invoice['client']); ?></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($invoice['email']); ?>"><?php echo htmlspecialchars($invoice['email']); ?></a></p>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($invoice['status']); ?></p>
                        <p><strong>Amount:</strong> $<?php echo number_format($invoice['amount'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Display Paid invoices -->
        <div id="paid" class="invoice-section" style="display: none;">
            <h2>Paid Invoices</h2>
            <div class="invoice-list">
                <?php foreach ($paid_invoices as $invoice): ?>
                    <div class="invoice-card">
                        <h2>Invoice Number: <?php echo htmlspecialchars($invoice['number']); ?></h2>
                        <p><strong>Client:</strong> <?php echo htmlspecialchars($invoice['client']); ?></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($invoice['email']); ?>"><?php echo htmlspecialchars($invoice['email']); ?></a></p>
                        <p><strong>Status:</strong> <?php echo htmlspecialchars($invoice['status']); ?></p>
                        <p><strong>Amount:</strong> $<?php echo number_format($invoice['amount'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <script>
        function showSection(section) {
            // Hide all sections
            const sections = document.querySelectorAll('.invoice-section');
            sections.forEach(function (section) {
                section.style.display = 'none';
            });

            // Show the selected section
            document.getElementById(section).style.display = 'block';
        }

        // Default to showing all invoices when the page loads
        showSection('all');
    </script>
</body>
</html>
