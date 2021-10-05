<!-- ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ -->
        <div class="card mb-3">
          <div class="card-header">
             <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                      <i class="material-icons" data-toggle="modal" data-target="#EditRestoran">edit</i>
              </button>
              <strong style="text-align: center !important; color: red;">ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ</strong>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr >
                    <th>Հայ-Վերնագիր</th>
                    <th>Անգլերեն-Վերնագիր</th>
                    <th>Հայ-տեքստ</th>
                    <th>Անգլերեն-տեքստ</th>
                    <th>Հայ-Որոնում</th>
                    <th>Անգլերեն-Որոնում</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $ShowRegionInfoRestoran->region_info_name_am }}</td>
                    <td>{{ $ShowRegionInfoRestoran->region_info_name_en }}</td>
                    <td>@php echo $ShowRegionInfoRestoran->region_info_text_am; @endphp</td>
                    <td>@php echo $ShowRegionInfoRestoran->region_info_text_en; @endphp</td>
                    <td>{{ $ShowRegionInfoRestoran->region_info_search_am }}</td>
                    <td>{{ $ShowRegionInfoRestoran->region_info_search_en }}</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>


   <!-- Փոփոխել ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ -->
  <div class="modal" id="EditRestoran">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Փոփոխել ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post" action="{{ route('edit region info restoran',['id' => $ShowRegionInfoRestoran->id]) }}">
                    {{csrf_field()}}
                     <input type="hidden" name="region_id" value="{{ $ShowRegionInfoRestoran->region_id }}"> 
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Հայ-Վերնագիր" required  value="{{ $ShowRegionInfoRestoran->region_info_name_am }}" name="region_info_name_am">
                    </div>
                     <div class="form-group">
                      <input type="text" placeholder="Անգլերեն-Վերնագիր" required class="form-control" value="{{ $ShowRegionInfoRestoran->region_info_name_en }}" name="region_info_name_en">
                    </div>
                    <div class="form-group">
                       <textarea class="form-control description-textarea" name="region_info_text_am" rows="8" placeholder="Հայ-տեքստ">
                     {{ $ShowRegionInfoRestoran->region_info_text_am }} </textarea>
                    </div>
                    
                    <div class="form-group">
                      <textarea class="form-control description-textarea" name="region_info_text_en" rows="8" placeholder="Անգլերեն-տեքստ">{{ $ShowRegionInfoRestoran->region_info_text_en }} </textarea>
                    </div>
                     <div class="form-group">
                      <input type="text" placeholder="Հայ-Որոնում" required class="form-control" value="{{ $ShowRegionInfoRestoran->region_info_search_am }}" name="region_info_search_am">
                    </div>
                    <div class="form-group">
                      <input type="text" placeholder="Անգլերեն-Որոնում" required class="form-control" value="{{ $ShowRegionInfoRestoran->region_info_search_en }}" name="region_info_search_en">
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




                                          <!-- ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ նկարների ցուցադրում -->
          <div class="card mb-3">
            <div class="card-header" >
          <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
              <i class="material-icons" data-toggle="modal" data-target="#AddImageRestoran">add</i>
          </button>
          <strong style="text-align: center !important; color: red;">ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ-Նկարներ</strong>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Նկարներ</th>
                      <th>Ջնջել</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ShowImageRestoran as $key => $value)
                      <tr>
                        <td>
                          <img src="{{ asset('web_sayt/upload_img/region/'.$value->region_info_img) }}" style="width:10%;">
                        </td>
                        <td>
                                <!-- delete  image -->
             <form method="post" action="{{ route('delete img restoran',['id'=>$value->region_id]) }}">
                            {{csrf_field()}}

                    <input type="hidden" value="{{ $value->id }}" name="delete_id">
                    
                    <button type="submit" rel="tooltip" class="btn btn-success btn-just-icon btn-sm">
                          <i  class="material-icons">delete</i>
                    </button>
             </form> 
                      
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


   <!-- ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ Ավելացնել նկար -->
    <div class="modal" id="AddImageRestoran">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">ՌԵՍՏՈՐԱՆԵՐ և ՀՅՈՒՐԱՆՈՑՆԵՐ Ավելացնել նկար</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
           
           <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <form class="forms-sample" method="post" action="{{ route('add img restoran',['id'=>$ShowRegionName->id]) }}" enctype="multipart/form-data">
                      {{csrf_field()}}
                       
                      <div class="form-group">
                        <input type="file" class="form-control" required  name="img[]" multiple="">
                      </div>
                      
                      <button type="submit" class="btn btn-gradient-primary mr-2" style="background-color: #28a745; color: white;">Ավելացնել</button>
                    </form>
                   
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>  