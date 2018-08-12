// form show examination detail
function showExaminationDetail(data) {
    return `<a class="btn btn-success col-md-3 text-body font-weight-bold" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Show examination
            </a>
            <div class="collapse" id="collapseExample">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">Examination  ${data.userName}</h2>
              </div>
              <div class="form-group">
                <label>Diagnostic</label>
                <input type="text" name="diagnostic" class="name form-control" value="${data.res.diagnostic}" readonly />
              </div>
              <div class="form-group">
                <label>Result</label>
                <textarea class="form-control" name="result" readonly>${data.res.result}</textarea>
              </div>
              <div class="form-group">
                <label>Created at</label>
                <input type="text" name="created_at" class="name form-control" value="${data.res.created_at}" readonly />
              </div>
            </div>`;
}

// show modal examination detail
function showExamination(data, callback)
{
  return callback(data);
}

// form create examination
function showFormCreateExamination() {
    return `<form action="" class="formName">
              <div class="form-group">
                <label>Diagnostic</label>
                <input type="text" placeholder="Diagnostic" name="diagnostic" class="name form-control" required />
              </div>
              <div class="form-group">
                <label>Result</label>
                <textarea class="form-control" name="result" required></textarea>
              </div>
            </form>`;
}
