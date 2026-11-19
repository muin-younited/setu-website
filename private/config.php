<?php
// =====================================================================
//  SETU Digital Solutions – website settings
//  Contact number / email badalna ho toh SIRF yahi file edit karein.
// =====================================================================
return [

    'contact' => [
        // Website pe dikhne wala number (jaise likhna ho waise)
        'phone'      => '+91 [YOUR NUMBER]',
        // Call button ke liye: + aur digits, bina space ke (jaise +919876543210)
        'phone_link' => '+91XXXXXXXXXX',
        // WhatsApp: country code ke saath, sirf digits, bina + ke (jaise 919876543210)
        'whatsapp'   => '91XXXXXXXXXX',
        'email'      => 'setuinfo09@gmail.com',
        'address'    => 'Lucknow, Uttar Pradesh, India',
        'days'       => 'Monday – Saturday',
        'hours'      => '10:00 AM – 7:00 PM',
        // Social Media Links (apne page ke links yahan daalein)
        'facebook'   => 'https://www.facebook.com/',
        'instagram'  => 'https://www.instagram.com/',
        'linkedin'   => 'https://www.linkedin.com/',
        'youtube'    => 'https://www.youtube.com/@setu7501',
    ],

    // Enquiries ka database (web root ke bahar, taaki koi download na kar sake)
    'db_path' => __DIR__ . '/data/enquiries.sqlite',

    // Admin page (/admin/) ka password HASH.
    // Banane ke liye VPS pe chalayein:
    //   php -r "echo password_hash('APNA_PASSWORD', PASSWORD_DEFAULT), PHP_EOL;"
    // aur output yahan paste karein. Khali rahega toh admin login band rahega.
    'admin_password_hash' => '$2y$10$ru5LgpoGT0AprlzM95wUfOp3uA6P0lY2fFZyAobd7k1ByMfxnzVMu',

    // Nayi enquiry aane pe alert is email pe jayega. Khali = alert band.
    'notify_email' => 'crypticg13@gmail.com',

    // Gmail se alert bhejne ki setting (Gmail SMTP)
    // 'pass' mein Gmail ka APP PASSWORD daalein (normal Gmail password NAHI).
    // Google Account > Security > 2-Step Verification ON > App passwords > naya banayein.
    // Khali rahega toh enquiry save hogi, bas email alert nahi jayega.
    'smtp' => [
        'host'      => 'smtp.gmail.com',
        'port'      => 587,
        'secure'    => 'tls',
        'user'      => 'crypticg13@gmail.com',
        'pass'      => getenv('SETU_SMTP_PASS') ?: '',
        'from_name' => 'SETU Website',
    ],
];
