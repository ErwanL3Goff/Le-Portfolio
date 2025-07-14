const EMAIL_CONFIG = {
    serviceId: 'YOUR_SERVICE_ID',
    templateId: 'YOUR_TEMPLATE_ID',
    publicKey: 'YOUR_PUBLIC_KEY'
};

// Initialisation d'EmailJS
function initEmailJS() {
    if (EMAIL_CONFIG.publicKey !== 'YOUR_PUBLIC_KEY') {
        emailjs.init(EMAIL_CONFIG.publicKey);
        return true;
    }
    return false;
}

// Fonction de validation du formulaire
function validateForm(formData) {
    const errors = [];

    if (!formData.name.trim()) {
        errors.push('Le nom est requis');
    }

    if (!formData.email.trim()) {
        errors.push('L\'email est requis');
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email)) {
        errors.push('L\'email n\'est pas valide');
    }

    if (!formData.message.trim()) {
        errors.push('Le message est requis');
    }

    return errors;
}

// Fonction pour afficher les messages
function showMessage(type, message) {
    const successDiv = document.getElementById('successMessage');
    const errorDiv = document.getElementById('errorMessage');

    // Cacher tous les messages
    successDiv.style.display = 'none';
    errorDiv.style.display = 'none';

    if (type === 'success') {
        successDiv.style.display = 'block';
        successDiv.textContent = message;
    } else {
        errorDiv.style.display = 'block';
        errorDiv.textContent = message;
    }

    // Faire défiler vers le message
    document.querySelector('.max-w-md').scrollIntoView({ behavior: 'smooth' });
}

// Fonction pour gérer l'état de chargement
function setLoadingState(loading) {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const spinner = submitBtn.querySelector('.spinner');
    const btnText = document.getElementById('btnText');

    if (loading) {
        form.classList.add('loading');
        spinner.style.display = 'block';
        btnText.textContent = 'Envoi en cours...';
    } else {
        form.classList.remove('loading');
        spinner.style.display = 'none';
        btnText.textContent = 'Envoyer le message';
    }
}

// Fonction d'envoi d'email avec EmailJS
async function sendEmailWithEmailJS(formData) {
    const templateParams = {
        from_name: formData.name,
        from_email: formData.email,
        message: formData.message,
        to_email: 'elegoff296@gmail.com'
    };

    try {
        await emailjs.send(
            EMAIL_CONFIG.serviceId,
            EMAIL_CONFIG.templateId,
            templateParams
        );
        return { success: true };
    } catch (error) {
        console.error('Erreur EmailJS:', error);
        return { success: false, error: error.message };
    }
}

// Fonction d'envoi d'email avec mailto (solution de secours)
function sendEmailWithMailto(formData) {
    const subject = encodeURIComponent(`Nouveau message de ${formData.name}`);
    const body = encodeURIComponent(
        `Nom: ${formData.name}\n` +
        `Email: ${formData.email}\n\n` +
        `Message:\n${formData.message}`
    );

    const mailtoUrl = `mailto:elegoff296@gmail.com?subject=${subject}&body=${body}`;

    try {
        window.location.href = mailtoUrl;
        return { success: true };
    } catch (error) {
        return { success: false, error: 'Impossible d\'ouvrir le client email' };
    }
}

// Gestionnaire de soumission du formulaire
async function handleFormSubmit(event) {
    event.preventDefault();

    // Récupérer les données du formulaire
    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        message: document.getElementById('message').value
    };

    // Validation
    const errors = validateForm(formData);
    if (errors.length > 0) {
        showMessage('error', errors.join(', '));
        return;
    }

    // Démarrer le chargement
    setLoadingState(true);

    // Tentative d'envoi avec EmailJS
    if (initEmailJS()) {
        const result = await sendEmailWithEmailJS(formData);
        setLoadingState(false);

        if (result.success) {
            showMessage('success', 'Message envoyé avec succès ! Je vous répondrai bientôt.');
            document.getElementById('contactForm').reset();
        } else {
            showMessage('error', 'Erreur lors de l\'envoi avec EmailJS. Tentative avec mailto...');
            // Solution de secours avec mailto
            setTimeout(() => {
                const mailtoResult = sendEmailWithMailto(formData);
                if (mailtoResult.success) {
                    showMessage('success', 'Client email ouvert. Veuillez envoyer le message depuis votre client email.');
                } else {
                    showMessage('error', 'Erreur lors de l\'envoi. Veuillez réessayer plus tard.');
                }
            }, 1000);
        }
    } else {
        // Utiliser mailto directement si EmailJS n'est pas configuré
        setLoadingState(false);
        const mailtoResult = sendEmailWithMailto(formData);
        if (mailtoResult.success) {
            showMessage('success', 'Client email ouvert. Veuillez envoyer le message depuis votre client email.');
        } else {
            showMessage('error', 'Erreur lors de l\'ouverture du client email. Vérifiez votre configuration email.');
        }
    }
}

// Initialisation
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('contactForm').addEventListener('submit', handleFormSubmit);

    // Afficher un message informatif si EmailJS n'est pas configuré
    if (!initEmailJS()) {
        console.warn('EmailJS n\'est pas configuré. Le formulaire utilisera mailto comme solution de secours.');
    }
});