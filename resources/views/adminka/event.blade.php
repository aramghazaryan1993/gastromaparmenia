@extends('adminka.layouts.apptest')

@section('title', 'Միջոցառումներ')

@yield('header')

  @section('content')

    <div id="wrapper">

      @include('adminka.layouts.leftmenu')

      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Ադմինիստրատորի վահանակ</a>
          </li>
          <li class="breadcrumb-item active">Միջոցառումներ</li>
         
     </ol>



                                                  <!-- add Event -->

  <div class="modal" id="addevent">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal footer -->
        <div class="modal-header">
          <h4 class="modal-title">Ավելացնել Միջոցառումներ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      

        <!-- Modal body -->
        <div class="modal-body">
         
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post" action="{{route('add event')}}"  enctype="multipart/form-data" >
                    {{csrf_field()}}

                     <div class="form-group">
                      <input type="text" class="form-control"  placeholder="Վեռնագիր Հայ" name="event_am">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Վեռնագիր Անգլերեն"  name="event_en" required>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="event_text_am" rows="8" placeholder="Հայ-տեքստ" >
                      </textarea>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="event_text_en" rows="8" placeholder="Տեքստ Անգլերեն" >
                      </textarea>
                    </div>
                   
                     <div class="form-group">
                      <input type="file" class="form-control" name="img" required>
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

                                  

                                      <!-- Միջոցառումներ -->
        <div class="card mb-3">
           <h2 style="text-align: center;">Միջոցառումներ</h2>
         <div class="card-header">
             <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                      <i class="material-icons" data-toggle="modal" data-target="#addevent">add</i>
              </button>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped"  width="100%" cellspacing="0">
                <thead>
                  <tr >
                    <th>Վեռնագիր Հայ</th>
                    <th>Վեռնագիր Անգլերեն</th>
                    <th>Տեքստ Հայ</th>
                    <th>Տեքստ Անգլերեն</th>
                    <th>Նկար</th>
                    <th>Փոփոխել</th>
                    <th>Հեռացնել</th>
                  </tr>
                </thead>
                <tbody>
               
               @foreach($ShowEvent as $Event)
                  <tr>
                   <td>{{ $Event->event_am}}</td>
                   <td>{{ $Event->event_en}}</td>
                   <td>{{ $Event->event_text_am}}</td>
                   <td>{{ $Event->event_text_en}}</td>
                   <td><img src="{{ asset('web_sayt/upload_img/events/'.$Event->img) }}" width="100"></td>
                   <td>
                     <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                      <i class="material-icons" data-toggle="modal" data-target="#event{{ $Event->id }}">edit</i>
                     </button>
                   </td>
                   <td>
                    <a href="{{ route('delete event',['id'=>$Event->id]) }}">
                     <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title=""><i class="material-icons">delete</i>
                     </button>
                     </a>
                   </td>
                  </tr>
               @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>




                                                  <!-- edit Event -->

  @foreach($ShowEvent as $EventValue)

  <div class="modal" id="event{{ $EventValue->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal footer -->
        <div class="modal-header">
          <h4 class="modal-title">{{ $EventValue->event_am }}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post" action="{{route('edit event',['id' => $EventValue->id])}}"  enctype="multipart/form-data" >
                    {{csrf_field()}}

                     <div class="form-group">
                      <input type="text" class="form-control"  value="{{ $EventValue->event_am}}" placeholder="Վեռնագիր Հայ" name="event_am">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" placeholder="Վեռնագիր Անգլերեն" value="{{ $EventValue->event_en}}" name="event_en">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="event_text_am" rows="8" placeholder="Հայ-տեքստ">{{ $EventValue->event_text_am}}
                      </textarea>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="event_text_en" rows="8" placeholder="Տեքստ Անգլերեն">{{ $EventValue->event_text_en}}
                      </textarea>
                    </div>
                     <div class="form-group">
                      <input type="file" class="form-control"  name="img">
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

   @endforeach

       <div class="container">
      <nav aria-label="Page navigation example">
          <ul class="pagination mypagination">
            <li class="page-item">{{ $ShowEvent->links() }}</li>
          </ul>
      </nav>
    </div>



  @endsection 

   
@yield('footer')




