const PREFIX_LINK = route('user.clinics.index');
const PAGE_LANG = Lang.get('user/clinic.index.js.page');

function getClinics() {
  $.ajax({
    url: route('api.clinics.index') + getQueryString(),
    type: 'GET',
  })
  .done(function (response) {
    console.log(response);
    updateNumberClinic(response.result.paginator);
    showPaginates(response.result.paginator);
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

  $('#js-clinic').removeClass('d-none');
}

function renderClinicsHTML(numberOfClinics) {
  clinicItem = $('#js-clinic').html();
  for (var i = 0; i < numberOfClinics - 1; i++) {
    $('#js-clinic').append(clinicItem);
  }
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
});
