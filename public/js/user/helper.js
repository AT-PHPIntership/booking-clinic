const STATUS_COLOR = ['warning', 'primary', 'success', 'danger'];
const STATUS_LABELS = [
  Lang.get('api/appointment.status.pending'),
  Lang.get('api/appointment.status.confirmed'),
  Lang.get('api/appointment.status.completed'),
  Lang.get('api/appointment.status.cancel'),
];
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

