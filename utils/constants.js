var Constants = {
  get_api_base_url: function() {
    if(location.hostname == 'localhost') {
      return "http://localhost/NewsApp/backend/";
    } else {
      return "https://oyster-app-v96vv.ondigitalocean.app/backend/";
    }
  }

    // API_BASE_URL: "http://localhost/NewsApp/backend/",
  };