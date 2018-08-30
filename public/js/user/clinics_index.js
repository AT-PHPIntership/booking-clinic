const PREFIX_LINK = route('user.clinics.index');
const PAGE_LANG = Lang.get('user/clinic.index.js.page');

function getClinics() {
  $.ajax({
    url: route('api.clinics.index') + getQueryString(),
    type: 'GET',
  })
  .done(function (response) {
    updateNumberResult(response.result.paginator);
    showPaginates(response.result.paginator);
    showClinics(response.result.data);
    showMap(response.result.data);
  });
}

function showClinics(data) {
  $('#toTop').click();
  if (!data.length) {
    $('#js-clinic').addClass('d-none');
    $('#error-message').removeClass('d-none');
    return;
  }

  renderClinicsHTML(data.length);
  data.forEach((clinic, index)=>{
    let clinicItemHTML = $('#js-clinic').find('.clinic-item:nth-child('+ (index + 1) + ')');
    clinicItemHTML.find('.clinic-name').html(clinic.name);
    clinicItemHTML.find('.clinic-description').html(trimDescription(clinic.description));
    clinicItemHTML.find('.clinic-image').attr('src', getAvatarClinic(clinic));
    clinicItemHTML.find('.clinic-detail').attr('href', route('user.clinics.show', clinic.id));
    clinicItemHTML.find('.clinic-type-name').html(clinic.clinic_type.name);
    clinicItemHTML.find('.clinic-show-map').attr('onclick', `onHtmlClick('Clinics', ${index})`);
  });

  $('#js-clinic').removeClass('d-none');
  $('#error-message').addClass('d-none');
}

function renderClinicsHTML(numberOfClinics) {
  clinicItem = $('.clinic-item:first-child');
  for (var i = 0; i < numberOfClinics - 1; i++) {
    clinicItem.clone().appendTo('#js-clinic');
  }
}

/**
 * Action when select filter
 */
function filter() {
  queryOption = {
      order_by: 'sort_by=created_at&order=DESC',
      perpage: 'perpage=5',
  };

  $.each(queryOption, function (key, value) {
    let suffixId = $(`select[name=${key}]`).attr('sb');

    $(`#sbOptions_${suffixId} li a`).click(function (e) {
      e.preventDefault();
      queryOption[key] = $(this).attr('rel');  // Get query when chose option filter
      history.pushState({}, '', window.location.pathname + '?' + getSearchQuery(true) + queryOption.order_by + '&' + queryOption.perpage); //Set queryOption to URL before call Ajax
      removeOldPage();
      getClinics();
    });
  })
}

/**
 * Auto fill query search to input field, if user type search query from URL
 * Set perpage default in search function is 15 items
 */
function fillInputSearchFromUrl() {
  let query = new URLSearchParams(getQueryString());
  if (query.has('search')) {
    $('.search_bar_list input[name="search"]').val(query.get('search'));
    if (!query.has('perpage')) {
      let suffixId = $('select[name="perpage"]').attr('sb');
      $(`#sbSelector_${suffixId}`).html(15);
    }
  }
}

/**
 * Set default filter when search is triggered
 */
function setDefaultFilterValueWithSearch() {
  //default perpage: 15 if type sth and 5 if empty field
  var suffixId = $('select[name="perpage"]').attr('sb');
  var valuePerpage = !getSearchQuery() ? 5 : 15;
  $(`#sbSelector_${suffixId}`).html(valuePerpage);
  queryOption['perpage'] = 'perpage=' + valuePerpage;

  //default sort_by :first option
  suffixId = $('select[name="order_by"]').attr('sb');
  var valuePerpage = $(`#sbOptions_${suffixId} li:first-child a`).html();
  $(`#sbSelector_${suffixId}`).html(valuePerpage);
  queryOption['order_by'] = 'sort_by=created_at&order=DESC';
}

/**
 * Set event listener for input search: click Search either press Enter
 */
function searchEvent(){
  $('.search_bar_list input[type="submit"]').on('click', function(){
    searchAction();
  });

  $('.search_bar_list input[name="search"]').keydown('click', function(e){
    if (e.keyCode == 13) { //enter keyCode
      searchAction();
    }
  });
}

function searchAction(){
  removeOldPage();
  history.pushState({}, '', window.location.pathname + getSearchQuery()); //Set query to URL before call Ajax
  getClinics();
  setDefaultFilterValueWithSearch();
}

/**
 *  Get query from input search and mapping with filters to url
 */
function getSearchQuery(withFilter = false){
  var questionMark = withFilter ? '' : '?';
  var continueQuery = withFilter ? '&' : '';
  var searchValue =  $('.search_bar_list input[name="search"]').val();
  if (!searchValue.length) {
    return continueQuery;
  }
  return questionMark + 'search=' + searchValue + continueQuery;
}

function showMap(clinics) {
  initContruct();
  initMarkersData(clinics);
  initMarker();
}

// misc functions

function trimDescription (str) {
  maxWord = 20;
  numberOfWord = str.trim().split(/\s+/).length;
  if (numberOfWord > maxWord) { //cut limit 20 word
    var listWords = str.split(" ");
    listWords = listWords.slice(0, maxWord);
    str = listWords.join(" ") + "...";
  }
  return str;
}

/**
 * Get path image from a clinic. If not found, get default image from resource
 *
 * @param {*} clinic
 */
function getAvatarClinic(clinic) {
  avatarPath = '';
  if (clinic.images.length) {
    avatarPath = clinic.images[0].path;
  }
  else {
    avatarPath = `/images/clinic-${Math.floor(Math.random() * 5) + 1}.png`;
  }
  return avatarPath;
}

/**
 * Remove old paginate before call Ajax
 */
function removeOldPage(nextLinkPage) {
  let currentPageElement = $('.clinic-item:first-child').clone();
  $('.clinic-item').remove();
  currentPageElement.appendTo('#js-clinic');
}

$(document).ready(function() {
  getClinics();

  // Redirect page using ajax
  $(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    let nextPageHref = $(this).attr("href");
    let nextPageQuery = nextPageHref.substring(nextPageHref.indexOf('?'));

    removeOldPage();
    history.pushState({}, '', window.location.pathname + nextPageQuery); //Set query to URL before call Ajax
    getClinics();
  });

  filter();
  searchEvent();
  fillInputSearchFromUrl();
});
