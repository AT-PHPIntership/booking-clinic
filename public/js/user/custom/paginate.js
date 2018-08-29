const PAGE = 'page';

/**
 * show Paginate (modify from showPaginateClincis)
 */
function showPaginates(paginator) {
  var paginatorElement = $('#js-pagination');
  var firstPageElement = paginatorElement.find('li:first-child');
  var previousPageElement = paginatorElement.find('li:nth-child(2)');
  var nextPageElement = paginatorElement.find('li:nth-last-child(2)');
  var lastPageElement = paginatorElement.find('li:last-child');

  //set href
  firstPageElement.find('a.page-link').attr('href', getPagiURL(1));
  previousPageElement.find('a.page-link').attr('href', getPagiURL(getPreviousPaginatorPage(paginator)));
  nextPageElement.find('a.page-link').attr('href', getPagiURL(getNextPaginatorPage(paginator)));
  lastPageElement.find('a.page-link').attr('href', getPagiURL(paginator.last_page));

  var pagIndex = $('#pag-index');
  var firstPagIndex = $('#pag-index .page-item:first-child').clone();

  $('#pag-index .page-item').remove();    //remove old paginate link
  $('#js-pagination > .page-item').removeClass('disabled');   // remove old disabled first, privious, last, next paginate link

  //clone html index pag and set href

  for (var i = 1; i <= paginator.last_page; i++) {
    pagIndex.append('<li class="page-item"><a class="page-link" href="#"></a></li>')
    lastestPagIndexLink = pagIndex.find('li:last-child a');
    lastestPagIndexLink.attr('href', getPagiURL(i));
    lastestPagIndexLink.html(i);
  }

  //set active paginate
  var currentPage = getCurrentPaginatorPage(paginator);
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
    let query = new URLSearchParams(getQueryString());
    query.delete(PAGE); //Delete param Page in query in URL
  return window.location.pathname + '?' + query + '&' + PAGE + '=' + i;
}

/**
 * Get query strings from URL on browser and map them to be params in API.
 *
 */
function getQueryString()
{
    if (!window.location.search) {
        return '?sort_by=created_at&order=DESC&perpage=5'
    }
    return window.location.search;
}

function getCurrentPaginatorPage(paginator) {
  return paginator.current_page;
}

function getNextPaginatorPage(paginator) {
  var currentPage = getCurrentPaginatorPage(paginator);
  if (paginator.last_page > currentPage) {
    return + currentPage + 1;
  }
  return currentPage;
}

function getPreviousPaginatorPage(paginator) {
  var currentPage = getCurrentPaginatorPage(paginator);
  if (currentPage > 1) {
    return currentPage - 1;
  }
  return currentPage;
}

/**
 * action when click paginate link
 */
function clickPaginate() {
  $(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    let nextPageHref = $(this).attr("href");
    let nextPageQuery = nextPageHref.substring(nextPageHref.indexOf('?'));

    removeOldPage();
    history.pushState({}, '', window.location.pathname + nextPageQuery); //Set query to URL before call Ajax
    getAppointments();
  });
}
/**
 * Show result number on filter result
 */
function updateNumberResult(paginator)  {
    $('#js_count span:first-child').html(paginator.from);
    $('#js_count span:nth-child(2)').html(paginator.to);
    $('#js_count span:nth-child(3)').html(paginator.total);
  }
