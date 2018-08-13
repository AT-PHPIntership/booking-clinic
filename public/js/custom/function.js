const STATUS_COLOR = ['warning', 'primary', 'success', 'danger'];
const STATUS_LABELS = ['Pending', 'Confirmed', 'Completed', 'Cancel'];
const STATUS_PENDING = 0;
const STATUS_CONFIRMED = 1;
const STATUS_COMPLETED = 2;
const STATUS_CANCEL = 3;


function getDateTime(dateTime) {
  let year = dateTime.substring(0, 4);
  let month = dateTime.substring(5, 7);
  let date = dateTime.substring(8, 10);
  let h = dateTime.substring(11, 13);
  let i = dateTime.substring(14, 16);
  if (h > 12) {
    h -= 12;
    var s = 'pm';
  } else
    var s = 'am';
  return { day: date + '/' + month + '/' + year, time: h + ':' + i + s };
}
