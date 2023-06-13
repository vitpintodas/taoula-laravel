//cette fonction permet de récupérer le chemin d'une image svg
export const getImagePathJpeg = (type) => {
    // lien suceptible de changer en fonction de l'ordinateur ou du serveur
// return `http://[::1]:5174/resources/assets/svg/${type}.svg`
// return `../../../resources/assets/svg/${type}.svg`
// console.log(import.meta.url)
//return the path of the svg using import.meta.url
// console.log(`${import.meta.url.split('resources')[0]}resources/assets/svg/${type}.svg`)
// console.log(`${import.meta.url.split('resources')[0]}`)
return `${window.location.origin}/storage/${type}.jpg`;
}
