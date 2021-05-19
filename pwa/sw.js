// Define assets we have ready to display even if offline
const staticAssets = [
  './',
  './styles.css',
  './app.js',
  './fallback.json',
  './fallback.png'
];
// When install is run, the files in staticAssets are added
// to a cache which we are calling news-static
self.addEventListener('install', async event => {
  const cache = await caches.open('news-static');
  cache.addAll(staticAssets);
});
self.addEventListener('fetch', event => {
  const req = event.request;
  // When a fetch event is called, this allows us to get files
  // from the cache if we are offline
  // event.respondWith(cacheFirst(req));

  // Another strategy saves any news items we have browser
  // so we can read them offline
  const url = new URL(req.url);
  // Check if we are fetching from our own site, use
  // cache first strategy
  if (url.origin === location.origin) {
    // When a fetch event is called, this allows us to get files
    // from the cache if we are offline
    event.respondWith(cacheFirst(req));
    console.log(`cachefirst`);
  } else {
    event.respondWith(networkFirst(req));
    console.log(`networkfirst`);
  }
});

async function cacheFirst(req) {
  // First we check to see if there is anything in the cache
  // If not, this will return undefined and we run fetch(req)
  // which tries to go online to get the files we need
  const cachedResponse = await caches.match(req);
  return cachedResponse || fetch(req);
}

async function networkFirst(req) {
  // Create a separate cache for saved articles
  const cache = await caches.open('news-dynamic');
  try {
    const res = await fetch(req);
    // Put a clone of the response into the cache
    cache.put(req, res.clone());
    return res;
  } catch (error) {
    // If we are offline this will fail, so we look in
    // the cache to see if we have anything that matches
    // Also notice that we have a fallback file, that will display if we are offline
    // and try to access an online article
    const cachedResponse = await cache.match(req);
    return cachedResponse || await caches.match('./fallback.json');
  }
}
