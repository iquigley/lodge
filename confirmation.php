<?php
session_start();

// Prevent direct access without having submitted the form
if (empty($_SESSION['form_submitted'])) {
    header('Location: /contact');
    exit;
}
unset($_SESSION['form_submitted']);

$page_title       = 'Inquiry Received | Guilford Lodge #656';
$page_description = 'Thank you for your interest in Guilford Lodge #656. A brother will be in touch with you soon.';
$page_canonical   = '/confirmation';
$page_active      = '';
require 'includes/header.php';
?>

<div class="pattern-bg" style="min-height:100vh;display:flex;flex-direction:column;justify-content:center;padding:8rem 1rem 4rem;">
    <div class="container">
        <div class="confirmation-card">

            <img class="confirmation-icon" src="/images/logo.png" alt="Guilford Lodge #656 emblem" width="80" height="80">

            <p class="section-label">Inquiry Received</p>
            <h1 style="font-size:clamp(1.75rem,4vw,2.5rem);" class="mb-3">
                So Mote It Be
            </h1>

            <p style="color:var(--cream);font-size:1.1rem;max-width:440px;margin:0 auto 1rem;">
                Your message has been received by Guilford Lodge #656.
            </p>
            <p style="max-width:460px;margin:0 auto 2.5rem;">
                A brother will reach out to you personally, typically within a few business days.
                We look forward to speaking with you about the Craft and what membership in
                our lodge can mean for your life.
            </p>

            <hr class="gold-divider" style="max-width:320px;margin:0 auto 2rem;">

            <div class="row g-3 justify-content-center text-start" style="max-width:440px;margin:0 auto 2.5rem;">
                <div class="col-12">
                    <p class="section-label mb-2">What Happens Next</p>
                    <ul class="list-unstyled" style="color:var(--cream-muted);font-size:0.9rem;">
                        <li class="mb-2">
                            <i class="bi bi-envelope-check-fill text-gold me-2"></i>
                            A confirmation email has been sent to the address you provided.
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone-fill text-gold me-2"></i>
                            A brother will contact you to answer questions and introduce himself.
                        </li>
                        <li>
                            <i class="bi bi-door-open-fill text-gold me-2"></i>
                            You may be invited to an open lodge dinner to meet the brethren.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="/" class="btn btn-gold">Return Home</a>
                <a href="/history" class="btn btn-outline-gold">Read Our History</a>
            </div>

        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
