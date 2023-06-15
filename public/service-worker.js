const CACHE_NAME = 'c3-interact-cache--v1';
const urlsToCache = [
  '/js/app.js',
  '/css/app.css',
  '/storage/icon-192x192.png',
    '/storage/icon-512x512.png',
    '/storage/icon-384x384.png',
    '/storage/icon-256x256.png',
    '/storage/stickers.jpg',
    '/storage/studio.jpg',
    '/storage/stylo.jpg',
    '/storage/t-shirt.jpg',
    '/storage/tablier.jpg',
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => cache.addAll(urlsToCache))
  );
});

self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request)
      .then((response) => response || fetch(event.request))
  );
});
