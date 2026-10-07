<?php
session_start();
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/data.php';

if (empty($_SESSION['admin_logged_in'])) {
    header("Location: " . site_url('admin/login.php'));
    exit;
}

// Handle Delete Request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['slug'])) {
    delete_doctor($_GET['slug']);
    header("Location: " . site_url('admin/index.php?deleted=1'));
    exit;
}

$slug = $_GET['slug'] ?? '';
$editing = false;
$dr = [
    'name' => '',
    'slug' => '',
    'title' => '',
    'degrees' => 'DPT (Sargodha Medical College)',
    'experience' => '3 Years Experience',
    'gender' => 'Male',
    'areas' => ['DHA', 'Johar Town', 'Gulberg', 'Model Town'],
    'rating' => '4.9 / 5.0',
    'reviews_count' => 100,
    'fee' => 'PKR 3,500',
    'bio' => '',
    'image' => '',
    'specialties' => [],
    'availability' => 'Mon - Sat (9:00 AM - 7:00 PM)',
    'registration' => 'PNC / PPA Reg # SMC-4010',
    'meta_title' => '',
    'meta_desc' => ''
];

if ($slug) {
    $found = get_doctor_by_slug($slug);
    if ($found) {
        $dr = array_merge($dr, $found);
        $editing = true;
    }
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $degrees = trim($_POST['degrees'] ?? '');
    $experience = trim($_POST['experience'] ?? '');
    $gender = trim($_POST['gender'] ?? 'Male');
    $fee = trim($_POST['fee'] ?? 'PKR 3,500');
    $bio = trim($_POST['bio'] ?? '');
    $availability = trim($_POST['availability'] ?? 'Mon - Sat (9:00 AM - 7:00 PM)');
    $registration = trim($_POST['registration'] ?? '');
    $meta_title = trim($_POST['meta_title'] ?? '');
    $meta_desc = trim($_POST['meta_desc'] ?? '');

    $specialties_raw = trim($_POST['specialties'] ?? '');
    $specialties = array_map('trim', explode(',', $specialties_raw));

    $areas_raw = trim($_POST['areas'] ?? 'DHA, Johar Town, Gulberg, Model Town');
    $areas = array_map('trim', explode(',', $areas_raw));

    $post_slug = trim($_POST['slug'] ?? '');
    if (empty($post_slug)) {
        $post_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }

    // Handle Doctor Profile Photo Upload
    $uploaded_image = $dr['image'] ?? '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed)) {
            $new_name = $post_slug . '-' . time() . '.' . $ext;
            $target_dir = __DIR__ . '/../uploads/doctors/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            if (move_uploaded_file($file_tmp, $target_dir . $new_name)) {
                $uploaded_image = $new_name;
            }
        }
    }

    if (empty($name) || empty($title) || empty($degrees)) {
        $error = 'Please fill in Doctor Name, Title, and Qualifications.';
    } else {
        $save_data = [
            'name' => $name,
            'slug' => $post_slug,
            'title' => $title,
            'degrees' => $degrees,
            'experience' => $experience,
            'gender' => $gender,
            'areas' => $areas,
            'rating' => $dr['rating'] ?? '4.9 / 5.0',
            'reviews_count' => $dr['reviews_count'] ?? 100,
            'fee' => $fee,
            'bio' => $bio,
            'image' => $uploaded_image,
            'specialties' => $specialties,
            'availability' => $availability,
            'registration' => $registration,
            'meta_title' => $meta_title ?: "$name - $title | Home Visit Physio Lahore",
            'meta_desc' => $meta_desc ?: "Book home physiotherapy visit with $name ($degrees). $experience serving Lahore."
        ];

        save_doctor($save_data);
        header("Location: " . site_url('admin/index.php?saved=1'));
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $editing ? 'Edit Doctor Profile' : 'Add New Doctor'; ?> | PhysioHome Admin</title>
  <script src="https://www.gstatic.com/antigravity/web/dev/tailwindcss.min.js"></script>
</head>
<body class="bg-slate-900 min-h-screen text-slate-100 p-6">
  <div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between bg-slate-800 p-6 rounded-3xl border border-slate-700">
      <div>
        <h1 class="text-2xl font-bold text-white"><?php echo $editing ? 'Edit Doctor Profile' : 'Add New Doctor Profile'; ?></h1>
        <p class="text-xs text-slate-400">Upload doctor photo & manage clinical profile in database</p>
      </div>
      <a href="<?php echo site_url('admin/index.php'); ?>" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-slate-200 font-semibold rounded-xl text-xs">
        ← Back to Dashboard
      </a>
    </div>

    <?php if ($error): ?>
      <div class="p-4 bg-red-500/20 border border-red-500/40 text-red-300 rounded-2xl text-xs font-bold">
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="bg-slate-800 p-8 rounded-3xl border border-slate-700 space-y-6">
      
      <!-- Doctor Profile Image Upload Field -->
      <div class="p-6 bg-slate-900/60 rounded-2xl border border-slate-700 flex flex-col sm:flex-row items-center gap-6">
        <?php if (!empty($dr['image'])): ?>
          <img src="<?php echo site_url('uploads/doctors/' . $dr['image']); ?>" alt="Profile Preview" class="w-24 h-24 rounded-2xl object-cover border border-slate-700 shrink-0">
        <?php else: ?>
          <div class="w-24 h-24 rounded-2xl bg-teal-600/30 text-teal-300 border border-teal-500/30 font-bold flex items-center justify-center text-xs text-center p-2 shrink-0">
            No Photo Uploaded
          </div>
        <?php endif; ?>

        <div class="space-y-2 flex-grow">
          <label class="block text-xs font-bold text-teal-400 uppercase tracking-wider">Upload Doctor Profile Photo (JPG, PNG, WEBP)</label>
          <input type="file" name="image" accept="image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-600 file:text-white hover:file:bg-teal-500 cursor-pointer">
          <p class="text-[11px] text-slate-500">Recommended size: Square 400x400px</p>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Doctor Full Name *</label>
          <input type="text" name="name" required value="<?php echo htmlspecialchars($dr['name']); ?>" placeholder="e.g. Dr. Muhammad Mubashir" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">URL Slug (e.g. dr-muhammad-mubashir)</label>
          <input type="text" name="slug" value="<?php echo htmlspecialchars($dr['slug']); ?>" placeholder="Leave blank to auto-generate" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Specialty Title / Headline *</label>
          <input type="text" name="title" required value="<?php echo htmlspecialchars($dr['title']); ?>" placeholder="e.g. Post-Operative & Surgery Rehabilitation Specialist" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Degrees & Qualifications *</label>
          <input type="text" name="degrees" required value="<?php echo htmlspecialchars($dr['degrees']); ?>" placeholder="e.g. DPT (Sargodha Medical College)" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Years of Experience</label>
          <input type="text" name="experience" value="<?php echo htmlspecialchars($dr['experience']); ?>" placeholder="e.g. 5 Years Experience" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Gender</label>
          <select name="gender" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
            <option value="Male" <?php echo ($dr['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($dr['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
          </select>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Visit Fee (e.g. PKR 3,500)</label>
          <input type="text" name="fee" value="<?php echo htmlspecialchars($dr['fee']); ?>" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Clinical Bio / Background Story</label>
        <textarea name="bio" rows="4" placeholder="Dr. Muhammad Mubashir completed his DPT at Sargodha Medical College..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500"><?php echo htmlspecialchars($dr['bio']); ?></textarea>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Specialties (Comma Separated)</label>
          <input type="text" name="specialties" value="<?php echo htmlspecialchars(is_array($dr['specialties']) ? implode(', ', $dr['specialties']) : $dr['specialties']); ?>" placeholder="Post-Surgery Rehab, TKR Care, Knee Stiffness" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Served Lahore Areas (Comma Separated)</label>
          <input type="text" name="areas" value="<?php echo htmlspecialchars(is_array($dr['areas']) ? implode(', ', $dr['areas']) : $dr['areas']); ?>" placeholder="DHA, Johar Town, Gulberg, Model Town" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Registration # (PNC / PPA Alignment)</label>
          <input type="text" name="registration" value="<?php echo htmlspecialchars($dr['registration']); ?>" placeholder="PNC / PPA Reg # SMC-4013" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Availability Schedule</label>
          <input type="text" name="availability" value="<?php echo htmlspecialchars($dr['availability']); ?>" placeholder="Mon - Sat (8:30 AM - 7:30 PM)" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>
      </div>

      <!-- SEO Optimization Section -->
      <div class="border-t border-slate-700 pt-6 space-y-4">
        <h3 class="text-sm font-bold text-teal-400 uppercase tracking-wider">SEO Page Optimization</h3>
        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Custom SEO Page Title</label>
          <input type="text" name="meta_title" value="<?php echo htmlspecialchars($dr['meta_title']); ?>" placeholder="Dr. Name - Specialty | Home Physio Lahore" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Custom SEO Meta Description</label>
          <textarea name="meta_desc" rows="2" placeholder="Book home physical therapy with Dr. Name (DPT Sargodha Medical College)..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500"><?php echo htmlspecialchars($dr['meta_desc']); ?></textarea>
        </div>
      </div>

      <div class="pt-4 flex items-center gap-4">
        <button type="submit" class="px-8 py-4 bg-gradient-to-r from-teal-500 to-sky-500 hover:from-teal-600 hover:to-sky-600 text-white font-bold text-sm rounded-xl shadow-lg transition-all">
          Save Doctor Profile & Publish SEO Page
        </button>
        <a href="<?php echo site_url('admin/index.php'); ?>" class="text-xs text-slate-400 hover:underline">Cancel</a>
      </div>

    </form>
  </div>
</body>
</html>
