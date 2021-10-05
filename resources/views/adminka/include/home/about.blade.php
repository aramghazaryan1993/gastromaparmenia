                                      <!-- Մեր Մասին -->
        <div class="card mb-3">
           <h2 style="text-align: center;">Մեր Մասին</h2>
          <div class="card-header">
             <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                      <i class="material-icons" data-toggle="modal" data-target="#about">edit</i>
              </button>
                    </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr >
                    <th>Վեռնագիր Հայ</th>
                    <th>Վեռնագիր Անգլերեն</th>
                    <th>Տեքստ Հայ</th>
                    <th>Տեքստ Անգլերեն</th>
                  </tr>
                </thead>
                <tbody>
               <tr>
                <td>{{ $ShowAbout->about_am }}</td>
                <td>{{ $ShowAbout->about_en }}</td>
                <td>{{ $ShowAbout->about_text_am }}</td>
                <td>{{ $ShowAbout->about_text_en }}</td>
               </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>




                                                  <!-- Մեր Մասին edit -->
  <div class="modal" id="about">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Մեր Մասին</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post"  action="{{route('edit about')}}"  enctype="multipart/form-data" >
                    {{csrf_field()}}

                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Վեռնագիր-Հայրեն" value="{{ $ShowAbout->about_am }}" name="name_am">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Վեռնագիր-Անգլերեն" value="{{ $ShowAbout->about_en }}" name="name_en">
                    </div>
          
                     <div class="form-group">
                             <textarea class="form-control" name="text_am" rows="8" placeholder="Տեքստ-Հայրեն">{{ $ShowAbout->about_text_am }}</textarea>
                    </div>

                    <div class="form-group">
                             <textarea class="form-control" name="text_en" rows="8" placeholder="Տեքստ-Անգլերեն">{{ $ShowAbout->about_text_en }}</textarea>
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