<?php
// Expected variables in scope:
//   $first_name  — recipient's first name
//   $full_name   — recipient's full name
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You — Guilford Lodge #656</title>
</head>
<body style="margin:0;padding:0;background-color:#f0ece2;font-family:Georgia,'Times New Roman',serif;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0ece2;padding:32px 16px;">
<tr><td align="center">

  <!-- ── Outer container ────────────────────────────────────────── -->
  <table role="presentation" width="600" cellpadding="0" cellspacing="0"
         style="max-width:600px;width:100%;border:1px solid #d4b86a;border-radius:4px;overflow:hidden;">

    <!-- ── Header ─────────────────────────────────────────────── -->
    <tr>
      <td align="center" style="background-color:#0d1220;padding:36px 32px 28px;">
        <img src="https://guilford656.org/images/logo.png"
             alt="Guilford Lodge #656"
             width="70" height="70"
             style="display:block;margin:0 auto 16px;">
        <div style="font-family:Georgia,serif;font-size:22px;font-weight:bold;color:#e8e0d0;letter-spacing:0.02em;">
          Guilford Lodge #656
        </div>
        <div style="font-size:11px;letter-spacing:0.18em;text-transform:uppercase;color:#c9a227;margin-top:6px;">
          Ancient Free &amp; Accepted Masons &nbsp;&middot;&nbsp; Est. 1923
        </div>
      </td>
    </tr>

    <!-- ── Gold rule ──────────────────────────────────────────── -->
    <tr>
      <td style="background:linear-gradient(90deg,#0d1220,#c9a227,#0d1220);height:2px;font-size:0;line-height:0;">&nbsp;</td>
    </tr>

    <!-- ── Body ───────────────────────────────────────────────── -->
    <tr>
      <td style="background-color:#ffffff;padding:40px 40px 32px;">

        <p style="margin:0 0 8px;font-size:13px;letter-spacing:0.15em;text-transform:uppercase;color:#c9a227;">
          Inquiry Received
        </p>

        <h1 style="margin:0 0 24px;font-size:26px;color:#0d1220;line-height:1.2;">
          Dear <?= htmlspecialchars($first_name) ?>,
        </h1>

        <p style="margin:0 0 18px;font-size:15px;color:#333333;line-height:1.7;">
          Thank you for reaching out to <strong>Guilford Lodge #656</strong>. Your inquiry has been
          received and a brother of our lodge will be in touch with you personally, typically
          within a few business days.
        </p>

        <p style="margin:0 0 32px;font-size:15px;color:#555555;line-height:1.7;">
          We are glad you took this step. The door of Freemasonry is always open to men
          of good character, and we look forward to speaking with you.
        </p>

        <!-- ── Divider ─────────────────────────────────────────── -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:32px;">
          <tr>
            <td style="border-top:1px solid #e8dfc8;font-size:0;line-height:0;">&nbsp;</td>
          </tr>
        </table>

        <!-- ── What happens next ───────────────────────────────── -->
        <p style="margin:0 0 16px;font-size:12px;letter-spacing:0.15em;text-transform:uppercase;color:#c9a227;">
          What Happens Next
        </p>

        <!-- Step 1 -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:16px;">
          <tr>
            <td width="36" valign="top" style="padding-top:2px;">
              <div style="width:28px;height:28px;background-color:#0d1220;border-radius:50%;text-align:center;
                          line-height:28px;font-size:13px;font-weight:bold;color:#c9a227;font-family:Georgia,serif;">
                1
              </div>
            </td>
            <td style="padding-left:12px;">
              <p style="margin:0;font-size:14px;color:#333333;line-height:1.6;">
                <strong style="color:#0d1220;">A brother will contact you</strong> — typically by email or phone —
                to answer any questions and introduce himself.
              </p>
            </td>
          </tr>
        </table>

        <!-- Step 2 -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:16px;">
          <tr>
            <td width="36" valign="top" style="padding-top:2px;">
              <div style="width:28px;height:28px;background-color:#0d1220;border-radius:50%;text-align:center;
                          line-height:28px;font-size:13px;font-weight:bold;color:#c9a227;font-family:Georgia,serif;">
                2
              </div>
            </td>
            <td style="padding-left:12px;">
              <p style="margin:0;font-size:14px;color:#333333;line-height:1.6;">
                <strong style="color:#0d1220;">You may be invited</strong> to attend a lodge dinner or open
                event so you can meet the brethren in a relaxed setting.
              </p>
            </td>
          </tr>
        </table>

        <!-- Step 3 -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:16px;">
          <tr>
            <td width="36" valign="top" style="padding-top:2px;">
              <div style="width:28px;height:28px;background-color:#0d1220;border-radius:50%;text-align:center;
                          line-height:28px;font-size:13px;font-weight:bold;color:#c9a227;font-family:Georgia,serif;">
                3
              </div>
            </td>
            <td style="padding-left:12px;">
              <p style="margin:0;font-size:14px;color:#333333;line-height:1.6;">
                <strong style="color:#0d1220;">If you decide to join, a formal petition</strong> and background process follows,
                handled with full confidentiality. Please note there is a petition fee required.
              </p>
            </td>
          </tr>
        </table>

        <!-- Step 4 -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:36px;">
          <tr>
            <td width="36" valign="top" style="padding-top:2px;">
              <div style="width:28px;height:28px;background-color:#0d1220;border-radius:50%;text-align:center;
                          line-height:28px;font-size:13px;font-weight:bold;color:#c9a227;font-family:Georgia,serif;">
                4
              </div>
            </td>
            <td style="padding-left:12px;">
              <p style="margin:0;font-size:14px;color:#333333;line-height:1.6;">
                <strong style="color:#0d1220;">Upon a favorable ballot</strong>, you will be scheduled
                to receive the first Masonic degree and take your place as a brother.
              </p>
            </td>
          </tr>
        </table>

        <!-- ── Quote ──────────────────────────────────────────── -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
               style="border-left:3px solid #c9a227;margin-bottom:36px;">
          <tr>
            <td style="padding:12px 16px;">
              <p style="margin:0 0 8px;font-style:italic;font-size:15px;color:#333333;line-height:1.6;">
                &ldquo;We meet upon the level, we part upon the square.&rdquo;
              </p>
              <p style="margin:0;font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:#c9a227;">
                Ancient Masonic Charge
              </p>
            </td>
          </tr>
        </table>

        <p style="margin:0;font-size:14px;color:#555555;line-height:1.7;">
          If you have any immediate questions, feel free to reply to this email or write to us
          directly at
          <a href="mailto:guilford656@gmail.com" style="color:#c9a227;text-decoration:none;">
            guilford656@gmail.com
          </a>, or call/text our lodge secretary, <?= LODGE_SECRETARY; ?>, at <?= CONTACT_PHONE; ?>.
        </p>

      </td>
    </tr>

    <!-- ── Gold rule ──────────────────────────────────────────── -->
    <tr>
      <td style="background:linear-gradient(90deg,#0d1220,#c9a227,#0d1220);height:2px;font-size:0;line-height:0;">&nbsp;</td>
    </tr>

    <!-- ── Footer ─────────────────────────────────────────────── -->
    <tr>
      <td align="center" style="background-color:#0d1220;padding:24px 32px;">
        <p style="margin:0 0 6px;font-size:13px;color:#e8e0d0;font-weight:bold;">
          Guilford Lodge #656, A.F. &amp; A.M.
        </p>
        <p style="margin:0 0 4px;font-size:12px;color:#8a8070;">
          426 West Market Street &nbsp;&middot;&nbsp; Greensboro, NC 27401
        </p>
        <p style="margin:0 0 16px;font-size:12px;color:#8a8070;">
          Meets 1st &amp; 3rd Monday &nbsp;&middot;&nbsp; 7:00 p.m.
        </p>
        <p style="margin:0;font-size:11px;color:#4a4535;">
          You are receiving this email because you submitted an inquiry on
          <a href="https://guilford656.org" style="color:#4a4535;">guilford656.org</a>.
        </p>
      </td>
    </tr>

  </table>
  <!-- /Outer container -->

</td></tr>
</table>

</body>
</html>
