<?php
require 'config.php';

$page_title       = 'Contact &amp; Petition to Join | Guilford Lodge #656';
$page_description = 'Interested in joining Guilford Lodge #656? Contact us or submit a petition of interest. We welcome all men of good character who seek light in Freemasonry.';
$page_canonical   = '/contact';
$page_active      = 'contact';

// ── Form processing ──────────────────────────────────────────────────────────
$errors   = [];
$success  = false;
$old      = [];

// CSRF token
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF check
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        $errors[] = 'Security token mismatch. Please refresh and try again.';
    } else {

        // Sanitize & collect
        $old = [
            'first_name' => trim(htmlspecialchars($_POST['first_name']  ?? '')),
            'last_name'  => trim(htmlspecialchars($_POST['last_name']   ?? '')),
            'email'      => trim(htmlspecialchars($_POST['email']       ?? '')),
            'phone'      => trim(htmlspecialchars($_POST['phone']       ?? '')),
            'city_state' => trim(htmlspecialchars($_POST['city_state']  ?? '')),
            'age'        => trim(htmlspecialchars($_POST['age']         ?? '')),
            'referral'   => trim(htmlspecialchars($_POST['referral']    ?? '')),
            'message'    => trim(htmlspecialchars($_POST['message']     ?? '')),
        ];

        // Validate
        if (empty($old['first_name'])) $errors[] = 'First name is required.';
        if (empty($old['last_name']))  $errors[] = 'Last name is required.';

        if (empty($old['email'])) {
            $errors[] = 'Email address is required.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }

        if (empty($old['city_state'])) $errors[] = 'City and state are required.';
        if (empty($old['referral']))   $errors[] = 'Please tell us how you heard about us.';
        if (empty($old['message']))    $errors[] = 'Please include a message or question.';

        $age = (int) $old['age'];
        if ($age <= 0) {
            $errors[] = 'Age is required.';
        } elseif ($age < 18) {
            $errors[] = 'Petitioners must be at least 18 years of age.';
        }

        // Send email if no errors
        if (empty($errors)) {

            $full_name = $old['first_name'] . ' ' . $old['last_name'];
            $reply_to  = $_POST['email'];

            $boundary = md5(uniqid(strval(time()), true));

            $headers  = "From: " . FROM_NAME . " <" . FROM_EMAIL . ">\r\n";
            $headers .= "Reply-To: {$full_name} <{$reply_to}>\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/alternative; boundary=\"{$boundary}\"\r\n";

            $body_plain = "New Petition of Interest — Guilford Lodge #656\r\n\r\n"
                . "Name:       {$full_name}\r\n"
                . "Email:      {$reply_to}\r\n"
                . "Phone:      " . ($old['phone'] ?: 'Not provided') . "\r\n"
                . "City/State: {$old['city_state']}\r\n"
                . "Age:        {$old['age']}\r\n"
                . "How heard:  {$old['referral']}\r\n\r\n"
                . "Message:\r\n{$old['message']}\r\n\r\n"
                . "Submitted: " . date('F j, Y \a\t g:i a');

            $body_html = "<html><body style='font-family:sans-serif;color:#222;'>
<h2 style='color:#7a5c00;'>New Petition of Interest — Guilford Lodge #656</h2>
<table cellpadding='8' style='border-collapse:collapse;width:100%;max-width:580px;'>
  <tr><td style='border-bottom:1px solid #eee;font-weight:bold;width:160px;'>Name</td><td style='border-bottom:1px solid #eee;'>" . htmlspecialchars($full_name) . "</td></tr>
  <tr><td style='border-bottom:1px solid #eee;font-weight:bold;'>Email</td><td style='border-bottom:1px solid #eee;'>" . htmlspecialchars($reply_to) . "</td></tr>
  <tr><td style='border-bottom:1px solid #eee;font-weight:bold;'>Phone</td><td style='border-bottom:1px solid #eee;'>" . (empty($old['phone']) ? '<em>Not provided</em>' : htmlspecialchars($old['phone'])) . "</td></tr>
  <tr><td style='border-bottom:1px solid #eee;font-weight:bold;'>City / State</td><td style='border-bottom:1px solid #eee;'>" . htmlspecialchars($old['city_state']) . "</td></tr>
  <tr><td style='border-bottom:1px solid #eee;font-weight:bold;'>Age</td><td style='border-bottom:1px solid #eee;'>" . htmlspecialchars($old['age']) . "</td></tr>
  <tr><td style='border-bottom:1px solid #eee;font-weight:bold;'>How heard</td><td style='border-bottom:1px solid #eee;'>" . htmlspecialchars($old['referral']) . "</td></tr>
  <tr><td style='font-weight:bold;vertical-align:top;padding-top:12px;'>Message</td><td style='padding-top:12px;'>" . nl2br(htmlspecialchars($old['message'])) . "</td></tr>
</table>
<p style='margin-top:24px;font-size:0.85em;color:#888;'>Submitted via guilford656.org on " . date('F j, Y \a\t g:i a') . "</p>
</body></html>";

            $body  = "--{$boundary}\r\n";
            $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
            $body .= $body_plain . "\r\n";
            $body .= "--{$boundary}\r\n";
            $body .= "Content-Type: text/html; charset=UTF-8\r\n\r\n";
            $body .= $body_html . "\r\n";
            $body .= "--{$boundary}--";

            $subject = "Petition of Interest: {$full_name}";

            if (mail(LODGE_RECIPIENT_EMAIL, $subject, $body, $headers)) {
                $_SESSION['csrf_token']    = bin2hex(random_bytes(32));
                $_SESSION['form_submitted'] = true;
                header('Location: /confirmation');
                exit;
            } else {
                $errors[] = 'There was a problem sending your message. Please email us directly at ' . LODGE_RECIPIENT_EMAIL . '.';
            }
        }
    }
}

