document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("form-visita");

  form.addEventListener("submit", (e) => {
    // Validación personalizada global
    if (!form.checkValidity()) {
      e.preventDefault();
      mostrarErrores(form);
    }
  });
});

function mostrarErrores(form) {
  const campos = form.querySelectorAll("input, select, textarea");
  campos.forEach((campo) => {
    if (!campo.validity.valid) {
      campo.style.border = "2px solid red";

      if (!campo.nextElementSibling || !campo.nextElementSibling.classList.contains("error")) {
        const mensaje = document.createElement("div");
        mensaje.className = "error";
        mensaje.style.color = "red";
        mensaje.style.fontSize = "13px";

        if (campo.validity.valueMissing) mensaje.textContent = "Este campo es obligatorio.";
        else if (campo.validity.patternMismatch) mensaje.textContent = campo.title;
        else if (campo.validity.tooShort) mensaje.textContent = `Debe tener al menos ${campo.minLength} caracteres.`;
        else if (campo.validity.rangeOverflow || campo.validity.rangeUnderflow) mensaje.textContent = "Valor fuera de rango.";
        else if (campo.validity.typeMismatch && campo.type === "email") mensaje.textContent = "Ingrese un correo válido.";

        campo.insertAdjacentElement("afterend", mensaje);
      }
    } else {
      campo.style.border = "";
      if (campo.nextElementSibling && campo.nextElementSibling.classList.contains("error")) {
        campo.nextElementSibling.remove();
      }
    }
  });
}