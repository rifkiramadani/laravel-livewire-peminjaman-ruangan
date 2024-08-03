<div>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Rooms</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/rooms">Rooms</a></li>
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
                                  <a wire:navigate href="/rooms/create" class="btn btn-primary float-end me-3">+ Add Room</a>
                                </div>
                            </div>
                        </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price Per Night</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->hotel->name }}</td>
                        <td>{{ $room->roomType->name }}</td>
                        <td>{{ $room->price_per_night }}</td>
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
