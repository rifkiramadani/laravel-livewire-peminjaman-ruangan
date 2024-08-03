<div>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Bookings</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/bookings">Bookings</a></li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card">
                <div class="card-body">
                  @if (session('success'))
                      <div class="alert alert-success mt-3">
                        {{ session('success') }}
                      </div>
                  @endif
                        <div class="card-title">
                            <div class="row">
                              <div class="col-6">
                                  <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Search...">
                              </div>
                                <div class="col-6">
                                  <a wire:navigate href="/bookings/create" class="btn btn-primary float-end me-3">+ Add Booking</a>
                                </div>
                            </div>
                        </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">USER</th>
                        <th scope="col">BOOKING DATE</th>
                        <th scope="col">ROOMS</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->booking_date}}</td>
                        <td>
                            @foreach ($booking->bookingDetails as $detail)
                                <ul>
                                    <li>{{ $detail->room->name }} (Rp.{{ $detail->room->price_per_night }})</li>
                                </ul>
                            @endforeach
                        </td>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
    
            </div>
          </div>
        </section>
    
      </main><!-- End #main -->
</div>
