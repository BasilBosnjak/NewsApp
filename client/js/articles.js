$.ajax({
  url: Constants.get_api_base_url() + "articles",
  dataType: "json",
  success: function (articles) {
    let articlesHTML = "";

    articles.forEach((article) => {
      articlesHTML += `
                <div class="card mb-4">
                    <img src="${article.image}" class="card-img-top img-fluid" alt="${article.title}" style="max-width: 540px;">
                    <div class="card-body">
                        <h2 class="card-title">${article.title}</h2>
                        <p class="card-text">${article.description}</p>
                        <a onclick="setArticleId(${article.id})" href="#articleView" class="btn btn-primary">Read more</a>
                    </div>  
                </div>
            `;
    });

    document.querySelector(".articles-container").innerHTML += articlesHTML;
  },
});

export function setArticleId(articleId) {
  localStorage.setItem("articleId", articleId);
}