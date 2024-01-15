<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>


      
      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        <div class="item">
          <div class="card-doctor">
          @foreach($data as $item)
            <div class="header">
             <img src="{{ asset('storage/' . $item->foto) }}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
         
            <div class="body">
              <p class="text-xl mb-0">{{$item ['name']}}</p>
              <span class="text-sm text-grey">{{$item ['spesialis']}}</span>
            </div>
            @endforeach 
          </div>
        </div>
    
      </div>
    </div>
  </div>