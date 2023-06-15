const BASE_URL = "http://localhost:8000/api/";

function loadJson(url) {
    return fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({}),
    })
        .then((response) => response.json())
        .then((data) => console.log("Success:", data))
        .catch((error) => {
            console.error("Error:", error);
        });
}
function getArtists(nb) {
    return loadJson(`${BASE_URL}artistes/${nb}`);
}

function getUser(nb) {
    return loadJson(`${BASE_URL}users/${nb}`);
}

function getTitles(nb) {
    return loadJson(`${BASE_URL}titres/${nb}`);
}

function getPlaylists(nb) {
    return loadJson(`${BASE_URL}playlists/${nb}`);
}

function getResponse(nb) {
    return loadJson(`${BASE_URL}reponses/${nb}`);
}

function getSondages(nb) {
    return loadJson(`${BASE_URL}sondages/${nb}`);
}

export {
    getArtists,
    getUser,
    getTitles,
    getPlaylists,
    getResponse,
    getSondages,
};
