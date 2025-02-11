var Constants = {
  get_api_base_url: function() {
    if(location.hostname == 'localhost') {
      return "http://localhost/NewsApp/backend/";
    } else {
      return "https://whale-app-7oub2.ondigitalocean.app/";
    }
  }

    // API_BASE_URL: "http://localhost/NewsApp/backend/",
  };