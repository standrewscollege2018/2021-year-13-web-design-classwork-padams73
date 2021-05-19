const apiKey = 'f94c847dfb5e4630b6566981b34f22dc';
const main = document.querySelector('main');
const sourceSelector = document.querySelector('#sourceSelector');
const defaultSource = 'the-washington-post';

window.addEventListener('load', async e => {
  updateNews();
  await updateSources();
  sourceSelector.value = defaultSource;

  sourceSelector.addEventListener('change', e => {
    updateNews(e.target.value);
  })

  if('serviceWorker' in navigator) {
    try {
      navigator.serviceWorker.register('sw.js');
      console.log(`Service worker registered`);
    } catch (error) {
      console.log(`Service worker Registration failed`);
    }
  }
});

async function updateSources() {
  const res = await fetch(`https://newsapi.org/v2/sources?apiKey=${apiKey}`);
  const json = await res.json();
  // Create the sources as options in the select menu
  sourceSelector.innerHTML = json.sources.map(src => `<option value='${src.id}'>${src.name}`);

}


async function updateNews(source = defaultSource) {
  const res = await fetch(`https://newsapi.org/v2/everything?q=${source}&from=2021-02-24&sortBy=publishedAt&apiKey=${apiKey}`);
  const json = await res.json();
  // Create the articles
  main.innerHTML = json.articles.map(createArticle).join('\n');
  function createArticle(article) {
    return `
    <div class="article">
      <a href="${article.url}">
        <h2>${article.title}</h2>
        <img src="${article.urlToImage}" alt="${article.title}">
        <p>${article.description}</p>
      </a>
    </div>
    `;
  }
}
