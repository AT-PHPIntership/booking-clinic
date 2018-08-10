<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width">
  <ol class="carousel-indicators">
    @foreach ($images as $key => $image)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" {!! $key == 0 ? 'class="active"' : '' !!}></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach ($images as $key => $image)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        <img class="d-block w-100" src="{{ asset($image->path) }}" alt="First slide" style="object-fit:cover;height:300px">
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
