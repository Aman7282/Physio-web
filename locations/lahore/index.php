<?php
$page_title = "Lahore Home Physiotherapy Coverage Areas | Serviced Sectors";
$page_meta_desc = "Check in-home physical therapy coverage across Lahore: DHA, Johar Town, Gulberg, Model Town & Cantt. Fast arrival with portable clinical equipment.";
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([['name' => 'Lahore Coverage']]); ?>

  <div class="text-center max-w-3xl mx-auto mb-12">
    <span class="text-xs font-semibold text-teal-600 uppercase tracking-widest bg-teal-50 px-3 py-1 rounded-full">Citywide Coverage</span>
    <h1 class="text-4xl font-extrabold text-slate-900 mt-3 mb-4">Lahore Home Physiotherapy Service Areas</h1>
    <p class="text-slate-600 text-base">We operate dedicated mobile physical therapy teams across major sectors in Lahore. Select your neighborhood below for specific details and availability.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <?php foreach ($locations as $loc): ?>
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-lg transition-all space-y-4">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-bold text-slate-900"><?php echo htmlspecialchars($loc['name']); ?></h2>
          <span class="px-3 py-1 rounded-full text-xs font-bold bg-teal-50 text-teal-700 border border-teal-100"><?php echo htmlspecialchars($loc['avg_response_time']); ?></span>
        </div>
        <p class="text-slate-600 text-sm leading-relaxed"><?php echo htmlspecialchars($loc['description']); ?></p>
        
        <div class="p-4 bg-slate-50 rounded-xl space-y-2 text-xs">
          <div class="font-bold text-slate-800">Sectors & Blocks Covered:</div>
          <div class="flex flex-wrap gap-1.5">
            <?php foreach ($loc['neighborhoods'] as $n): ?>
              <span class="px-2 py-1 bg-white border border-slate-200 rounded text-slate-700 font-medium"><?php echo htmlspecialchars($n); ?></span>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="pt-2 flex items-center justify-between">
          <span class="text-xs text-slate-500"><?php echo $loc['active_physios']; ?> Doctors assigned</span>
          <a href="<?php echo site_url('locations/lahore/' . $loc['slug'] . '/'); ?>" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-colors">
            Area Details & Booking →
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
