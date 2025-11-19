<!DOCTYPE html>
<html lang="en">

<?php
if (!function_exists('include_page')) {
    function include_page($page_name) {
        return "";
    }
}
if (!function_exists('assets')) {
    function assets() {
        return 'assets';
    }
}
?>

<?=include_page('header')?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background-color: #fff; color: #333; line-height: 1.6; }
        .content .container.invoice-page-container { max-width: 1200px; margin-left: auto; margin-right: auto; background-color: #fff; position: relative; }
        .page-header { display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e9ecef; margin-bottom: 20px; }
        .page-header h1 { font-size: 2.5rem; font-weight: 600; color: #212529; }
        .header-actions { display: flex; align-items: center; gap: 20px; }
        .search-bar { display: flex; align-items: center; background-color: #f1f3f5; padding: 8px 12px; border-radius: 6px; }
        .search-bar i { color: #868e96; margin-right: 8px; }
        .search-bar input[type="search"] { border: none; background-color: transparent; outline: none; font-size: 0.9rem; color: #495057; }
        .search-bar input[type="search"]::placeholder { color: #adb5bd; }
        .view-templates-link { text-decoration: none; color: #495057; font-size: 0.9rem; font-weight: 500; }
        .view-templates-link:hover { color: #007bff; }
        .new-invoice-btn-main { background-color: red; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 0.9rem; font-weight: 500; cursor: pointer; transition: background-color 0.2s ease; }
        .new-invoice-btn-main:hover { background-color:red; }
        .stats-overview { display: flex; gap: 30px; margin-bottom: 30px; }
        .stat-item { display: flex; align-items: center; gap: 10px; }
        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot.green { background-color: red; }
        .dot.yellow { background-color: #ffc107; }
        .dot.red { background-color: #dc3545; }
        .stat-info { display: flex; flex-direction: column; }
        .stat-label { font-size: 0.85rem; color: #6c757d; }
        .stat-value { font-size: 1.5rem; font-weight: 600; color: #343a40; }
        .invoice-tabs { margin-bottom: 20px; border-bottom: 1px solid #dee2e6; }
        .invoice-tabs ul { list-style: none; display: flex; gap: 25px; padding-left: 0; }
        .invoice-tabs li a { text-decoration: none; color: #6c757d; padding: 10px 0; display: inline-block; font-size: 0.95rem; font-weight: 500; position: relative; cursor: pointer; }
        .invoice-tabs li a.active { color: red; border-bottom: 2px solid red; }
        .invoice-tabs li a:not(.active):hover { color: #495057; }
        .invoice-list { display: grid; grid-template-columns: 0.7fr 0.8fr 0.9fr 1.8fr 1.8fr 0.8fr 1fr 0.3fr; gap: 10px 15px; align-items: center; }
        .invoice-list-header { display: contents; font-size: 0.75rem; color: #6c757d; font-weight: 600; text-transform: uppercase; }
        .invoice-list-header .col { padding-bottom: 10px; border-bottom: 1px solid #e9ecef; }
        .invoice-row { display: contents; }
        .invoice-row .col { padding: 15px 0; font-size: 0.9rem; color: #495057; border-bottom: 1px solid #f1f3f5; }
        .col-status-badge { text-align: left; padding-left: 5px; }
        .status-badge { padding: 4px 10px; border-radius: 12px; font-size: 0.75rem; font-weight: 500; display: inline-block; text-transform: uppercase; }
        .status-badge.draft { background-color: #e9ecef; color: #495057; }
        .status-badge.paid { background-color: #d1e7dd; color: #0a3622; }
        .status-badge.outstanding { background-color: #fff3cd; color: #664d03;}
        .status-badge.pastdue { background-color: #f8d7da;  color: #58151c; }
        .status-badge.canceled { background-color: #e2e3e5; color: #41464b; }
        .col-client { display: flex; align-items: center; gap: 10px; }
        .client-avatar { width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 500; font-size: 0.8rem; }
        .client-avatar.la { background-color: #6f42c1; }
        .client-avatar.ma { background-color: #f8d7da; color: #58151c;}
        .client-avatar.sc { background-color: #cfe2ff; color: #052c65;}
        .client-avatar.default-avatar { background-color: #6c757d; }
        .col-amount { font-weight: 500; }
        .col-created { color: #6c757d; }
        .col-actions { text-align: right; color: #6c757d; cursor: pointer; position: relative; }
        .col-actions .fas.fa-ellipsis-h:hover { color: #343a40; }
        .col-created i { font-size: 0.7rem; margin-left: 3px; }
        .page-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 20px; margin-top: 30px; border-top: 1px solid #e9ecef; color: #6c757d; font-size: 0.9rem; }
        .fab { position: fixed; bottom: 30px; right: 30px; width: 50px; height: 50px; background-color: #343a40; color: white; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; box-shadow: 0 2px 10px rgba(0,0,0,0.2); cursor: pointer; transition: background-color 0.2s ease; z-index: 999; }
        .fab:hover { background-color: #23272b; }
        .simple-modal { display: none; position: fixed; z-index: 1050; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); }
        .simple-modal-content { background-color: #fff; margin: 10% auto; padding: 0; border: 1px solid #ddd; width: 90%; max-width: 500px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); animation-name: animatetop; animation-duration: 0.4s }
        @keyframes animatetop { from {transform: translateY(-50px); opacity: 0} to {transform: translateY(0); opacity: 1} }
        .simple-modal-header { padding: 15px 20px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
        .simple-modal-header h2 { margin: 0; font-size: 1.2rem; font-weight: 600; }
        .simple-modal-close { color: #aaa; font-size: 28px; font-weight: bold; background: none; border: none; cursor: pointer; }
        .simple-modal-close:hover, .simple-modal-close:focus { color: black; text-decoration: none; }
        .simple-modal-body { padding: 20px; }
        .simple-modal-body .form-group { margin-bottom: 15px; }
        .simple-modal-body .form-group label { display: block; margin-bottom: 5px; font-weight: 500; font-size: 0.9rem; }
        .simple-modal-body .form-group input[type="text"], .simple-modal-body .form-group input[type="number"], .simple-modal-body .form-group input[type="date"], .simple-modal-body .form-group select { width: 100%; padding: 8px 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 0.9rem; }
        .simple-modal-body .form-group input:focus, .simple-modal-body .form-group select:focus { border-color: #20c997; outline: 0; box-shadow: 0 0 0 0.2rem rgba(32,201,151,.25); }
        .simple-modal-footer { padding: 15px 20px; border-top: 1px solid #eee; text-align: right; }
        .simple-modal-footer .btn { padding: 8px 15px; border-radius: 4px; cursor: pointer; font-size: 0.9rem; border: 1px solid transparent; }
        .simple-modal-footer .btn-secondary { background-color: #6c757d; color: white; margin-right: 10px; }
        .simple-modal-footer .btn-secondary:hover { background-color: #5a6268; }
        .simple-modal-footer .btn-primary { background-color:red; color: white; }
        .simple-modal-footer .btn-primary:hover { background-color: red; }
        .actions-dropdown { display: none; position: absolute; right: 0; top: 25px; background-color: white; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); z-index: 100; min-width: 160px; }
        .actions-dropdown a { color: #333; padding: 8px 12px; text-decoration: none; display: block; font-size: 0.9rem; }
        .actions-dropdown a:hover { background-color: #f5f5f5; }
        @media (max-width: 992px) { .invoice-list { grid-template-columns: 0.6fr 0.8fr 1fr 1.5fr 1.5fr 0.8fr 1fr 0.3fr; } .page-header h1 { font-size: 2rem; } }
        @media (max-width: 768px) { .page-header { flex-direction: column; align-items: flex-start; gap: 15px; } .header-actions { width: 100%; flex-direction: column; align-items: stretch; } .search-bar { width: 100%; } .new-invoice-btn-main, .view-templates-link { text-align: center; } .stats-overview { flex-direction: column; gap: 15px; } .invoice-tabs ul { gap: 15px; flex-wrap: wrap; } .invoice-list { font-size: 0.85rem; display: block; overflow-x: auto; white-space: nowrap; } .invoice-list-header, .invoice-row { display: grid; grid-template-columns: 100px 80px 100px 150px 150px 100px 120px 50px; min-width: 850px; } .invoice-list-header .col, .invoice-row .col { white-space: normal; } .fab { bottom: 20px; right: 20px; width: 45px; height: 45px; font-size: 1.3rem; } .simple-modal-content { margin: 5% auto; width: 95%; } }
    </style>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <?=include_page('sidebar')?>
        <div class="content">
            <?=include_page('navbar')?>

            <div class="container pt-4 px-4 invoice-page-container">
                <div class="rounded h-100 p-4">
                    <header class="page-header">
                        <h1>Invoices</h1>
                        <div class="header-actions">
                            <div class="search-bar">
                                <i class="fas fa-search"></i>
                                <input type="search" id="invoiceSearchInput" placeholder="Search email or contact name">
                            </div>
                            <a href="#" class="view-templates-link">View Templates</a>
                            <button class="new-invoice-btn-main" id="openNewInvoiceModalBtn">New Invoice</button>
                        </div>
                    </header>

                    <section class="stats-overview">
                        <div class="stat-item"> <span class="dot green"></span> <div class="stat-info"> <span class="stat-label">Total paid</span> <span class="stat-value" id="totalPaidStat">₱0.00</span> </div> </div>
                        <div class="stat-item"> <span class="dot yellow"></span> <div class="stat-info"> <span class="stat-label">Total outstanding</span> <span class="stat-value" id="totalOutstandingStat">₱0.00</span> </div> </div>
                        <div class="stat-item"> <span class="dot red"></span> <div class="stat-info"> <span class="stat-label">Past due</span> <span class="stat-value" id="totalPastDueStat">₱0.00</span> </div> </div>
                    </section>

                    <nav class="invoice-tabs">
                        <ul>
                            <li><a href="#" class="active" data-filter="all">All Invoices</a></li>
                            <li><a href="#" data-filter="draft">Draft</a></li>
                            <li><a href="#" data-filter="outstanding">Outstanding</a></li>
                            <li><a href="#" data-filter="pastdue">Past Due</a></li>
                            <li><a href="#" data-filter="paid">Paid</a></li>
                            <li><a href="#" data-filter="canceled">Canceled</a></li>
                        </ul>
                    </nav>

                    <main class="invoice-list" id="invoiceListContainer">
                        <div class="invoice-list-header">
                            <div class="col col-invoice-id">INVOICE #</div> <div class="col col-status-badge">STATUS</div> <div class="col col-amount">AMOUNT</div> <div class="col col-client">CLIENT</div> <div class="col col-project">PROJECT</div> <div class="col col-due-on">DUE ON</div> <div class="col col-created">CREATED <i class="fas fa-arrow-down"></i></div> <div class="col col-actions">ACTIONS</div>
                        </div>
                    </main>
                    <div id="noInvoicesMessage" style="text-align: center; padding: 20px; display: none;">No invoices match the current filter.</div>

                    <footer class="page-footer"> <span class="pagination-info" id="paginationInfo">0 - 0 of 0</span> <button class="fab"><i class="fas fa-comment-dots"></i></button> </footer>
                </div>
            </div>
            <?=include_page('footer_content')?>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <div id="newInvoiceSimpleModal" class="simple-modal">
        <div class="simple-modal-content">
            <div class="simple-modal-header"> <h2 id="modalTitle">Create New Invoice</h2> <button type="button" class="simple-modal-close" id="closeNewInvoiceSimpleModalBtn">×</button> </div>
            <div class="simple-modal-body">
                <form id="newInvoiceSimpleForm">
                    <input type="hidden" id="modalInvoiceId" name="modalInvoiceId">
                    <div class="form-group"> <label for="modalClientName">Client Name</label> <input type="text" id="modalClientName" name="modalClientName" required> </div>
                    <div class="form-group"> <label for="modalProjectName">Project Name</label> <input type="text" id="modalProjectName" name="modalProjectName" required> </div>
                    <div class="form-group"> <label for="modalAmount">Amount (₱)</label> <input type="number" id="modalAmount" name="modalAmount" step="0.01" min="0" value="0.00" required> </div>
                    <div class="form-group"> <label for="modalDueOn">Due On (Optional)</label> <input type="date" id="modalDueOn" name="modalDueOn"> </div>
                    <div class="form-group"> <label for="modalStatus">Status</label> <select id="modalStatus" name="modalStatus"> <option value="draft">Draft</option> <option value="outstanding">Outstanding</option> <option value="paid">Paid</option> <option value="pastdue">Past Due</option> <option value="canceled">Canceled</option> </select> </div>
                </form>
            </div>
            <div class="simple-modal-footer"> <button type="button" class="btn btn-secondary" id="cancelNewInvoiceSimpleModalBtn">Cancel</button> <button type="submit" form="newInvoiceSimpleForm" class="btn btn-primary" id="modalSubmitButton">Create Draft</button> </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=assets()?>/lib/chart/chart.min.js"></script>
    <script src="<?=assets()?>/lib/easing/easing.min.js"></script>
    <script src="<?=assets()?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=assets()?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?=assets()?>/js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const invoiceListContainer = document.getElementById('invoiceListContainer');
        const tabs = document.querySelectorAll('.invoice-tabs a');
        const searchInput = document.getElementById('invoiceSearchInput');
        const paginationInfoEl = document.getElementById('paginationInfo');
        const noInvoicesMessageEl = document.getElementById('noInvoicesMessage');
        const totalPaidStatEl = document.getElementById('totalPaidStat');
        const totalOutstandingStatEl = document.getElementById('totalOutstandingStat');
        const totalPastDueStatEl = document.getElementById('totalPastDueStat');

        const openModalBtn = document.getElementById('openNewInvoiceModalBtn');
        const modal = document.getElementById('newInvoiceSimpleModal');
        const closeModalBtn = document.getElementById('closeNewInvoiceSimpleModalBtn');
        const cancelModalBtn = document.getElementById('cancelNewInvoiceSimpleModalBtn');
        const newInvoiceForm = document.getElementById('newInvoiceSimpleForm');
        const modalTitleEl = document.getElementById('modalTitle');
        const modalSubmitButtonEl = document.getElementById('modalSubmitButton');
        const modalInvoiceIdInput = document.getElementById('modalInvoiceId');

        let nextInvoiceId = 1004;
        let currentFilter = 'all';
        let searchTerm = '';
        let editingInvoiceId = null;

        let allInvoices = [
            { id: '1003', clientName: 'mmikaa asa', clientInitials: 'MA', avatarClass: 'ma', project: "mmikaa's Project", amount: 0.00, created: '2025-05-27', dueOn: '2025-06-27', status: 'draft' },
            { id: '1002', clientName: 'levi ackerman', clientInitials: 'LA', avatarClass: 'la', project: "levi's Family Project", amount: 200.00, created: '2025-05-19', dueOn: '2025-06-19', status: 'draft' },
            { id: '1001', clientName: 'mia ackerman', clientInitials: 'MA', avatarClass: 'ma', project: "mia's Family Project", amount: 150.00, created: '2025-05-19', dueOn: '2025-06-01', status: 'paid' },
            { id: '1000', clientName: 'Sample Client', clientInitials: 'SC', avatarClass: 'sc', project: "Sample's Project", amount: 1200.00, created: '2025-05-19', dueOn: '2025-04-15', status: 'pastdue' },
            { id: '0999', clientName: 'Old Project Inc.', clientInitials: 'OP', avatarClass: 'default-avatar', project: "Archived Work", amount: 500.00, created: '2024-01-10', dueOn: '2024-02-10', status: 'canceled' },
            { id: '0998', clientName: 'Future Corp', clientInitials: 'FC', avatarClass: 'default-avatar', project: "Upcoming Task", amount: 3000.00, created: '2025-06-01', dueOn: '2025-07-01', status: 'outstanding' },
        ];

        function formatCurrency(amount) { return `₱${parseFloat(amount).toFixed(2)}`;}
        function formatDate(dateString) { if (!dateString) return ''; const date = new Date(dateString); return date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });}

        function renderInvoices() {
            const existingRows = invoiceListContainer.querySelectorAll('.invoice-row');
            existingRows.forEach(row => row.remove());
            let filteredInvoices = allInvoices;
            if (currentFilter !== 'all') {
                filteredInvoices = filteredInvoices.filter(inv => inv.status === currentFilter);
            }
            if (searchTerm) {
                const lowerSearchTerm = searchTerm.toLowerCase();
                filteredInvoices = filteredInvoices.filter(inv =>
                    inv.clientName.toLowerCase().includes(lowerSearchTerm) ||
                    inv.project.toLowerCase().includes(lowerSearchTerm) ||
                    inv.id.includes(lowerSearchTerm)
                );
            }
            filteredInvoices.sort((a, b) => new Date(b.created) - new Date(a.created));
            noInvoicesMessageEl.style.display = filteredInvoices.length === 0 ? 'block' : 'none';

            filteredInvoices.forEach(invoice => {
                const row = document.createElement('div');
                row.classList.add('invoice-row');
                row.dataset.invoiceId = invoice.id;

                const actionsDropdownId = `actions-dropdown-${invoice.id}`;
                row.innerHTML = `
                    <div class="col col-invoice-id">${invoice.id}</div>
                    <div class="col col-status-badge"><span class="status-badge ${invoice.status}">${invoice.status.toUpperCase()}</span></div>
                    <div class="col col-amount">${formatCurrency(invoice.amount)}</div>
                    <div class="col col-client"> <span class="client-avatar ${invoice.avatarClass}">${invoice.clientInitials}</span> ${invoice.clientName} </div>
                    <div class="col col-project">${invoice.project}</div>
                    <div class="col col-due-on">${formatDate(invoice.dueOn)}</div>
                    <div class="col col-created">${formatDate(invoice.created)}</div>
                    <div class="col col-actions">
                        <i class="fas fa-ellipsis-h action-icon" data-invoice-id="${invoice.id}"></i>
                        <div class="actions-dropdown" id="${actionsDropdownId}">
                            <a href="#" class="action-edit" data-invoice-id="${invoice.id}">Edit</a>
                            <a href="#" class="action-set-status" data-invoice-id="${invoice.id}" data-new-status="paid">Set as Paid</a>
                            <a href="#" class="action-set-status" data-invoice-id="${invoice.id}" data-new-status="outstanding">Set as Outstanding</a>
                            <a href="#" class="action-set-status" data-invoice-id="${invoice.id}" data-new-status="pastdue">Set as Past Due</a>
                            <a href="#" class="action-set-status" data-invoice-id="${invoice.id}" data-new-status="draft">Set as Draft</a>
                            <a href="#" class="action-set-status" data-invoice-id="${invoice.id}" data-new-status="canceled">Set as Canceled</a>
                        </div>
                    </div>
                `;
                invoiceListContainer.appendChild(row);
            });
            updatePaginationInfo(filteredInvoices.length, allInvoices.length);
            updateStats();
            attachActionListeners();
        }

        function attachActionListeners() {
            document.querySelectorAll('.action-icon').forEach(icon => {
                icon.addEventListener('click', function(event) {
                    event.stopPropagation();
                    const invoiceId = this.dataset.invoiceId;
                    const dropdown = document.getElementById(`actions-dropdown-${invoiceId}`);
                    closeAllDropdowns(dropdown);
                    if (dropdown) dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                });
            });

            document.querySelectorAll('.action-edit').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const invoiceId = this.dataset.invoiceId;
                    openEditModal(invoiceId);
                    closeAllDropdowns();
                });
            });
            document.querySelectorAll('.action-set-status').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const invoiceId = this.dataset.invoiceId;
                    const newStatus = this.dataset.newStatus;
                    updateInvoiceStatus(invoiceId, newStatus);
                    closeAllDropdowns();
                });
            });
        }

        function closeAllDropdowns(exceptThisOne = null) {
            document.querySelectorAll('.actions-dropdown').forEach(dropdown => {
                if (dropdown !== exceptThisOne) {
                    dropdown.style.display = 'none';
                }
            });
        }
        document.addEventListener('click', function() { closeAllDropdowns(); });


        function updateInvoiceStatus(invoiceId, newStatus) {
            const invoiceIndex = allInvoices.findIndex(inv => inv.id === invoiceId);
            if (invoiceIndex > -1) {
                allInvoices[invoiceIndex].status = newStatus;
                if (newStatus === 'paid' && allInvoices[invoiceIndex].dueOn && new Date(allInvoices[invoiceIndex].dueOn) < new Date() && allInvoices[invoiceIndex].amount > 0) {
                    // If paid but was past due, it's now just paid.
                } else if (newStatus !== 'paid' && allInvoices[invoiceIndex].dueOn && new Date(allInvoices[invoiceIndex].dueOn) < new Date() && allInvoices[invoiceIndex].amount > 0 && newStatus !== 'canceled') {
                     // If due date passed and not paid/canceled, mark as pastdue
                     // This logic might need refinement based on how 'outstanding' vs 'pastdue' is strictly defined
                     // For now, if a due date exists and is in the past, and it's not paid or canceled, let's ensure it's 'pastdue'
                     // or if the user explicitly sets it to outstanding, respect that.
                     if (newStatus !== 'outstanding') { // if user sets to outstanding, don't override to pastdue here
                        allInvoices[invoiceIndex].status = 'pastdue';
                     }
                }
                renderInvoices();
            }
        }


        function openEditModal(invoiceId) {
            const invoice = allInvoices.find(inv => inv.id === invoiceId);
            if (invoice && modal) {
                editingInvoiceId = invoiceId;
                modalTitleEl.textContent = `Edit Invoice #${invoice.id}`;
                modalSubmitButtonEl.textContent = 'Save Changes';
                modalInvoiceIdInput.value = invoice.id;
                document.getElementById('modalClientName').value = invoice.clientName;
                document.getElementById('modalProjectName').value = invoice.project;
                document.getElementById('modalAmount').value = invoice.amount.toFixed(2);
                document.getElementById('modalDueOn').value = invoice.dueOn || '';
                document.getElementById('modalStatus').value = invoice.status;
                modal.style.display = "block";
            }
        }


        function updatePaginationInfo(filteredCount, totalCount) { if (filteredCount > 0) { paginationInfoEl.textContent = `1 - ${filteredCount} of ${totalCount}`; } else if (totalCount > 0 && filteredCount === 0) { paginationInfoEl.textContent = `0 of ${totalCount}`; } else { paginationInfoEl.textContent = `0 - 0 of 0`; }}
        function updateStats() {
            let paidTotal = 0; let outstandingTotal = 0; let pastDueTotal = 0;
            allInvoices.forEach(inv => {
                if (inv.status === 'paid') paidTotal += inv.amount;
                else if (inv.status === 'outstanding' && inv.amount > 0) outstandingTotal += inv.amount; // Only count if amount > 0
                else if (inv.status === 'pastdue' && inv.amount > 0) pastDueTotal += inv.amount; // Only count if amount > 0
            });
            totalPaidStatEl.textContent = formatCurrency(paidTotal);
            totalOutstandingStatEl.textContent = formatCurrency(outstandingTotal);
            totalPastDueStatEl.textContent = formatCurrency(pastDueTotal);
        }

        if (openModalBtn) {
            openModalBtn.onclick = function() {
                if (modal) {
                    editingInvoiceId = null; // Ensure it's a new invoice
                    modalTitleEl.textContent = 'Create New Invoice';
                    modalSubmitButtonEl.textContent = 'Create Draft';
                    newInvoiceForm.reset(); // Resets all form fields
                    document.getElementById('modalStatus').value = 'draft'; // Default to draft
                    modalInvoiceIdInput.value = '';
                    modal.style.display = "block";
                }
            }
        }
        if (closeModalBtn) { closeModalBtn.onclick = function() { if (modal) modal.style.display = "none"; } }
        if (cancelModalBtn) { cancelModalBtn.onclick = function() { if (modal) modal.style.display = "none"; } }
        window.onclick = function(event) { if (event.target == modal) { if (modal) modal.style.display = "none"; } }

        if (newInvoiceForm) {
            newInvoiceForm.onsubmit = function(event) {
                event.preventDefault();
                const clientName = document.getElementById('modalClientName').value;
                const projectName = document.getElementById('modalProjectName').value;
                const amount = parseFloat(document.getElementById('modalAmount').value);
                const dueOn = document.getElementById('modalDueOn').value;
                const status = document.getElementById('modalStatus').value;
                const invoiceIdFromModal = modalInvoiceIdInput.value;


                const initials = clientName.split(' ').map(n => n[0]).join('').toUpperCase().substring(0,2);

                if (invoiceIdFromModal) { // Editing existing invoice
                    const invoiceIndex = allInvoices.findIndex(inv => inv.id === invoiceIdFromModal);
                    if (invoiceIndex > -1) {
                        allInvoices[invoiceIndex].clientName = clientName || "Unnamed Client";
                        allInvoices[invoiceIndex].clientInitials = initials || 'N A';
                        allInvoices[invoiceIndex].project = projectName || "Unspecified Project";
                        allInvoices[invoiceIndex].amount = isNaN(amount) ? 0.00 : amount;
                        allInvoices[invoiceIndex].dueOn = dueOn;
                        allInvoices[invoiceIndex].status = status;
                        // 'created' date remains the same for edits
                    }
                } else { // Creating new invoice
                    const today = new Date().toISOString().split('T')[0];
                    const newInvoice = {
                        id: String(nextInvoiceId++),
                        clientName: clientName || "Unnamed Client",
                        clientInitials: initials || 'N A',
                        avatarClass: 'default-avatar',
                        project: projectName || "Unspecified Project",
                        amount: isNaN(amount) ? 0.00 : amount,
                        created: today,
                        dueOn: dueOn,
                        status: status
                    };
                    allInvoices.push(newInvoice);
                }
                
                if (modal) modal.style.display = "none";
                newInvoiceForm.reset();
                
                currentFilter = status; // Show the tab of the status just created/edited
                tabs.forEach(t => t.classList.remove('active'));
                const targetTab = document.querySelector(`.invoice-tabs a[data-filter="${status}"]`);
                if (targetTab) targetTab.classList.add('active');
                else { // Fallback to 'all' if status tab not found (should not happen with current setup)
                    document.querySelector(`.invoice-tabs a[data-filter="all"]`).classList.add('active');
                    currentFilter = 'all';
                }
                
                renderInvoices();
            }
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) { e.preventDefault(); tabs.forEach(t => t.classList.remove('active')); this.classList.add('active'); currentFilter = this.dataset.filter; renderInvoices(); });
        });
        if (searchInput) {
            searchInput.addEventListener('input', function () { searchTerm = this.value.trim(); renderInvoices(); });
        }
        renderInvoices();
    });
    </script>
</body>
</html>