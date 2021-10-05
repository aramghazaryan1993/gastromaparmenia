  <!-- Edit  Iframe-->
  <div class="modal" id="EditIframe">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Փոփոխել քարտեզի հղումը</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post" action="{{ route('edit iframe',['id' => $ShowIframe->id]) }}" >
                    {{csrf_field()}}
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Քարտեզի հղում"   name="map" value="{{ $ShowIframe->map }}">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2" style="background-color: #28a745; color: white;">Փոփոխել</button>
                  </form>
                 
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Edit  Iframe-->
  <div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr >
                    <th>Հղում</th>
                    <th>Փոփոխել</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $ShowIframe->map }}</td>
                    <td>  
          <div class="card-header">
             <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                      <i class="material-icons" data-toggle="modal" data-target="#EditIframe">edit</i>
              </button>
          </div>
                    </td>

                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>