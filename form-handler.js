function submitUniversalForm(event) {
  event.preventDefault();
  const button = event.target;
  const form = button.closest("form");
  const formId = form.getAttribute("data-form-id");
  const formType = form.getAttribute("data-form-type") || "generic_txt";
  const messageBox = document.querySelector(`[data-message-id="${formId}"]`);
  const formData = new FormData(form);
  formData.append("form_type", formType);

  fetch("save-form.php", {
    method: "POST",
    body: formData
  })
    .then(res => res.text())
    .then(msg => {
      if (messageBox) {
        messageBox.textContent = msg;
      } else {
        alert(msg);
      }
      form.reset();
    })
    .catch(err => {
      if (messageBox) {
        messageBox.textContent = "An error occurred. Please try again.";
      } else {
        alert("An error occurred.");
      }
      console.error(err);
    });
}