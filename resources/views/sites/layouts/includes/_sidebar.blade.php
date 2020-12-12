<div class="sidebar">
    <center>
        <img src="{{asset('img/user_img/'.auth()->user()->user_image)}}" class="profile-img" alt="profil" />
        <h4 style="text-transform: capitalize;">{{auth()->user()->name}}</h4>
    </center>
    <div class="row-fluid">
      <a href="{{route('profil')}}" class="{{ (request()->is('profil/*')) ? 'active' : '' }}">
          <i class="fas fa-user"></i><span>Profil</span>
      </a>
      <a href="/transaksi" class="{{ (request()->is('transaksi')) ? 'active' : '#' }}">
          <i class="fas fa-money-bill"></i><span>Transaksi</span>
      </a>
      <form id="form" action="{{route('logout')}}" method="POST">@csrf</form>
      <a class="keluar-profile" href="javascript:void(0)" onclick="document.getElementById('form').submit()">
          <i class="fas fa-gear"></i><span>Keluar</span></a>
    </div>
</div>
