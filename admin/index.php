<?php
session_start();
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/data.php';

if (empty($_SESSION['admin_logged_in'])) {
    header("Location: " . site_url('admin/login.php'));
    exit;
}

$message = '';
if (isset($_GET['deleted'])) {
    $message = 'Doctor profile removed successfully.';
} elseif (isset($_GET['saved'])) {
    $message = 'Doctor profile saved & SEO page generated successfully!';
}

$doctors = get_all_doctors();
$appointments = get_all_appointments();
$pending_count = 0;
foreach ($appointments as $a) {
    if (($a['status'] ?? '') === 'Pending') $pending_count++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor & Booking Management Dashboard | PhysioHome Admin</title>
  <script src="https://www.gstatic.com/antigravity/web/dev/tailwindcss.min.js"></script>
</head>
<body class="bg-slate-900 min-h-screen text-slate-100 p-6">
  <div class="max-w-6xl mx-auto space-y-6">
    
    <!-- Top Header Bar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
      <div class="flex items-center gap-4">
        <div class="w-12 h-12 bg-teal-600 rounded-2xl flex items-center justify-center font-bold text-white text-xl">
          PH
        </div>
        <div>
          <h1 class="text-2xl font-extrabold text-white">PhysioHome Admin Portal</h1>
          <p class="text-xs text-slate-400">Manage Doctors, Patient Booking Queries & MySQL Database</p>
        </div>
      </div>
      
      <div class="flex items-center gap-3">
        <a href="<?php echo site_url('admin/doctor-form.php'); ?>" class="px-5 py-2.5 bg-gradient-to-r from-teal-500 to-sky-500 hover:from-teal-600 hover:to-sky-600 text-white font-bold rounded-xl text-xs shadow-md transition-all">
          + Add New Doctor
        </a>
        <a href="<?php echo site_url('admin/bookings.php'); ?>" class="px-4 py-2.5 bg-sky-600 hover:bg-sky-500 text-white font-bold rounded-xl text-xs relative">
          Manage Bookings
          <?php if ($pending_count > 0): ?>
            <span class="absolute -top-1.5 -right-1.5 px-2 py-0.5 bg-amber-500 text-slate-900 font-extrabold text-[10px] rounded-full">
              <?php echo $pending_count; ?>
            </span>
          <?php endif; ?>
        </a>
        <a href="<?php echo site_url(''); ?>" target="_blank" class="px-4 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 font-semibold rounded-xl text-xs transition-colors">
          View Website ↗
        </a>
        <a href="<?php echo site_url('admin/logout.php'); ?>" class="px-3.5 py-2.5 bg-red-500/20 text-red-300 hover:bg-red-500/30 font-semibold rounded-xl text-xs transition-colors">
          Logout
        </a>
      </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 space-y-1">
        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Active Doctors</span>
        <div class="text-3xl font-extrabold text-white"><?php echo count($doctors); ?> Doctors</div>
        <div class="text-xs text-teal-400 font-medium">MySQL & JSON Synced</div>
      </div>
      <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 space-y-1">
        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Patient Queries</span>
        <div class="text-3xl font-extrabold text-white"><?php echo count($appointments); ?> Requests</div>
        <div class="text-xs text-sky-400 font-medium"><?php echo $pending_count; ?> Pending Approval</div>
      </div>
      <div class="bg-slate-800 p-6 rounded-3xl border border-slate-700 space-y-1">
        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">MySQL Database</span>
        <div class="text-2xl font-extrabold text-emerald-400">`physio_db`</div>
        <div class="text-xs text-slate-400 font-medium">Export: <a href="<?php echo site_url('database.sql'); ?>" target="_blank" class="underline text-teal-300 font-bold">database.sql</a></div>
      </div>
    </div>

    <?php if ($message): ?>
      <div class="p-4 bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 rounded-2xl text-xs font-bold">
        ✓ <?php echo htmlspecialchars($message); ?>
      </div>
    <?php endif; ?>

    <!-- Doctors Table -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 p-6 shadow-xl space-y-4">
      <div class="flex items-center justify-between border-b border-slate-700 pb-4">
        <h2 class="text-lg font-bold text-white">Active Physiotherapist Profiles (<?php echo count($doctors); ?>)</h2>
        <span class="text-xs text-slate-400">All profiles are automatically SEO-indexed with Schema.org markup</span>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-300">
          <thead class="bg-slate-900 text-slate-400 uppercase tracking-wider text-[11px]">
            <tr>
              <th class="p-3.5 rounded-l-xl">Doctor Photo & Name</th>
              <th class="p-3.5">Qualifications & University</th>
              <th class="p-3.5">Experience</th>
              <th class="p-3.5">Visit Fee</th>
              <th class="p-3.5 rounded-r-xl text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-700/60 font-medium">
            <?php foreach ($doctors as $dr): ?>
              <tr class="hover:bg-slate-700/30 transition-colors">
                <td class="p-3.5 flex items-center gap-3">
                  <?php if (!empty($dr['image'])): ?>
                    <img src="<?php echo site_url('uploads/doctors/' . $dr['image']); ?>" alt="<?php echo htmlspecialchars($dr['name']); ?>" class="w-10 h-10 rounded-xl object-cover border border-slate-600 shrink-0">
                  <?php else: ?>
                    <div class="w-10 h-10 rounded-xl bg-teal-600/30 text-teal-300 font-bold flex items-center justify-center text-xs shrink-0">
                      <?php 
                        $parts = explode(' ', $dr['name']);
                        echo htmlspecialchars(substr($parts[0] ?? '', 0, 1) . substr($parts[1] ?? '', 0, 1));
                      ?>
                    </div>
                  <?php endif; ?>
                  <div>
                    <strong class="text-white text-sm block"><?php echo htmlspecialchars($dr['name']); ?></strong>
                    <span class="text-teal-400 text-xs"><?php echo htmlspecialchars($dr['title']); ?></span>
                  </div>
                </td>
                <td class="p-3.5 max-w-xs text-slate-300">
                  <?php echo htmlspecialchars($dr['degrees']); ?>
                </td>
                <td class="p-3.5 text-slate-300">
                  <?php echo htmlspecialchars($dr['experience']); ?>
                </td>
                <td class="p-3.5 font-bold text-emerald-400">
                  <?php echo htmlspecialchars($dr['fee']); ?>
                </td>
                <td class="p-3.5 text-right space-x-2">
                  <a href="<?php echo site_url('physiotherapists/' . $dr['slug'] . '/'); ?>" target="_blank" class="px-2.5 py-1 bg-slate-700 text-sky-300 hover:bg-slate-600 rounded-lg">SEO Page ↗</a>
                  <a href="<?php echo site_url('admin/doctor-form.php?slug=' . $dr['slug']); ?>" class="px-2.5 py-1 bg-teal-600 text-white hover:bg-teal-500 rounded-lg">Edit / Upload Photo</a>
                  <a href="<?php echo site_url('admin/doctor-form.php?action=delete&slug=' . $dr['slug']); ?>" onclick="return confirm('Are you sure you want to delete this doctor profile?');" class="px-2.5 py-1 bg-red-600 text-white hover:bg-red-500 rounded-lg">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>
