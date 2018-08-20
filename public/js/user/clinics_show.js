const first = "First";
const pre = "Previous";
const next = "Next";
const last = "Last";

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
  data.forEach(clinic => {
    let item =
    `<div class="col-md-6">
      <div class="box_list wow fadeIn">
        <a href="#0" class="wish_bt"></a>
        <figure>
          <a href="detail-page.html"><img src="/images/clinic-${Math.floor(Math.random() * 5) + 1}.png" class="img-fluid" alt="" style="object-fit:cover;height:300px">
            <div class="preview"><span>Read more</span></div>
          </a>
        </figure>
        <div class="wrapper">
          <small>Psicologist</small>
          <h3>${clinic.name}</h3>

          <p style="height:76px">${trimDescription(clinic.description)}</p>
          <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
          <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="/images/user/badges/badge_1.svg" width="15" height="15" alt=""></a>
        </div>
        <ul>
          <li><a href="#0" onclick="onHtmlClick('Doctors', 0)"><i class="icon_pin_alt"></i>View on map</a></li>
          <li><a href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+–+Hôpitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
          <li><a href="detail-page.html">Book now</a></li>
        </ul>
      </div>
    </div>`;
    $('#js-clinic').append(item);
  });
}

function showPaginateClinics(paginator) {
  var prefixLink = "/clinics";
  var paginatorClinic = $('#js-pagination-clinic');
  var firstPage = `<li class="page-item ${disableBtnPagClinic(paginator, first)}"><a class="page-link" href="${prefixLink + getQueryString(paginator.first_page_url)}">${first}</a></li>`;
  var previousPage = `<li class="page-item ${disableBtnPagClinic(paginator, pre)}"><a class="page-link" href="${prefixLink + getQueryString(paginator.prev_page_url, paginator.first_page_url)}">${pre}</a></li>`;
  var nextPage = `<li class="page-item ${disableBtnPagClinic(paginator, next)}"><a class="page-link" href="${prefixLink + getQueryString(paginator.next_page_url, paginator.last_page_url)}">${next}</a></li>`;
  var lastPage = `<li class="page-item ${disableBtnPagClinic(paginator, last)}"><a class="page-link" href="${prefixLink + getQueryString(paginator.last_page_url)}">${last}</a></li>`;
  paginatorClinic.append(firstPage);
  paginatorClinic.append(previousPage);
  for (var i = 1; i <= paginator.last_page; i++) {
    if (i === paginator.current_page) {
      var item = `<li class="page-item disabled active"><a class="page-link" href="${prefixLink + "?page=" + i}">${i}</a></li>`;
    } else {
      var item = `<li class="page-item"><a class="page-link" href="${prefixLink + "?page=" + i}">${i}</a></li>`;
    }
    paginatorClinic.append(item);
  }
  paginatorClinic.append(nextPage);
  paginatorClinic.append(lastPage);
}

function updateNumberClinic(paginator)  {
  $('#js_count_clinic span:first-child').html((paginator.from !=null) ? (paginator.to - paginator.from + 1) : 0);
  $('#js_count_clinic span:nth-child(2)').html(paginator.total);
}

$(document).ready(function() {
  getClinics();
});

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

function getQueryString(url = undefined, urlBackup = undefined) {
  if (url !== undefined) {
    if (url !=null){
      return url.substring(url.indexOf('?'));
    }
    return urlBackup.substring(urlBackup.indexOf('?'));
  }
  return window.location.search;
}

function disableBtnPagClinic(paginator, typeNav) {
  var urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has("page")) {
    var page = urlParams.get('page');
    if (page == 1) {
      if ([first, pre].indexOf(typeNav) >= 0) {
        return 'disabled';
      }
    }
    if (page == paginator.last_page) {
      if ([next, last].indexOf(typeNav) >= 0) {
        return 'disabled';
      }
    }
    return;
  }
  if ([first, pre].indexOf(typeNav) >= 0) {
    return 'disabled';
  }
  if (paginator.next_page_url == null) {
    if ([next, last].indexOf(typeNav) >= 0) {
      return 'disabled';
    }
  }
  return;
}
