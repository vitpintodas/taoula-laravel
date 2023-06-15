<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="manifest" href="manifest.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Couleur 3 est le reflet du temps, impertinente et décalée, elle suit (et quelques fois précède !) l'évolution des musiques d'aujourd'hui!"/>
    
    <title>Couleur 3{{ isset($hashOnglet) ? ' | ' . $hashOnglet : '' }}</title>


    {{-- ici on injecte le css --}}
    @vite('resources/css/app.css')
    {{-- ici on injecte le javascript --}}
    @vite('resources/js/app.js')


    {{-- GOOGLE FONT STUFF --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<script>
    // Vérifie si le hash n'est pas déjà présent dans l'URL
    if (window.location.hash === '') {
        // Ajoute le hash '#home' à l'URL sans rechargement de page
        window.history.replaceState(null, null, '#home');
    }
    
    const updateHash = () => {
        let hashOnglet = window.location.hash.substring(1); // Supprime le caractère "#" du hash
        hashOnglet = hashOnglet.charAt(0).toUpperCase() + hashOnglet.slice(1); // Met la première lettre en majuscule

        // Met à jour la valeur du titre de la page
        document.title = `Couleur 3 | ${hashOnglet}`;
    };

    // Met à jour le hash lors de l'événement "hashchange"
    window.addEventListener('hashchange', updateHash);
    
    // Appelle la fonction updateHash au chargement initial
    updateHash();
</script>



    <div id="app">

    </div>
    <div id="dashboard">

    </div>
</body>
</html>