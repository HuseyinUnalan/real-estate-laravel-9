<section class="classic-bg">
  <div class="container">

      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10 text-center">
              <div class="sec-heading center light">
                  <h2>Hizmetlerimiz</h2>
              </div>
          </div>
      </div>

      <div class="row gy-5">

          @foreach ($services as $service)
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <div class="veshm-servs-box light">
                      <div class="veshm-servs-box-icon">
                          <div class="veshm-posted-figure"><i class="fa-sharp fa-solid fa-check-double"></i>
                          </div>
                      </div>
                      <div class="veshm-servs-box-caption">
                          <h4>{{ $service->title }}</h4>
                          <p>{!! Str::limit($service->description, 180) !!}</p>
                      </div>
                  </div>
              </div>
          @endforeach



      </div>

  </div>
</section>