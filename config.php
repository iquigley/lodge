<?php
// SendGrid API key — set via environment variable in production
define('SENDGRID_API_KEY', getenv('SENDGRID_API_KEY') ?: 'YOUR_SENDGRID_API_KEY_HERE');

// Lodge contact details
define('LODGE_RECIPIENT_EMAIL', 'secretary@guilford656.org');
define('LODGE_RECIPIENT_NAME',  'Guilford Lodge #656 Secretary');
define('FROM_EMAIL',            'noreply@guilford656.org');
define('FROM_NAME',             'Guilford Lodge #656 Website');

define('SITE_URL', 'https://guilford656.org');
define('SITE_NAME', 'Guilford Lodge #656');
