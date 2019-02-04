<div class="container-fluid mb-4 bg-white border shadow-sm">
    <div class="container">
        <div class="d-flex p-4">
          <div class="mr-auto h4 my-auto px-4">
          <a class="breadcrumb-item text-primary" href="/">Inicio</a>
          @if($link1 != null)
                <a class="breadcrumb-item text-primary text-capitalize" href="/{{$link1->slug}}" >{{ strtolower($link1->nombre) }}</a>
           @endif
           @if(is_object($link2))
                <a class="breadcrumb-item active" aria-current="page">{{ strtolower($link2->nombre) }}</a>
            @else
                <a class="breadcrumb-item active" aria-current="page">{{$link2}}</a>
            @endif
          </div>
        </div>
    </div>
</div>