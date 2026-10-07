<?php
session_start();
require_once __DIR__ . '/../config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Default admin credentials (username: admin, password: admin123)
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: " . site_url('admin/index.php'));
        exit;
    } else {
        $error = 'Invalid username or password. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login | PhysioHome Lahore</title>
  <script src="https://www.gstatic.com/antigravity/web/dev/tailwindcss.min.js"></script>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4 text-slate-100">
  <div class="bg-slate-800 border border-slate-700 rounded-3xl p-8 max-w-md w-full shadow-2xl space-y-6">
    <div class="text-center space-y-2">
      <div class="w-12 h-12 bg-teal-600 rounded-2xl flex items-center justify-center font-bold text-white text-xl mx-auto">
        PH
      </div>
      <h1 class="text-2xl font-bold text-white">PhysioHome Admin Portal</h1>
      <p class="text-xs text-slate-400">Sign in to manage physiotherapist profiles & SEO settings</p>
    </div>

    <?php if ($error): ?>
      <div class="p-3 bg-red-500/20 border border-red-500/40 text-red-300 rounded-xl text-xs font-semibold text-center">
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1">Username</label>
        <input type="text" name="username" required value="admin" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
      </div>
      <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1">Password</label>
        <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-teal-500">
      </div>
      <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-teal-500 to-sky-500 hover:from-teal-600 hover:to-sky-600 text-white font-bold rounded-xl text-sm transition-all shadow-lg">
        Log In to Dashboard
      </button>
    </form>

    <div class="text-center text-xs text-slate-500 pt-2 border-t border-slate-700">
      Default Credentials: <code class="bg-slate-900 px-1.5 py-0.5 rounded text-teal-400">admin / admin123</code>
    </div>
  </div>
</body>
</html>
