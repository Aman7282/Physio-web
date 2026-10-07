<?php
session_start();
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/data.php';

if (empty($_SESSION['admin_logged_in'])) {
    header("Location: " . site_url('admin/login.php'));
    exit;
}

// Handle Status Update
if (isset($_POST['update_status'])) {
    $appt_id = intval($_POST['appointment_id'] ?? 0);
    $new_status = trim($_POST['status'] ?? 'Pending');
    if ($appt_id > 0) {
        update_appointment_status($appt_id, $new_status);
    }
}

$appointments = get_all_appointments();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Booking Queries | PhysioHome Admin</title>
  <script src="https://www.gstatic.com/antigravity/web/dev/tailwindcss.min.js"></script>
</head>
<body class="bg-slate-900 min-h-screen text-slate-100 p-6">
  <div class="max-w-7xl mx-auto space-y-6">

    <!-- Header Navigation -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-slate-800 p-6 rounded-3xl border border-slate-700 shadow-xl">
      <div class="flex items-center gap-4">
        <div class="w-12 h-12 bg-teal-600 rounded-2xl flex items-center justify-center font-bold text-white text-xl">
          PH
        </div>
        <div>
          <h1 class="text-2xl font-extrabold text-white">Patient Appointment Queries</h1>
          <p class="text-xs text-slate-400">View and update live home visit booking requests</p>
        </div>
      </div>
      
      <div class="flex items-center gap-3">
        <a href="<?php echo site_url('admin/index.php'); ?>" class="px-4 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 font-semibold rounded-xl text-xs">
          ← Doctors Management
        </a>
        <a href="<?php echo site_url('admin/logout.php'); ?>" class="px-3.5 py-2.5 bg-red-500/20 text-red-300 hover:bg-red-500/30 font-semibold rounded-xl text-xs">
          Logout
        </a>
      </div>
    </div>

    <!-- Booking Requests List -->
    <div class="bg-slate-800 rounded-3xl border border-slate-700 p-6 shadow-xl space-y-4">
      <div class="flex items-center justify-between border-b border-slate-700 pb-4">
        <h2 class="text-lg font-bold text-white">Patient Home Visit Requests (<?php echo count($appointments); ?>)</h2>
        <span class="text-xs text-slate-400">Real-time MySQL queries submitted from website</span>
      </div>

      <?php if (empty($appointments)): ?>
        <div class="p-12 text-center text-slate-400 text-sm">
          No patient booking queries found yet. Submit a test booking at <a href="<?php echo site_url('book-home-visit/'); ?>" target="_blank" class="text-teal-400 font-bold underline">/book-home-visit/</a>.
        </div>
      <?php else: ?>
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs text-slate-300">
            <thead class="bg-slate-900 text-slate-400 uppercase tracking-wider text-[11px]">
              <tr>
                <th class="p-3.5 rounded-l-xl">ID / Date</th>
                <th class="p-3.5">Patient Details</th>
                <th class="p-3.5">Requested Service</th>
                <th class="p-3.5">Address & Location</th>
                <th class="p-3.5">Preferred Slot</th>
                <th class="p-3.5">Status</th>
                <th class="p-3.5 rounded-r-xl text-right">Update Status</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/60 font-medium">
              <?php foreach ($appointments as $app): ?>
                <tr class="hover:bg-slate-700/30 transition-colors">
                  <td class="p-3.5 space-y-0.5">
                    <span class="font-bold text-white">#<?php echo $app['id']; ?></span>
                    <span class="text-[11px] text-slate-400 block"><?php echo date('d M Y, h:i A', strtotime($app['created_at'])); ?></span>
                  </td>
                  <td class="p-3.5">
                    <strong class="text-white text-sm block"><?php echo htmlspecialchars($app['patient_name']); ?></strong>
                    <a href="tel:<?php echo htmlspecialchars($app['phone']); ?>" class="text-teal-400 font-bold hover:underline"><?php echo htmlspecialchars($app['phone']); ?></a>
                  </td>
                  <td class="p-3.5 space-y-0.5">
                    <span class="px-2 py-0.5 rounded bg-teal-500/20 text-teal-300 text-[11px] font-bold block w-max">
                      <?php echo htmlspecialchars($app['service_slug']); ?>
                    </span>
                    <?php if (!empty($app['therapist_slug'])): ?>
                      <span class="text-[11px] text-slate-400">Doctor: <?php echo htmlspecialchars($app['therapist_slug']); ?></span>
                    <?php endif; ?>
                  </td>
                  <td class="p-3.5 max-w-xs text-slate-300">
                    <div class="font-bold text-slate-200"><?php echo htmlspecialchars($app['location_slug']); ?></div>
                    <div class="text-[11px] text-slate-400 truncate"><?php echo htmlspecialchars($app['address']); ?></div>
                  </td>
                  <td class="p-3.5">
                    <div class="font-bold text-slate-200"><?php echo htmlspecialchars($app['preferred_date']); ?></div>
                    <div class="text-[11px] text-slate-400"><?php echo htmlspecialchars($app['preferred_time']); ?></div>
                  </td>
                  <td class="p-3.5">
                    <?php 
                      $status = $app['status'];
                      $color = 'bg-amber-500/20 text-amber-300 border-amber-500/40';
                      if ($status === 'Confirmed') $color = 'bg-sky-500/20 text-sky-300 border-sky-500/40';
                      if ($status === 'Completed') $color = 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40';
                      if ($status === 'Cancelled') $color = 'bg-red-500/20 text-red-300 border-red-500/40';
                    ?>
                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold border <?php echo $color; ?>">
                      <?php echo htmlspecialchars($status); ?>
                    </span>
                  </td>
                  <td class="p-3.5 text-right">
                    <form method="POST" class="inline-flex items-center gap-2">
                      <input type="hidden" name="appointment_id" value="<?php echo $app['id']; ?>">
                      <select name="status" class="bg-slate-900 border border-slate-700 text-xs rounded-lg px-2 py-1 text-white focus:outline-none">
                        <option value="Pending" <?php echo ($status === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Confirmed" <?php echo ($status === 'Confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                        <option value="Completed" <?php echo ($status === 'Completed') ? 'selected' : ''; ?>>Completed</option>
                        <option value="Cancelled" <?php echo ($status === 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                      </select>
                      <button type="submit" name="update_status" class="px-2.5 py-1 bg-teal-600 hover:bg-teal-500 text-white font-bold rounded-lg text-xs">
                        Save
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

  </div>
</body>
</html>
