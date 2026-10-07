<?php
// Centralized Data Store (MySQL Database Integration with JSON Fallback)
require_once __DIR__ . '/db.php';

$doctors_file = __DIR__ . '/../data/doctors.json';

// Fetch all doctors from MySQL (or JSON fallback)
function get_all_doctors() {
    global $doctors_file;
    $db = get_db();
    
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM doctors ORDER BY id ASC");
            $rows = $stmt->fetchAll();
            if ($rows && count($rows) > 0) {
                $doctors = [];
                foreach ($rows as $row) {
                    // Convert specialties and areas back to array
                    $row['specialties'] = !empty($row['specialties']) ? array_map('trim', explode(',', $row['specialties'])) : [];
                    $row['areas'] = !empty($row['areas']) ? array_map('trim', explode(',', $row['areas'])) : [];
                    $doctors[$row['slug']] = $row;
                }
                return $doctors;
            }
        } catch (Exception $e) {
            // fallback below
        }
    }

    if (file_exists($doctors_file)) {
        $content = file_get_contents($doctors_file);
        $data = json_decode($content, true);
        if (is_array($data) && !empty($data)) {
            return $data;
        }
    }
    return [];
}

function get_doctor_by_slug($slug) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("SELECT * FROM doctors WHERE slug = ? LIMIT 1");
            $stmt->execute([$slug]);
            $row = $stmt->fetch();
            if ($row) {
                $row['specialties'] = !empty($row['specialties']) ? array_map('trim', explode(',', $row['specialties'])) : [];
                $row['areas'] = !empty($row['areas']) ? array_map('trim', explode(',', $row['areas'])) : [];
                return $row;
            }
        } catch (Exception $e) {}
    }

    $all = get_all_doctors();
    return isset($all[$slug]) ? $all[$slug] : null;
}

function save_doctor($doctor_data) {
    global $doctors_file;
    
    // Normalize slug
    if (empty($doctor_data['slug'])) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $doctor_data['name'])));
        $doctor_data['slug'] = $slug;
    } else {
        $slug = $doctor_data['slug'];
    }

    $specialties_str = is_array($doctor_data['specialties'] ?? '') ? implode(', ', $doctor_data['specialties']) : ($doctor_data['specialties'] ?? '');
    $areas_str = is_array($doctor_data['areas'] ?? '') ? implode(', ', $doctor_data['areas']) : ($doctor_data['areas'] ?? '');

    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("
                INSERT INTO doctors 
                (name, slug, title, degrees, experience, gender, areas, rating, reviews_count, fee, bio, image, specialties, availability, registration, meta_title, meta_desc)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                name=VALUES(name), title=VALUES(title), degrees=VALUES(degrees), experience=VALUES(experience),
                gender=VALUES(gender), areas=VALUES(areas), fee=VALUES(fee), bio=VALUES(bio),
                image=IFNULL(VALUES(image), image), specialties=VALUES(specialties), availability=VALUES(availability),
                registration=VALUES(registration), meta_title=VALUES(meta_title), meta_desc=VALUES(meta_desc)
            ");
            $stmt->execute([
                $doctor_data['name'],
                $slug,
                $doctor_data['title'],
                $doctor_data['degrees'],
                $doctor_data['experience'] ?? '3 Years Experience',
                $doctor_data['gender'] ?? 'Male',
                $areas_str,
                $doctor_data['rating'] ?? '4.9 / 5.0',
                $doctor_data['reviews_count'] ?? 100,
                $doctor_data['fee'] ?? 'PKR 3,500',
                $doctor_data['bio'] ?? '',
                $doctor_data['image'] ?? null,
                $specialties_str,
                $doctor_data['availability'] ?? 'Mon - Sat (9:00 AM - 7:00 PM)',
                $doctor_data['registration'] ?? '',
                $doctor_data['meta_title'] ?? '',
                $doctor_data['meta_desc'] ?? ''
            ]);
        } catch (Exception $e) {}
    }

    // Sync to JSON
    $all = get_all_doctors();
    $all[$slug] = $doctor_data;
    file_put_contents($doctors_file, json_encode($all, JSON_PRETTY_PRINT));

    // Automatically create/update physical directory & index.php for 100% clean SEO static route
    $doc_dir = __DIR__ . '/../physiotherapists/' . $slug;
    if (!file_exists($doc_dir)) {
        mkdir($doc_dir, 0777, true);
    }

    $file_content = '<?php
