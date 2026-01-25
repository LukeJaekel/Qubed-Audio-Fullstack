// Updates password requirements points as the user is typing
document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    if (!passwordInput) return;

    const setStatus = (id, isValid) => {
        const status = document.querySelector(`#${id} .status`);
        status.textContent = isValid ? '✔️' : '❌';
        status.classList.toggle('valid', isValid);
        status.classList.toggle('invalid', !isValid);
    };

    const updateRequirements = () => {
        const val = passwordInput.value;

        setStatus('req-length', val.length >= 8);
        setStatus('req-uppercase', /[A-Z]/.test(val));
        setStatus('req-lowercase', /[a-z]/.test(val));
        setStatus('req-number', /[0-9]/.test(val));
        setStatus('req-symbol', /[\W_]/.test(val));
    };

    // Runs once on load
    updateRequirements();

    // Runs as user types
    passwordInput.addEventListener('input', updateRequirements);
});

// Used to toggle reveal password
document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.querySelector('.toggle-password');

    if (!passwordInput || !toggleBtn) return;

    toggleBtn.addEventListener('click', () => {
        const isHidden = passwordInput.type === 'password';
        passwordInput.type = isHidden ? 'text' : 'password';
        toggleBtn.style.backgroundImage = isHidden 
        ? "url('../icons/eye-open-original.png')" 
        : "url('../icons/eye-closed-original.png')";
    });
});