document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form[data-form-id]");
    forms.forEach(form => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const formId = form.getAttribute("data-form-id");
            const messageBox = document.querySelector(`[data-message-id="${formId}"]`);
            const formData = new FormData(form);
            const formType = form.getAttribute("data-form-type") || "general_txt";
            formData.append("form_type", formType);

            fetch("save-form.php", {
                method: "POST",
                body: formData,
            })
                .then(res => res.text())
                .then(data => {
                    if (messageBox) {
                        messageBox.textContent = data;
                        messageBox.style.color = "green";
                    }
                    form.reset();
                })
                .catch(err => {
                    if (messageBox) {
                        messageBox.textContent = "An error occurred. Please try again.";
                        messageBox.style.color = "red";
                    }
                });
        });
    });
});