require_once __DIR__ . \'/../../includes/data.php\';
$doc_key = \'' . addslashes($slug) . '\';
$dr = get_doctor_by_slug($doc_key);
if (!$dr) {
    header("Location: " . site_url("physiotherapists/"));
    exit;
}
$page_title = (!empty($dr[\'meta_title\'])) ? $dr[\'meta_title\'] : $dr[\'name\'] . " - " . $dr[\'title\'] . " | CareStride Lahore";
$page_meta_desc = (!empty($dr[\'meta_desc\'])) ? $dr[\'meta_desc\'] : "Book a home visit with " . $dr[\'name\'] . " (" . $dr[\'degrees\'] . "). " . $dr[\'experience\'] . " serving Lahore.";
require_once __DIR__ . \'/../../includes/header.php\';
require_once __DIR__ . \'/../../includes/breadcrumbs.php\';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <?php echo render_breadcrumbs([
    [\'name\' => \'Our Doctors\', \'link\' => \'physiotherapists/\'],
    [\'name\' => $dr[\'name\']]
  ]); ?>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    <div class="lg:col-span-8 space-y-8">
      <div class="bg-white rounded-3xl p-8 border border-sky-100 shadow-sm flex flex-col sm:flex-row gap-6 items-start">
        <?php if (!empty($dr[\'image\'])): ?>
          <img src="<?php echo site_url(\'uploads/doctors/\' . $dr[\'image\']); ?>" alt="<?php echo htmlspecialchars($dr[\'name\']); ?>" class="w-36 h-36 rounded-2xl object-cover border border-sky-200 shrink-0 shadow-md">
        <?php else: ?>
          <div class="w-36 h-36 rounded-2xl bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-4xl flex items-center justify-center shrink-0 shadow-md">
            <?php 
              $parts = explode(\' \', $dr[\'name\']);
              echo htmlspecialchars(substr($parts[0] ?? \'\', 0, 1) . substr($parts[1] ?? \'\', 0, 1));
            ?>
          </div>
        <?php endif; ?>

        <div class="space-y-3 flex-grow">
          <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-sky-50 text-sky-700 text-xs font-semibold border border-sky-200">
            ✓ <?php echo htmlspecialchars($dr[\'registration\'] ?? \'PNC / PMDC Verified DPT Doctor\'); ?>
          </div>
          <h1 class="text-3xl font-extrabold text-slate-900"><?php echo htmlspecialchars($dr[\'name\']); ?></h1>
          <p class="text-sm font-bold text-sky-600"><?php echo htmlspecialchars($dr[\'title\']); ?></p>
          <p class="text-xs text-slate-500 font-medium"><?php echo htmlspecialchars($dr[\'degrees\']); ?> • <?php echo htmlspecialchars($dr[\'experience\']); ?></p>
          
          <div class="flex flex-wrap items-center gap-4 text-xs text-slate-600 pt-2 border-t border-slate-100">
            <div>⭐ <strong class="text-slate-900"><?php echo htmlspecialchars($dr[\'rating\'] ?? \'4.9 / 5.0\'); ?></strong> (<?php echo $dr[\'reviews_count\'] ?? 100; ?> patient reviews)</div>
            <div>📍 Serves: <strong class="text-slate-900"><?php echo htmlspecialchars(is_array($dr[\'areas\']) ? implode(\', \', $dr[\'areas\']) : $dr[\'areas\']); ?></strong></div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-3xl p-7 border border-sky-100 shadow-sm space-y-4">
        <h2 class="text-xl font-bold text-slate-900">Clinical Background & Qualifications</h2>
        <p class="text-slate-600 text-sm leading-relaxed"><?php echo htmlspecialchars($dr[\'bio\']); ?></p>
      </div>

      <?php if (!empty($dr[\'specialties\'])): ?>
        <div class="bg-sky-50/50 rounded-3xl p-7 border border-sky-100 space-y-4">
          <h2 class="text-xl font-bold text-slate-900">Specialized Clinical Expertise</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs text-slate-700 font-medium">
            <?php 
              $specs = is_array($dr[\'specialties\']) ? $dr[\'specialties\'] : explode(\',\', $dr[\'specialties\']);
              foreach ($specs as $sp): 
            ?>
              <div class="p-3.5 bg-white rounded-2xl border border-sky-100 shadow-xs flex items-center gap-2">
                <svg class="w-4 h-4 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                <span><?php echo htmlspecialchars(trim($sp)); ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

    </div>

    <div class="lg:col-span-4">
      <div class="bg-white rounded-3xl p-7 border border-sky-100 shadow-xl sticky top-28 space-y-6">
        <div>
          <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">In-Home Visit Fee</span>
          <div class="text-3xl font-extrabold text-sky-600"><?php echo htmlspecialchars($dr[\'fee\']); ?></div>
          <div class="text-xs text-slate-500 mt-1">Availability: <?php echo htmlspecialchars($dr[\'availability\'] ?? \'Mon - Sat (9:00 AM - 7:00 PM)\'); ?></div>
        </div>

        <div class="border-t border-slate-100 pt-4 space-y-3 text-xs text-slate-600">
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Comprehensive Clinical Assessment
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Portable Ultrasound & TENS Equipment
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            CareStride Verified DPT Practitioner
          </div>
        </div>

        <a href="<?php echo site_url(\'book-home-visit/?therapist=\' . $dr[\'slug\']); ?>" class="w-full py-4 bg-gradient-to-r from-sky-500 to-blue-600 text-white font-extrabold text-center text-sm rounded-xl block shadow-md shadow-sky-500/20 hover:from-sky-600 hover:to-blue-700 transition-all">
          Book Visit with <?php echo htmlspecialchars(explode(\' \', $dr[\'name\'])[1] ?? $dr[\'name\']); ?>
        </a>

        <a href="<?php echo WHATSAPP_LINK; ?>?text=Hello,%20I%20want%20to%20book%20a%20home%20visit%20with%20<?php echo urlencode($dr[\'name\']); ?>" target="_blank" rel="noopener noreferrer" class="w-full py-3 bg-emerald-50 text-emerald-700 font-bold text-center text-xs rounded-xl block hover:bg-emerald-100 transition-colors">
          WhatsApp Direct Inquiry
        </a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . \'/../../includes/footer.php\'; ?>';

    file_put_contents($doc_dir . '/index.php', $file_content);
    return $slug;
}

function delete_doctor($slug) {
    global $doctors_file;
    
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM doctors WHERE slug = ?");
            $stmt->execute([$slug]);
        } catch (Exception $e) {}
    }

    $all = get_all_doctors();
    if (isset($all[$slug])) {
        unset($all[$slug]);
        file_put_contents($doctors_file, json_encode($all, JSON_PRETTY_PRINT));
        
        $doc_dir = __DIR__ . '/../physiotherapists/' . $slug;
        if (file_exists($doc_dir . '/index.php')) {
            unlink($doc_dir . '/index.php');
        }
        if (file_exists($doc_dir)) {
            @rmdir($doc_dir);
        }
        return true;
    }
    return false;
}

// Appointment / Booking Query Functions
function save_appointment($data) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("
                INSERT INTO appointments 
                (patient_name, phone, service_slug, therapist_slug, location_slug, address, preferred_date, preferred_time, symptoms_notes)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([
                $data['patient_name'],
                $data['phone'],
                $data['service_slug'],
                $data['therapist_slug'] ?? '',
                $data['location_slug'] ?? '',
                $data['address'],
                $data['preferred_date'],
                $data['preferred_time'],
                $data['symptoms_notes'] ?? ''
            ]);
            return $db->lastInsertId();
        } catch (Exception $e) {}
    }
    return false;
}

function get_all_appointments() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM appointments ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (Exception $e) {}
    }
    return [];
}

function update_appointment_status($id, $status) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("UPDATE appointments SET status = ? WHERE id = ?");
            return $stmt->execute([$status, $id]);
        } catch (Exception $e) {}
    }
    return false;
}

// Contact Inquiry Functions
function save_inquiry($data) {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->prepare("INSERT INTO inquiries (name, phone, message) VALUES (?, ?, ?)");
            return $stmt->execute([$data['name'], $data['phone'], $data['message']]);
        } catch (Exception $e) {}
    }
    return false;
}

function get_all_inquiries() {
    $db = get_db();
    if ($db) {
        try {
            $stmt = $db->query("SELECT * FROM inquiries ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (Exception $e) {}
    }
    return [];
}

// Global Reference
$physiotherapists = get_all_doctors();

$services = [
    'back-neck-pain' => [
        'title' => 'Back & Sciatica Nerve Pain',
        'slug' => 'back-neck-pain',
        'meta_description' => 'In-home physiotherapy for lower back pain, sciatica nerve radiation, neck stiffness, and pinched nerves in Lahore.',
        'summary' => 'Targeted in-home relief for lower back pain, sciatica nerve radiation, neck stiffness, and slipped disc.',
        'full_description' => 'Our back and sciatica pain program brings specialized spinal relief directly to your home. Whether you suffer from sharp sciatica nerve pain shooting down your leg, lower back stiffness, neck tightness, or cervical nerve pressure, our senior physiotherapists conduct thorough spinal assessments, apply electrotherapy (TENS and therapeutic ultrasound), and perform joint mobilization to relieve pain quickly.',
        'conditions' => [
            'Sciatica & Radiating Leg Nerve Pain',
            'Lower Back Pain & Disc Bulge / Slip',
            'Neck Stiffness & Cervical Spondylosis',
            'Postural Strain & Shoulder Blade Pain',
            'Spinal Joint Stiffness & Muscle Spasms'
        ],
        'treatment_includes' => [
            'Comprehensive 45-min In-Home Clinical Spinal Assessment',
            'Portable TENS & Ultrasound Therapy for Rapid Pain Relief',
            'Manual Joint Mobilization & Myofascial Release',
            'Personalized Ergonomic & Postural Re-education Plan',
            'Guided Lumbar Core & Cervical Strengthening Exercises'
        ],
        'fee' => 'PKR 3,500 - 4,000 / visit',
        'duration' => '45 - 60 Minutes'
    ],
    'frozen-shoulder' => [
        'title' => 'Frozen Shoulder & Arm Pain',
        'slug' => 'frozen-shoulder',
        'meta_description' => 'In-home physical therapy for frozen shoulder, stiff shoulder joint, arm pain, and rotator cuff stiffness in Lahore.',
        'summary' => 'Restoring full arm movement, reducing joint stiffness, and easing sharp pain in frozen shoulder.',
        'full_description' => 'Frozen shoulder (adhesive capsulitis) makes lifting your arm, dressing, or sleeping on your side painful and difficult. Our specialized in-home shoulder rehabilitation protocol gently mobilizes the shoulder capsule, stretches tight joint tissue, applies targeted heat and TENS therapy, and gradually restores pain-free overhead arm mobility.',
        'conditions' => [
            'Frozen Shoulder (Capsulitis & Severe Stiffness)',
            'Inability to Lift Arm Overhead or Reach Back',
            'Rotator Cuff Tendonitis & Shoulder Strain',
            'Night-time Shoulder Pain & Sleeping Discomfort',
            'Post-Trauma Shoulder Immobilization Stiffness'
        ],
        'treatment_includes' => [
            'Shoulder Joint ROM Assessment & Capsule Distraction',
            'Portable Ultrasound & Heat Therapy for Softening Joint Capsule',
            'Gentle Passive & Active-Assisted Range of Motion Exercises',
            'Rotator Cuff Muscle Stabilization Drills',
            'Home Exercise Plan for Daily Stiffness Prevention'
        ],
        'fee' => 'PKR 3,500 - 4,000 / visit',
        'duration' => '45 - 60 Minutes'
    ],
    'cp-child-rehabilitation' => [
        'title' => 'CP & Child Rehabilitation',
        'slug' => 'cp-child-rehabilitation',
        'meta_description' => 'Compassionate home pediatric physical therapy in Lahore for Cerebral Palsy (CP), delayed walking, and child physical development.',
        'summary' => 'Gentle home pediatric therapy for children with Cerebral Palsy (CP), delayed walking, and physical development support.',
        'full_description' => 'Cerebral Palsy (CP) and pediatric motor delays require patient, encouraging, and repetitive in-home therapy where the child feels comfortable. Our pediatric specialists work closely with parents to reduce muscle spasticity, train balance, improve standing and walking milestones, and build independent mobility through play-based physical exercise.',
        'conditions' => [
            'Cerebral Palsy (CP) Spasticity & Muscle Tightness',
            'Delayed Walking & Motor Milestone Delays',
            'Childhood Balance & Gait Abnormalities',
            'Congenital Clubfoot & Joint Stiffness',
            'Pediatric Muscular Weakness & Posture Alignment'
        ],
        'treatment_includes' => [
            'Pediatric Motor Milestone & Reflex Assessment',
            'Gentle Muscle Stretching & Spasticity Reduction',
            'Balance, Sitting & Standing Balance Training',
            'Gait & Walking Pattern Re-education with Play',
            'Parent & Caregiver Daily Handling Guidance'
        ],
        'fee' => 'PKR 4,000 / visit',
        'duration' => '45 - 60 Minutes'
    ],
    'post-surgery-rehabilitation' => [
        'title' => 'Post-Surgery & Fracture Care',
        'slug' => 'post-surgery-rehabilitation',
        'meta_description' => 'In-home post-op physical therapy in Lahore for Total Knee Replacement (TKR), Hip Replacement, bone fractures & surgical care.',
        'summary' => 'Safe post-op home recovery for knee/hip joint replacement, bone fracture healing, and surgical joint rehab.',
        'full_description' => 'Recovering from joint replacement or orthopedic surgery requires meticulous, early post-operative care at home. Our licensed physical therapists work directly with your surgeon\'s protocol to reduce surgical swelling, prevent DVT blood clots, guide walker-to-cane gait training, and safely rebuild joint strength.',
        'conditions' => [
            'Total Knee Replacement (TKR) Recovery',
            'Total Hip Replacement (THR) Recovery',
            'Bone Fracture Recovery & Post-Cast Stiffness',
            'ACL & Meniscus Arthroscopic Repair Rehab',
            'Rotator Cuff & Surgical Shoulder Recovery'
        ],
        'treatment_includes' => [
            'Surgical Wound & Scar Tissue Assessment',
            'Passive & Active Range of Motion (ROM) Mobilization',
            'Gait Training with Walker, Crutches, or Cane',
            'Cryotherapy & Swelling Reduction Techniques',
            'Surgeon-Aligned Progressive Load Exercise Schedule'
        ],
        'fee' => 'PKR 4,000 - 4,500 / visit',
        'duration' => '60 Minutes'
    ],
    'elderly-mobility' => [
        'title' => 'Knee & Joint Pain (Senior Care)',
        'slug' => 'elderly-mobility',
        'meta_description' => 'In-home senior physical therapy in Lahore. Knee pain relief, osteoarthritis care, walking confidence & fall prevention.',
        'summary' => 'Relief for knee arthritis, joint stiffness, senior walking confidence, and fall prevention.',
        'full_description' => 'Knee pain and joint arthritis shouldn\'t stop senior citizens from moving comfortably at home. Our senior joint care program strengthens leg muscles, lubricates stiff knee joint surfaces, trains balance, and removes fall risks in the home environment so elderly family members remain confident and independent.',
        'conditions' => [
            'Knee Osteoarthritis & Joint Wear',
            'Senior Muscle Weakness & Walking Difficulty',
            'Unsteady Balance & Frequent Fall Risk',
            'Hip Joint Stiffness & Movement Pain',
            'Post-Bedrest General Deconditioning'
        ],
        'treatment_includes' => [
            'In-Home Environmental Fall Risk Audit',
            'Targeted Proprioception & Dynamic Balance Drills',
            'Gentle Joint Distraction & Warm Moist Heat Therapy',
            'Sit-to-Stand & Stair Navigation Training',
            'Caregiver Guidance & Safe Handling Instructions'
        ],
        'fee' => 'PKR 3,500 / visit',
        'duration' => '45 Minutes'
    ],
    'sports-injury' => [
        'title' => 'Sports Injuries & Muscle Sprains',
        'slug' => 'sports-injury',
        'meta_description' => 'Expert sports physical therapy at home in Lahore. Muscle sprain recovery, hamstring strain, ligament torn rehab.',
        'summary' => 'Fast-track recovery for hamstring strains, ankle sprains, muscle tears, and sports injuries.',
        'full_description' => 'Whether you strained your hamstring during cricket, twisted an ankle in football, or suffer from tennis elbow, our sports physiotherapists help you recover rapidly at home. We combine electrotherapy, deep tissue friction, kinesio taping, and targeted muscle reconditioning.',
        'conditions' => [
            'Ankle & Knee Ligament Sprains',
            'Hamstring & Calf Muscle Strains',
            'Tennis & Golfer\'s Elbow Pain',
            'Muscle Spasms & Sudden Ligament Tears',
            'Groin Strain & Quadriceps Pulled Muscle'
        ],
        'treatment_includes' => [
            'Acute Soft Tissue Assessment & Kinesio Taping',
            'Deep Tissue & Myofascial Trigger Point Therapy',
            'High-Frequency Portable Therapeutic Ultrasound',
            'Eccentric Strength Training & Plyometric Prep',
            'Return-to-Sport Biomechanical Clearance'
        ],
        'fee' => 'PKR 4,000 / visit',
        'duration' => '50 Minutes'
    ],
    'stroke-rehabilitation' => [
        'title' => 'Stroke & Paralysis Recovery',
        'slug' => 'stroke-rehabilitation',
        'meta_description' => 'Dedicated in-home stroke neuro rehabilitation in Lahore. Paralysis recovery, spasticity reduction & walking practice.',
        'summary' => 'Dedicated neuro-rehab for stroke survivors, body side weakness (paralysis), nerve recovery, and walking practice.',
        'full_description' => 'Neurological stroke recovery demands early, repetitive, and task-specific movement practice in a calm home environment. Our neuro-physiotherapists use Bobath and PNF techniques to reduce muscle spasticity, reactivate weak limbs, restore arm/hand usage, and retrain safe walking.',
        'conditions' => [
            'Stroke Recovery (Ischemic & Hemorrhagic)',
            'Hemiplegia / Hemiparesis (One-sided Paralysis)',
            'Facial Nerve Palsy & Peripheral Nerve Injury',
            'Spinal Cord & Movement Coordination Care',
            'Neurological Stiffness & Gait Loss'
        ],
        'treatment_includes' => [
            'Neuro-Motor Re-education (Bobath / PNF Approach)',
            'Spasticity Reduction & Sustained Muscle Stretching',
            'Functional Daily Task Practice (Grasping, Standing)',
            'Neuromuscular Electrical Stimulation (NMES)',
            'Long-term Rehabilitation Roadmap & Milestones'
        ],
        'fee' => 'PKR 4,500 / visit',
        'duration' => '60 Minutes'
    ]
];

$locations = [
    'dha' => [
        'name' => 'DHA Lahore',
        'slug' => 'dha',
        'meta_description' => 'In-home physiotherapy in DHA Lahore (Phase 1, 2, 3, 4, 5, 6, 7, 8, 9 Town & Raya). Fast 45-min arrival with portable ultrasound & TENS.',
        'description' => 'Full home physiotherapy coverage across all DHA Phases (Phase 1, 2, 3, 4, 5, 6, 7, 8, 9 Town & Raya). Guaranteed physio arrival within 45 minutes of scheduled appointment.',
        'active_physios' => 14,
        'avg_response_time' => '40 - 45 Minutes',
        'neighborhoods' => ['Phase 1 to 5', 'Phase 6 & 7', 'Phase 8 & Raya', 'DHA Rahbar & Phase 9'],
        'local_highlights' => 'Dedicated mobile therapy vans equipped with Portable TENS, Ultrasound, and Rehabilitation Exercise Kits stationed near Phase 5 Commercial & Phase 6 Main Boulevard.'
    ],
    'johar-town' => [
        'name' => 'Johar Town',
        'slug' => 'johar-town',
        'meta_description' => 'Home physical therapy services in Johar Town Phase 1 & 2, Lahore. Doctor of Physical Therapy visits for back pain, stroke & post-op rehab.',
        'description' => 'Rapid home visit services covering Johar Town Phase 1, Phase 2, Emporium Mall area, Doctors Hospital vicinity, and PIA Housing Society.',
        'active_physios' => 12,
        'avg_response_time' => '35 - 40 Minutes',
        'neighborhoods' => ['Block A, B, C (Phase 1)', 'Block F, G, H, J, R (Phase 2)', 'PIA Society & Khayaban-e-Jinnah'],
        'local_highlights' => 'Central hub team located near Khayaban-e-Firdousi providing morning and evening home visits for post-op and senior patients.'
    ],
    'gulberg' => [
        'name' => 'Gulberg Lahore',
        'slug' => 'gulberg',
        'meta_description' => 'Certified home physiotherapy in Gulberg I, II, III, MM Alam & Main Boulevard. Sciatica pain relief, neck care & elderly mobility.',
        'description' => 'Comprehensive in-home clinical care for Gulberg I, II, III, Main Boulevard, MM Alam Road, and Liberty vicinity.',
        'active_physios' => 10,
        'avg_response_time' => '30 - 35 Minutes',
        'neighborhoods' => ['Gulberg II & III', 'Main Boulevard & MM Alam', 'Zafar Ali Road & Gurumangat'],
        'local_highlights' => 'Fast response for desk workers and elderly residents in central Gulberg suffering from acute back spasms, sciatica, or joint stiffness.'
    ],
    'model-town' => [
        'name' => 'Model Town & Garden Town',
        'slug' => 'model-town',
        'meta_description' => 'In-home physiotherapist visits in Model Town & Garden Town Lahore. Senior fall prevention, knee replacement recovery & spinal therapy.',
        'description' => 'In-home physical therapy services across Model Town (Blocks A-N), Garden Town, and New Garden Town.',
        'active_physios' => 8,
        'avg_response_time' => '40 Minutes',
        'neighborhoods' => ['Model Town Blocks A to M', 'Model Town Extension', 'Garden Town (Kalma Chowk Side)'],
        'local_highlights' => 'Tailored home mobility programs for senior citizens residing in Model Town\'s quiet residential sectors.'
    ]
];

$articles = [
    'managing-sciatica-at-home' => [
        'slug' => 'managing-sciatica-at-home',
        'title' => '5 Essential Daily Exercises for Sciatica Nerve Relief at Home',
        'category' => 'Spinal Health',
        'read_time' => '6 Min Read',
        'reviewed_by' => 'Dr. Ahmed Hassan, DPT',
        'summary' => 'Learn how targeted nerve flossing, piriformis stretches, and lumbar decompression exercises can ease sharp radiating leg pain safely at home.',
        'content' => '
            <p class="mb-4">Sciatica refers to pain that radiates along the path of the sciatic nerve, which branches from your lower back through your hips and buttocks and down each leg. Typically, sciatica affects only one side of your body and is caused by a herniated disc or bone spur compressing part of the nerve.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">1. Knee-to-Chest Stretch</h3>
            <p class="mb-4">Lie flat on your back on a firm mattress or exercise mat. Gently bend one knee toward your chest while keeping the opposite leg flat. Hold your knee with both hands for 20 to 30 seconds. Repeat 3 times on each side.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">2. Seated Piriformis Stretch</h3>
            <p class="mb-4">Sit upright in a supportive chair. Cross your affected leg over your opposite knee, forming a figure-4 shape. Slowly lean forward with a flat back until you feel a gentle stretch in your glute. Hold for 30 seconds.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">3. Sciatic Nerve Flossing</h3>
            <p class="mb-4">While seated, extend your affected knee straight out while lifting your chin up toward the ceiling. As you point your toes backward toward your body, gently lower your chin down. This glides the sciatic nerve smoothly through surrounding tissues without overstretching it.</p>
            <div class="bg-teal-50 border-l-4 border-teal-600 p-4 rounded-r-xl my-6">
              <strong class="text-teal-900 font-bold block mb-1">When to Seek Professional In-Home Help:</strong>
              <span class="text-teal-800 text-sm">If your nerve pain is accompanied by sudden weakness in your foot (\'foot drop\'), severe numbness, or loss of bowel/bladder control, request an immediate home clinical assessment.</span>
            </div>
        '
    ],
    'post-knee-replacement-timeline' => [
        'slug' => 'post-knee-replacement-timeline',
        'title' => 'What to Expect During Your 6-Week Total Knee Replacement Recovery at Home',
        'category' => 'Post-Op Recovery',
        'read_time' => '8 Min Read',
        'reviewed_by' => 'Dr. Usman Ali, DPT',
        'summary' => 'A week-by-week guide on pain management, joint flexion milestones, walker transition, and home safety post-knee surgery.',
        'content' => '
            <p class="mb-4">Undergoing a Total Knee Replacement (TKR) is a major step toward living a pain-free life. However, the success of the surgery depends heavily on the first 6 weeks of dedicated post-operative physical therapy.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">Week 1 - 2: Pain Control & Initial Flexion (0 to 90 degrees)</h3>
            <p class="mb-4">During the first fortnight after discharge, the focus is on controlling post-surgical edema (swelling), keeping the surgical incision clean, achieving full knee extension (straightening), and bending the knee to at least 90 degrees.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">Week 3 - 4: Transitioning Off Walker to Cane</h3>
            <p class="mb-4">As quadriceps strength improves through isometric quad sets and straight leg raises, your physical therapist will train you to walk with proper gait mechanics, transitioning from a walker to a single point cane.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">Week 5 - 6: Stair Climbing & Independent Mobility</h3>
            <p class="mb-4">By week 6, most patients reach 110-120 degrees of knee flexion, allowing them to climb stairs with an alternating foot pattern, drive safely (if right leg operated), and resume outdoor walks around their neighborhood.</p>
        '
    ],
    'fall-prevention-elderly-lahore' => [
        'slug' => 'fall-prevention-elderly-lahore',
        'title' => 'Senior Safety Guide: 7 Steps to Prevent Falls for Elderly Family Members',
        'category' => 'Geriatric Care',
        'read_time' => '5 Min Read',
        'reviewed_by' => 'Dr. Fatima Tariq, DPT',
        'summary' => 'Simple home modifications, footwear rules, and daily balance drills that reduce senior fall risk by over 70%.',
        'content' => '
            <p class="mb-4">Falls are the leading cause of accidental injury and hip fractures among adults aged 65 and above in Lahore. Fortunately, most home falls are completely preventable with proactive balance training and simple household adjustments.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">1. Remove Loose Rugs & Floor Mats</h3>
            <p class="mb-4">Loose carpets and slippery floor tiles are major hazards. Ensure all floor rugs have double-sided non-slip rug tape underneath or remove them from main walking hallways.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">2. Install Bathroom Grab Bars & Anti-Slip Mats</h3>
            <p class="mb-4">Wet bathroom tiles account for nearly 40% of senior falls. Install sturdy grab bars near the toilet and shower area, and use textured anti-slip rubber mats inside the shower area.</p>
            <h3 class="text-lg font-bold text-slate-900 mt-6 mb-3">3. Daily Tandem & Single-Leg Balance Drills</h3>
            <p class="mb-4">Practicing standing near a sturdy kitchen counter while holding on with one hand, lifting one foot for 15 seconds, builds critical ankle stability and brain-body spatial awareness.</p>
        '
    ]
];

$faqs_list = [
    [
        'q' => 'What equipment does the physiotherapist bring to my home?',
        'a' => 'Our physiotherapists carry mobile clinical equipment including digital dual-channel TENS machines, therapeutic ultrasound units, resistance bands, goniometers, and hot/cold therapy packs.'
    ],
    [
        'q' => 'Are female physiotherapists available for home visits?',
        'a' => 'Yes! We have qualified female Doctor of Physical Therapy (DPT) professionals available for female patients across DHA, Johar Town, Gulberg, Model Town, and all Lahore sectors.'
    ],
    [
        'q' => 'How much does a home physiotherapy visit cost in Lahore?',
        'a' => 'A single visit ranges from PKR 3,500 to PKR 4,500 depending on the specialized condition (Post-Op, Stroke, Sciatica). Discounted multi-session packages (6-session and 12-session) are available.'
    ],
    [
        'q' => 'How long does each physiotherapy session last?',
        'a' => 'Each home visit session lasts approximately 45 to 60 minutes of uninterrupted 1-on-1 care.'
    ],
    [
        'q' => 'Which areas in Lahore do you cover?',
        'a' => 'We serve DHA (Phases 1-9 & Raya), Johar Town, Gulberg, Model Town, Garden Town, Cantt, Askari, Bahria Town, Lake City, and surrounding neighborhoods.'
    ],
    [
        'q' => 'What is your cancellation policy?',
        'a' => 'Appointments can be rescheduled or cancelled free of charge up to 4 hours prior to the scheduled time.'
    ]
];
?>
