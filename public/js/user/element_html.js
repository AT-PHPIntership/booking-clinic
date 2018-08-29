
function showExamiantionResult() {
  return `<div style="overflow-x: hidden">
            <div class="row mr-1">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.clinic')}</label>
                  <input name="clinic-name" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.email')}</label>
                  <input name="clinic-email" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row mr-1">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.clinic_address')}</label>
                  <input name="clinic-address" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row mr-1">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.patient')}</label>
                  <input name="user-name" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.email')}</label>
                  <input name="user-email" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row mr-1">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.diagnostic')}</label>
                  <input name="diagnostic" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.created_at')}</label>
                  <input name="created-at" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row mr-1">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="font-weight-bold">${Lang.get('user/appointment.result.description')}</label>
                  <textarea class="form-control" name="descsription" disabled="" rows="3">aasasdasdasdaasasdasdas</textarea>
                </div>
              </div>
            </div>
          </div>`;
}
