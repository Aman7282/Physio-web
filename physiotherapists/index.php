<?php
$page_title = "CareStride Doctor Team — Verified DPT Physiotherapists in Lahore | theCareStride.com";
$page_meta_desc = "Meet our team of licensed Doctors of Physical Therapy (DPT) providing CareStride home visits in Lahore. Male and female doctors available across DHA, Johar Town, Gulberg & Model Town.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <?php echo render_breadcrumbs([['name' => 'Our Doctors']]); ?>

  <div class="text-center max-w-3xl mx-auto mb-14">
    <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-3.5 py-1.5 rounded-full border border-sky-100">CareStride Clinical Team</span>
    <h1 class="text-4xl font-extrabold text-slate-900 mt-3 mb-4">Our Licensed Doctors of Physical Therapy</h1>
    <p class="text-slate-600 text-base">All CareStride practitioners hold Doctor of Physical Therapy (DPT) degrees from top universities (Sargodha Medical College & Riphah International University) and are registered for home healthcare across Lahore.</p>
  </div>

  <!-- Directory Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <?php foreach ($physiotherapists as $dr): ?>
      <div class="bg-white rounded-3xl p-7 border border-sky-100 shadow-sm hover:shadow-xl transition-all flex flex-col sm:flex-row gap-6">
        <?php if (!empty($dr['image'])): ?>
          <img src="<?php echo site_url('uploads/doctors/' . $dr['image']); ?>" alt="<?php echo htmlspecialchars($dr['name']); ?>" class="w-28 h-28 rounded-2xl object-cover border border-sky-200 shrink-0 shadow-md">
        <?php else: ?>
          <div class="w-28 h-28 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-3xl flex items-center justify-center shrink-0 shadow-md">
            <?php 
              $parts = explode(' ', $dr['name']);
              echo htmlspecialchars(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
            ?>
          </div>
        <?php endif; ?>

        <div class="space-y-3 flex-grow">
          <div>
            <div class="flex items-center justify-between">
              <h2 class="text-xl font-bold text-slate-900"><?php echo htmlspecialchars($dr['name']); ?></h2>
              <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-sky-50 text-sky-700 border border-sky-200">Verified DPT</span>
            </div>
            <div class="text-xs text-sky-600 font-bold mt-0.5"><?php echo htmlspecialchars($dr['title']); ?></div>
            <div class="text-xs text-slate-500"><?php echo htmlspecialchars($dr['degrees']); ?> • <?php echo htmlspecialchars($dr['experience']); ?></div>
          </div>

          <p class="text-xs text-slate-600 leading-relaxed"><?php echo htmlspecialchars($dr['bio']); ?></p>

          <div class="flex flex-wrap gap-1.5">
            <?php foreach ($dr['specialties'] as $spec): ?>
              <span class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-sky-50 text-sky-700 border border-sky-100"><?php echo htmlspecialchars($spec); ?></span>
            <?php endforeach; ?>
          </div>

          <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
            <div class="font-bold text-slate-900">Visit Fee: <span class="text-sky-600"><?php echo htmlspecialchars($dr['fee']); ?></span></div>
            <a href="<?php echo site_url('physiotherapists/' . $dr['slug'] . '/'); ?>" class="px-4 py-2 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-bold rounded-xl shadow-md shadow-sky-500/20 transition-all">
              Full Profile & Book →
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
