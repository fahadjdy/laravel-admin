  <nav id="breadcrumb-component">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"> <i class="fa fa-home"></i> &nbsp; Dashboard</a> </li>
         @if (!empty($page)) @php $page = explode('|',$page); @endphp 
            @foreach ($page as $item) <li class="breadcrumb-item"><a > {{$item}}</a></li>
            @endforeach
        @endif 
      </ol>
    </nav>