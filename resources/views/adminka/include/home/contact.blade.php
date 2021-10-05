                                      <!-- contact -->
        <div class="card mb-3">
           <h2 style="text-align: center;">Կոնտակտներ</h2>
          <div class="card-header">
             <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                      <i class="material-icons" data-toggle="modal" data-target="#contact">edit</i>
              </button>
                    </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr >
                    <th>Հայ</th>
                    <th>Անգլերեն</th>
                    <th>Հեռախոս</th>
                    <th>Էլ․հասցե</th>
                    <th>Fb</th>
                    <th>Instagram</th>
                  </tr>
                </thead>
                <tbody>
               
                  <tr>
                    <td>{{ $ShowContact->adress_am}}</td>
                    <td>{{ $ShowContact->adress_en}}</td>
                    <td>{{ $ShowContact->phone}}</td>
                    <td>{{ $ShowContact->email}}</td>
                    <td>{{ $ShowContact->facebook}}</td>
                    <td>{{ $ShowContact->instagram}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>




                                                  <!-- edit contact -->
  <div class="modal" id="contact">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal footer -->
        <div class="modal-header">
          <h4 class="modal-title">Տվյալներ 2</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post" action="{{route('edit contact')}}"  enctype="multipart/form-data" >
                    {{csrf_field()}}
                     <div class="form-group">
                      <input type="text" class="form-control"  value="{{ $ShowContact->adress_am}}" placeholder="Հասցե-Հայրեն" name="adress_am">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Հասցե-Անգլերեն" value="{{ $ShowContact->adress_en}}" name="adress_en">
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Հեռախոս"  value="{{ $ShowContact->phone}}" name="phone">
                    </div>
                     <div class="form-group">
                      <input type="email" class="form-control" placeholder="Էլ․հասցե"   value="{{ $ShowContact->email}}" name="email">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Facebook"   value="{{ $ShowContact->facebook}}" name="facebook">
                    </div>
                    
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="LinkedIn"   value="{{ $ShowContact->instagram}}" name="instagram">
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