require 'includes/header.php';
?>

<!-- ── Page Hero ─────────────────────────────────────────────────────────── -->
<header class="page-hero pattern-bg" style="padding-top:9rem;padding-bottom:4rem;--page-bg:url('/images/banner04.jpg');">
    <div class="container text-center">
        <p class="section-label">Seek the Light</p>
        <h1>Petition to Join</h1>
        <p class="section-intro mx-auto mt-3">
            If you feel the call of the Craft, we invite you to reach out. Fill out the form below
            and a brother of Guilford Lodge #656 will contact you personally.
        </p>
    </div>
</header>

<main class="section section-dark pattern-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <!-- Error display -->
                <?php if (!empty($errors)): ?>
                    <div class="alert-danger-custom" role="alert">
                        <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Please correct the following:</strong>
                        <ul class="mb-0 mt-2 ps-3">
                            <?php foreach ($errors as $err): ?>
                                <li><?= $err ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="form-card">
                    <h2 class="mb-1" style="font-size:1.5rem;">Your Information</h2>
                    <p style="font-size:0.9rem;margin-bottom:2rem;">
                        All fields marked <span class="text-gold">*</span> are required.
                        Your information is kept strictly confidential.
                    </p>

                    <form method="POST" action="/contact" novalidate>
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                        <!-- Name -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="first_name" class="form-label">First Name <span class="text-gold">*</span></label>
                                <input type="text"
                                       class="form-control"
                                       id="first_name"
                                       name="first_name"
                                       value="<?= $old['first_name'] ?? '' ?>"
                                       autocomplete="given-name"
                                       required>
                            </div>
                            <div class="col-sm-6">
                                <label for="last_name" class="form-label">Last Name <span class="text-gold">*</span></label>
                                <input type="text"
                                       class="form-control"
                                       id="last_name"
                                       name="last_name"
                                       value="<?= $old['last_name'] ?? '' ?>"
                                       autocomplete="family-name"
                                       required>
                            </div>
                        </div>

                        <!-- Email & Phone -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-7">
                                <label for="email" class="form-label">Email Address <span class="text-gold">*</span></label>
                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       value="<?= $old['email'] ?? '' ?>"
                                       autocomplete="email"
                                       required>
                            </div>
                            <div class="col-sm-5">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel"
                                       class="form-control"
                                       id="phone"
                                       name="phone"
                                       value="<?= $old['phone'] ?? '' ?>"
                                       autocomplete="tel"
                                       placeholder="Optional">
                            </div>
                        </div>

                        <!-- City/State & Age -->
                        <div class="row g-3 mb-3">
                            <div class="col-sm-7">
                                <label for="city_state" class="form-label">City &amp; State <span class="text-gold">*</span></label>
                                <input type="text"
                                       class="form-control"
                                       id="city_state"
                                       name="city_state"
                                       value="<?= $old['city_state'] ?? '' ?>"
                                       placeholder="e.g. Greensboro, NC"
                                       required>
                            </div>
                            <div class="col-sm-5">
                                <label for="age" class="form-label">Your Age <span class="text-gold">*</span></label>
                                <input type="number"
                                       class="form-control"
                                       id="age"
                                       name="age"
                                       value="<?= $old['age'] ?? '' ?>"
                                       min="18"
                                       max="120"
                                       required>
                                <div class="form-text">Must be 18 or older.</div>
                            </div>
                        </div>

                        <!-- Referral -->
                        <div class="mb-3">
                            <label for="referral" class="form-label">How did you hear about us? <span class="text-gold">*</span></label>
                            <select class="form-select" id="referral" name="referral" required>
                                <option value="" disabled <?= empty($old['referral']) ? 'selected' : '' ?>>Select an option…</option>
                                <option value="Friend or Family Member"        <?= ($old['referral'] ?? '') === 'Friend or Family Member'        ? 'selected' : '' ?>>Friend or Family Member</option>
                                <option value="Current or Former Mason"        <?= ($old['referral'] ?? '') === 'Current or Former Mason'        ? 'selected' : '' ?>>A Current or Former Mason</option>
                                <option value="Internet Search"                <?= ($old['referral'] ?? '') === 'Internet Search'                ? 'selected' : '' ?>>Internet Search</option>
                                <option value="Social Media"                   <?= ($old['referral'] ?? '') === 'Social Media'                   ? 'selected' : '' ?>>Social Media</option>
                                <option value="Community Event"                <?= ($old['referral'] ?? '') === 'Community Event'                ? 'selected' : '' ?>>Community Event</option>
                                <option value="News or Publication"            <?= ($old['referral'] ?? '') === 'News or Publication'            ? 'selected' : '' ?>>News Article or Publication</option>
                                <option value="Book or Documentary"            <?= ($old['referral'] ?? '') === 'Book or Documentary'            ? 'selected' : '' ?>>Book or Documentary</option>
                                <option value="Other"                          <?= ($old['referral'] ?? '') === 'Other'                          ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="mb-4">
                            <label for="message" class="form-label">Your Message or Questions <span class="text-gold">*</span></label>
                            <textarea class="form-control"
                                      id="message"
                                      name="message"
                                      rows="5"
                                      placeholder="Tell us a little about yourself and what draws you to Freemasonry…"
                                      required><?= $old['message'] ?? '' ?></textarea>
                        </div>

                        <!-- Consent notice -->
                        <p style="font-size:0.8rem;color:var(--cream-muted);margin-bottom:1.5rem;">
                            <i class="bi bi-lock-fill text-gold me-1"></i>
                            Your information is confidential and will only be used to follow up regarding
                            Guilford Lodge #656. We do not sell or share personal information.
                        </p>

                        <button type="submit" class="btn btn-gold w-100" style="padding:0.9rem;">
                            <i class="bi bi-send-fill me-2"></i>Send My Inquiry
                        </button>
                    </form>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 offset-lg-1 mt-5 mt-lg-0">
                <div class="mb-4">
                    <p class="section-label">What to Expect</p>
                    <h3 style="font-size:1.25rem;" class="mb-3">After You Submit</h3>
                    <ul class="list-unstyled" style="color:var(--cream-muted);font-size:0.95rem;">
                        <li class="mb-3">
                            <i class="bi bi-1-circle-fill text-gold me-2"></i>
                            A brother from our lodge will reach out to you, typically within a few days.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-2-circle-fill text-gold me-2"></i>
                            You may be invited to attend a lodge dinner or open event to meet the brothers.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-3-circle-fill text-gold me-2"></i>
                            A formal petition and background process follows — handled with full confidentiality.
                        </li>
                        <li>
                            <i class="bi bi-4-circle-fill text-gold me-2"></i>
                            Upon a favorable ballot, you will be scheduled to receive the first Masonic degree.
                        </li>
                    </ul>
                </div>

                <hr class="gold-divider">

                <div>
                    <p class="section-label">Direct Contact</p>
                    <p style="color:var(--cream-muted);font-size:0.9rem;">
                        Prefer to write directly? You may reach the lodge secretary at:
                    </p>
                    <a href="mailto:guilford656@gmail.com" class="text-gold" style="word-break:break-all;">
                        guilford656@gmail.com
                    </a>
                    <p class="mt-3" style="color:var(--cream-muted);font-size:0.9rem;">
                        <i class="bi bi-geo-alt-fill text-gold me-1"></i>
                        Masonic Temple, 426 W. Market Street,<br>Greensboro, NC 27401
                    </p>
                    <p style="color:var(--cream-muted);font-size:0.9rem;">
                        <i class="bi bi-calendar-event text-gold me-1"></i>
                        Meets 1st &amp; 3rd Monday, 7:30 p.m.
                    </p>
                </div>
            </div>

        </div>
    </div>
</main>

<?php require 'includes/footer.php'; ?>
