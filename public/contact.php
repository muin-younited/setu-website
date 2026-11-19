<?php
require __DIR__ . '/../private/layout.php';
$c = setu_site_config()['contact'];
$baseUrl = setu_base_url();

$defaultInterest = trim((string)($_GET['interest'] ?? ''));
$productParam    = trim((string)($_GET['product'] ?? ''));
$industryParam   = trim((string)($_GET['industry'] ?? ''));

$defaultMessage = '';
if ($productParam !== '') {
    $defaultMessage = 'Hello Setu team, we would like to request a demo for ' . $productParam . '.';
} elseif ($industryParam !== '') {
    $defaultMessage = 'Hello Setu team, we would like to enquire about your ' . $industryParam . ' Tally solution.';
}

setu_render_header([
    'active'       => 'contact',
    'path'         => 'contact.php',
    'title'        => 'Contact Us & Schedule a Demo | Setu Digital Solutions — Lucknow, India',
    'description'  => 'Get in touch with Setu Digital Solutions in Lucknow, Uttar Pradesh for Tally Prime customization, TDL development, ERP integration, SetuLink, eDocSuite, Setu AI, or a live product demo.',
    'keywords'     => 'Contact Setu Digital Solutions, Tally Customization Enquiry Lucknow, Book SetuLink Demo, Tally Support Phone Number Lucknow',
    'page_heading' => 'Contact Us',
    'page_sub'     => 'Have a question, custom requirement, or want to schedule a live product demonstration? Our team is ready to assist you.',
    'breadcrumb'   => 'Contact Us',
    'extra_schema' => [
        [
            '@type'       => 'ContactPage',
            '@id'         => $baseUrl . '/contact.php#contactpage',
            'url'         => $baseUrl . '/contact.php',
            'name'        => 'Contact Setu Digital Solutions',
            'mainEntity'  => ['@id' => $baseUrl . '/#organization'],
            'description' => 'Contact Setu Digital Solutions for Tally Prime customization, ERP integration, SetuLink, eDocSuite, Setu AI, and industry ERP demos.',
        ],
    ],
]);
?>

  <!-- Exclusive Contact & Enquiry Form Section -->
  <section id="contact" class="setu-contact-page">
    <style>
    .setu-contact-page{padding:64px 22px 0;background:linear-gradient(135deg,#f8fbff,#edf5ff);color:#142b49;font-family:'Times New Roman',Times,serif}
    .setu-contact-page *{box-sizing:border-box;font-family:'Times New Roman',Times,serif}
    .setu-contact-page .sc-container{max-width:1180px;margin:auto}
    .setu-contact-page .sc-main{display:grid;grid-template-columns:.8fr 1.2fr;gap:30px;align-items:start}
    .setu-contact-page .sc-info{padding:10px 8px}
    .setu-contact-page .sc-info-item{display:flex;gap:16px;padding:17px 0;border-bottom:1px solid #d5e2f0}
    .setu-contact-page .sc-icon{flex:0 0 54px;height:54px;border-radius:14px;background:#e0efff;color:#15518b;display:grid;place-items:center;font-size:24px}
    .setu-contact-page .sc-info-item strong{display:block;font-size:18px;margin-bottom:5px;color:#102f59}
    .setu-contact-page .sc-info-item p{margin:0;color:#465a72;line-height:1.55;overflow-wrap:anywhere;font-size:16px}
    .setu-contact-page .sc-card{background:#fff;border:1px solid #d3e1f0;border-radius:18px;padding:28px;box-shadow:0 12px 32px #12345b12}
    .setu-contact-page .sc-card h3{margin:0 0 20px;color:#102f59;font-size:25px}
    .setu-contact-page .sc-fields{display:grid;grid-template-columns:1fr 1fr;gap:0 18px}
    .setu-contact-page label{display:block;font-weight:700;font-size:15.5px;margin:13px 0 6px;color:#183555}
    .setu-contact-page input,.setu-contact-page textarea,.setu-contact-page select{width:100%;padding:12px;border:1px solid #bdcfe2;border-radius:9px;background:#fff;color:#182e48;font:inherit;font-size:16px}
    .setu-contact-page textarea{min-height:112px;resize:vertical}
    .setu-contact-page .sc-full{grid-column:1/-1}
    .setu-contact-page .sc-submit{width:100%;margin-top:18px;border:0;border-radius:10px;padding:14px;background:#123d70;color:white;font-weight:700;font-size:17px;cursor:pointer}
    .setu-contact-page .sc-submit:hover{background:#0b2c52}
    .setu-contact-page .sc-hp{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden}
    .setu-contact-page .sc-info-item a{color:#123d70;text-decoration:none;font-weight:700}
    .setu-contact-page .sc-status{margin:12px 0 0;font-weight:700;font-size:16px}
    .setu-contact-page .sc-status.ok{color:#0b6b33}
    .setu-contact-page .sc-status.err{color:#b3261e}
    .setu-contact-page .sc-submit:disabled{opacity:.6;cursor:wait}
    .setu-contact-page .sc-note{font-size:13.5px;color:#6a7b8e;line-height:1.5;margin:12px 0 0}
    .setu-contact-page .sc-bottom{display:grid;grid-template-columns:1.15fr .85fr;gap:22px;margin:24px 0 0;padding-bottom:42px}
    .setu-contact-page .sc-quick,.setu-contact-page .sc-actions{border-radius:16px;padding:22px;background:#e5f1ff}
    .setu-contact-page .sc-quick h3,.setu-contact-page .sc-actions h3{margin:0 0 15px;font-size:20px;color:#102f59}
    .setu-contact-page .sc-quick-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px}
    .setu-contact-page .sc-quick button{border:1px solid #b8d1ed;background:#fff;border-radius:10px;padding:14px 8px;color:#17375d;cursor:pointer;font-weight:700;font-size:15px;min-height:66px}
    .setu-contact-page .sc-action-buttons{display:flex;gap:12px;flex-wrap:wrap}
    .setu-contact-page .sc-action-buttons a{display:inline-flex;align-items:center;justify-content:center;text-decoration:none;border:1px solid #b7cde4;border-radius:10px;padding:13px 16px;background:#fff;color:#124c83;font-weight:700;font-size:15.5px}
    .setu-contact-page .sc-action-buttons a.whatsapp{color:#087b37;border-color:#a6d7b5}
    .setu-contact-page .sc-foot{background:#102f59;color:#fff;margin:0 -22px;padding:26px 22px}
    .setu-contact-page .sc-foot-inner{max-width:1180px;margin:auto;display:flex;justify-content:space-around;gap:20px;flex-wrap:wrap}
    .setu-contact-page .sc-foot strong{display:block;margin-bottom:5px;font-size:17px}
    .setu-contact-page .sc-foot span{font-size:14.5px;color:#dce8f7}
    @media(max-width:820px){.setu-contact-page .sc-main,.setu-contact-page .sc-bottom{grid-template-columns:1fr}.setu-contact-page .sc-quick-grid{grid-template-columns:repeat(2,1fr)}}
    @media(max-width:520px){.setu-contact-page{padding:42px 14px 0}.setu-contact-page .sc-card{padding:19px}.setu-contact-page .sc-fields{grid-template-columns:1fr}.setu-contact-page .sc-foot{margin:0 -14px}.setu-contact-page .sc-quick-grid{grid-template-columns:1fr 1fr}}
    </style>
    <div class="sc-container">
      <div class="sc-main">
        <aside class="sc-info">
          <div class="sc-info-item"><div class="sc-icon">☎</div><div><strong>Call / WhatsApp</strong><p><a href="tel:<?= h($c['phone_link']) ?>"><?= h($c['phone']) ?></a></p></div></div>
          <div class="sc-info-item"><div class="sc-icon">✉</div><div><strong>Email Us</strong><p><a href="mailto:<?= h($c['email']) ?>"><?= h($c['email']) ?></a></p></div></div>
          <div class="sc-info-item"><div class="sc-icon">⌖</div><div><strong>Our Office</strong><p>Setu Digital Solutions<br><?= h($c['address']) ?></p></div></div>
          <div class="sc-info-item"><div class="sc-icon">◷</div><div><strong>Working Hours</strong><p><?= h($c['days']) ?><br><?= h($c['hours']) ?></p></div></div>
        </aside>
        <div class="sc-card"><h3>✉ Send Us an Enquiry</h3>
          <form id="setuContactFullForm" method="post" action="api/enquiry.php">
            <div class="sc-fields">
              <div><label for="scFullName">Your Name *</label><input id="scFullName" name="name" required autocomplete="name" placeholder="Enter your name"></div>
              <div><label for="scFullMobile">Mobile Number *</label><input id="scFullMobile" name="mobile" required type="tel" pattern="[0-9+() -]{8,}" autocomplete="tel" placeholder="Enter mobile number"></div>
              <div><label for="scFullEmail">Email ID</label><input id="scFullEmail" name="email" type="email" autocomplete="email" placeholder="Enter email (optional)"></div>
              <div>
                <label for="scFullInterest">Interested In *</label>
                <select id="scFullInterest" name="interest" required>
                  <option value="">Select solution / service</option>
                  <?php
                  $opts = [
                      'Product Demo',
                      'Tally Customization / TDL Development',
                      'Tally Integration',
                      'Bulk SMS & WhatsApp (CPaaS)',
                      'Industry Solution',
                      'SetuLink / Digital Products',
                      'Website & Web Application',
                      'Support & Service',
                      'Other',
                  ];
                  foreach ($opts as $opt) {
                      $sel = ($defaultInterest === $opt) ? ' selected' : '';
                      echo '<option' . $sel . '>' . h($opt) . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="sc-full"><label for="scFullMessage">Your Message *</label><textarea id="scFullMessage" name="message" required placeholder="Tell us about your requirement, query or business use case"><?= h($defaultMessage) ?></textarea></div>
              <div class="sc-hp" aria-hidden="true"><label for="scWebsite">Website</label><input id="scWebsite" name="website" tabindex="-1" autocomplete="off"></div>
              <div class="sc-full"><label for="scDemoDate">Preferred Demo Date (optional)</label><input id="scDemoDate" name="demo_date" type="date"></div>
            </div><button class="sc-submit" type="submit">Submit Enquiry</button>
            <p class="sc-status" id="scStatus" role="status" aria-live="polite"></p>
            <p class="sc-note">We use your details only to respond to your enquiry.</p>
          </form>
        </div>
      </div>
      <div class="sc-bottom">
        <div class="sc-quick"><h3>Quick Enquiry For</h3><div class="sc-quick-grid">
          <button type="button" data-interest="Product Demo">▣ Product Demo</button><button type="button" data-interest="Tally Customization / TDL Development">⚙ Customization (TDL)</button><button type="button" data-interest="Industry Solution">▤ Industry Solution</button><button type="button" data-interest="Support &amp; Service">♧ Support &amp; Service</button>
        </div></div>
        <div class="sc-actions"><h3>You Can Also</h3><div class="sc-action-buttons"><a class="whatsapp" id="setuContactWhatsapp" href="https://wa.me/<?= h($c['whatsapp']) ?>?text=<?= rawurlencode('Hello Setu Digital Solutions, I have an enquiry.') ?>" target="_blank" rel="noopener noreferrer">☏ Chat on WhatsApp</a><a href="#scDemoDate" id="setuContactDemo">▦ Schedule a Demo</a></div></div>
      </div>
    </div>
    <div class="sc-foot"><div class="sc-foot-inner"><div><strong>Quick Response</strong><span>We aim to respond at the earliest.</span></div><div><strong>Solution Guidance</strong><span>Get guidance for your business requirements.</span></div><div><strong>Ongoing Support</strong><span>Support for smooth implementation and usage.</span></div></div></div>
    <script>
    (function(){
      const form = document.getElementById('setuContactFullForm');
      if (!form) return;
      const pageLoadedAt = Date.now();
      const COOLDOWN_MS = 60000;
      const interest = document.getElementById('scFullInterest');
      const nameInput = document.getElementById('scFullName');
      const msgInput = document.getElementById('scFullMessage');

      function sanitizeText(val, maxLen) {
        return String(val || '').replace(/<[^>]*>/g, '').trim().slice(0, maxLen);
      }

      // Support query params (?interest=...&product=...&industry=...) on static GitHub Pages builds
      const params = new URLSearchParams(window.location.search);
      const qInterest = sanitizeText(params.get('interest'), 100);
      const qProduct = sanitizeText(params.get('product'), 80);
      const qIndustry = sanitizeText(params.get('industry'), 80);
      if (qInterest && interest) {
        for (const opt of interest.options) {
          if (opt.value === qInterest || opt.text === qInterest) {
            interest.value = opt.value || opt.text;
            break;
          }
        }
      }
      if (msgInput && !msgInput.value.trim()) {
        if (qProduct) {
          msgInput.value = 'Hello Setu team, we would like to request a demo for ' + qProduct + '.';
        } else if (qIndustry) {
          msgInput.value = 'Hello Setu team, we would like to enquire about your ' + qIndustry + ' Tally solution.';
        }
      }

      document.querySelectorAll('.setu-contact-page [data-interest]').forEach(btn => {
        btn.addEventListener('click', () => {
          interest.value = btn.dataset.interest;
          nameInput.focus();
        });
      });

      const demoBtn = document.getElementById('setuContactDemo');
      if (demoBtn) {
        demoBtn.addEventListener('click', () => {
          interest.value = 'Product Demo';
          document.getElementById('scDemoDate').focus();
        });
      }

      const notifyEmail = <?= json_encode(setu_site_config()['notify_email'] ?: $c['email']) ?>;
      const status = document.getElementById('scStatus');
      const btn = form.querySelector('.sc-submit');

      async function sendViaStaticEmail(fd) {
        const cleanName = sanitizeText(fd.get('name'), 100);
        const cleanMobile = sanitizeText(fd.get('mobile'), 20);
        const cleanEmail = sanitizeText(fd.get('email'), 150);
        const cleanInterest = sanitizeText(fd.get('interest'), 100);
        const cleanDemo = sanitizeText(fd.get('demo_date'), 10);
        const cleanMsg = sanitizeText(fd.get('message'), 3000);
        const payload = {
          _subject: 'New SETU Website Enquiry – ' + cleanName + ' (' + cleanInterest + ')',
          _template: 'table',
          _honey: sanitizeText(fd.get('website'), 100),
          Name: cleanName,
          Mobile: cleanMobile,
          Email: cleanEmail || '-',
          Interested_In: cleanInterest,
          Preferred_Demo_Date: cleanDemo || '-',
          Message: cleanMsg
        };
        const res = await fetch('https://formsubmit.co/ajax/' + encodeURIComponent(notifyEmail), {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify(payload)
        });
        const out = await res.json().catch(() => ({}));
        if (res.ok && (out.success === 'true' || out.success === true)) {
          const refId = 'SETU-' + new Date().toISOString().slice(2,10).replace(/-/g,'') + '-' + Math.floor(1000 + Math.random() * 9000);
          return { ok: true, id: refId };
        }
        return { ok: false, error: out.message || 'Could not send right now. Please call or WhatsApp us.' };
      }

      form.addEventListener('submit', async e => {
        e.preventDefault();
        const fd = new FormData(form);

        // 1. Anti-bot honeypot & instant automated submit trap
        if (String(fd.get('website') || '').trim() !== '' || (Date.now() - pageLoadedAt) < 1500) {
          status.className = 'sc-status ok';
          status.textContent = 'Thank you! Your enquiry is received. Enquiry ID: SETU-0000.';
          form.reset();
          return;
        }

        // 2. Client-side rate limit (60s cooldown against spam flooding)
        try {
          const lastTs = parseInt(localStorage.getItem('setu_last_enquiry_ts') || '0', 10);
          if (lastTs && (Date.now() - lastTs) < COOLDOWN_MS) {
            const waitSec = Math.ceil((COOLDOWN_MS - (Date.now() - lastTs)) / 1000);
            status.className = 'sc-status err';
            status.textContent = 'Please wait ' + waitSec + 's before submitting another enquiry.';
            return;
          }
        } catch (_) {}

        // 3. Strict input validation
        const digits = String(fd.get('mobile') || '').replace(/\D/g, '');
        if (digits.length < 10 || digits.length > 13) {
          status.className = 'sc-status err';
          status.textContent = 'Please enter a valid 10-digit mobile number.';
          return;
        }

        status.className = 'sc-status';
        status.textContent = 'Sending…';
        btn.disabled = true;
        try {
          let result = null;
          // Try PHP backend first when hosted on a PHP server
          if (!window.location.hostname.endsWith('github.io')) {
            try {
              const res = await fetch(form.action, {
                method: 'POST',
                body: fd,
                headers: { 'Accept': 'application/json' }
              });
              const contentType = res.headers.get('content-type') || '';
              if (contentType.includes('application/json')) {
                const out = await res.json();
                result = { ok: res.ok && out.ok, id: out.id, error: out.error };
              }
            } catch (_) {
              // Fallback to static email endpoint below
            }
          }
          if (!result) {
            result = await sendViaStaticEmail(fd);
          }
          if (result.ok) {
            try { localStorage.setItem('setu_last_enquiry_ts', String(Date.now())); } catch (_) {}
            status.className = 'sc-status ok';
            status.textContent = 'Thank you! Your enquiry is received. Enquiry ID: ' + result.id + '. Our team will contact you soon.';
            form.reset();
          } else {
            status.className = 'sc-status err';
            status.textContent = result.error || 'Could not send right now. Please call or WhatsApp us.';
          }
        } catch (err) {
          status.className = 'sc-status err';
          status.textContent = 'Network problem. Please try again, or call / WhatsApp us.';
        } finally {
          btn.disabled = false;
        }
      });
    })();
    </script>
  </section>

<?php
setu_render_footer();
