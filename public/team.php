<?php
require __DIR__ . '/../private/layout.php';
$baseUrl = setu_base_url();

setu_render_header([
    'active'       => 'team',
    'path'         => 'team.php',
    'title'        => 'Our Team | Leadership, Development, Support & Implementation — Setu Digital Solutions',
    'description'  => 'Meet the team behind Setu Digital Solutions: Imtiyaz Ahmad, Anchal Tiwari, Divyanshi Sharma, Gulam Khwaja (Ajju), and Md Yusuf (Software Executive)—dedicated to building, implementing, testing, and supporting your Tally and web solutions.',
    'keywords'     => 'Setu Digital Solutions Team, Imtiyaz Ahmad Setu, Anchal Tiwari TDL Developer, Divyanshi Sharma Support, Md Yusuf Software Executive Setu Digital Solutions, Md Yusuf Software Implementation, Gulam Khwaja Ajju',
    'page_heading' => 'Our Team',
    'page_sub'     => 'A collaborative team focused on understanding your requirements, building dependable solutions, and supporting your business through every stage.',
    'breadcrumb'   => 'Our Team',
    'extra_schema' => [
        [
            '@type'       => 'Person',
            '@id'         => $baseUrl . '/team.php#md-yusuf',
            'name'        => 'Md Yusuf',
            'jobTitle'    => 'Software Executive',
            'url'         => $baseUrl . '/team.php#md-yusuf',
            'image'       => $baseUrl . '/assets/img/team-yusuf.jpg',
            'worksFor'    => ['@id' => $baseUrl . '/#organization'],
            'description' => 'Md Yusuf is a Software Executive at Setu Digital Solutions responsible for software implementation, system configuration, client coordination, user training, system testing, and post-implementation support.',
            'knowsAbout'  => [
                'Software Implementation',
                'System Configuration',
                'Client Coordination',
                'User Training',
                'System Testing',
                'Post-Implementation Support',
                'Tally Prime & Web Business Solutions',
            ],
        ],
    ],
]);
?>

  <section id="team" aria-labelledby="team-main-title">
    <div class="wrap">
      <div class="heading reveal">
        <span class="kicker">PEOPLE BEHIND THE SOLUTIONS</span>
        <h2 id="team-main-title">Dedicated Specialists Across Development, Implementation &amp; Support</h2>
        <p>When you work with Setu Digital Solutions, you work directly with experienced professionals who coordinate web engineering, TDL customization, training, and day-to-day customer assistance.</p>
      </div>

      <div class="team-stack">
        <style>
        .dev-head { scroll-margin-top: 105px; }
        .dev-head:target {
          border-color: var(--blue);
          box-shadow: 0 0 0 3px rgba(8, 120, 249, 0.18), 0 14px 32px #102a561a;
        }
        </style>
        <article class="dev-head reveal" id="imtiyaz-ahmad">
          <img class="dev-photo" src="assets/img/team-imtiyaz.jpg" alt="Imtiyaz Ahmad" width="140" height="180">
          <div>
            <div class="dev-label">Web Development &amp; Administration</div>
            <h3>Imtiyaz Ahmad</h3>
            <p>As Web Development Head and Administrator at Setu Digital Solutions, Imtiyaz Ahmad oversees website and web application development, supports implementation of digital features, and coordinates day-to-day web and administrative activities. He works on maintaining a smooth development workflow, managing web-related tasks, and coordinating with the team to deliver reliable and user-friendly business solutions.</p>
            <div class="dev-points"><span>Web Development</span><span>Website &amp; Applications</span><span>Administration</span></div>
          </div>
        </article>

        <article class="dev-head reveal" id="anchal-tiwari">
          <img class="dev-photo" src="assets/img/team-anchal.jpg" alt="Anchal Tiwari" width="140" height="180" loading="lazy">
          <div>
            <div class="dev-label">Development Leadership</div>
            <h3>Anchal Tiwari</h3>
            <p>Leads the development team at Setu Digital Solutions, coordinating software development and translating business requirements into practical digital solutions. Focuses on development planning, team collaboration, solution quality and delivery across Tally customization, web applications and integrations.</p>
            <div class="dev-points"><span>Development Team</span><span>TDL &amp; Tally Solutions</span><span>Web &amp; Integration</span></div>
          </div>
        </article>

        <article class="dev-head reveal" id="divyanshi-sharma">
          <img class="dev-photo" src="assets/img/team-divyanshi.jpg" alt="Divyanshi Sharma" width="140" height="180" loading="lazy">
          <div>
            <div class="dev-label">Customer Support Leadership</div>
            <h3>Divyanshi Sharma</h3>
            <p>Leads customer support at Setu Digital Solutions, helping customers with product queries, issue coordination and day-to-day assistance. Focuses on responsive communication, understanding customer requirements, coordinating with development and implementation teams, and ensuring customers receive timely support for their business solutions.</p>
            <div class="dev-points"><span>Customer Assistance</span><span>Issue Coordination</span><span>Support Operations</span></div>
          </div>
        </article>

        <article class="dev-head ajju-profile reveal" id="gulam-khwaja">
          <img class="dev-photo" src="assets/img/team-ajju.jpg" alt="Gulam Khwaja (Ajju)" width="140" height="180" loading="lazy">
          <div>
            <div class="dev-label">Back Office &amp; Digital Support</div>
            <h3>Gulam Khwaja (Ajju)</h3>
            <p>Ajju supports billing, office records, WhatsApp communication, and Facebook/social media activities at Setu Digital Solutions. He helps manage routine back-office tasks and keeps customer communication organized.</p>
            <div class="dev-points"><span>Billing &amp; Records</span><span>WhatsApp &amp; Social Media</span><span>Office Coordination</span></div>
          </div>
        </article>

        <article class="dev-head reveal" id="md-yusuf" itemscope itemtype="https://schema.org/Person">
          <span id="yusuf" style="position:absolute;margin-top:-105px;"></span>
          <img class="dev-photo" src="assets/img/team-yusuf.jpg?v=2" alt="Md Yusuf — Software Executive at Setu Digital Solutions" width="140" height="180" loading="lazy" itemprop="image">
          <div>
            <div class="dev-label" itemprop="jobTitle">Software Executive</div>
            <h3 itemprop="name">Md Yusuf</h3>
            <p itemprop="description">As Software Executive at Setu Digital Solutions, Md Yusuf oversees end-to-end software implementation, system configuration, and client coordination across Tally Prime solutions and web-based business applications. He conducts thorough system testing to ensure reliable deployment, delivers practical hands-on user training, and provides dedicated post-implementation support so businesses can operate smoothly and achieve maximum efficiency in their day-to-day workflows.</p>
            <div class="dev-points"><span>Software Implementation</span><span>System Configuration</span><span>Client Coordination</span><span>User Training</span><span>System Testing</span><span>Post-Implementation Support</span></div>
          </div>
        </article>
      </div>
    </div>
  </section>

<?php
setu_render_cta_strip(
    'Have a question for our development or support team?',
    'Reach out to us directly and we will be happy to assist your business.',
    'Contact Our Team →',
    'contact.php'
);
setu_render_footer();
