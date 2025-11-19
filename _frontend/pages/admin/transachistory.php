<!DOCTYPE html>
<html lang="en">

<?php
if (!function_exists('include_page')) {
    function include_page($page_name) { return ""; }
}
if (!function_exists('assets')) {
    function assets() { return 'assets'; }
}
?>

<?=include_page('header')?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background-color: #fff; color: #333; line-height: 1.6; }
        .content .container.transaction-page-container { max-width: 1200px; margin-left: auto; margin-right: auto; background-color: #fff; position: relative; }
        .page-header-trans { display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; margin-bottom: 20px; }
        .page-header-trans h1 { font-size: 2.2rem; font-weight: 600; color: #212529; }
        .header-actions-group { display: flex; align-items: center; gap: 15px; }
        .export-btn, .time-filter-btn, .add-transaction-btn { background-color: #fff; color: #495057; border: 1px solid #ced4da; padding: 8px 15px; border-radius: 6px; font-size: 0.9rem; font-weight: 500; cursor: pointer; transition: background-color 0.2s ease, border-color 0.2s ease; }
        .add-transaction-btn { background-color: red; color: white; border-color: red; }
        .add-transaction-btn:hover { background-color: red; border-color: red;}
        .export-btn:hover, .time-filter-btn:hover { background-color: #f8f9fa; border-color: #adb5bd; }
        .time-filter-btn i { margin-left: 5px; }
        .transaction-tabs { margin-bottom: 20px; border-bottom: 1px solid #dee2e6; }
        .transaction-tabs ul { list-style: none; display: flex; gap: 25px; padding-left: 0; }
        .transaction-tabs li a { text-decoration: none; color: #6c757d; padding: 10px 0; display: inline-block; font-size: 0.95rem; font-weight: 500; position: relative; cursor: pointer; }
        .transaction-tabs li a.active { color: red; border-bottom: 2px solid red; }
        .transaction-tabs li a:not(.active):hover { color: #495057; }
        .transaction-list { display: grid; grid-template-columns: 1fr 0.8fr 1.5fr 1fr 1.5fr 1fr 0.3fr; gap: 10px 15px; align-items: center; }
        .transaction-list-header { display: contents; font-size: 0.75rem; color: #6c757d; font-weight: 600; text-transform: uppercase; }
        .transaction-list-header .col { padding-bottom: 10px; border-bottom: 1px solid #e9ecef; }
        .transaction-row { display: contents; }
        .transaction-row .col { padding: 15px 0; font-size: 0.9rem; color: #495057; border-bottom: 1px solid #f1f3f5; }
        .col-trans-status-badge { text-align: left; padding-left: 5px; }
        .trans-status-badge { padding: 4px 10px; border-radius: 12px; font-size: 0.75rem; font-weight: 500; display: inline-block; text-transform: uppercase; }
        .trans-status-badge.paid { background-color: #d1e7dd; color: #0a3622; }
        .trans-status-badge.refunded { background-color: #fff3cd; color: #664d03; }
        .col-trans-client { display: flex; align-items: center; gap: 10px; }
        .client-avatar-trans { width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #58151c; background-color: #f8d7da; font-weight: 500; font-size: 0.8rem; }
        .col-trans-amount { font-weight: 500; }
        .col-trans-date { color: #6c757d; }
        .col-trans-actions { text-align: right; color: #6c757d; cursor: pointer; position: relative; }
        .col-trans-actions .fas.fa-ellipsis-h:hover { color: #343a40; }
        .trans-actions-dropdown { display: none; position: absolute; right: 0; top: 25px; background-color: white; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); z-index: 100; min-width: 160px; }
        .trans-actions-dropdown a { color: #333; padding: 8px 12px; text-decoration: none; display: block; font-size: 0.9rem; }
        .trans-actions-dropdown a:hover { background-color: #f5f5f5; }
        .transaction-page-footer { display: flex; justify-content: flex-end; align-items: center; padding-top: 20px; margin-top: 30px; border-top: 1px solid #e9ecef; color: #6c757d; font-size: 0.9rem; }
        .simple-modal { display: none; position: fixed; z-index: 1050; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); }
        .simple-modal-content { background-color: #fff; margin: 10% auto; padding: 0; border: 1px solid #ddd; width: 90%; max-width: 550px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation-name: animatetop; animation-duration: 0.4s }
        @keyframes animatetop { from {transform: translateY(-50px); opacity: 0} to {transform: translateY(0); opacity: 1} }
        .simple-modal-header { padding: 20px 24px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
        .simple-modal-header h2 { margin: 0; font-size: 1.25rem; font-weight: 600; text-transform: uppercase; color: #495057; }
        .simple-modal-close { color: #aaa; font-size: 28px; font-weight: bold; background: none; border: none; cursor: pointer; }
        .simple-modal-close:hover, .simple-modal-close:focus { color: black; text-decoration: none; }
        .simple-modal-body { padding: 24px; }
        .simple-modal-body .form-group { margin-bottom: 20px; }
        .simple-modal-body .form-group label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.9rem; color: #495057;}
        .simple-modal-body .form-group input[type="text"], .simple-modal-body .form-group input[type="number"], .simple-modal-body .form-group input[type="date"], .simple-modal-body .form-group select, .simple-modal-body .form-group textarea { width: 100%; padding: 10px 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 0.95rem; }
        .simple-modal-body .form-group textarea { min-height: 80px; resize: vertical; }
        .simple-modal-body .form-group input:focus, .simple-modal-body .form-group select:focus, .simple-modal-body .form-group textarea:focus { border-color: #20c997; outline: 0; box-shadow: 0 0 0 0.2rem rgba(32,201,151,.25); }
        .simple-modal-body .client-info-to { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .simple-modal-body .client-avatar-modal { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 500; font-size: 1rem; }
        .simple-modal-body .client-details-modal span { display: block; }
        .simple-modal-body .client-details-modal .client-name-modal { font-weight: 500; color: #343a40; }
        .simple-modal-body .client-details-modal .client-email-modal { font-size: 0.85rem; color: #6c757d; }
        .simple-modal-body .refund-info-text { font-size: 0.9rem; color: #6c757d; margin-bottom: 15px; }
        .simple-modal-footer { padding: 20px 24px; border-top: 1px solid #eee; display: flex; justify-content: flex-end; gap:10px;}
        .simple-modal-footer .btn { padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 0.9rem; font-weight:500; border: 1px solid transparent; }
        .simple-modal-footer .btn-secondary-modal { background-color: #fff; color: #495057; border-color:#ced4da; }
        .simple-modal-footer .btn-secondary-modal:hover { background-color: #f8f9fa; }
        .simple-modal-footer .btn-primary-modal { background-color:red; color: white; border-color:#20c997; }
        .simple-modal-footer .btn-primary-modal:hover { background-color:red; border-color:#1baa80; }

        @media (max-width: 992px) { .transaction-list { grid-template-columns: 1fr 1fr 1.5fr 1fr 1.5fr 1fr 0.5fr; } .page-header-trans h1 { font-size: 2rem; } }
        @media (max-width: 768px) { .page-header-trans { flex-direction: column; align-items: flex-start; gap: 15px; } .header-actions-group { width: 100%; flex-direction: column; align-items: stretch; } .export-btn, .time-filter-btn, .add-transaction-btn { text-align: center; } .transaction-tabs ul { gap: 15px; flex-wrap: wrap; } .transaction-list { font-size: 0.85rem; display: block; overflow-x: auto; white-space: nowrap; } .transaction-list-header, .transaction-row { display: grid; grid-template-columns: 120px 100px 180px 120px 150px 120px 60px; min-width: 850px; } .transaction-list-header .col, .transaction-row .col { white-space: normal; } .simple-modal-content { margin: 5% auto; width: 95%;} }
</style>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items: center justify-content-center"> <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"> <span class="sr-only">Loading...</span> </div> </div>
        <?=include_page('sidebar')?>
        <div class="content">
            <?=include_page('navbar')?>
            <div class="container pt-4 px-4 transaction-page-container">
                <div class="h-100 p-4" style="background-color: #fff;">
                    <header class="page-header-trans">
                        <h1>Transactions</h1>
                        <div class="header-actions-group">
                            <button class="add-transaction-btn" id="openAddTransactionModalBtn">Add Transaction</button>
                            <button class="export-btn">Export</button>
                            <button class="time-filter-btn">All time <i class="fas fa-chevron-down fa-xs"></i></button>
                        </div>
                    </header>
                    <nav class="transaction-tabs">
                        <ul> <li><a href="#" class="active" data-filter="all">All Payments</a></li> <li><a href="#" data-filter="paid">Paid</a></li> <li><a href="#" data-filter="refunded">Refunded</a></li> </ul>
                    </nav>
                    <main class="transaction-list" id="transactionListContainer">
                        <div class="transaction-list-header"> <div class="col col-trans-amount">AMOUNT</div> <div class="col col-trans-status-badge"></div> <div class="col col-trans-description">DESCRIPTION</div> <div class="col col-trans-payment-method">PAYMENT METHOD</div> <div class="col col-trans-client">CLIENT</div> <div class="col col-trans-date">DATE <i class="fas fa-arrow-down fa-xs"></i></div> <div class="col col-trans-actions"></div> </div>
                    </main>
                    <div id="noTransactionsMessage" style="text-align: center; padding: 20px; display: none;">No transactions match the current filter.</div>
                    <footer class="transaction-page-footer"> <span class="pagination-info-trans" id="paginationInfoTrans">0 of 0</span> </footer>
                </div>
            </div>
            <?=include_page('footer')?>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <div id="sendReceiptModal" class="simple-modal">
        <div class="simple-modal-content">
            <div class="simple-modal-header"> <h2>SEND PAYMENT RECEIPT</h2> <button type="button" class="simple-modal-close" data-modal-id="sendReceiptModal">×</button> </div>
            <div class="simple-modal-body">
                <form id="sendReceiptForm">
                    <input type="hidden" id="receiptTxnId">
                    <div class="form-group"> <label>To</label> <div class="client-info-to"> <span class="client-avatar-modal" id="receiptClientAvatar"></span> <div class="client-details-modal"> <span class="client-name-modal" id="receiptClientName"></span> <span class="client-email-modal" id="receiptClientEmail">yagshg@gmail.com</span> </div> </div> </div>
                    <div class="form-group"> <label for="receiptSubject">Subject</label> <input type="text" id="receiptSubject" value="Your receipt for Invoice #1001"> </div>
                    <div class="form-group"> <label for="receiptMessage">Message</label> <textarea id="receiptMessage" placeholder="Enter your message"></textarea> </div>
                </form>
            </div>
            <div class="simple-modal-footer"> <button type="button" class="btn btn-secondary-modal" data-modal-id="sendReceiptModal">Cancel</button> <button type="submit" form="sendReceiptForm" class="btn btn-primary-modal">Send</button> </div>
        </div>
    </div>

    <div id="recordRefundModal" class="simple-modal">
        <div class="simple-modal-content">
            <div class="simple-modal-header"> <h2>RECORD REFUND</h2> <button type="button" class="simple-modal-close" data-modal-id="recordRefundModal">×</button> </div>
            <div class="simple-modal-body">
                <form id="recordRefundForm">
                    <input type="hidden" id="refundTxnId">
                    <p class="refund-info-text">You will need to refund the client yourself because this payment was recorded manually.</p>
                    <div class="form-group"> <label for="refundAmount">Refund Amount</label> <input type="text" id="refundAmount" readonly> </div>
                    <div class="form-group"> <label for="refundNote">Note</label> <textarea id="refundNote" placeholder="Add more details about this refund (optional not shown to client)"></textarea> </div>
                </form>
            </div>
            <div class="simple-modal-footer"> <button type="button" class="btn btn-secondary-modal" data-modal-id="recordRefundModal">Cancel</button> <button type="submit" form="recordRefundForm" class="btn btn-primary-modal">Record refund</button> </div>
        </div>
    </div>

    <div id="addTransactionModal" class="simple-modal">
        <div class="simple-modal-content">
            <div class="simple-modal-header"> <h2>ADD TRANSACTION</h2> <button type="button" class="simple-modal-close" data-modal-id="addTransactionModal">×</button> </div>
            <div class="simple-modal-body">
                <form id="addTransactionForm">
                    <div class="form-group"> <label for="addTransAmount">Amount (₱)</label> <input type="number" id="addTransAmount" step="0.01" min="0" required> </div>
                    <div class="form-group"> <label for="addTransDescription">Description</label> <input type="text" id="addTransDescription" required> </div>
                    <div class="form-group"> <label for="addTransPaymentMethod">Payment Method</label> <select id="addTransPaymentMethod"> <option value="cash">Cash</option> <option value="gcash">GCash</option> <option value="card">Card</option> <option value="bank transfer">Bank Transfer</option> <option value="other">Other</option> </select> </div>
                    <div class="form-group"> <label for="addTransClientName">Client Name</label> <input type="text" id="addTransClientName" required> </div>
                    <div class="form-group"> <label for="addTransDate">Date</label> <input type="date" id="addTransDate" required> </div>
                    <div class="form-group"> <label for="addTransStatus">Status</label> <select id="addTransStatus"> <option value="paid">Paid</option> <option value="refunded">Refunded (for manual refund entry)</option> </select> </div>
                </form>
            </div>
            <div class="simple-modal-footer"> <button type="button" class="btn btn-secondary-modal" data-modal-id="addTransactionModal">Cancel</button> <button type="submit" form="addTransactionForm" class="btn btn-primary-modal">Add Transaction</button> </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=assets()?>/js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const transactionListContainer = document.getElementById('transactionListContainer');
        const tabs = document.querySelectorAll('.transaction-tabs a');
        const paginationInfoEl = document.getElementById('paginationInfoTrans');
        const noTransactionsMessageEl = document.getElementById('noTransactionsMessage');
        const openAddTransactionModalBtn = document.getElementById('openAddTransactionModalBtn');

        const sendReceiptModalEl = document.getElementById('sendReceiptModal');
        const recordRefundModalEl = document.getElementById('recordRefundModal');
        const addTransactionModalEl = document.getElementById('addTransactionModal');

        let currentFilter = 'all';
        let nextTxnNum = 4;

        function formatCurrency(amount) { return `₱${parseFloat(amount).toFixed(2)}`;}
        function formatDate(dateString) { if (!dateString) return ''; const date = new Date(dateString); return date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });}

        let allTransactions = [
            { id: 'txn_001', amount: 150.00, status: 'paid', description: 'Invoice #1001', paymentMethod: 'cash', clientName: 'mia ackerman', clientInitials: 'MA', clientEmail:'yagshg@gmail.com', date: '2025-05-19' },
            { id: 'txn_002', amount: 75.00, status: 'refunded', description: 'Refund for Invoice #1002', paymentMethod: 'card', clientName: 'levi ackerman', clientInitials: 'LA', clientEmail:'levi@example.com', date: '2025-05-20' },
            { id: 'txn_003', amount: 200.00, status: 'paid', description: 'Service Payment', paymentMethod: 'bank transfer', clientName: 'mmikaa asa', clientInitials: 'MA', clientEmail:'mmikaa@example.com', date: '2025-05-21' },
        ];

        function renderTransactions() {
            const existingRows = transactionListContainer.querySelectorAll('.transaction-row');
            existingRows.forEach(row => row.remove());
            let filteredTransactions = allTransactions;
            if (currentFilter !== 'all') {
                filteredTransactions = filteredTransactions.filter(txn => txn.status === currentFilter);
            }
            filteredTransactions.sort((a, b) => new Date(b.date) - new Date(a.date));
            noTransactionsMessageEl.style.display = filteredTransactions.length === 0 ? 'block' : 'none';

            filteredTransactions.forEach(txn => {
                const row = document.createElement('div');
                row.classList.add('transaction-row');
                const actionsDropdownId = `trans-actions-dropdown-${txn.id}`;
                row.innerHTML = `
                    <div class="col col-trans-amount">${formatCurrency(txn.amount)}</div>
                    <div class="col col-trans-status-badge"><span class="trans-status-badge ${txn.status}">${txn.status.toUpperCase()}</span></div>
                    <div class="col col-trans-description">${txn.description}</div>
                    <div class="col col-trans-payment-method">${txn.paymentMethod}</div>
                    <div class="col col-trans-client"> <span class="client-avatar-trans" style="background-color:${getAvatarColor(txn.clientInitials)}; color:white;">${txn.clientInitials}</span> ${txn.clientName} </div>
                    <div class="col col-trans-date">${formatDate(txn.date)}</div>
                    <div class="col col-trans-actions">
                        <i class="fas fa-ellipsis-h trans-action-icon" data-transaction-id="${txn.id}"></i>
                        <div class="trans-actions-dropdown" id="${actionsDropdownId}">
                            <a href="#" class="trans-action-send-receipt" data-transaction-id="${txn.id}">Send Receipt</a>
                            ${txn.status === 'paid' ? `<a href="#" class="trans-action-record-refund" data-transaction-id="${txn.id}">Record Refund</a>` : ''}
                            <a href="#" class="trans-action-delete" data-transaction-id="${txn.id}">Delete</a>
                        </div>
                    </div> `;
                transactionListContainer.appendChild(row);
            });
            updatePaginationInfo(filteredTransactions.length, allTransactions.length);
            attachActionListeners();
        }
        function getAvatarColor(initials) { const colors = ['#6f42c1', '#fd7e14', '#007bff', '#28a745', '#dc3545', '#ffc107']; const charCodeSum = initials.split('').reduce((sum, char) => sum + char.charCodeAt(0), 0); return colors[charCodeSum % colors.length]; }

        function attachActionListeners() {
            document.querySelectorAll('.trans-action-icon').forEach(icon => {
                icon.addEventListener('click', function(event) { event.stopPropagation(); const transactionId = this.dataset.transactionId; const dropdown = document.getElementById(`trans-actions-dropdown-${transactionId}`); closeAllDropdowns(dropdown); if (dropdown) dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block'; });
            });
            document.querySelectorAll('.trans-action-send-receipt').forEach(button => {
                button.addEventListener('click', function(e) { e.preventDefault(); openSendReceiptModal(this.dataset.transactionId); closeAllDropdowns(); });
            });
            document.querySelectorAll('.trans-action-record-refund').forEach(button => {
                button.addEventListener('click', function(e) { e.preventDefault(); openRecordRefundModal(this.dataset.transactionId); closeAllDropdowns(); });
            });
            document.querySelectorAll('.trans-action-delete').forEach(button => {
                button.addEventListener('click', function(e) { e.preventDefault(); if (confirm('Are you sure you want to delete this transaction?')) { allTransactions = allTransactions.filter(t => t.id !== this.dataset.transactionId); renderTransactions(); } closeAllDropdowns(); });
            });
        }
        function closeAllDropdowns(exceptThisOne = null) { document.querySelectorAll('.trans-actions-dropdown').forEach(dropdown => { if (dropdown !== exceptThisOne) { dropdown.style.display = 'none'; } }); }
        document.addEventListener('click', function() { closeAllDropdowns(); });

        function updatePaginationInfo(filteredCount, totalCount) { paginationInfoEl.textContent = totalCount > 0 ? `${filteredCount} of ${totalCount}` : `0 of 0`; }

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) { e.preventDefault(); tabs.forEach(t => t.classList.remove('active')); this.classList.add('active'); currentFilter = this.dataset.filter; renderTransactions(); });
        });

        function openSendReceiptModal(transactionId) {
            const txn = allTransactions.find(t => t.id === transactionId);
            if (txn && sendReceiptModalEl) {
                document.getElementById('receiptTxnId').value = txn.id;
                document.getElementById('receiptClientAvatar').textContent = txn.clientInitials;
                document.getElementById('receiptClientAvatar').style.backgroundColor = getAvatarColor(txn.clientInitials);
                document.getElementById('receiptClientAvatar').style.color = 'white';
                document.getElementById('receiptClientName').textContent = txn.clientName;
                document.getElementById('receiptClientEmail').textContent = txn.clientEmail || 'N/A';
                document.getElementById('receiptSubject').value = `Your receipt for ${txn.description}`;
                document.getElementById('receiptMessage').value = `Dear ${txn.clientName},\n\nPlease find attached your receipt for ${txn.description} amounting to ${formatCurrency(txn.amount)}.\n\nThank you.`;
                sendReceiptModalEl.style.display = 'block';
            }
        }
        document.getElementById('sendReceiptForm').addEventListener('submit', function(e) { e.preventDefault(); alert(`Receipt for TXN ID: ${document.getElementById('receiptTxnId').value} would be sent.`); sendReceiptModalEl.style.display = 'none'; });

        function openRecordRefundModal(transactionId) {
            const txn = allTransactions.find(t => t.id === transactionId);
            if (txn && recordRefundModalEl) {
                document.getElementById('refundTxnId').value = txn.id;
                document.getElementById('refundAmount').value = formatCurrency(txn.amount);
                recordRefundModalEl.style.display = 'block';
            }
        }
        document.getElementById('recordRefundForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const transactionId = document.getElementById('refundTxnId').value;
            const txnIndex = allTransactions.findIndex(t => t.id === transactionId);
            if (txnIndex > -1) {
                allTransactions[txnIndex].status = 'refunded';
                allTransactions[txnIndex].description = `Refund: ${allTransactions[txnIndex].description}`;
                const note = document.getElementById('refundNote').value;
                if(note) allTransactions[txnIndex].refundNote = note;
                renderTransactions();
            }
            recordRefundModalEl.style.display = 'none';
            this.reset();
        });

        if (openAddTransactionModalBtn) {
            openAddTransactionModalBtn.onclick = function() { if(addTransactionModalEl) { document.getElementById('addTransactionForm').reset(); addTransactionModalEl.style.display = 'block'; document.getElementById('addTransDate').valueAsDate = new Date(); } }
        }
        document.getElementById('addTransactionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newTxn = {
                id: `txn_00${nextTxnNum++}`,
                amount: parseFloat(document.getElementById('addTransAmount').value),
                status: document.getElementById('addTransStatus').value,
                description: document.getElementById('addTransDescription').value,
                paymentMethod: document.getElementById('addTransPaymentMethod').value,
                clientName: document.getElementById('addTransClientName').value,
                clientInitials: (document.getElementById('addTransClientName').value.split(' ').map(n=>n[0]).join('') || 'XX').toUpperCase().substring(0,2),
                clientEmail: '',
                date: document.getElementById('addTransDate').value
            };
            allTransactions.push(newTxn);
            renderTransactions();
            addTransactionModalEl.style.display = 'none';
        });

        document.querySelectorAll('.simple-modal-close, .simple-modal-footer .btn-secondary-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                const modalId = this.dataset.modalId;
                if(modalId) document.getElementById(modalId).style.display = 'none';
            });
        });

        renderTransactions();
    });
    </script>
</body>
</html>