<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
              <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style="z-index: 1;">
                Edit profile
              </button>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5> <p>Name: <b>{{Auth::user()->name}}</b></p> </h5>
              <p>Email: <b>{{Auth::user()->email}}</b></p>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f6f6f6;;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5">253</p>
                <p class="small text-muted mb-0">Photos</p>
              </div>
              <div class="px-3">
                <p class="mb-1 h5">1026</p>
                <p class="small text-muted mb-0">Followers</p>
              </div>
              <div>
                <p class="mb-1 h5">478</p>
                <p class="small text-muted mb-0">Following</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">Доступ</p>
              <div class="p-4" style="background-color: #f6f6f6;">
             
    
   

    @if(Auth::user()->is_admin == 2  )<b style="color: plum"> АДМИН </b>@endif
    @if(Auth::user()->is_admin == 0  )<b style="color: red"> ГОСТЬ </b>@endif
    <br>
    
    @if(Auth::user()->is_admin)
                               <a  class="iuy" href="{{url('create')}}">Добавить Товар</a>    <a href="{{url('create')}}" class="float btn " style="text-decoration: none"></a>@endif
    <p></p>
    @if(Auth::user()->is_admin)
                               <a  class="iuy" href="{{url('admin')}}">Админ</a>
                               <a href="{{route('admin.users-table')}}" class="text-black " style="text-decoration: none">Пользователи</a>
         <a href="{{route('admin.orders-table')}}" class="text-black" style="text-decoration: none">Заказы</a>
         <p style="color: red">Дата создания аккаунта: <b>{{Auth::user()->created_at}}</b></p>
                               @endif
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent photos</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row g-2">
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
            <div class="row g-2">
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>