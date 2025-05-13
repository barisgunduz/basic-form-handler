
# 📄 Universal Form Handler – README.md

This project provides a universal solution for collecting form data via HTML and saving it on the server in either `.txt` or `.csv` format. It's built with plain PHP and JavaScript, without requiring any frameworks or databases.

---

## 🔧 Features

- ✅ Accepts any HTML form with any number of fields
- ✅ Supports both `.txt` and `.csv` saving formats
- ✅ Stores records grouped by form type
- ✅ Displays success/failure messages below the form
- ✅ Easy to reuse across multiple websites

---

## 📁 Project Structure

```
/
├── form-handler.js            ← JavaScript to handle form submission via fetch
├── save-form.php              ← PHP script that processes and stores the form data
├── form-records/              ← Automatically created folder to store submissions
│   ├── contact_txt-records.txt
│   ├── quote_csv-records.csv
└── README.md
```

---

## 🚀 How to Use

### 1. **Include the JavaScript**

In your HTML page (before `</body>`), include:

```html
<script src="form-handler.js"></script>
```

### 2. **Create Your Form**

Example HTML form:

```html
<form data-form-id="contact1" data-form-type="contact_txt">
  <input type="text" name="name" placeholder="Your Name" required />
  <input type="email" name="email" placeholder="Email" required />
  <textarea name="message" placeholder="Your message"></textarea>
  <button type="submit" onclick="submitUniversalForm(event)">Send</button>
</form>

<p data-message-id="contact1"></p> <!-- Success/Error message will appear here -->
```

> 🧠 `data-form-id`: Unique identifier used to target the message area  
> 🧠 `data-form-type`: Format and type indicator in the format `formType_format`  
> Example: `contact_txt` → form type is `contact`, file format is `.txt`

---

## 📌 Naming Logic

### `data-form-type` value format:
```
formType_format
```

- `formType` → Used as the filename prefix (e.g., `contact`)
- `format` → Saving format: `txt` or `csv`

Examples:
- `quote_txt` → Saves to `form-records/quote-records.txt`
- `survey_csv` → Saves to `form-records/survey-records.csv`

---

## 💾 Output Examples

### TXT Format:
```
Submission Time: 2025-05-13 11:12:00
Name: Jane Doe
Email: jane@example.com
Message: Hello, I’d like to get in touch.
----------------------------------------
```

### CSV Format:
```
"2025-05-13 11:12:00","Jane Doe","jane@example.com","Hello, I’d like to get in touch."
```

---

## 📂 No Folder? No Problem!

If `form-records/` doesn’t exist, it will be created automatically by `save-form.php`.

---

## ⚠️ Notes

- Requires a PHP-enabled server
- No database or backend framework needed
- `formType` and `format` are **extracted from `data-form-type`**
- Make sure the form fields have `name` attributes — otherwise they won’t be captured
- All form submissions are appended to the existing file

---

## 🧪 Testing

To test the handler:
1. Upload the files to your PHP-supported hosting
2. Create an HTML form with the correct `data-` attributes
3. Fill the form and submit
4. Check the `/form-records/` directory for the saved file
