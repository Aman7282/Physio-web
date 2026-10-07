<?php
$page_title = "Cancellation & Refund Policy | PhysioHome Lahore";
$page_meta_desc = "4-hour flexible cancellation policy and package refund terms for home physiotherapy visits in Lahore.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
  <?php echo render_breadcrumbs([['name' => 'Cancellation & Refund Policy']]); ?>
  <h1 class="text-3xl font-extrabold text-slate-900">Cancellation & Refund Policy</h1>
  <p class="text-slate-600 text-sm leading-relaxed">
    We understand that family schedules and health conditions can change unpredictably. We offer flexible cancellation and refund terms for all home visits in Lahore.
  </p>
  <div class="bg-white rounded-2xl p-6 border border-slate-200 space-y-4 text-xs text-slate-700">
    <div class="p-4 bg-teal-50 border border-teal-100 rounded-xl space-y-1">
      <strong class="text-teal-900 font-bold block text-sm">✓ Free Cancellation Up to 4 Hours Prior</strong>
      <p class="text-teal-800">You may cancel or reschedule any upcoming home visit with zero penalty by notifying us via phone or WhatsApp at least 4 hours before your scheduled time.</p>
    </div>
    <div class="space-y-2">
      <h3 class="font-bold text-slate-900 text-sm">Late Cancellations</h3>
      <p>Cancellations made less than 2 hours before doctor arrival or upon doctor arrival at your address may incur a nominal PKR 500 travel compensation fee for the visiting practitioner.</p>
      <h3 class="font-bold text-slate-900 text-sm">Package Refund Terms</h3>
      <p>For multi-session packages (6 or 12 sessions), unused sessions are 100% refundable upon request, calculated by deducting used sessions at the standard single-visit rate.</p>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
