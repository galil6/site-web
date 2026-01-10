<script>
  const form = document.getElementById('contact-form');
  
  form.addEventListener('submit', async function(event) {
    event.preventDefault(); // Empêche le rechargement de la page
    
    const loading = document.querySelector('.loading');
    const errorMsg = document.querySelector('.error-message');
    const sentMsg = document.querySelector('.sent-message');

    loading.style.display = 'block';
    errorMsg.style.display = 'none';
    sentMsg.style.display = 'none';

    const formData = new FormData(form);

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: { 'Accept': 'application/json' }
      });

      loading.style.display = 'none';
      if (response.ok) {
        sentMsg.style.display = 'block'; // Affiche le message de succès défini dans votre HTML
        form.reset();
      } else {
        errorMsg.textContent = "Erreur lors de l'envoi. Veuillez réessayer.";
        errorMsg.style.display = 'block';
      }
    } catch (error) {
      loading.style.display = 'none';
      errorMsg.textContent = "Impossible de contacter le serveur.";
      errorMsg.style.display = 'block';
    }
  });
</script>
