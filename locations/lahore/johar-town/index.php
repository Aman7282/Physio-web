<?php
require_once __DIR__ . '/../../../includes/data.php';
$loc_key = 'johar-town';
$loc = $locations[$loc_key];
$page_title = "In-Home Physiotherapy in " . $loc['name'] . " | Fast Arrival";
$page_meta_desc = $loc['meta_description'];
require_once __DIR__ . '/../../../includes/header.php';
require_once __DIR__ . '/../../../includes/breadcrumbs.php';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([
    ['name' => 'Lahore Coverage', 'link' => 'locations/lahore/'],
    ['name' => $loc['name']]
  ]); ?>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    <div class="lg:col-span-8 space-y-8">
      <div>
        <span class="text-xs font-semibold text-teal-600 uppercase tracking-widest bg-teal-50 px-3 py-1 rounded-full">Served Zone</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 mb-4">In-Home Physiotherapy in <?php echo htmlspecialchars($loc['name']); ?></h1>
        <p class="text-slate-600 text-lg leading-relaxed"><?php echo htmlspecialchars($loc['description']); ?></p>
      </div>

      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
        <h2 class="text-xl font-bold text-slate-900">Neighborhoods Covered in <?php echo htmlspecialchars($loc['name']); ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <?php foreach ($loc['neighborhoods'] as $n): ?>
            <div class="p-3 bg-slate-50 rounded-xl border border-slate-100 flex items-center gap-2 text-sm text-slate-800 font-medium">
              <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <?php echo htmlspecialchars($n); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="lg:col-span-4">
      <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xl sticky top-28 space-y-6">
        <div>
          <h3 class="text-lg font-bold text-slate-900">Book Visit in <?php echo htmlspecialchars($loc['name']); ?></h3>
          <p class="text-xs text-slate-500 mt-1">Average response time: <?php echo htmlspecialchars($loc['avg_response_time']); ?></p>
        </div>

        <a href="<?php echo site_url('book-home-visit/?location=' . $loc['slug']); ?>" class="w-full py-4 bg-gradient-to-r from-teal-600 to-sky-600 text-white font-bold text-center text-sm rounded-xl block shadow-md hover:from-teal-700 hover:to-sky-700 transition-all">
          Request Home Visit Now
        </a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../../includes/footer.php'; ?>
