# SETU Website – VPS pe live karne ke steps

(Ubuntu + Nginx VPS ke liye. Agar VPS pe Apache, cPanel ya Windows hai toh batayein, steps badal jayenge.)

## Folder structure

```
setu-website/
├── public/            ← sirf yahi folder internet pe dikhega (Nginx root)
│   ├── index.php      ← website
│   ├── assets/img/    ← logo aur team photos
│   ├── api/enquiry.php← contact form yahan save hota hai
│   └── admin/         ← enquiries dekhne ka page (password se)
└── private/           ← internet pe NAHI dikhta
    ├── config.php     ← contact number, email, admin password YAHAN badlein
    ├── db.php
    └── data/          ← enquiries.sqlite yahan apne aap ban jayega
```

## 1. Files upload karein

Poora `setu-website` folder VPS pe `/var/www/setudigitalsolutions.com/` mein upload karein (WinSCP / FileZilla se).

## 2. PHP install karein (agar pehle se nahi hai)

```bash
sudo apt update
sudo apt install php-fpm php-sqlite3 php-mbstring
php -v          # version note karein, jaise 8.3
```

## 3. Permission dein (taaki enquiries save ho sakein)

```bash
sudo mkdir -p /var/www/setudigitalsolutions.com/private/data
sudo chown -R www-data:www-data /var/www/setudigitalsolutions.com/private/data
sudo chmod 770 /var/www/setudigitalsolutions.com/private/data
```

## 4. Nginx config

File banayein: `/etc/nginx/sites-available/setudigitalsolutions.com`

```nginx
server {
    listen 80;
    server_name setudigitalsolutions.com www.setudigitalsolutions.com;
    root /var/www/setudigitalsolutions.com/public;
    index index.php;

    client_max_body_size 1m;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;   # apna PHP version daalein
    }

    location ~* \.(png|jpg|jpeg|webp|svg|css|js)$ {
        expires 30d;
        access_log off;
    }

    location ~ /\. { deny all; }
}
```

```bash
sudo ln -s /etc/nginx/sites-available/setudigitalsolutions.com /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
```

setulinkink.in ki config ko haath nahi lagana, yeh alag file hai.

## 5. Domain aur SSL

1. Domain provider ke DNS mein `A` record: `@` aur `www` → VPS ka IP.
2. DNS update hone ke baad (kuch minute se kuch ghante) free SSL lagayein:

```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d setudigitalsolutions.com -d www.setudigitalsolutions.com
```

## 6. Admin password set karein

VPS pe chalayein (APNA_PASSWORD ki jagah strong password):

```bash
php -r "echo password_hash('APNA_PASSWORD', PASSWORD_DEFAULT), PHP_EOL;"
```

Jo lambi line aaye (`$2y$...` se shuru), use `private/config.php` mein `admin_password_hash` mein paste karein.

Enquiries dekhne ke liye: **https://setudigitalsolutions.com/admin/**
Wahan aap status badal sakte ho (New → Contacted → Demo Scheduled → Converted / Closed), remarks likh sakte ho, aur Excel (CSV) download kar sakte ho.

## 7. Gmail pe enquiry alert (setuinfo09@gmail.com)

1. setuinfo09@gmail.com se login karein → **Google Account → Security**.
2. **2-Step Verification** ON karein (agar pehle se nahi hai).
3. Search bar mein **App passwords** likhein → naam "SETU Website" → **Create**.
4. Jo 16 letters ka password dikhe, use `private/config.php` mein `smtp` → `'pass' => ''` ke andar paste karein. Yeh password kisi ke saath share na karein.
5. `/admin/` pe login karke **Send test email** dabayein. "Test email sent" aaye toh Gmail check karein (pehli baar Spam folder bhi dekh lein, aur wahan ho toh "Not spam" mark karein).

Error aaye toh:
- `Connect failed`: VPS provider ne bahar ke mail port (465) band kiye hain. Provider se port 465 kholne ko kahein, ya `port` 587 aur `secure` 'tls' karke try karein.
- `535` wala error: App Password galat hai. Naya bana ke dobara paste karein (normal Gmail password yahan kaam nahi karega).

Email fail bhi ho jaye toh enquiry phir bhi save hoti hai aur `/admin/` pe dikhti hai.

## 8. Contact number / email badalna

Sirf `private/config.php` mein `contact` wala hissa edit karein. Website pe call button, WhatsApp button aur email apne aap update ho jayenge.

## 9. Backup

Saari enquiries ek file mein hain: `private/data/enquiries.sqlite`. Ise apne regular backup mein shamil karein.

## Test

Live hone ke baad website pe ek test enquiry bhejein, phir `/admin/` pe check karein ki woh dikh rahi hai.
