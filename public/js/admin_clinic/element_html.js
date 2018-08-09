/**
 * Show examination
 * @param res
 */
function showExamination(res) {
  return `<a class="btn btn-success col-md-3 text-body font-weight-bold text-left" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            ${Lang.get('admin_clinic/examination.show')}
          </a>
          <div class="collapse" id="collapseExample">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h2 class="h2">${Lang.get('admin_clinic/examination.title')}</h2>
            </div>
            <div class="form-group">
              <label>${Lang.get('admin_clinic/examination.fields.diagnostic')}</label>
              <input type="text" name="diagnostic" class="name form-control" value="${res.diagnostic}" readonly />
            </div>
            <div class="form-group">
              <label>${Lang.get('admin_clinic/examination.fields.result')}</label>
              <textarea class="form-control" name="result" readonly>${res.result}</textarea>
            </div>
            <div class="form-group">
              <label>${Lang.get('admin_clinic/examination.fields.created_at')}</label>
              <input type="text" name="created_at" class="name form-control" value="${res.created_at}" readonly />
            </div>
          </div>`;
}

/**
 * Show form input examination
 */
function showFormCreateExamination() {
  return `<div class="form-group">
            <label>${Lang.get('admin_clinic/examination.fields.diagnostic')}</label>
            <input type="text" placeholder="${Lang.get('admin_clinic/examination.fields.diagnostic')}" name="diagnostic" class="name form-control" required />
          </div>
          <div class="form-group">
            <label>${Lang.get('admin_clinic/examination.fields.result')}</label>
            <textarea class="form-control" name="result" required></textarea>
          </div>`;
}
