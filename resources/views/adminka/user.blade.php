@extends('adminka.layouts.apptest')

@section('title', 'User')




@yield('header')

  @section('content')

    <div id="wrapper">

      @include('adminka.layouts.leftmenu')

         <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('home')}}">Ադմինիստրատորի վահանակ</a>
          </li>
          <li class="breadcrumb-item active">Տվյալներ</li>
          <li class="breadcrumb-item active">Փոփոխել գաղտնաբառը</li>
      </ol>

       <!-- user -->
       
       
       
                  <!-- 8 -->
        <div class="card mb-3">
        {{--   <div class="card-header">
            <i class="fas fa-table"></i>
            8</div> --}}
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Անուն Ազգանուն</th>
                    <th>Էլ․ հասցել</th>
                    <th>Փոփոխել</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($ShowUser as $value)
                  <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                      <button type="button" rel="tooltip" class="btn btn-success btn-just-icon btn-sm" data-original-title="" title="">
                      <i class="material-icons" data-toggle="modal" data-target="#editUser{{ $value->id }}">edit</i>
                      </button>
            
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>


 <!-- edit modal 8 -->
 @foreach($ShowUser as $value)
  <div class="modal" id="editUser{{ $value->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Փոփոխել տվյալները</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         
         <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" action="{{route('edit user', ['id' => $value->id])}}">
                    {{csrf_field()}}
                    <div class="form-group">
                      <input type="text" class="form-control"  value="{{ $value->name }}" name="name">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" value="{{ $value->email }}" name="email">
                    </div>
                    <div class="form-group">
                       Համաձա՞յն եք փոխել ձեր գաղտնաբառը?
                      <input type="checkbox" class="form-control" name="yes" >
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control" name="password" placeholder="Մուտքագրեք նոր գաղտնաբառը">
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
       <!-- user -->


    @endsection  





@yield('footer')
