document.addEventListener("DOMContentLoaded", function () {
  const togglePassword = document.getElementById("togglePassword");
  const passwordField = document.getElementById("clave");

  togglePassword.addEventListener("click", function () {
    const type =
      passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
    this.querySelector("i").classList.toggle("fa-eye-slash");
  });
});


document.addEventListener('DOMContentLoaded', function () {
  const togglePassword1 = document.getElementById('togglePassword1');
  const togglePassword2 = document.getElementById('togglePassword2');
  const passwordField1 = document.getElementById('clave');
  const passwordField2 = document.getElementById('confirmar');

  togglePassword1.addEventListener('click', function () {
      const type = passwordField1.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField1.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye-slash');
  });

  togglePassword2.addEventListener('click', function () {
      const type = passwordField2.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField2.setAttribute('type', type);
      this.querySelector('i').classList.toggle('fa-eye-slash');
  });
});