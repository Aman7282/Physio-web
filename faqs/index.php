<?php
$page_title = "Frequently Asked Questions — CareStride Home Physiotherapy Lahore | theCareStride.com";
$page_meta_desc = "Got questions about Doctor of Physical Therapy home visits in Lahore? Read CareStride (theCareStride.com) FAQs on doctor credentials, portable equipment, fees, and DHA coverage.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([['name' => 'FAQs & Help']]); ?>

  <div class="text-center max-w-2xl mx-auto mb-14">
    <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-3.5 py-1.5 rounded-full border border-sky-100">CareStride Help Center</span>
    <h1 class="text-4xl font-extrabold text-slate-900 mt-3 mb-3">Frequently Asked Questions</h1>
    <p class="text-slate-600 text-sm">Find quick answers regarding CareStride home visits, doctor credentials, mobile electrotherapy equipment, and booking terms in Lahore.</p>
  </div>

  <div class="space-y-4">
    <?php foreach ($faqs_list as $i => $faq): ?>
      <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm space-y-2 hover:border-sky-300 transition-colors">
        <h2 class="text-lg font-bold text-slate-900 flex items-start gap-3">
          <span class="w-7 h-7 rounded-xl bg-sky-100 text-sky-700 text-xs font-extrabold flex items-center justify-center shrink-0 mt-0.5">Q<?php echo $i+1; ?></span>
          <span><?php echo htmlspecialchars($faq['q']); ?></span>
        </h2>
        <p class="text-slate-600 text-sm leading-relaxed pl-10"><?php echo htmlspecialchars($faq['a']); ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-14 text-center bg-gradient-to-r from-sky-50 via-blue-50 to-sky-100 rounded-3xl p-8 border border-sky-200/80 space-y-4 shadow-sm">
    <h2 class="text-xl font-extrabold text-slate-900">Have Specific Medical Questions?</h2>
    <p class="text-slate-600 text-xs leading-relaxed max-w-md mx-auto">Our senior Doctor of Physical Therapy is available on hotline for free preliminary consultation and case assessment.</p>
    <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
      <a href="tel:<?php echo PHONE_RAW; ?>" class="px-6 py-3 bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold rounded-xl text-xs shadow-md shadow-sky-500/20 hover:from-sky-600 hover:to-blue-700 transition-all">
        Call Direct: <?php echo PHONE_NUMBER; ?>
      </a>
      <a href="<?php echo WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="px-6 py-3 bg-emerald-600 text-white font-extrabold rounded-xl text-xs hover:bg-emerald-700 transition-colors">
        WhatsApp Consultation
      </a>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
