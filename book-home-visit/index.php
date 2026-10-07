<?php
$page_title = "Book a Home Physiotherapy Visit in Lahore | Online Appointment";
$page_meta_desc = "Request a home physiotherapy visit in Lahore online. Select your service, preferred doctor, date/time slot, and address across DHA, Johar Town & Gulberg.";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/breadcrumbs.php';

$pre_service = $_GET['service'] ?? 'back-neck-pain';
$pre_therapist = $_GET['therapist'] ?? '';
$pre_location = $_GET['location'] ?? 'dha';

$booking_success = false;
$saved_data = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_name = trim($_POST['patient_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $service_slug = trim($_POST['service_slug'] ?? 'back-neck-pain');
    $therapist_slug = trim($_POST['therapist_slug'] ?? '');
    $location_slug = trim($_POST['location_slug'] ?? 'dha');
    $address = trim($_POST['address'] ?? '');
    $preferred_date = trim($_POST['preferred_date'] ?? date('Y-m-d'));
    $preferred_time = trim($_POST['preferred_time'] ?? 'Morning (9:00 AM - 12:00 PM)');
    $symptoms_notes = trim($_POST['symptoms_notes'] ?? '');

    if (!empty($patient_name) && !empty($phone) && !empty($address)) {
        $saved_data = [
            'patient_name' => $patient_name,
            'phone' => $phone,
            'service_slug' => $service_slug,
            'therapist_slug' => $therapist_slug,
            'location_slug' => $location_slug,
            'address' => $address,
            'preferred_date' => $preferred_date,
            'preferred_time' => $preferred_time,
            'symptoms_notes' => $symptoms_notes
        ];

        save_appointment($saved_data);
        $booking_success = true;
    }
}
?>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([['name' => 'Book Home Visit']]); ?>

  <div class="text-center max-w-2xl mx-auto mb-10">
    <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Request a Home Physiotherapy Visit</h1>
    <p class="text-slate-600 text-sm">Fill out the quick appointment form below. Our clinical coordinator will call you back within 15 minutes to confirm details.</p>
  </div>

  <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-xl">
    <form method="POST" class="space-y-6">
      
      <!-- Service & Therapist Selection -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Select Service Required *</label>
          <select name="service_slug" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
            <?php foreach ($services as $svc): ?>
              <option value="<?php echo $svc['slug']; ?>" <?php echo ($svc['slug'] === $pre_service) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($svc['title']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Preferred Therapist (Optional)</label>
          <select name="therapist_slug" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
            <option value="">Any Available Certified Doctor</option>
            <?php foreach ($physiotherapists as $dr): ?>
              <option value="<?php echo $dr['slug']; ?>" <?php echo ($dr['slug'] === $pre_therapist) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($dr['name'] . ' (' . $dr['gender'] . ')'); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Location & Address -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Lahore Area / Zone *</label>
          <select name="location_slug" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
            <?php foreach ($locations as $loc): ?>
              <option value="<?php echo $loc['slug']; ?>" <?php echo ($loc['slug'] === $pre_location) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($loc['name']); ?>
              </option>
            <?php endforeach; ?>
            <option value="other">Other Lahore Neighborhood</option>
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Complete Home Address *</label>
          <input type="text" name="address" required placeholder="House #, Street #, Sector / Phase" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
        </div>
      </div>

      <!-- Date & Time Slot -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Preferred Date *</label>
          <input type="date" name="preferred_date" required value="<?php echo date('Y-m-d'); ?>" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Preferred Time Slot *</label>
          <select name="preferred_time" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
            <option value="Morning (9:00 AM - 12:00 PM)">Morning (9:00 AM - 12:00 PM)</option>
            <option value="Afternoon (12:00 PM - 4:00 PM)">Afternoon (12:00 PM - 4:00 PM)</option>
            <option value="Evening (4:00 PM - 8:00 PM)">Evening (4:00 PM - 8:00 PM)</option>
          </select>
        </div>
      </div>

      <!-- Patient Contact Info -->
      <div class="border-t border-slate-100 pt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Patient Full Name *</label>
          <input type="text" name="patient_name" required placeholder="e.g. Muhammad Ali" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Phone Number (WhatsApp) *</label>
          <input type="tel" name="phone" required placeholder="0309 7282547" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none">
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Brief Medical Symptoms / Condition Notes</label>
        <textarea name="symptoms_notes" rows="3" placeholder="e.g. Total knee replacement done 5 days ago, severe back sciatica pain..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-teal-500 focus:outline-none"></textarea>
      </div>

      <div class="pt-4">
        <button type="submit" class="w-full py-4 bg-gradient-to-r from-teal-600 to-sky-600 hover:from-teal-700 hover:to-sky-700 text-white font-extrabold text-base rounded-2xl shadow-xl transition-all">
          Submit Booking Request & Confirm
        </button>
      </div>

    </form>
  </div>
</div>

<?php if ($booking_success && $saved_data): ?>
  <!-- Confirmation Modal Overlay -->
  <div id="bookingSuccessModal" class="fixed inset-0 z-50 bg-slate-900/70 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-8 max-w-md w-full shadow-2xl space-y-6 text-center">
      <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-3xl font-bold">
        ✓
      </div>
      <h2 class="text-2xl font-extrabold text-slate-900">Visit Request Submitted!</h2>
      <p class="text-slate-600 text-sm leading-relaxed">
        Thank you! Your home visit request has been logged into our database. Our clinical coordinator will call your WhatsApp number shortly to confirm your therapist.
      </p>
      <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 text-xs text-left text-slate-700 space-y-1">
        <div><strong>Patient:</strong> <?php echo htmlspecialchars($saved_data['patient_name']); ?></div>
        <div><strong>Service:</strong> <?php echo htmlspecialchars($saved_data['service_slug']); ?></div>
        <div><strong>Date & Slot:</strong> <?php echo htmlspecialchars($saved_data['preferred_date']); ?> (<?php echo htmlspecialchars($saved_data['preferred_time']); ?>)</div>
        <div><strong>Address:</strong> <?php echo htmlspecialchars($saved_data['address']); ?></div>
        <div><strong>Contact:</strong> <?php echo htmlspecialchars($saved_data['phone']); ?></div>
      </div>
      <a href="<?php echo site_url(''); ?>" class="w-full py-3 bg-slate-900 text-white font-bold rounded-xl text-sm block hover:bg-slate-800">
        Return to Home
      </a>
    </div>
  </div>
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
