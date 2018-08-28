const STATUS_COLOR = ['danger', 'success', 'primary', 'warning'];
const STATUS_LABELS_LANG = Lang.messages[Lang.getLocale() + '.api.appointment'].status;
const STATUS_LABELS = $.map(STATUS_LABELS_LANG, function(element) { return element; });
const STATUS_PENDING = 0;
const STATUS_CONFIRMED = 1;
const STATUS_COMPLETED = 2;
const STATUS_CANCEL = 3;

function getDateTime(dateTime) {
  let dateTimeFormat = new Date(dateTime);
  let date = dateTimeFormat.toLocaleDateString();
  let time = dateTimeFormat.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric'})
  return { day: date, time: time };
}

