<?php
$page_title = "CareStride — Physiotherapy at Home Services in Lahore | theCareStride.com";
$page_meta_desc = "Explore CareStride's complete range of in-home physical therapy services in Lahore. Back pain, sciatica, frozen shoulder, post-op joint replacement, stroke neuro care & child rehab.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <?php echo render_breadcrumbs([['name' => 'Physiotherapy Services']]); ?>

  <div class="text-center max-w-3xl mx-auto mb-16">
    <span class="text-xs font-extrabold text-sky-600 uppercase tracking-widest bg-sky-50 px-4 py-1.5 rounded-full border border-sky-100">CareStride Clinical Programs</span>
    <h1 class="text-4xl font-extrabold text-slate-900 mt-3 mb-4">In-Home Physical Therapy Services</h1>
    <p class="text-slate-600 text-base leading-relaxed">
      Why visit a crowded clinic when expert physical therapy can come to you? CareStride Doctors of Physical Therapy (DPT) bring specialized clinical treatment, electrotherapy, ultrasound, and exercise equipment right to your bedside.
    </p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($services as $svc): ?>
      <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden group hover:-translate-y-1">
        <div>
          <!-- Service Condition Visual Image -->
          <div class="relative h-52 overflow-hidden bg-slate-100">
            <img src="<?php echo site_url('assets/images/services/' . $svc['slug'] . '.jpg'); ?>" alt="<?php echo htmlspecialchars($svc['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
            <span class="absolute bottom-3 left-4 text-xs font-bold text-white bg-sky-600/90 backdrop-blur-md px-3 py-1 rounded-full">
              CareStride Protocol
            </span>
          </div>

          <div class="p-6 space-y-4">
            <h2 class="text-xl font-extrabold text-slate-900 group-hover:text-sky-600 transition-colors"><?php echo htmlspecialchars($svc['title']); ?></h2>
            <p class="text-slate-600 text-sm leading-relaxed"><?php echo htmlspecialchars($svc['summary']); ?></p>

            <div class="space-y-2 pt-2 border-t border-slate-100">
              <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block">Key Conditions Treated:</span>
              <?php foreach ($svc['conditions'] as $c): ?>
                <div class="text-xs text-slate-700 flex items-center gap-2 font-medium">
                  <svg class="w-3.5 h-3.5 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                  <span><?php echo htmlspecialchars($c); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <div class="p-6 pt-0">
          <a href="<?php echo site_url('physiotherapy-at-home/' . $svc['slug'] . '/'); ?>" class="w-full py-3 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-extrabold text-xs rounded-xl text-center block shadow-md shadow-sky-500/20 transition-all">
            Explore Full Treatment Details →
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Why Choose Home Care -->
  <div class="mt-20 bg-slate-900 text-white rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden">
    <h2 class="text-3xl font-extrabold mb-8 text-center tracking-tight">Advantages of CareStride In-Home Therapy</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
      <div class="space-y-3">
        <div class="text-sky-400 font-extrabold text-lg">01. Zero Travel Stress</div>
        <p class="text-sky-100/90 text-sm leading-relaxed">Avoid painful traffic rides across Lahore after surgery or severe back spasms. Receive care comfortably in your home environment.</p>
      </div>
      <div class="space-y-3">
        <div class="text-sky-400 font-extrabold text-lg">02. 1-on-1 Dedicated Focus</div>
        <p class="text-sky-100/90 text-sm leading-relaxed">Unlike crowded hospital wards, our doctor dedicates 45 to 60 full minutes exclusively to your care and exercises.</p>
      </div>
      <div class="space-y-3">
        <div class="text-sky-400 font-extrabold text-lg">03. Real Home Setup Training</div>
        <p class="text-sky-100/90 text-sm leading-relaxed">We train you directly on your own stairs, beds, and chairs, ensuring practical functional recovery in your daily surroundings.</p>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
