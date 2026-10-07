<?php
$page_title = "Patient Data Privacy Policy | PhysioHome Lahore";
$page_meta_desc = "Patient data privacy and medical record security guidelines for PhysioHome Lahore.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
  <?php echo render_breadcrumbs([['name' => 'Privacy Policy']]); ?>
  <h1 class="text-3xl font-extrabold text-slate-900">Patient Data Privacy Policy</h1>
  <p class="text-slate-600 text-sm leading-relaxed">
    PhysioHome Lahore is strictly committed to safeguarding patient medical records and personal information. All health data collected during home clinical assessments is encrypted and stored in compliance with Pakistani healthcare data protection norms.
  </p>
  <div class="space-y-3 text-xs text-slate-700">
    <h3 class="font-bold text-slate-900 text-sm">1. Data Collection</h3>
    <p>We collect patient names, phone numbers, home addresses, and clinical medical histories solely for the purpose of dispatching qualified physical therapists and customizing treatment plans.</p>
    <h3 class="font-bold text-slate-900 text-sm">2. Confidentiality</h3>
    <p>Medical records are never shared with third-party advertising companies. Only assigned treating doctors have access to your clinical notes.</p>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
