<?php $c = require __DIR__ . '/../private/config.php'; $c = $c['contact']; function h($v){return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');} ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Setu Digital Solutions</title>
<style>
:root { --navy:#102a56; --blue:#0878f9; --cyan:#00c8d9; --green:#48c83e; --ink:#18304f; --muted:#62748b; }
* { box-sizing:border-box; }
html { scroll-behavior:smooth; }
body { margin:0; font-family:Arial,Helvetica,sans-serif; color:var(--ink); background:#f7fbff; }
.wrap { width:min(1120px,92%); margin:auto; }
header { background:#fff; border-bottom:1px solid #e5edf6; }
nav { display:flex; align-items:center; justify-content:space-between; gap:20px; min-height:82px; }
.logo { width:190px; max-height:72px; object-fit:contain; }
.links { display:flex; gap:22px; font-size:14px; font-weight:bold; }
a { color:inherit; text-decoration:none; }
.btn { display:inline-block; padding:13px 18px; border-radius:12px; color:#fff; background:linear-gradient(110deg,var(--blue),var(--cyan)); font-weight:bold; }
.hero { padding:65px 0; background:linear-gradient(120deg,#fff,#eef8ff 65%,#f3fff1); }
.hero-grid { display:grid; grid-template-columns:1.1fr .9fr; align-items:center; gap:40px; }
.eyebrow { display:inline-block; background:#e7f6ff; color:#0878bd; border-radius:30px; padding:8px 12px; font-size:12px; font-weight:bold; }
h1 { color:var(--navy); font-size:clamp(38px,5vw,64px); line-height:1.08; margin:20px 0; }
h1 span { background:linear-gradient(90deg,var(--blue),var(--cyan),var(--green)); -webkit-background-clip:text; color:transparent; }
p { line-height:1.7; color:var(--muted); }
.hero p { font-size:18px; max-width:620px; }
.hero-logo { display:flex; align-items:center; justify-content:center; padding:20px; min-height:300px; background:linear-gradient(135deg,#e8f6ff,#f0fff0); border-radius:28px; }
.hero-logo img { width:min(100%,330px); height:auto; object-fit:contain; }
.actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:25px; }
section { padding:65px 0; }
.heading { max-width:720px; margin-bottom:30px; }
.kicker { color:#0795b7; font-size:12px; letter-spacing:2px; font-weight:bold; }
h2 { color:var(--navy); font-size:clamp(28px,3.5vw,42px); margin:12px 0; }
.cards { display:grid; grid-template-columns:repeat(3,1fr); gap:18px; }
.card { background:#fff; border:1px solid #e1ebf5; border-radius:18px; padding:24px; box-shadow:0 8px 25px #102a5608; }
.card h3 { color:var(--navy); margin:0 0 10px; }
.card p { font-size:14px; margin-bottom:0; }
.strip { background:linear-gradient(120deg,#eff8ff,#f4fff1); border-block:1px solid #e5f0f7; }
.chips { display:flex; flex-wrap:wrap; gap:10px; }
.chip { background:#fff; border:1px solid #dceaf5; border-radius:11px; padding:12px 15px; font-weight:bold; font-size:14px; }
.team { text-align:center; }
.avatar { width:72px; height:72px; margin:0 auto 15px; border-radius:22px; display:grid; place-items:center; color:#fff; font-weight:bold; font-size:24px; background:linear-gradient(135deg,var(--blue),var(--cyan),var(--green)); }
.role { color:#0797b2; font-size:11px; font-weight:bold; letter-spacing:1px; margin:8px 0 12px; }
.cta { background:linear-gradient(110deg,var(--navy),var(--blue),var(--cyan)); color:white; border-radius:25px; padding:35px; display:flex; align-items:center; justify-content:space-between; gap:20px; }
.cta h2 { color:white; margin-top:0; }
.cta p { color:#e5f5ff; }
footer { background:var(--navy); color:#dce9f7; padding:30px 0; }
footer .foot { display:flex; align-items:center; justify-content:space-between; gap:20px; flex-wrap:wrap; }
footer img { width:155px; height:auto; }
footer p { color:#b9cce2; font-size:13px; }
@media(max-width:800px) { .links { display:none; } .hero-grid { grid-template-columns:1fr; } .cards { grid-template-columns:repeat(2,1fr); } .cta { flex-direction:column; align-items:flex-start; } }
@media(max-width:540px) { .cards { grid-template-columns:1fr; } nav { min-height:70px; } .logo { width:150px; } section { padding:48px 0; } .hero { padding:42px 0; } }

.dev-head{display:grid;grid-template-columns:170px 1fr;gap:28px;align-items:start;max-width:850px;margin:22px auto 0;background:#fff;border:1px solid #e1ebf5;border-radius:24px;padding:24px;box-shadow:0 10px 30px #102a5609}
.dev-photo{width:150px;height:190px;aspect-ratio:35/45;object-fit:cover;object-position:center 20%;border-radius:12px;background:#eef6fb;display:block;margin:0 auto;box-shadow:0 5px 16px #102a5615}
.dev-label{font-size:11px;letter-spacing:1.5px;font-weight:800;color:#0797b2;text-transform:uppercase}
.dev-head h3{font-size:27px;color:#102a56;margin:10px 0}
.dev-head p{font-size:15px;line-height:1.75;margin:0 0 12px}
.dev-points{display:flex;gap:8px;flex-wrap:wrap;margin-top:14px}
.dev-points span{font-size:12px;font-weight:700;color:#31506f;background:#eef8ff;border:1px solid #dcecf7;border-radius:30px;padding:8px 11px}
@media(max-width:600px){.dev-head{grid-template-columns:1fr}.dev-photo{height:340px;object-fit:contain;object-position:center center}}

/* About section expanded to use the full content width */
#about .heading{max-width:none;width:100%;margin-bottom:34px}
#about .heading p{max-width:none;width:100%;line-height:1.8}
#about .cards{width:100%;grid-template-columns:repeat(2,minmax(0,1fr))}
#about .card{height:100%}
@media(max-width:700px){#about .cards{grid-template-columns:1fr}}

#team{overflow:visible}
#team>.wrap{display:block;width:calc(100% - 40px);max-width:1240px;margin:0 auto}
#team .heading{width:100%;max-width:none}
#team .dev-head{display:grid;grid-template-columns:150px minmax(0,1fr);align-items:start;gap:26px;width:100%;max-width:100%;box-sizing:border-box;margin:22px 0;padding:24px;border:1px solid #dce8f5;border-radius:20px;background:#fff}
#team .dev-head img.dev-photo{grid-column:1;grid-row:1;width:140px;height:180px;object-fit:cover;object-position:center top;margin:0 auto}
#team .dev-head>div{grid-column:2;grid-row:1;display:block;min-width:0;width:100%;max-width:none}
#team .dev-head .dev-label,#team .dev-head h3,#team .dev-head p,#team .dev-head .dev-points{width:100%;max-width:none;min-width:0;white-space:normal;overflow-wrap:break-word}
#team .dev-head p{font-size:15px;line-height:1.75}
@media(max-width:620px){#team>.wrap{width:calc(100% - 24px)}#team .dev-head{grid-template-columns:1fr;gap:16px;padding:18px}#team .dev-head img.dev-photo{grid-column:1;grid-row:1}#team .dev-head>div{grid-column:1;grid-row:2}}

/* Back-office profile card consistency */
#team .dev-head{display:grid;grid-template-columns:150px minmax(0,1fr);align-items:start;gap:26px;width:100%;max-width:100%;box-sizing:border-box}
#team .dev-head img.dev-photo{width:140px;height:180px;object-fit:contain;object-position:center top;background:#f4f8fc;border-radius:14px}
#team .dev-head>div{min-width:0;width:100%}
#team .dev-head p{max-width:none;line-height:1.75;overflow-wrap:break-word}
@media(max-width:620px){#team .dev-head{grid-template-columns:1fr;gap:16px}#team .dev-head img.dev-photo{margin:0 auto}#team .dev-head>div{grid-column:1}}

/* Consistent team alignment, including Ajju's back-office profile */
#team .dev-head{display:grid !important;grid-template-columns:150px minmax(0,1fr) !important;align-items:start !important;gap:24px !important;width:100% !important;max-width:100% !important;box-sizing:border-box !important}
#team .dev-head>img.dev-photo{grid-column:1 !important;grid-row:1 !important;width:140px !important;height:180px !important;object-fit:contain !important;object-position:center top !important;margin:0 auto !important}
#team .dev-head>div{grid-column:2 !important;grid-row:1 !important;min-width:0 !important;width:100% !important;max-width:none !important}
#team .dev-head p{width:100% !important;max-width:none !important;white-space:normal !important;overflow-wrap:break-word !important;line-height:1.65 !important;margin:10px 0}
#team .dev-head h3{margin:6px 0 10px}
@media(max-width:620px){
 #team .dev-head{grid-template-columns:1fr !important;gap:14px !important}
 #team .dev-head>img.dev-photo{grid-column:1 !important;grid-row:1 !important}
 #team .dev-head>div{grid-column:1 !important;grid-row:2 !important}
}

/* Team section structural/layout repair */
#team{display:block;position:relative;clear:both;overflow:visible}
#team>.wrap{display:flex !important;flex-direction:column !important;align-items:stretch !important;gap:18px !important;width:min(1240px,calc(100% - 40px)) !important;max-width:1240px !important;margin:0 auto !important}
#team .heading{width:100%;max-width:none;flex:0 0 auto}
#team .dev-head{position:relative !important;display:grid !important;grid-template-columns:160px minmax(0,1fr) !important;align-items:start !important;gap:24px !important;flex:0 0 auto !important;width:100% !important;max-width:100% !important;min-height:0 !important;margin:0 !important;padding:22px !important;box-sizing:border-box !important;overflow:visible !important}
#team .dev-head>img.dev-photo{position:static !important;float:none !important;display:block !important;grid-column:1 !important;grid-row:1 !important;width:140px !important;height:180px !important;max-width:100% !important;object-fit:contain !important;object-position:center top !important;margin:0 auto !important}
#team .dev-head>div{position:static !important;display:block !important;float:none !important;grid-column:2 !important;grid-row:1 !important;width:100% !important;max-width:none !important;min-width:0 !important;margin:0 !important;padding:0 !important}
#team .dev-head .dev-label,#team .dev-head h3,#team .dev-head p,#team .dev-head .dev-points{display:block;position:static;width:100%;max-width:none;min-width:0;box-sizing:border-box;white-space:normal;overflow-wrap:anywhere}
#team .dev-head p{line-height:1.65;margin:10px 0}
@media(max-width:620px){
#team>.wrap{width:calc(100% - 24px) !important}
#team .dev-head{grid-template-columns:1fr !important;gap:14px !important;padding:18px !important}
#team .dev-head>img.dev-photo{grid-column:1 !important;grid-row:1 !important}
#team .dev-head>div{grid-column:1 !important;grid-row:2 !important}
}

/* Uniform portrait dimensions and full perimeter border for every team member */
#team .dev-head>img.dev-photo{
  width:140px !important;
  height:180px !important;
  min-width:140px !important;
  max-width:140px !important;
  box-sizing:border-box !important;
  object-fit:cover !important;
  object-position:center top !important;
  display:block !important;
  border:2px solid #d5e4f3 !important;
  border-radius:12px !important;
  padding:3px !important;
  background:#ffffff !important;
  box-shadow:0 4px 14px rgba(18,53,95,.08) !important;
}
@media(max-width:620px){
 #team .dev-head>img.dev-photo{
   width:140px !important;height:180px !important;
   min-width:140px !important;max-width:140px !important;
 }
}
</style>
</head>
<body>
<header><div class="wrap"><nav>
<a href="#home"><img class="logo" src="assets/img/setu-logo.png" alt="Setu Digital Solutions"></a>
<div class="links"><a href="#services">Services</a><a href="#products">Products</a><a href="#industries">Industries</a><a href="#team">Our Team</a><a href="#about">About</a></div>
<a class="btn" href="#contact">Contact Us</a>
</nav></div></header>
<main id="home">
<section class="hero"><div class="wrap hero-grid"><div><span class="eyebrow">BUSINESS TECHNOLOGY PARTNER</span><h1>Bridging Business.<br><span>Connects Everywhere.</span></h1><p>Practical digital solutions that connect your people, processes and business data—helping your team work smarter with Tally, web applications and industry-focused software.</p><div class="actions"><a class="btn" href="#products">Explore Solutions →</a><a class="btn" href="#contact">Talk to Our Team</a></div></div><div class="hero-logo"><img src="assets/img/setu-logo.png" alt="Setu logo"></div></div></section>
<section id="services"><div class="wrap"><div class="heading"><span class="kicker">WHAT WE DO</span><h2>Technology that works for your business.</h2><p>From customizing Tally to connecting systems and building digital tools, we help turn everyday business challenges into streamlined workflows.</p></div><div class="cards">
<div class="card"><h3>Tally Customization</h3><p>TDL development, reports, voucher workflows and business-specific features for Tally Prime.</p></div>
<div class="card"><h3>ERP & API Integration</h3><p>Connect Tally with ERP, web applications and external systems to reduce manual data entry.</p></div>
<div class="card"><h3>Web & Mobile Apps</h3><p>Digital tools for field teams, business data access and connected workflows.</p></div>
<div class="card"><h3>MIS & Business Reports</h3><p>Meaningful summaries and reports to make business information easier to understand.</p></div>
<div class="card"><h3>Implementation</h3><p>Requirement understanding, configuration, deployment and practical user guidance.</p></div>
<div class="card"><h3>Support & Consulting</h3><p>Ongoing assistance, troubleshooting and solution improvements for your business systems.</p></div>
</div></div></section>
<section id="products" class="strip"><div class="wrap"><div class="heading"><span class="kicker">FEATURED PRODUCTS</span><h2>Solutions for connected business.</h2><p>Digital tools designed to make information accessible and everyday work more efficient.</p></div><div class="cards">
<div class="card"><h3>SetuLink</h3><p>Connect your field team with Tally through a simple web and mobile experience.</p></div>
<div class="card"><h3>eDocSuite</h3><p>Keep supporting documents organized and accessible alongside your business records.</p></div>
<div class="card"><h3>Setu AI</h3><p>Explore business insights and smarter ways to understand information from your Tally data.</p></div>
</div></div></section>
<section id="industries"><div class="wrap"><div class="heading"><span class="kicker">INDUSTRY SOLUTIONS</span><h2>Built for the way your industry works.</h2><p>Purpose-built modules for specialized workflows across operations, inventory, finance and service management.</p></div><div class="chips"><span class="chip">Transport & Fleet</span><span class="chip">Cold Storage</span><span class="chip">Jewellery Retail</span><span class="chip">Rice & Flour Mill</span><span class="chip">Petrol Pump</span><span class="chip">Printing Press</span><span class="chip">Garments Manufacturing</span><span class="chip">Healthcare / OPD-IPD</span><span class="chip">Service Industry</span><span class="chip">Lead Management</span></div></div></section>
<section id="team"><div class="wrap"><div class="heading"><span class="kicker">OUR TEAM</span><h2>People behind the solutions.</h2><p>A collaborative team focused on understanding your requirements, building dependable solutions and supporting your business through every stage.</p></div><div class="dev-head"><img class="dev-photo" src="assets/img/team-imtiyaz.jpg" alt="Imtiyaz Ahmad"><div><div class="dev-label">Web Development & Administration</div><h3>Imtiyaz Ahmad</h3><p>As Web Development Head and Administrator at Setu Digital Solutions, Imtiyaz Ahmad oversees website and web application development, supports implementation of digital features, and coordinates day-to-day web and administrative activities. He works on maintaining a smooth development workflow, managing web-related tasks, and coordinating with the team to deliver reliable and user-friendly business solutions.</p><div class="dev-points"><span>Web Development</span><span>Website & Applications</span><span>Administration</span></div></div></div>
<div class="dev-head"><img class="dev-photo" src="assets/img/team-anchal.jpg" alt="Head of Development"><div><div class="dev-label">Development Leadership</div><h3>Anchal Tiwari</h3><p>Leads the development team at Setu Digital Solutions, coordinating software development and translating business requirements into practical digital solutions. Focuses on development planning, team collaboration, solution quality and delivery across Tally customization, web applications and integrations.</p><div class="dev-points"><span>Development Team</span><span>TDL & Tally Solutions</span><span>Web & Integration</span></div></div></div>
<div class="dev-head"><img class="dev-photo" src="assets/img/team-divyanshi.jpg" alt="Head of Support"><div><div class="dev-label">Customer Support Leadership</div><h3>Divyanshi Sharma</h3><p>Leads customer support at Setu Digital Solutions, helping customers with product queries, issue coordination and day-to-day assistance. Focuses on responsive communication, understanding customer requirements, coordinating with development and implementation teams, and ensuring customers receive timely support for their business solutions.</p><div class="dev-points"><span>Customer Assistance</span><span>Issue Coordination</span><span>Support Operations</span></div></div></div>
<div class="dev-head ajju-profile">
<img class="dev-photo" src="assets/img/team-ajju.jpg" alt="Gulam Khwaja (Ajju)">
<div>
<div class="dev-label">Back Office & Digital Support</div>
<h3>Gulam Khwaja (Ajju)</h3>
<p>Ajju supports billing, office records, WhatsApp communication, and Facebook/social media activities at Setu Digital Solutions. He helps manage routine back-office tasks and keeps customer communication organized.</p>
<div class="dev-points"><span>Billing & Records</span><span>WhatsApp & Social Media</span><span>Office Coordination</span></div>
</div></div>
<div class="dev-head"><img class="dev-photo" src="assets/img/team-yusuf.jpg" alt="Mohd Yusuf"><div><div class="dev-label">Implementation & Training</div><h3>Mohd Yusuf</h3><p>Mohd Yusuf is responsible for implementing web-based solutions at Setu Digital Solutions and helping customers adopt them effectively. He coordinates solution setup, provides user training, explains workflows, and supports customers during implementation to ensure the solutions are used smoothly in day-to-day business operations.</p><div class="dev-points"><span>Web Solution Implementation</span><span>User Training</span><span>Customer Guidance</span></div></div></div>
</div></section>
<section id="about"><div class="wrap">
<div class="heading">
<span class="kicker">ABOUT SETU DIGITAL SOLUTIONS</span>
<h2>Connecting Business Processes with Technology</h2>
<p>Setu Digital Solutions is a business technology company dedicated to helping businesses digitize their operations and connect their business processes seamlessly with Tally.</p>
<p>With a strong foundation in Tally customization and TDL development, we help businesses digitize their processes and connect their operations seamlessly with technology.</p>
<p>Our expertise includes Tally customization, TDL development, business applications, ERP/CRM solutions, system integration, and industry-specific software.</p>
<p>We understand that every business has its own processes, requirements, and challenges. That's why we focus on developing practical, customized, and reliable technology solutions that simplify operations, reduce manual work, and improve business efficiency.</p>
<p>At Setu Digital Solutions, we believe technology should work according to business requirements — helping businesses manage their operations more efficiently and make better use of their information.</p>
</div>
<div class="cards">
<div class="card"><span class="kicker">OUR VISION</span><h3>Digitally Connected Businesses</h3><p>To create a digitally connected business environment where business processes, applications, and information work together seamlessly, with Tally as an integral part of business operations.</p></div>
<div class="card"><span class="kicker">OUR MISSION</span><h3>Simplifying Business Operations</h3><p>To simplify business operations through practical, customized, and technology-driven solutions.</p><p><strong>We aim to:</strong></p><ul>
<li>Digitize business processes and workflows.</li>
<li>Connect business applications seamlessly with Tally.</li>
<li>Reduce manual work and repetitive data entry.</li>
<li>Improve operational efficiency and data accessibility.</li>
<li>Develop solutions based on specific business requirements.</li>
<li>Help businesses embrace digital transformation.</li>
</ul></div>
</div></div></section>

<section id="contact" class="setu-contact-page">
<style>
.setu-contact-page{padding:64px 22px 0;background:linear-gradient(135deg,#f8fbff,#edf5ff);color:#142b49}
.setu-contact-page *{box-sizing:border-box}
.setu-contact-page .sc-container{max-width:1180px;margin:auto}
.setu-contact-page .sc-heading{text-align:center;margin-bottom:34px}
.setu-contact-page .sc-heading h2{font-size:clamp(30px,4vw,46px);margin:0;color:#102f59}
.setu-contact-page .sc-heading p{font-size:17px;color:#52657d;line-height:1.6;margin:12px auto 0;max-width:650px}
.setu-contact-page .sc-main{display:grid;grid-template-columns:.8fr 1.2fr;gap:30px;align-items:start}
.setu-contact-page .sc-info{padding:10px 8px}
.setu-contact-page .sc-info-item{display:flex;gap:16px;padding:17px 0;border-bottom:1px solid #d5e2f0}
.setu-contact-page .sc-icon{flex:0 0 54px;height:54px;border-radius:14px;background:#e0efff;color:#15518b;display:grid;place-items:center;font-size:24px}
.setu-contact-page .sc-info-item strong{display:block;font-size:17px;margin-bottom:5px;color:#102f59}
.setu-contact-page .sc-info-item p{margin:0;color:#465a72;line-height:1.55;overflow-wrap:anywhere}
.setu-contact-page .sc-card{background:#fff;border:1px solid #d3e1f0;border-radius:18px;padding:28px;box-shadow:0 12px 32px #12345b12}
.setu-contact-page .sc-card h3{margin:0 0 20px;color:#102f59;font-size:25px}
.setu-contact-page .sc-fields{display:grid;grid-template-columns:1fr 1fr;gap:0 18px}
.setu-contact-page label{display:block;font-weight:650;font-size:14px;margin:13px 0 6px;color:#183555}
.setu-contact-page input,.setu-contact-page textarea,.setu-contact-page select{width:100%;padding:12px;border:1px solid #bdcfe2;border-radius:9px;background:#fff;color:#182e48;font:inherit}
.setu-contact-page textarea{min-height:112px;resize:vertical}
.setu-contact-page .sc-full{grid-column:1/-1}
.setu-contact-page .sc-submit{width:100%;margin-top:18px;border:0;border-radius:10px;padding:14px;background:#123d70;color:white;font-weight:750;font-size:16px;cursor:pointer}
.setu-contact-page .sc-submit:hover{background:#0b2c52}
.setu-contact-page .sc-hp{position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden}
.setu-contact-page .sc-info-item a{color:#123d70;text-decoration:none;font-weight:600}
.setu-contact-page .sc-status{margin:12px 0 0;font-weight:600;font-size:15px}
.setu-contact-page .sc-status.ok{color:#0b6b33}
.setu-contact-page .sc-status.err{color:#b3261e}
.setu-contact-page .sc-submit:disabled{opacity:.6;cursor:wait}
.setu-contact-page .sc-note{font-size:12px;color:#6a7b8e;line-height:1.5;margin:12px 0 0}
.setu-contact-page .sc-bottom{display:grid;grid-template-columns:1.15fr .85fr;gap:22px;margin:24px 0 0;padding-bottom:42px}
.setu-contact-page .sc-quick,.setu-contact-page .sc-actions{border-radius:16px;padding:22px;background:#e5f1ff}
.setu-contact-page .sc-quick h3,.setu-contact-page .sc-actions h3{margin:0 0 15px;font-size:20px;color:#102f59}
.setu-contact-page .sc-quick-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px}
.setu-contact-page .sc-quick button{border:1px solid #b8d1ed;background:#fff;border-radius:10px;padding:14px 8px;color:#17375d;cursor:pointer;font-weight:600;min-height:66px}
.setu-contact-page .sc-action-buttons{display:flex;gap:12px;flex-wrap:wrap}
.setu-contact-page .sc-action-buttons a{display:inline-flex;align-items:center;justify-content:center;text-decoration:none;border:1px solid #b7cde4;border-radius:10px;padding:13px 16px;background:#fff;color:#124c83;font-weight:700}
.setu-contact-page .sc-action-buttons a.whatsapp{color:#087b37;border-color:#a6d7b5}
.setu-contact-page .sc-foot{background:#102f59;color:#fff;margin:0 -22px;padding:26px 22px}
.setu-contact-page .sc-foot-inner{max-width:1180px;margin:auto;display:flex;justify-content:space-around;gap:20px;flex-wrap:wrap}
.setu-contact-page .sc-foot strong{display:block;margin-bottom:5px}
.setu-contact-page .sc-foot span{font-size:13px;color:#dce8f7}
@media(max-width:820px){.setu-contact-page .sc-main,.setu-contact-page .sc-bottom{grid-template-columns:1fr}.setu-contact-page .sc-quick-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:520px){.setu-contact-page{padding:42px 14px 0}.setu-contact-page .sc-card{padding:19px}.setu-contact-page .sc-fields{grid-template-columns:1fr}.setu-contact-page .sc-foot{margin:0 -14px}.setu-contact-page .sc-quick-grid{grid-template-columns:1fr 1fr}}
</style>
<div class="sc-container">
<div class="sc-heading"><h2>Contact Us</h2><p>Have a question, requirement or want a demo? We'd be happy to help you.</p></div>
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
<div><label for="scFullInterest">Interested In *</label><select id="scFullInterest" name="interest" required><option value="">Select solution / service</option><option>Product Demo</option><option>Tally Customization / TDL Development</option><option>Tally Integration</option><option>Industry Solution</option><option>SetuLink / Digital Products</option><option>Website & Web Application</option><option>Support & Service</option><option>Other</option></select></div>
<div class="sc-full"><label for="scFullMessage">Your Message *</label><textarea id="scFullMessage" name="message" required placeholder="Tell us about your requirement, query or business use case"></textarea></div>
<div class="sc-hp" aria-hidden="true"><label for="scWebsite">Website</label><input id="scWebsite" name="website" tabindex="-1" autocomplete="off"></div>
<div class="sc-full"><label for="scDemoDate">Preferred Demo Date (optional)</label><input id="scDemoDate" name="demo_date" type="date"></div>
</div><button class="sc-submit" type="submit">Submit Enquiry</button>
<p class="sc-status" id="scStatus" role="status" aria-live="polite"></p>
<p class="sc-note">We use your details only to respond to your enquiry.</p>
</form></div>
</div>
<div class="sc-bottom">
<div class="sc-quick"><h3>Quick Enquiry For</h3><div class="sc-quick-grid">
<button type="button" data-interest="Product Demo">▣ Product Demo</button><button type="button" data-interest="Tally Customization / TDL Development">⚙ Customization (TDL)</button><button type="button" data-interest="Industry Solution">▤ Industry Solution</button><button type="button" data-interest="Support & Service">♧ Support & Service</button>
</div></div>
<div class="sc-actions"><h3>You Can Also</h3><div class="sc-action-buttons"><a class="whatsapp" id="setuContactWhatsapp" href="https://wa.me/<?= h($c['whatsapp']) ?>?text=<?= rawurlencode('Hello Setu Digital Solutions, I have an enquiry.') ?>" target="_blank" rel="noopener">☏ Chat on WhatsApp</a><a href="#scDemoDate" id="setuContactDemo">▦ Schedule a Demo</a></div></div>
</div>
</div>
<div class="sc-foot"><div class="sc-foot-inner"><div><strong>Quick Response</strong><span>We aim to respond at the earliest.</span></div><div><strong>Solution Guidance</strong><span>Get guidance for your business requirements.</span></div><div><strong>Ongoing Support</strong><span>Support for smooth implementation and usage.</span></div></div></div>
<script>
(function(){
const form=document.getElementById('setuContactFullForm');if(!form)return;
const interest=document.getElementById('scFullInterest'),msg=document.getElementById('scFullMessage');
document.querySelectorAll('.setu-contact-page [data-interest]').forEach(btn=>btn.addEventListener('click',()=>{interest.value=btn.dataset.interest;document.getElementById('scFullName').focus();}));
document.getElementById('setuContactDemo').addEventListener('click',()=>{interest.value='Product Demo';document.getElementById('scDemoDate').focus();});
const status=document.getElementById('scStatus'),btn=form.querySelector('.sc-submit');
form.addEventListener('submit',async e=>{e.preventDefault();status.className='sc-status';status.textContent='Sending…';btn.disabled=true;
try{const res=await fetch(form.action,{method:'POST',body:new FormData(form),headers:{'Accept':'application/json'}});const out=await res.json().catch(()=>({}));
if(res.ok&&out.ok){status.className='sc-status ok';status.textContent='Thank you! Your enquiry is received. Enquiry ID: '+out.id+'. Our team will contact you soon.';form.reset();}
else{status.className='sc-status err';status.textContent=out.error||'Could not send right now. Please call or WhatsApp us.';}}
catch(err){status.className='sc-status err';status.textContent='Network problem. Please try again, or call / WhatsApp us.';}
finally{btn.disabled=false;}});
})();
</script>
</section>

</main>
<footer><div class="wrap foot"><div><img src="assets/img/setu-logo.png" alt="Setu Digital Solutions"><p>Bridging Business. Connects Everywhere.</p></div><div><strong>Setu Digital Solutions</strong><p>Tally Customization · Integration · Digital Products</p><p>© 2026 Setu Digital Solutions</p></div></div></footer>



</body></html>