# Basic Form Handler

A lightweight, plug-and-play PHP + JavaScript solution for handling contact or quote forms on simple HTML sites without a backend framework.

---

## ✅ Features

- Supports **multiple forms** on a single page
- Saves form data as `.txt` or `.csv` automatically
- Works with basic HTML + PHP (no database needed)
- Auto-creates `form-records/` folder if not exists
- Displays success/error messages in-page
- Designed to be **modular** and reusable across projects

---

## 📁 File Structure

```
basic-form-handler/
├── demo.html
├── form-handler.js
├── save-form.php
├── README.md
├── .gitignore
└── form-records/   ← Generated automatically
```

---

## 🛠 Setup Instructions

1. **Place files on a PHP-enabled server** (e.g. inside XAMPP `htdocs` or live server).
2. Ensure `save-form.php` has write permission:
   - If `form-records/` folder is not writable, you may need to run:

     ```bash
     chmod -R 777 form-records/
     ```
   - Or create it manually:
     ```bash
     mkdir form-records
     chmod 777 form-records
     ```

3. Use the example below to add a form to your HTML page:

```html
<form data-form-id="contact1" data-form-type="contact_txt" onsubmit="submitUniversalForm(event)">
  <input type="text" name="name" placeholder="Your Name" required />
  <input type="email" name="email" placeholder="Email" required />
  <textarea name="message" placeholder="Your message"></textarea>
  <button type="submit">Send</button>
</form>

<p data-message-id="contact1"></p>

<script src="form-handler.js"></script>
```

---

## ✏️ Form Attributes

- `data-form-id` → Used to link form with the response `<p>` tag.
- `data-form-type` → Controls:
  - Save file name: `{form_type}-records.txt` or `.csv`
  - File format: Add `_txt` or `_csv` suffix

**Examples:**

- `contact_txt` → saves to `form-records/contact-records.txt`
- `quote_csv` → saves to `form-records/quote-records.csv`

---

## 📋 Output Format

### TXT Mode:
```
Gönderim Zamanı: 2025-05-13 12:34:56
Name: Barış Gündüz
Email: test@example.com
Message: Hello world!
----------------------------------------
```

### CSV Mode:
```
timestamp,name,email,message
2025-05-13 12:34:56,Barış Gündüz,test@example.com,Hello world!
```

---

## ❓ Notes

- Works on **localhost** with `http://localhost/basic-form-handler/demo.html`
- Access `save-form.php` directly — it should return `Geçersiz istek.` when visited in browser
- Handles all field types (`text`, `email`, `tel`, `textarea`, `select`, etc.)

---

## 💡 Support & Sponsorship
If you find this project useful, consider supporting us! 😊

[![Powered by DigitalOcean](https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%203.svg)](https://www.digitalocean.com/?refcode=525051e9e7a7&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge)

🚀 **Happy coding!** Feel free to contribute, explore, and share! 😊