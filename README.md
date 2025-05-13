# Universal Form Handler

This simple PHP + JS-based utility allows you to collect and store form data on any static HTML website without a database.

## Features

- Works with plain HTML forms
- Supports both `.txt` and `.csv` output formats
- Automatically creates directory and appends records
- Reusable across any website or form
- JavaScript fetch API for asynchronous form submission

## Setup

1. Upload the following files to the root directory of your website:
    - `save-form.php`
    - `form-handler.js`

2. Create or ensure a writable directory called `form-records` in the root folder.

3. In your HTML:

```html
<form data-form-id="form1" data-form-type="contact_txt">
  <input name="name" type="text" required>
  <input name="email" type="email" required>
  <textarea name="message"></textarea>
  <button type="submit">Send</button>
</form>
<p data-message-id="form1"></p>
```

4. Include the script:

```html
<script src="form-handler.js"></script>
```

## Notes

- Use `data-form-type="contact_csv"` to store in CSV format.
- Message will be shown in the `<p>` tag with matching `data-message-id`.

---

Created for global reusability and quick form handling on basic PHP-supporting hosts.
