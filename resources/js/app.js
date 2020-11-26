const { includes } = require('lodash');

require('./bootstrap');
var $ = require('jquery');

var options = {
  searchOptions: {
    key: 'sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    language: 'en-GB',
    limit: 5
  },
  autocompleteOptions: {
    key: 'sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    language: 'it-IT'
  }
};
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
document.getElementById("search-input").append(searchBoxHTML);
$(".tt-search-box-input").attr("name", "search");