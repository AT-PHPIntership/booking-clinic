const PREFIX_LINK = route('user.clinics.index');
const PAGE_LANG = Lang.get('user/clinic.index.js.page');

function getClinics() {
  $.ajax({
    url: route('api.clinics.index') + getQueryString(),
    type: 'GET',
  })
  .done(function (response) {
    updateNumberClinic(response.result.paginator);
    showPaginateClinics(response.result.paginator);
    showClinics(response.result.data);
  });
}

function showClinics(data) {
  renderClinicsHTML(data.length);
  data.forEach((clinic, index)=>{
    let clinicItemHTML = $('#js-clinic').find('.clinic-item:nth-child('+ (index + 1) + ')');
    clinicItemHTML.find('.clinic-name').html(clinic.name);
    clinicItemHTML.find('.clinic-description').html(trimDescription(clinic.description));
    clinicItemHTML.find('.clinic-image').attr('src', `/images/clinic-${Math.floor(Math.random() * 5) + 1}.png`);
    clinicItemHTML.find('.clinic-detail').attr('href', route('user.clinics.show', clinic.id));
  });

  $('#js-clinic').toggleClass('d-none');
}

function renderClinicsHTML(numberOfClinics) {
  clinicItem = $('#js-clinic').html();
  for (var i = 0; i < numberOfClinics - 1; i++) {
    $('#js-clinic').append(clinicItem);
  }
}

function showPaginateClinics(paginator) {
  var paginatorClinic = $('#js-pagination-clinic');

  var firstPageElement = paginatorClinic.find('li:first-child');
  var previousPageElement = paginatorClinic.find('li:nth-child(2)');
  var nextPageElement = paginatorClinic.find('li:nth-last-child(2)');
  var lastPageElement = paginatorClinic.find('li:last-child');

  //set href

  firstPageElement.find('a').attr('href', getPagiURL(1));
  previousPageElement.find('a').attr('href', getPagiURL(getPreviousPaginatorPage()));
  nextPageElement.find('a').attr('href', getPagiURL(getNextPaginatorPage(paginator)));
  lastPageElement.find('a').attr('href', getPagiURL(paginator.last_page));

  var pagIndex = $('#pag-index-clinic');
  var firstPagIndex = pagIndex.find('li:first-child');

  //clone html index pag and set href

  for (var i = 1; i <= paginator.last_page; i++) {
    if (i != 1) {
      firstPagIndex.clone().appendTo(pagIndex);
    }
    lastestPagIndexLink = pagIndex.find('li:last-child a');
    lastestPagIndexLink.attr('href', getPagiURL(i));
    lastestPagIndexLink.html(i);
  }

  //set active paginate
  var currentPage = getCurrentPaginatorPage();
  pagIndex.find(`li:nth-child(${currentPage})`).toggleClass("disabled").toggleClass("active");
  if (currentPage == 1) {
    firstPageElement.toggleClass('disabled');
    previousPageElement.toggleClass('disabled');
  }
  if (currentPage == paginator.last_page) {
    nextPageElement.toggleClass('disabled');
    lastPageElement.toggleClass('disabled');
  }

}

function getPagiURL(i) {
  return PREFIX_LINK + '?' + PAGE_LANG + '=' + i;
}

function updateNumberClinic(paginator)  {
  $('#js_count_clinic span:first-child').html((paginator.from !=null) ? (paginator.to - paginator.from + 1) : 0);
  $('#js_count_clinic span:nth-child(2)').html(paginator.total);
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
 * Get query strings from URL on browser and map them to be params in API.
 *
 */
function getQueryString() {
  return window.location.search;
}

function getCurrentPaginatorPage() {
  var urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has(PAGE_LANG)) {
    return urlParams.get(PAGE_LANG);
  }
  return 1;
}

function getNextPaginatorPage(paginator) {
  var currentPage = getCurrentPaginatorPage();
  if (paginator.last_page > currentPage) {
    return + currentPage + 1;
  }
  return currentPage;
}

function getPreviousPaginatorPage() {
  var currentPage = getCurrentPaginatorPage();
  if (currentPage > 1) {
    return currentPage - 1;
  }
  return currentPage;
}

$(document).ready(function() {
  getClinics();
});
