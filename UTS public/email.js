document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("contact-form");

    if (!form) {
        console.error("Form tidak ditemukan! Pastikan ID 'contact-form' ada di HTML.");
        return;
    }

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let subject = document.getElementById("subject").value.trim();
        let message = document.getElementById("message").value.trim();

        if (!name || !email || !subject || !message) {
            alert("Harap isi semua kolom!");
            return;
        }

        let emailBody = `Halo, nama saya ${name}.\nEmail: ${email}\n\n${message}`;

        let gmailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=kvienphn@gmail.com&su=${encodeURIComponent(subject)}&body=${encodeURIComponent(emailBody)}`;

        console.log("Membuka Gmail dengan URL:", gmailLink); // Debugging

        alert("Akan membuka Gmail...");
        window.open(gmailLink, "_blank");
    });
});
