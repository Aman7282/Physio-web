<?php
$page_title = "Terms of Service | PhysioHome Lahore";
$page_meta_desc = "Patient-practitioner terms of service and home visit conduct agreement for PhysioHome Lahore.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
  <?php echo render_breadcrumbs([['name' => 'Terms of Service']]); ?>
  <h1 class="text-3xl font-extrabold text-slate-900">Terms of Service</h1>
  <p class="text-slate-600 text-sm leading-relaxed">
    By requesting home physiotherapy visits from PhysioHome Lahore, you agree to our standard patient-practitioner care agreement.
  </p>
  <div class="space-y-3 text-xs text-slate-700">
    <h3 class="font-bold text-slate-900 text-sm">1. Clinical Assessment</h3>
    <p>All home treatments begin with an initial diagnostic evaluation by a licensed Doctor of Physical Therapy (DPT). The doctor reserves the right to refer patients to tertiary hospitals if red-flag symptoms are detected.</p>
    <h3 class="font-bold text-slate-900 text-sm">2. Home Safety & Respectful Environment</h3>
    <p>Patients must provide a clean, safe, and respectful environment for visiting medical staff. Distractions or unsafe conditions must be minimized during treatment sessions.</p>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
